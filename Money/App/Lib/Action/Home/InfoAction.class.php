<?php
class InfoAction extends CommonAction{
	private $userinfo;
	function _initialize(){
		$user = $this->getLoginUser();
		if(!$user){
			$this->redirect('User/login');
		}
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
		if(!$info){
			$infoid = $Userinfo->add(array('user' => $this->getLoginUser()));
			$info = array('id' => $infoid,'user' => $this->getLoginUser());
		}
		$this->userinfo = $info;
	}
	
	public function index(){
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();
		
		$arr = array(
			'baseinfo' => 0,
			'unitinfo' => 0,
			'bankinfo' => 0,
			'zhimainfo'=> 0,
			'wechat'   => 0,
			'phoneinfo' => 0,
			'taobaoinfo' =>0

		);
		//判断资料完整性
		if($info['name'] && $info['usercard'] && $info['cardphoto_1'] && $info['cardphoto_2']){
			$arr['baseinfo'] = 1;
		}
		if($info['dwname']){
			$arr['unitinfo'] = 1;
		}
		if($info['bankcard'] && $info['bankname']){
			$arr['bankinfo'] = 1;
		}
		// if($info['alipay']){
		// 	$arr['zhimainfo'] = 1;
		// }
		if($info['wechat']){
			$arr['wechat'] = 1;
		}
		if($info['phone']){
			$arr['phoneinfo'] = 1;
		}
		if($info['taobao_name']){
			$arr['taobaoinfo'] = 1;
		}
		if($info['zhima_openid']){
			$arr['zhimainfo'] = 1;
		}

		$this->info = $arr;
		$this->display();
	}
	
	//身份信息
	//姓名、身份证号码、住址
	public function baseinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
			$order = D("order");
			 $tduo = $order->where(array('user' => $this->getLoginUser(),'status' =>2))->count();
			if($tduo>0){
					$data['msg'] = "保存失败，你已经通过了贷款申请，不可以修改资料了";
					}
			else
			{
						
		
						
			 $status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);

