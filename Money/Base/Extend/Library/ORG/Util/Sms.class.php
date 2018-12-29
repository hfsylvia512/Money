<?php

	/**
     * Curl 请求类
     */
    Class Curl{
        //https请求 
        public static function request($url, $data=null){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);

            // 验证证书
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
            // post请求
            if (!empty($data)) {
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($curl);
            
            curl_close($curl);
            return $output;
        }
    }


    Class Sms{

    	public static function code($arr){
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
    }