<?php
//验证手机号
function checkphone($number){
	if(preg_match("/^1\d{10}$/",$number)){  
	    return true;
	}else{  
	    return false;
	} 
}


//验证银行卡
function luhm($s){
	$n = 0;
	for ($i = strlen($s); $i >= 1; $i--){
		$index=$i-1;
		//偶数位
		if ($i % 2==0){
			$n += $s{$index};
		}else{//奇数位
			$t = $s{$index} * 2;
			if ($t > 9) {
				$t = (int)($t/10)+ $t%10;
			}
			$n += $t;
		}
	}
	return ($n % 10) == 0;
}

//生成订单号
function neworderNum(){
	$yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
	$orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
	return $orderSn;
}



//支付函数部分
$GLOBALS['gateway_new'] = "http://www.passpay.net/PayOrder/payorder";
function md5VerifyShan($p1, $p2,$p3,$sign,$key,$pid) {
	$prestr = $p1.$p2.$p3.$pid.$key;
	$mysgin = md5($prestr);
	if($mysgin == $sign) {
		return true;
	}else {
		return false;
	}
}

/**
 * 建立请求，以表单HTML形式构造（默认）
 * @param $para_temp 请求参数数组
 *
 */
function buildRequestFormShan($para_temp,$key) {
	//待请求参数数组
	$para = buildRequestParaShan($para_temp,$key);
	$sHtml = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
	$sHtml .= "<form id='paysubmit' name='paysubmit' action='".$GLOBALS['gateway_new']."' accept-charset='utf-8' method='POST'>";
	while (list ($key, $val) = each ($para)) {
        $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
    }

	//submit按钮控件请不要含有name属性
    $sHtml = $sHtml."<input type='submit'  value='支付进行中...' style='display:none;'></form>";
	
	$sHtml = $sHtml."<script>document.forms['paysubmit'].submit();</script>";
	
	return $sHtml;
}
/**
 * 生成要请求给云通付的参数数组
 * @param $para_temp 请求前的参数数组
 * @return 要请求的参数数组
 */
function buildRequestParaShan($para_temp,$key) {
	//除去待签名参数数组中的空值和签名参数
	$para_filter = paraFilterShan($para_temp);
	//对待签名参数数组排序
	$para_sort = argSortShan($para_filter);
	//生成签名结果
	$mysign = buildRequestMysignShan($para_sort,$key);
	
	//签名结果与签名方式加入请求提交参数组中
	$para_sort['sign'] = $mysign;
	
	return $para_sort;
}
/**
 * 除去数组中的空值和签名参数
 * @param $para 签名参数组
 * return 去掉空值与签名参数后的新签名参数组
 */
function paraFilterShan($para) {
	$para_filter = array();
	while (list ($key, $val) = each ($para)) {
		if($key == "sign" || $val == "")continue;
		else	$para_filter[$key] = $para[$key];
	}
	return $para_filter;
}
/**
 * 对数组排序
 * @param $para 排序前的数组
 * return 排序后的数组
 */
function argSortShan($para) {
	ksort($para);
	reset($para);
	return $para;
}
/**
 * 生成签名结果
 * @param $para_sort 已排序要签名的数组
 * return 签名结果字符串
 */
function buildRequestMysignShan($para_sort,$key) {
	//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	$prestr = createLinkstringShan($para_sort);
	$mysign = md5SignShan($prestr, $key);
	return $mysign;
}
function md5SignShan($prestr, $key) {
	$prestr = $prestr . $key;
	return md5($prestr);
}
/**
 * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
 * @param $para 需要拼接的数组
 * return 拼接完成以后的字符串
 */