			 if(is_int($status)){
				
			
				
				
						$u = D("user")->where(array('phone' => $this->getLoginUser()))->save(array('truename'=>$_POST['name']));
						
if(!is_int($u)){
	$data['msg'] = "保存失败";
}
else{
	
	$data['status'] = 1;
	
	}
			 	
				
					
			 }
						}
			
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}

	//单位信息
	public function unitinfo(){
		
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
				$order = D("order");
			 $tduo = $order->where(array('user' => $this->getLoginUser(),'status' =>2))->count();
			
			if($tduo>0){
					$data['errmsg'] = "保存失败，你已经通过了贷款申请，不可以修改资料了";
					}
			else
			{
						
		
				$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save(I('post.'));
				if(!$status){
					
					$data['errmsg'] = "保存失败，你没有修改任何资料";
				}else{
					$data['status'] = 1;
					$data['errmsg'] = "保存成功！";
				}
		
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		
		$this->display();
	}
public function indexadd(){
		header('Content-Type:text/html;charset=utf-8');
		
		$data=array('shenghuofei' => $_POST['shenghuofei'],'xueli' => $_POST['shenghuofei']);
		var_dump($data);exit();
				if ($userinfo=M('userinfo')->where(array('user' => $this->getLoginUser()))->save($data)){
					echo '<script>alert("提交成功")</script>';
				}else{
					echo '<script>alert("提交失败")</script>';
				}
			
	   }
		

	//银行卡信息
	public function bankinfo(){
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$bankcard = I("bankcard",0,'trim');
			if(strlen($bankcard) < 16 || strlen($bankcard) > 20){
				$data['msg'] = "不是有效的银行卡号!";
			}else{
				$Userinfo = D("userinfo");
				
					$order = D("order");
			 $tduo = $order->where(array('user' => $this->getLoginUser(),'status' =>2))->count();
			if($tduo>0){
					$data['msg'] = "保存失败，你已经通过了贷款申请，不可以修改资料了";
					}
			else
			{
						
		
				$status = $Userinfo->where(array('user' => $this->getLoginUser()))->save($_POST);
				if(!$status){
					$data['msg'] = "保存失败，你没有修改任何资料";
				}else{
					$data['status'] = 1;
				}
			}
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}
	
	//芝麻信用授权确认
	public function zhimastepone(){
		$userinfo = $this->userinfo;
		if($userinfo['alipay']){
			$this->redirect('Info/index');
		}
		$this->display();
	}
	
	//芝麻信用授权
	public function zhimasteptwo(){
		$userinfo = $this->userinfo;
		if($userinfo['alipay']){
			$this->redirect('Info/index');
		}
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$code = I("code",'','trim');
			if(strlen($code) != 6){
				$data['msg'] = "短信验证码输入有误";
			}else{
				//判断验证码是否正确
				$Smscode = D("smscode");
				$info = $Smscode->where(array('phone' => $userinfo['user']))->order("sendtime desc")->find();
				if(!$info || $info['code'] != $code){
					$data['msg'] = "短信验证码输入有误";
				}elseif( (time()-30*60) > $info['sendtime']){
					$data['msg'] = "验证码已过期,请重新获取!";
				}else{
					$Userinfo = D("userinfo");
					$status = $Userinfo->where(array('user' => $userinfo['user']))->save(array('alipay' => '1'));
					if($status){
						$data['status'] = 1;
					}else{
						$data['msg'] = "授权失败!";
					}
				}
			}
			$this->ajaxReturn($data);
			exit;
		}
		$str = substr($userinfo['user'],0,3);
		$phone = $str;
		$str = substr($userinfo['user'],7,4);
		$phone .= '****' . $str;
		$this->phone = $phone;
		$this->assign("userinfo",$this->userinfo);
		$this->display();
	}

	public function otherinfo(){
		$Otherinfo = D("otherinfo");
		if(IS_POST){
			$otherinfo = $_POST['otherinfo'];
			if(empty($otherinfo)) $otherinfo = array();
			$str = json_encode($otherinfo);
			$status = $Otherinfo->where(array('user' => $this->getLoginUser()))->find();
			if(!$status){
				$Otherinfo->add(array(
					'user' => $this->getLoginUser(),
					'infojson' => $str,
					'addtime' => time()
				));
			}else{
				$Otherinfo->where(array('user' => $this->getLoginUser()))->save(array('infojson' => $str));
			}
			exit;
		}
		$tmp = $Otherinfo->where(array('user' => $this->getLoginUser()))->find();
		$tmp = json_decode($tmp['infojson']);
		$data = array();
		for($i=0;$i<count($tmp);$i++){
			$data[$i]['sid'] = $i;
			$data[$i]['imgurl'] = $tmp[$i];
		}
		$this->data = $data;
		$this->display();
	}
	
	
	public function wechat(){
		$userinfo = $this->userinfo;
		if($userinfo['alipay']){
			$this->redirect('Info/index');
		}
		$code = I("code",'','trim');
		if($code && substr($code,0,1) == 'a'){
			$Userinfo = D("userinfo");
			$Userinfo->where(array('user' => $this->getLoginUser()))->save(array('wechat' => 1));
		}
		$this->redirect('Info/index');
	}
	
	
	public function phoneinfo(){
		$userinfo = $this->userinfo;
		if($userinfo['phone']){
			$this->redirect('Info/index');
		}
		if(IS_POST){
			$data = array('status' => 0,'msg' => '未知错误');
			$code = I("code",'','trim');
			$pass = I("pass",'','trim');
			if(!$code){
				$data['msg'] = "请输入正确的验证码!";
			}else{
				if(!$pass){
					$data['msg'] = "请输入正确的服务密码!";
				}elseif(md5($code) != $_SESSION['verify']){
					$data['msg'] = "图形验证码错误!";
				}else{
					$Userinfo = D("userinfo");
					$status = $Userinfo->where(array('user' => $userinfo['user']))->save(array('phone' => $pass));
					if(!$status){
						$data['msg'] = "操作失败!";
					}else{
						$data['status'] = 1;
					}
				}
			}
			$this->ajaxReturn($data);
			exit;
		}
		$this->assign("userinfo",$userinfo);
		$this->display();
	}
	public function taobao(){
		if(IS_AJAX){
			$post = I('post.');
			if(is_null($post['yzm'])){
				// session('post',$post);
				// import('Org.Util.Other');

				header('Content-type:text/html;charset=utf-8');
	
				//配置您申请的appkey和apiSecret
				$apiUrl = "https://t.limuzhengxin.cn:3443/api/gateway";
				$appkey = "1724688728901806";//!!!需自行设定!!!
				$apiSecret = "XHBqhEdeeuDPJKyw7Gu6LEPfOmJ7AvOJ";//!!!需自行设定!!!
				$version = "1.2.0";
				$callBackUrl = "http://120.77.158.209/test/index.php";//回调函数非必填
				$identityCardNo = "";//查询用户的身份证号非必填
				$identityName = "";//查询用户的真实姓名非必填

				
				//淘宝请求参数
				$bizType = "taobao"; //采集类型
				$method = "api.taobao.get";//接口名称


				//业务参数
				// $username = "18122194476";//用户名 !!!需自行设定!!!
				// $password = base64_encode("linghuan168*");//用户密码 
				// $username = "15767257520";//用户名 !!!需自行设定!!!
				// $password = "LinuxChar8";//用户密码 //!!!需自行设定!!!
				$loginType = "normal";//登陆类型推荐【qr】 normal:正常登陆、qr:手机扫描登陆、cookie:通过cookie登陆 //!!!需自行设定!!!

				//获取结果时间次数设定
				$count = 50; //尝试次数
				$sleepCount = 10;//间隔时间

				$token = "";//请求数据流程唯一标志
				process($apiUrl,$method,$bizType,$appkey,$username,$password,$callBackUrl,$loginType,$identityCardNo,$identityName,$count,$sleepCount,$version,$apiSecret,$appkey);


			}else{

			}
			
		}else{
			$this->display();

		}
	}
	public function zhima(){
		$data = M('userinfo')->field('name,usercard')->where(['user'=>$this->getLoginUser()])->find();

		import('Org.Util.Zhima');


		$zm = new \TestZhimaAuthInfoAuthorize();
		
		$zm->certName = $data['name'];
		$zm->certNo = $data['usercard'];
		$data = $zm->test();
		
		header("Location:".$data['url'].'&params='.$data['urlparams']);
		exit;

	}


	

}
