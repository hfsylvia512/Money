<?php
/*
 *		秒嘀验证码发送接口类
 * 		By:somnus  
 * 		Time:2016-12-15 21:33 
 * */
class Smsapi{
	protected $sendurl = "http://api.smsbao.com/";


	//发送验证码
	//成功返回0,失败返回错误代码
	public function send2($number,$cont){
		$user = "dalaoban"; //短信平台帐号
		$pass = md5("dalaoban123"); //短信平台密码
		$sendurl = $this->sendurl."sms?u=".$user."&p=".$pass."&m=".$number."&c=".urlencode($cont);
		//$sendurl = $this->sendurl."sms?u=".$user."&p=".$pass."&m=".$number."&c=".urlencode($cont);
		$result =file_get_contents($sendurl);
		return $result;
		
//		$nowdate = date("YmdHis");
//		$data = array(
//			'accountSid' => C('cfg_smssid'),
//			'smsContent' => $cont,
//			'to'		 => $number,
//			'timestamp'	 => $nowdate,
//			'sig'		 => md5(C('cfg_smssid').C('cfg_smstoken').$nowdate)
//		);
//		$res = $this->postHTTPS($this->sendurl,$data);
//		$res = json_decode($res);
//		if($res->respCode != "00000"){
//			return $res->respCode;
//		}
//		return 0;
	}

	public function send($mobile,$content){
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
		curl_close($ch);
	    return $this->toArray($result);
	}
	
	
	private function postHTTPS($url,$post_data) {
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_URL, $url);
	    //curl_setopt($ch, CURLOPT_REFERER, $url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $this->toArray($result);
	}

	public function toArray($xml){   
	    //禁止引用外部xml实体
	    libxml_disable_entity_loader(true);
	    $result= json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);        
	    return $result;
	}
	
}
