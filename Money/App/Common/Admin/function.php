<?php
/**
 * Created by PhpStorm.
 * User: Somnus
 * Date: 2016/11/9
 * Time: 17:28
 */
/**
 * [writeArr 写入配置文件方法]
 * @param  [type] $arr      [要写入的数据]
 * @param  [type] $filename [文件路径]
 * @return [type]           [description]
 */
function writeArr($arr, $filename) {
    return file_put_contents($filename, "<?php\r\nreturn " . var_export($arr, true) . ";");
}

function delDir($path){
    if ( $handle = opendir( "$path" ) ){
        while ( false !== ( $item = readdir( $handle ) ) ) {
            if ( $item != "." && $item != ".." ) {
                if ( is_dir( "$path/$item" ) ) {
                    delDir( "$path/$item" );
                } else {
                    unlink( "$path/$item" );
                }
            }
        }
        closedir( $handle );
    }
}



// ------------------------------------------------------


    

    //调用获取数据流程
    function mobile($apiUrl,$appkey,$apiSecret,$version,$callBackUrl,$identityCardNo,$identityName,$bizType,$method,$username,$password,$contentType,$otherInfo,$count,$sleepCount,$token){


        //运营商采集参数
        $params = array(
            "method" => $method,
            "apiKey" => $appkey,
            "username" => $username,
            "password" => $password,
            "contentType" => $contentType,
            "otherInfo" => $otherInfo,
            "callBackUrl" => $callBackUrl,
            "identityCardNo" => $identityCardNo,
            "identityName" => $identityName
        );

        //生成参数字符串
        $paramString = getParamString($params,$version,$apiSecret);


        //提交请求
        $content = curl($apiUrl,$paramString,1);
        $result = json_decode($content,true);

        
        if($result){

            //受理成功的情况
            if($result['code'] =='0010'){
             // myEcho("该请求受理成功");

                //请求成功获取token
                $token = $result['token'];

                //淘宝采集状态参数
                $params = array(
                    "method" => "api.common.getStatus",
                    "apiKey" => $appkey,
                    "bizType" => $bizType,
                    "token" => $token
                );

                //生成参数字符串
                $paramString = getParamString($params,$version,$apiSecret);
                $i = 1;
                do{
                    // myEcho("轮循第【".$i."】次 start");

                    //轮训获取结果
                    $res = roundRobin($token, $paramString,$apiUrl,$appkey,$version,$apiSecret,$bizType);
                    if($res){
                        return $res;
                    }
                    // myEcho("轮循第【".$i++."】次 end");

                    ob_flush();
                    flush();
                    sleep($sleepCount);

                    if($count-- <= 0){
                        // myEcho("获取信息结束。没有获取到数据");
                        return ['errcode'=>0,'errmsg'=>'获取信息结束。没有获取到数据'];
                        break;
                    }
                }
                while(1);
                

            }else{
                // myEcho($result['code'].":".$result['msg']);
                return ['errcode'=>0,'errmsg'=>$result['msg']];
            }
        }else{
            // myEcho("请求失败");
            return ['errcode'=>0,'errmsg'=>'请求失败'];
        }
    }

    //设定请求参数(加密生成sign并生成请求字符串)
    function getParamString($params,$version,$apiSecret){

        //计算签名
        $paramsSign = $params;
        $paramsSign['version'] = $version.$apiSecret;

        //按照key排序
        ksort($paramsSign);

        // echo(urldecode(http_build_query($paramsSign)))."</br>";
        //加密获取sign
        $sign=sha1(urldecode(http_build_query($paramsSign)));//对该字符串进行 SHA-1 计算，得到签名，并转换成 16 进制小写编码
        
        
        //设置请求参数
        $params['version'] = $version;
        $params['sign'] = $sign;

        $paramString = http_build_query($params);

        return $paramString;
    }

    //轮训获取结果
    function roundRobin($token, $paramstring,$apiUrl,$appkey,$version,$apiSecret,$bizType){

        //状态查询
        $json = curl($apiUrl, $paramstring,1);
        $result = json_decode($json, true);

        $code = $result['code'];
        $msg = $result['msg'];
        $token = $result['token'];

        // myEcho("<pre>");
        // myEcho("循环取的状态:".$code."");
        // myEcho("循环取的信息:");
        // myEcho($json);

        if(!isset($code) || empty($code)) {
            //未取到结果集.继续轮训
            return false;
        }
        
        //0开头标处理成功相关
        if (startWith($code, "0")) {

            if ("0100" == $code) {//登陆成功
                // myEcho("对象结果查询 >>>>>" + $msg);
                return false;
            } else if ("0006" == $code) {//等待输入信息

                $input = $result['input'];

                //获取等待输入类型
                $type = $input['type'];
                //图片验证码和二维码为base64编码的图片
                $value = $input['value'];
                //保存到本地作识别用-根据实际业务场景处理
                if (isset($value) && !empty($value) ) {
                    file_put_contents('./Public/two/'.$token.'.jpg', base64_decode($value));
                }

                //是否需要提交信息
                $bInput = false;
                switch ($type) {
                    case "sms"://短信验证码
                        // myEcho("请提交收到的短信验证码 >>>>>");
                        $bInput = true;
                        break;
                    case "img"://图片验证码
                        // myEcho("请提交识别出的图片验证码 >>>>>");
                        $bInput = true;
                        break;
                    case "qr"://二维码
                        // myEcho("请扫描收到的图片二维码 >>>>>");
                        // myEcho("二维码保存在当前程序跟目录下,二维码名称为：【".$token . ".jpg"."】 >>>>>");
                        $bInput = false;
                        break;
                    case "idp"://独立密码
                        // myEcho("请提交您的独立密码 >>>>>");
                        $bInput = true;
                        break;
                    default:
                        break;
                }
                if ($bInput) {
                    //等待输入信息
                    $jsonInput = sendInput($token,$appkey,$apiUrl,$version,$apiSecret);
                    $resultInput = json_decode($jsonInput, true);
                    $code = $resultInput['code'];
                    // myEcho("发送输入信息后查询状态：" + $code);
                    if ("0009"== $code) {//结果    >>>>> 成功或失败
                        //继续轮训
                        return false;
                    } else {
                        //发送失败
                        return true;
                    }
                } else {
                    //继续轮训
                    return false;
                }
            } else if ("0000" == $code) {//成功
                // myEcho("对象结果查询 >>>>>");
                //发送对象结果查询
                $result = getData($token,$apiUrl,$appkey,$version,$apiSecret,$bizType);
                return $result;
                // return true;
            }
            //其他情况继续轮训
            else {
                return false;
            }
        }

        return ['errcode'=>0,'errmsg'=>$msg];
    }


    //获取结果集
    function getData($token,$apiUrl,$appkey,$version,$apiSecret,$bizType) {

        $methodMe = "api.common.getResult";
        $params = array(
              "method" => $methodMe,
              "apiKey" => $appkey,
              "token"=>$token,
              "bizType" => $bizType
            );
        $paramstring = getParamString($params,$version,$apiSecret);

        //获取结果
        $json = curl($apiUrl, $paramstring,1);
        
        // myEcho("<pre>");
        // myEcho($json);
        return ['errcode'=>1,'data'=>$json];
    }


    //请求接口返回内容
    function curl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
     
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'limuzhengxin.com' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , 1 );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            // myEcho("cURL Error: " . curl_error($ch));
            return false;
         
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }

    //显示日志并记录
    function myEcho($str){
        $str = $str."</br>";
        print_r($str);
    }

    //第一个是原串,第二个是 部份串
    function startWith($str, $needle) {
        return strpos($str, $needle) === 0;
    }


    //等待输入信息
    function sendInput($token,$appkey,$apiUrl,$version,$apiSecret){

    
        $file = $token.'_input.txt';
        file_put_contents($file, "");
        myEcho($file."-文件创建成功。请在文件内输入上述提示信息");
        $input = "";
        try{
            do{
            $input = file_get_contents($file);
            ob_flush();
            flush();
            sleep(2);
            }while(empty($input));
        }catch(Exception $ex){
            myEcho("等待输入信息超时");
        }
        

        myEcho("您输入的信息为：".$input);
        @unlink ($file);

        //发送短信参数
        $params = array(
          "method" => "api.common.input",
          "apiKey" => $appkey,
          "token" => $token,
          "input" => $input
        );

        $paramstring = getParamString($params,$version,$apiSecret);

        //获取结果
        $json = curl($apiUrl, $paramstring,1);
        
        myEcho("<pre>");
        myEcho($json);
        return $json;
    }



