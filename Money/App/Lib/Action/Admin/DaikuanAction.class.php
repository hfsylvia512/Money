<?php
class DaikuanAction extends CommonAction{
	
	
	//借款列表
	public function index(){
		$this->title = "借款列表";
		$keyword = I("keyword",'','trim');
		$this->keyword = $keyword;
		$where = array();
		if($keyword){
			$where['user'] = array('like',"%{$keyword}%");
		}
		$Order = D("`order`");
		import('ORG.Util.Page');
		$count = $Order->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $Order->Field('a.*,b.userid')->alias('a')->join("left join user b on a.user = b.phone")->where($where)->order('a.addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//修改订单状态
	public function changestatus(){
		$id = I("id",0,'trim');
		$status = I("status",'','trim');
		$data = array('status' => 0,'msg' => '未知错误');
		if(!$id || $status == ''){
			$data['msg'] = "参数错误!";
		}else{
			$Order = D("order");
			$count = $Order->where(array('id' => $id))->count();
			if(!$count){
				$data['msg'] = "订单不存在!";
			}else{
				$on = $Order->where(['id'=>$id])->getField('ordernum');

				$mobile = $Order->where(['id'=>$id])->getField('user');
				$name = $Order->where(['id'=>$id])->getField('name');
				$money = I('money','','trim');

				if($status == 1){
					$tixian = I('tixian','','trim');

					if($tixian){
						$Order->where(array('id' => $id))->save(array('tixian' => $tixian));
					}

					
					// $content = I('content','','trim');
					// if($content){
					// 	//$result = sendcode($mobile,$content);
					// 	//var_dump($result);exit;
					// }
					
					$content =trim( C('cfg_smspassid'));
					$result = sendsms($mobile,$content);
				}

				//订单冻结短信
				if($status == 4){
					$content =trim( C('cfg_dddj'));
					$result = sendsms($mobile,$content);
				}
              
                //审核未通过短信
				if($status == -1){
					$content =trim( C('cfg_shwtgid'));
					$result = sendsms($mobile,$content);
				}
              
              	 //正在审核短信
				if($status == 0){
					$content =trim( C('cfg_zzshid'));
					$result = sendsms($mobile,$content);
				}
              
              	 //已提现未出款短信
				if($status == 3){
					$content =trim( C('cfg_ytxwckid'));
					$result = sendsms($mobile,$content);
				}
              
              	 //提现成功短信
				if($status == 2){
					$content =trim( C('cfg_txcgid'));
					$result = sendsms($mobile,$content);
				}
              
               //待激活用户短信
				if($status == 7){
					$content =trim( C('cfg_djhyhid'));
					$result = sendsms($mobile,$content);
				}
              
              	//收取保险费短信
				if($status == 6){
					$content =trim( C('cfg_sqbxfid'));
					$result = sendsms($mobile,$content);
				}
              
              	//预付首期费用短信
				if($status == 8){
					$content =trim( C('cfg_yfsqfyid'));
					$result = sendsms($mobile,$content);
				}
              
              	//VIP加急到账短信
				if($status == 9){
					$content =trim( C('cfg_vipjjdzid'));
					$result = sendsms($mobile,$content);
				}
              
              	//订单退款短信
				if($status == 5){
					$content =trim( C('cfg_ddtkid'));
					$result = sendsms($mobile,$content);
				}

				$money = I('money','','trim');
				$month = I('month','','trim');
				$money = (float)$money;
				$month = (int)$month;
				$fuwufei = C('cfg_fuwufei');
				$fuwufei = explode(",",$fuwufei);
				$fuwufei = $fuwufei[$month-1] * $money / 100;
				$monthmoney = ceil(ceil((float)($money/$month))+$fuwufei);
				$message = I('message','','trim');
				
				$Order->where(array('id' => $id))->save(array('money' => $money,'months' => $month,'monthmoney' => $monthmoney,'message'=>$message));

				if($status == 2){
					//M('payorder')->where(['ordernum'=>$on])->save(['status'=>1]);
					$Order->where(array('id' => $id))->save(array('passtime'=>time()));
				}else{
					//M('payorder')->where(['ordernum'=>$on])->save(['status'=>0]);
					
				}
				
				$status = $Order->where(array('id' => $id))->save(array('status' => $status));


				$Order=M('Order')->where(array('id' => $id,'status' => 2))->order('id asc')->find();
				if($Order!=null){
					$user=$Order['user'];
					$jisuan_sum=M('user')->where(array('phone' => $user))->find();
					
					if($jisuan_sum['yao_phone']!=null&&$jisuan_sum['jisuan_ticheng']==0){
						$ticheng_sumxiangjia=M('user')->where(array('phone' => $jisuan_sum['yao_phone']))->find();
						$ketixian=$ticheng_sumxiangjia['ketixian']+$Order['money']*0.05;
					
					$ticheng_sum_user=$Order['money']*0.05;
					$u0=M('user')->where(array('phone' => $user))->save(array('ticheng_sum'=>$ticheng_sum_user));
				$u1=M('user')->where(array('phone' => $jisuan_sum['yao_phone']))->save(array('ketixian'=>$ketixian));
				
				  $u2=M('user')->where(array('phone' => $user))->save(array('jisuan_ticheng' => 1));
				  
					}
				}
				if(!$status){
					$data['msg'] = "操作失败!";
				}else{

					$data['status'] = 1;
				}
			}
		}
		$this->ajaxReturn($data);
	}
	
	//删除订单
	public function del(){
        $this->title='删除订单';
        $id = I('id',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
        $Order = D("order");
        $status = $Order->where(array('id' => $id))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除订单成功!");
	}
	
	
	public function changenews(){
		$id = I("id",0,'trim');
		$status = I("status",'','trim');
		$data = array('status' => 0,'msg' => '未知错误');
		if(!$id || $status == ''){
			$data['msg'] = "参数错误!";
		}else{
			$Order = D("order");
			$count = $Order->where(array('id' => $id))->count();
			if(!$count){
				$data['msg'] = "订单不存在!";
			}else{
				$on = $Order->where(['id'=>$id])->getField('ordernum');

				$xiaoxi = I('xiaoxi'.'','trim');
				if($xiaoxi){
					$status = $Order->where(array('id' => $id))->save(array('message' => $xiaoxi));
				}
				
				$status = $Order->where(array('id' => $id))->save(array('news' => $status));

				
					$data['status'] = 1;
				
			}
		}
		$this->ajaxReturn($data);
	}

	function delAll(){
		$data = array('status' => 0,'msg' => '未知错误');
        $ids = I('post.ids','','trim');
        if(!$ids){
            $data['msg'] = '请选择需要删除的订单';
            $this->ajaxReturn($data);
			exit;
        }
        $ids_arr = explode(',', $ids);
        $count = count($ids_arr);
        foreach($ids_arr as $v){
            $res = M('order')->delete($v);
        }
        $data['code'] = 1;
        $data['msg'] = '批量删除成功';
        $this->ajaxReturn($data);
		exit;
    }
}
