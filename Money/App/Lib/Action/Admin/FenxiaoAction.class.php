<?php
class FenxiaoAction extends CommonAction{
	
	
	//分销列表
	public function index(){
		$this->title = "分销中心";
		$keyword = I("keyword",'','trim');
		$this->keyword = $keyword;
		$keyword1 = I("keyword1",'','trim');
		$this->keyword1= $keyword1;
		$where = array();
		if($keyword){
			$where['phone'] = array('like',"%{$keyword}%");
		}
		if($keyword1){
			$where['yao_phone'] = array('like',"%{$keyword1}%");
		}
		$user = D("user");
		import('ORG.Util.Page');
		$count = $user->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $user->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//修改订单状态
	public function changestatus(){
		
		$phone = I("phone",'trim');
		var_dump($phone);exit;
	}
	
	//提现申请
	public function tixianshenqing(){
       $this->title = "提现申请";
	   $tphone=$_GET['phone'];
	 
		$where = array();
		if($tphone){
			$where['phone'] = array('like',"%{$tphone}%");
		}
		
		$user = D("user");
		import('ORG.Util.Page');
		$count = $user->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $user->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//确认提现金额
	public function tixian_jianshao(){
       $this->title = "提现申请";
	   $keyword = I("keyword",'','trim');
	 $phone = I("phone",'','trim');
	 	$user=M('user')->where(array('phone' => $phone))->find();
		$lejitixian=$user['leiji_tixian']+$keyword;
		$ketixian=$user['ketixian']-$keyword;
		$shenqing_tixian=$user['shenqing_tixian']-$keyword;
		 if($shenqing_tixian<0){
            $this->error("提现失败!申请提现金额小于操作金额");
        }
		else{
        
		
		$u0=M('user')->where(array('phone' => $phone))->save(array('leiji_tixian'=>$lejitixian,'ketixian'=>$ketixian,'shenqing_tixian'=>$shenqing_tixian));
		 if(!$u0){
            $this->error("提现失败!");
            }
		   {
           $this->success("提现成功!");
		   }
		
		
		}
	}
	
	
	
	
	//修改邀请人
	public function xiugaiyaoqingren(){
       $this->title = "修改邀请人";
	   $tphone=$_GET['phone'];
	 
		$where = array();
		if($tphone){
			$where['phone'] = array('like',"%{$tphone}%");
		}
		
		$user = D("user");
		import('ORG.Util.Page');
		$count = $user->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $user->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//确认修改邀请人
	public function yaoqingxiu(){
       $this->title = "确认修改邀请人";
	   $keyword = I("keyword",'','trim');
	 $phone = I("phone",'','trim');
	 	$user=M('user')->where(array('phone' => $phone))->find();
		
		 if($user['jisuan_ticheng']==1){
            $this->error("修改失败!该用户已经计算提成不能修改");
        }
		else{
        
		
		$u0=M('user')->where(array('phone' => $phone))->save(array('yao_phone'=>$keyword));
		 if(!$u0){
            $this->error("修改失败!");
            }
		   {
           $this->success("修改成功!");
		   }
		
		
		}
	}
	
}