function sendcode($phone,$message = ''){
    $gwid = C('cfg_smsid');
    $username = C('cfg_smssid');
    $password = md5(C('cfg_smstoken'));
    if($message == ''){
        $message = "【".C('cfg_smssign')."】".C('cfg_smscontent');
    }else{
        $message = "【".C('cfg_smssign')."】".$message;
    }
    $url = "http://jk.106api.cn/smsUTF8.aspx?type=send&username=".$username."&password=".$password."&gwid=".$gwid."&mobile=".$phone."&message=".$message."&rece=json";
    //var_dump($url);exit;
    $result = HttpPost($url);

    return $result;
}


// 立木征信接口访问
function HttpPost($url='',$data=array(),$timeout=30){
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);  
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout-2);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书  
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 检查证书中是否设置域名  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); //避免data数据过长问题  
    curl_setopt($ch, CURLOPT_POST, true);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
    $ret = curl_exec($ch);  
    curl_close($ch);  
    return $ret;
}

/**
 * sms.com 短信变量接口
 * @param  [type] $mobile   [手机号]
 * @param  [type] $template [模板id]
 * @param  [type] $content  [变量：例如{"code":"'.$code.'"}]
 * @return [type]           [发送结果]
 */
function sendsms($mobile,$content){
    $uid = C('cfg_smsuid');
    $pwd = C('cfg_smspwd');
    $post_data = array();
	$post_data['userid'] = 2270;
	$post_data['account'] = $uid;
	$post_data['password'] = $pwd;
	$post_data['content'] = $content; //短信内容
	$post_data['mobile'] = $mobile;
	$post_data['sendtime'] = ''; //时定时发送，输入格式YYYY-MM-DD HH:mm:ss的日期值
	$url='http://119.23.126.199:8888/sms.aspx?action=send';
	$o='';
	foreach ($post_data as $k=>$v)
	{
	   $o.="$k=".urlencode($v).'&';
	}
	$post_data=substr($o,0,-1);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果需要将结果直接返回到变量里，那加上这句。
	$result = curl_exec($ch);
	
}

