<?php

class OrderAction extends CommonAction{

	

	public function checkorder(){

		$data = array('status' => 0,'msg' => '未知错误!');

		if(!$this->getLoginUser()){

			$data['status'] = 1;

		}else{

			$day = $this->yesdaikuan($this->getLoginUser());

			if(!$day){

				$where['user'] = array('eq',$this->getLoginUser());

				$where['status'] = array('neq',-1);

				$where['status'] = array('neq',2);

				$order = M('order')->where($where)->find();

				if($order){

					$data['msg'] = "您还有订单未完成!";

				}else{

					$order2 = M('order')->where(array('user' => $this->getLoginUser(),'status'=>2))->order("addtime Desc")->find();

					if($order2){

						if($order2['months'] != $order2['donemonth']){

							$data['msg'] = "您还有订单未完成!";

						}else{

							$data['status'] = 1;

						}

					}else{

						$data['status'] = 1;

					}

				}

			}else{

				$data['msg'] = "您最近一次订单审核失败,请".$day."天后再次提交!";

			}

		}

		$this->ajaxReturn($data);

	}

	

	private function yesdaikuan($user){

		//先查找最近一次失败订单

		$Order = D("order");

		$info = $Order->where(array('user' => $this->getLoginUser()))->order("addtime Desc")->find();

		if(!$info){

			return 0;

		}

		if($info['status'] != '-1'){

			return 0;

		}

		$tmptime = $info['addtime'];

		$tmptime = time()-$tmptime;

		$tmptime = $tmptime/(24*60*60);

		$disdkdleyday = C("cfg_disdkdleyday");

		if(!$disdkdleyday) $disdkdleyday = 0;

		if($tmptime > $disdkdleyday){

			return 0;

		}

		return ceil($disdkdleyday-$tmptime);

	}

	

	public function daikuan(){

		if(!$this->getLoginUser()){

			$this->redirect('User/login');

		}

		$Userinfo = D("userinfo");

		$info = $Userinfo->where(array('user' => $this->getLoginUser()))->find();

		if(!$info){

			$this->redirect('Info/index');

		}

		

		if($info['bankcard']==''){

			$this->redirect('Info/index');

		}

		//判断用户最近一次失败订单是否超过预期时间

		$yesdaikuan = $this->yesdaikuan($this->getLoginUser());

		if($yesdaikuan){

			$this->redirect('Index/index');

		}

		$money = I("money",0,'trim');

		$month = I("month",0,'trim');

		$money = (float)$money;

		$month = (int)$month;

		$dismonths = C("cfg_dkmonths");

		$dismonths = explode(",",$dismonths);

		$fuwufei = C('cfg_fuwufei');

		$fuwufei = explode(",",$fuwufei);

		if($money > C('cfg_maxmoney') || $money < C('cfg_minmoney')){

			//借款金额不允许

			$this->redirect('Index/index');

		}

		if(!in_array($month,$dismonths)){

			//不允许的分期月

			$this->redirect('Index/index');

		}

		$rixi = round($fuwufei[$month-1] / 30,2);

		$fuwufei = $fuwufei[$month-1] * $money / 100;

		$order = array(

			'money'   => $money,

			'fuwufei' => $fuwufei,

			'month'   => $month,

			'huankuan'=> ceil((float)($money/$month)),

			'bank'	  => $info['bankname'],

			'banknum' => $info['bankcard'],

			'name' => $info['name'],

			'rixi'	  => $rixi

		);

		$addorder = I("get.trueorder",0,'trim');

		

		if($addorder){

			$data = array('status' => 0,'msg' => '未知错误','payurl' => '');

			//创建订单

			$ordernum = neworderNum();

			$arr = array(

				'ordernum' => $ordernum,

				'type'	   => '审核费',

				'money'	   => C('cfg_shenhefei'),

				'addtime'  => time(),

				'status'   => 1,

				'user'	   => $this->getLoginUser()

			);

			$Payorder = D("payorder");

			$status = $Payorder->add($arr);

			if(!$status){

				$data['msg'] = '创建订单失败!';

			}else{

				$Order = D("order");
				
              	//$userid = I('userid','','trim');
              
				$arr = array(

					'user' => $this->getLoginUser(),

					'money' => $money,

					'months' => $month,

					'monthmoney' => ceil($order['huankuan']+$order['fuwufei']),

					'donemonth' => 0,

					'addtime' => time(),

					'status' => 0,

					'pid' => $status,

					'bank' => $info['bankname'],

					'banknum' => $info['bankcard'],

					'name' => $info['name'],

					'ordernum' => $ordernum,
                  	//'user_id' => $userid,

				);

				$status = $Order->add($arr);

				

				if(!$status){

					$data['msg'] = '创建订单失败!';

				}else{

					$data['status'] = 1;



					// $content = str_replace("姓名", $info['name'], C('cfg_smscontent'));

					// $content = str_replace("金额", $money, $content);

					//$result = sendcode($this->getLoginUser(),$content);

					

					$data['msg'] = '订单创建成功,请等待审核！';



					$data['payurl'] = U('Order/lists');

				}

			}

			$this->ajaxReturn($data);

			exit;

		}else{

			$this->order = $order;

			$this->display();

		}

	}

	

