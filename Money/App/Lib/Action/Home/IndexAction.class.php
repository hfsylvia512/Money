<?php
class IndexAction extends CommonAction{
	
    public function index(){

    	
    	// 芝麻信用
    	if($_GET['params'] && $_GET['sign']){
    		// file_put_contents('./params.txt', $_GET['params']);
    		// file_put_contents('./sign.txt',$_GET['sign']);
    		import('Org.Util.Zhima');
    		$zm = new \TestZhimaAuthInfoAuthorize();
    		$data = $zm->zhimaDecode($_GET['params'],$_GET['sign']);
    		
    		$arr = explode('&',$data);
    		$params = array();


		    foreach ($arr as $param) {
		        $item = explode('=', $param);
		        $params[$item[0]] = $item[1];
		    }


    		
    		if($params['open_id']){
    			if($this->getLoginUser()){

    				M('userinfo')->where(['user'=>$this->getLoginUser()])->save(['zhima_openid'=>$params['open_id']]);

    			}
    		}
    	}
    	//随机生成一批借款成功的
    	$phonestr = "13,15,17,18";
    	$phonearr = explode(",",$phonestr);
    	$redaydata = array();
		for($i=0;$i<30;$i++){
			$tmp = rand(0,count($phonearr)-1);
			$phone = $phonearr[$tmp].rand(0,9)."****".rand(0,9).rand(0,9).rand(0,9).rand(0,9);
			$money = rand(10,150)*1000;
			$redaydata[] = array(
				'phone' => $phone,
				'money' => $money
			);
		}
		$this->redaydata = $redaydata;
    	$user = $this->getLoginUser();
    	if(!$user) $user = 0;
		$this->user = $user;
        $this->display();
    }

}