/**
 * sms.com 短信变量接口
 * @param  [type] $mobile   [手机号]
 * @param  [type] $template [模板id]
 * @param  [type] $content  [变量：例如{"code":"'.$code.'"}]
 * @return [type]           [发送结果]
 */
function sendsms3($mobile,$template,$content){
    $uid = C('cfg_smsuid');
    $pwd = C('cfg_smspwd');
    $pwd = md5($pwd.$uid);
    $url = "http://api.sms.cn/sms/?ac=send&uid=".$uid."&pwd=".$pwd."&mobile=".$mobile."&template=".$template.'&content='.$content;
    $r = file_get_contents($url);
    $r = iconv('GBK', 'UTF-8', $r);
    $r = json_decode($r,true);
    // var_dump($r);exit;
    return $r;
}

/**
 * sms.com 短信全文接口
 * @param  [type] $mobile   [手机号]
 * @return [type]           [发送结果]
 */
function sendsms2($mobile,$content){
    $uid = C('cfg_smsuid');
    $pwd = C('cfg_smspwd');
    $pwd = md5($pwd.$uid);
    $content = urlencode($content);
    $url = "http://api.sms.cn/sms/?ac=send&uid=".$uid."&pwd=".$pwd."&mobile=".$mobile.'&content='.$content;
    $r = file_get_contents($url);
    $r = iconv('GBK', 'UTF-8', $r);
    $r = json_decode($r,true);
    // var_dump($r);exit;
    return $r;
}

// ----------------------------------------------------------