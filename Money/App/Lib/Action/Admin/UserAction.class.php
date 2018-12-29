<?php
class UserAction extends CommonAction{
	
	//用户列表
	public function index(){
		$this->title = "用户管理";
		$keyword = I("keyword",'','trim');
		$this->keyword = $keyword;
		$where = array();
		if($keyword){
			$where['phone'] = array('like',"%{$keyword}%");
		}
		$User = D("user");
		import('ORG.Util.Page');
		$count = $User->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $User->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//允许/禁止用户登录
	public function status(){
		$this->title = "更改用户状态";
		$id = I("id",0,'trim');
		if(!$id){
			$this->error("参数错误!");
		}
		$User = D("user");
		$info = $User->where(array('id' => $id))->find();
		if(!$info){
			$this->error("用户不存在!");
		}
		$newstatus = empty($info['status'])?1:0;
		$status = $User->where(array('id' => $id))->save(array('status' => $newstatus));
		if(!$status){
			$this->error("操作失败!");
		}
		$this->success("变更用户状态成功!");
	}
	
	//删除用户
	public function del(){
        $this->title='删除用户';
        $id = I('id',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
        $User = D("user");
        $status = $User->where(array('id' => $id))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除用户成功!");
	}
	
	
	//修改用户密码
	public function changepass(){
		ob_end_clean();
		$data = array('status' => 0,'msg' => '未知错误');
        $id = I('post.id',0,'trim');
		$pass = I("post.pass",'','trim');
        if(!$id || !$pass){
            $data['msg'] = "参数有误!";
        }else{
        	$User = D("user");
			$pass = sha1(md5($pass));
			$status = $User->where(array('id' => $id))->save(array('password' => $pass));
			if(!$status){
				$data['msg'] = "操作失败!";
			}else{
				$data['status'] = 1;
			}
        }
		$this->ajaxReturn($data);
	}
	
	//查看用户资料
	public function userinfo(){
		$this->title = "查看用户资料";
		$user = I("user",'','trim');
		if(!$user){
			$this->error("参数错误!");
		}
		$Userinfo = D("userinfo");
		$info = $Userinfo->where(array('user' => $user))->find();
		$invitation = D('User')->field('invitation')->where(['phone'=>$user])->find();
		$this->invitation = $invitation['invitation'];
		$this->baseinfo = $info;
		$Otherinfo = D("Otherinfo");
		$info = $Otherinfo->where(array('user' => $user))->find();
		$info = json_decode($info['infojson']);
		$this->otherinfo = $info;

		// 芝麻信用分
		//import('Org.Util.Zhima');
		
		//$zm = new \TestZhimaAuthInfoAuthorize();

		// $data = $zm->getScore($this->baseinfo['zhima_openid']);
		
		if($data['zm_score']){
			$this->assign('score',$data['zm_score']);
		}
		$updata = M('userphone')->where(['user'=>$user])->select();
		$this->assign('updata',$updata);
		$this->display();
	}
	

	public function getMobileInfo(){
		if(IS_AJAX){
			$post = I('post.','');
			


			header('Content-type:text/html;charset=utf-8');
	
			//配置您申请的appkey和apiSecret
			$apiUrl = "https://t.limuzhengxin.cn:3443/api/gateway";
			$appkey = C('cfg_limu_apikey');//!!!需自行设定!!!
			$apiSecret = C('cfg_limu_apisecret');//!!!需自行设定!!!
			$version = "1.2.0";
			$callBackUrl = "";//回调函数非必填
			$identityCardNo = "";//查询用户的身份证号非必填
			$identityName = "";//查询用户的真实姓名非必填
			//运营商请求参数
			$bizType = "mobile"; //采集类型
			$method = "api.mobile.get";//接口名称

			//业务参数783053 13570407802
			$username = $post['phone'];//用户名 !!!需自行设定!!!
			$password = base64_encode("".$post['pass']."");//用户密码 //!!!需自行设定!!!
			$contentType = "sms";//查询指定内容 //!!!需自行设定!!!
			$otherInfo = "";// !!!需自行设定!!!

			//获取结果时间次数设定
			$count = 50; //尝试次数
			$sleepCount = 10;//间隔时间

			$token = "";//请求数据流程唯一标志


			$res = mobile($apiUrl,$appkey,$apiSecret,$version,$callBackUrl,$identityCardNo,$identityName,$bizType,$method,$username,$password,$contentType,$otherInfo,$count,$sleepCount,$token);

			// $json = '{"code":"0000","msg":"成功","data":{"callRecordInfo":[{"callAddress":"广州","callDateTime":"2017-06-07 11:22:45","callTimeLength":"87","callType":"被叫","mobileNo":"02028093638"},{"callAddress":"广州","callDateTime":"2017-06-06 14:57:13","callTimeLength":"29","callType":"被叫","mobileNo":"02028059406"},{"mobileNo":"13570407802","sendSmsToTelCode":"1065849","sendSmsAddress":"","sendSmsTime":"2017-01-01 00:00:00","sendType":"接收"}],"netInfo":[],"businessInfo":[]}}';
		
			// $arr = json_decode($json,true)['data']['callRecordInfo'];
			// $json = json_encode($arr);
			
			
			// $this->ajaxReturn(['errdata'=>$json]);

			if($res['errcode'] == 0){
				
				
				$this->ajaxReturn(['errcode'=>0,'errmsg'=>$res['errmsg']]);

			}


			if($res['errcode'] == 1){
				


				$result = json_decode($res['data'],true)['data']['callRecordInfo'];
				$udata = M('userphone')->where(['user'=>$post['phone']])->find();
				if(is_null($udata)){
					
					foreach($result as $v){
	
						M('userphone')->add([
								'user'=>$post['phone'],
								'phone_num' => $v['mobileNo'],
								'phone_address' => $v['callAddress'],
								'phone_time' => $v['callDateTime'],
								'phone_calltime' => $v['callTimeLength'],
								'phone_type' => $v['callType'],

							]);
					}
				}else{
					M('userphone')->where(['user'=>$post['phone']])->delete();
					foreach($result as $rv){
	
						M('userphone')->add([
								'user'=>$post['phone'],
								'phone_num' => $rv['mobileNo'],
								'phone_address' => $rv['callAddress'],
								'phone_time' => $rv['callDateTime'],
								'phone_calltime' => $rv['callTimeLength'],
								'phone_type' => $rv['callType'],

							]);
					}
				}
				



				$this->ajaxReturn(['errdata'=>$result]);
			}

	

			
		}
		
	}

	public function unitinfo(){
		
		if(IS_POST){
			$user = $_GET['user'];
			$data = array('status' => 0,'msg' => '未知错误');
			$Userinfo = D("userinfo");
			$status = $Userinfo->where(['user' => $user])->save(I('post.'));
			
			if(!$status){
				
				$data['errmsg'] = "保存失败，你没有修改任何资料";
			}else{
				$data['status'] = 1;
				$bankcard = I("bankcard",0,'trim');
				$bankname = I('bankname','','trim');
				M('order')->where(['user'=>$user])->save(array('bank'=>$bankname,'banknum'=>$bankcard));
				$data['errmsg'] = "保存成功！";
			}
			$this->ajaxReturn($data);
			exit;
		}
	}

	function delAll(){
		$data = array('status' => 0,'msg' => '未知错误');
        $ids = I('post.ids','','trim');
        if(!$ids){
            $data['msg'] = '请选择需要删除的信息';
            $this->ajaxReturn($data);
			exit;
        }
        $ids_arr = explode(',', $ids);
        $count = count($ids_arr);
        foreach($ids_arr as $v){
        	$user = M('user')->where(array('id'=>$v))->getField('phone');
            $res = M('user')->delete($v);
            M('order')->where(array('user'=>$user))->delete();
            M('payorder')->where(array('user'=>$user))->delete();
            M('bills')->where(array('user'=>$user))->delete();
        }
        $data['code'] = 1;
        $data['msg'] = '批量删除成功';
        $this->ajaxReturn($data);
		exit;
    }

}