	public function lists(){

		$Order = D("order");

		$user = $this->getLoginUser();

		if(!$user){

			$this->redirect('User/login');

		}

		$data = $Order->where(array('user' => $user))->order("addtime Desc")->select();

		



		$this->data = $data;

		$this->display();

	}

	

	public function info(){

		$oid = I("oid",0,"trim");

		if(!$oid){

			$this->redirect('Order/lists');

		}

		$user = $this->getLoginUser();

		if(!$user){

			$this->redirect('User/login');

		}

		$Order = D("order");

		$order = $Order->where(array('id' => $oid,'user' => $user))->find();

		if(!$order){

			$this->redirect('Order/lists');

		}

		$this->data = $order;

$qr_code = M('qr_code')->where(array('type'=>array('eq','1')))->select();

        $this->code = $qr_code[0];

		$this->display();

	}

	

	//我的还款

	public function bills(){

	

				

		$user = $this->getLoginUser();

		if(!$user){

			$this->redirect('User/login');

		}

		$hkr = C("cfg_huankuanri");

		if(!$hkr) $hkr = 10;

		$data = array();

		//遍历已借款订单

		$Order = D("order");

		$tmp = $Order->where(array('user' => $user,'status' => 2))->select();

		

		for($i=0;$i<count($tmp);$i++){

			//判断是否已还清

			if($tmp[$i]['months'] != $tmp[$i]['donemonth']){

				$tmp_ordernum = $tmp[$i]['ordernum'];

				//从还款记录查找本月是否已还款

				$Bills = D("bills");

			

				$payorder = M('payorder')->where(['jkorder'=>$tmp_ordernum])->order('id desc')->find();

				if(!is_null($payorder) && $payorder['status'] == 0){

					$p_status = $payorder['p_status'];

				}else{

					$p_status = 0;

				}

				

						$data[] = array(

							'ordernum' => $tmp_ordernum,

							'money'    => $tmp[$i]['monthmoney'],

							'days'	   => date("d",$tmp[$i]['addtime'])-date("d"),

							'qishu'	   => $tmp[$i]['donemonth'] + 1,

							'month'	   => $tmp[$i]['months'],

							'paytime'  => date('Y-m-d',$tmp[$i]['passtime'] + 86400 * 30),

							'paymoney' => $tmp[$i]['monthmoney'] * $tmp[$i]['months'],

							'p_status' => $p_status,

						);

					

				

			}

		}

		$this->data = $data;

		$this->display();

	}



	//还款

	public function billinfo(){

		

		$user = $this->getLoginUser();

		if(!$user){

			$this->redirect('User/login');

		}

		$ordernum = I("ordernum",'','trim');

		if(!$ordernum){

			$this->redirect('Order/bills');

		}

		$Order = D("order");

		$order = $Order->where(array('ordernum' => $ordernum,'user' => $user))->find();

		//判断是否已还完

		if($order['months'] == $order['donemonth']){

			$this->redirect('Order/bills');

		}

		

		//创建支付订单

		$payordernum = neworderNum();

		$arr = array(

			'ordernum' => $payordernum,

			'user'     => $user,

			'type'	   => "还款费",

			'money'	   => $order['monthmoney'],

			'name'	   => $order['name'],

			'addtime'  => time(),

			'status'   => 0,

			'jkorder'  => $ordernum

		);

		

		$Payorder = D("payorder");



		$data = $Payorder->where(['jkorder'=>$ordernum])->order('id desc')->find();

		

		if(is_null($data) || $data['status'] == 1){



			$status = $Payorder->add($arr);

			if(!$status){

				$this->redirect('Order/bills');

			}

			//跳转支付

			$this->redirect('Pay/Index/index',array('ordernum' => $payordernum));

			exit;

		}



		

		//跳转支付

		$this->redirect('Pay/Index/index',array('ordernum' => $data['ordernum']));

	}

	

	public function tixian(){

		$data = array('status' => 0,'msg' => '未知错误','news' => '1');

		$tixian = I('txpassword','','trim');

		$ordernum = I('ordernum','','trim');

		$info = M('order')->where(['user' => $this->getLoginUser(), 'tixian' => $tixian,'ordernum' => $ordernum])->find();

		if($info){

			$data['status'] = 1;

			$data['msg'] = $info['message'];

			$arr = array(

				'status' => 3,

				'news'	=> 1,

			);

			M('order')->where(['user' => $this->getLoginUser(), 'ordernum' => $ordernum])->save($arr);

		}else{

			$data['msg'] = "提现密码错误！";

		}



		$this->ajaxReturn($data);

	}



	public function user(){

		$data = array('status' => 0,'msg' => '未知错误!');
      
		$userid = I('userid','','trim');

		//$info = M('user')->where(['phone' => $this->getLoginUser(), 'userid' => $userid])->find();
      	
      	if(!$userid){
        	$data['msg'] = "推荐人ID不能为空";
          	$this->ajaxReturn($data);exit;
        }
		
		//if($info){

			$data['status'] = 1;

		//}else{

		//	$data['msg'] = "推荐人ID错误，请重新输入";

		//}

		$this->ajaxReturn($data);

	}

}