function createLinkstringShan($para) {
	$arg  = "";
	while (list ($key, $val) = each ($para)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
	
	return $arg;
}











// ------------------------------------------------------


	

	//调用获取数据流程
	function process($apiUrl,$method,$bizType,$appkey,$username,$password,$callBackUrl,$loginType,$identityCardNo,$identityName,$count,$sleepCount,$version,$apiSecret,$appkey){


		//淘宝采集参数
		$params = array(
			"method" => $method,
			"apiKey" => $appkey,
			"username" => $username,
			"password" => $password,
			"callBackUrl" => $callBackUrl,
			"loginType" => $loginType,
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
					myEcho("轮循第【".$i."】次 start");

					//轮训获取结果
					if(roundRobin($token, $paramString,$apiUrl,$appkey,$version,$apiSecret,$bizType)){
						myEcho("轮循 end");
						myEcho("获取信息结束");
						break;
					}
					myEcho("轮循第【".$i++."】次 end");

					ob_flush();
					flush();
					sleep($sleepCount);

					if($count-- <= 0){
						myEcho("获取信息结束。没有获取到数据");
						break;
					}
				}
				while(1);
				

			}else{
				myEcho($result['code'].":".$result['msg']);
			}
		}else{
			myEcho("请求失败");
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

		myEcho("<pre>");
		myEcho("循环取的状态:".$code."");
		myEcho("循环取的信息:");
		myEcho($json);

		if(!isset($code) || empty($code)) {
			//未取到结果集.继续轮训
			return false;
		}
		
		//0开头标处理成功相关
		if (startWith($code, "0")) {

			if ("0100" == $code) {//登陆成功
				myEcho("对象结果查询 >>>>>" + $msg);
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
					myEcho("发送输入信息后查询状态：" + $code);
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
				myEcho("对象结果查询 >>>>>");
				//发送对象结果查询
				getData($token,$apiUrl,$appkey,$version,$apiSecret,$bizType);
				return true;
			}
			//其他情况继续轮训
			else {
				return false;
			}
		}

		//其他异常停止循环
		return true;
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
		
		myEcho("<pre>");
		myEcho($json);

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
	        myEcho("cURL Error: " . curl_error($ch));
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

	// 立木获取结果或者状态
function getResOrStatus($token = '', $bizType = 'mobile', $methodType = 0)
{
	// 默认是获取结果，其它为获取状态
	$data = [
	    'method'  => $methodType == 0 ? 'api.common.getResult' : 'api.common.getStatus',
	    'apiKey'  => C('cfg_limu_apikey'),
	    'version' => '1.2.0',
	    'token'   => $token,
	    'bizType' => $bizType
	];
	$data['sign'] = mackSign($data);
    $url = "https://api.limuzhengxin.com/api/gateway";
    $r = HttpPost($url, $data);
    $obj = json_decode($r, true);
    if($obj['code'] == '0000'){
        return json_encode($obj['data']);
    }else{
        return false;
    }
}

/**
 * 立木征信sign签名
 */
function mackSign($data)
{
    if(isset($data['sign'])){
        unset($data['sign']);
    }
    ksort($data);
    $str = '';
    foreach ($data as $key => $value) {
        $str .= '&'.$key.'='.$value;
    }
    $str .= C('cfg_limu_apisecret');
    $str = substr($str,1);
    $str = sha1($str);
    return $str;
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



function code($arr){
    		if(is_array($arr) && is_null($arr)){
    			return ['status'=>false,'errmsg'=>'参数错误！'];
    		}

    		$url = 'http://112.74.130.54:5588/sms.aspx?';
            $content = $arr['content'];
    		$data = "action=send&userid=".$arr['smsid']."&account=".$arr['smsuser']."&password=".$arr['smspass']."&mobile=".$arr['tel']."&content=".$content."&sendTime=&extno=";
    		$result = file_get_contents($url.$data);
    		if($result){
    			return ['status'=>true,'code'=>$arr['code']];
    		}else{
    			return ['status'=>false,'errmsg'=>'请求错误！'];

    		}

    	}

/**
 * sms.com 短信变量接口
 * @param  [type] $mobile   [手机号]
 * @param  [type] $template [模板id]
 * @param  [type] $content  [变量：例如{"code":"'.$code.'"}]
 * @return [type]           [发送结果]
 */
function sendsms($mobile,$template,$content){
    $uid = C('cfg_smsuid');
    $pwd = C('cfg_smspwd');
    $pwd = md5($pwd.$uid);
    $url = "http://api.sms.cn/sms/?ac=send&uid=".$uid."&pwd=".$pwd."&mobile=".$mobile."&template=".$template.'&content='.$content;
    $r = file_get_contents($url);
    //$r = iconv('GBK', 'UTF-8', $r);
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
    //$r = iconv('GBK', 'UTF-8', $r);
    $r = json_decode($r,true);
    // var_dump($r);exit;
    return $r;
}

// ----------------------------------------------------------
