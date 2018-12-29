<?php
class PayorderAction extends CommonAction{
	
	//订单列表
	public function index(){
		$this->title = "订单列表";
		$keyword = I("keyword",'','trim');
		$this->keyword = $keyword;
		$where = array();
		if($keyword){
			$where['user'] = array('like',"%{$keyword}%");
		}
		$where['type'] = '还款费';
		$where['p_status'] = 1;
		$Payorder = D("payorder");
		import('ORG.Util.Page');
		$count = $Payorder->where($where)->count();
		$Page  = new Page($count,25);
		$Page->setConfig('theme','共%totalRow%条记录 | 第 %nowPage% / %totalPage% 页 %upPage%  %linkPage%  %downPage%');
		$show  = $Page->show();
		$list = $Payorder->where($where)->order('addtime Desc')->limit($Page->firstRow.','.$Page->listRows)->select();
	
		$this->list = $list;
		$this->page = $show;
		$this->display();
	}
	
	//删除订单
	public function del(){
        $this->title='删除订单';
        $id = I('id',0,'trim');
        if(!$id){
            $this->error("参数有误!");
        }
        $Payorder = D("payorder");
        $status = $Payorder->where(array('id' => $id))->delete();
        if(!$status){
            $this->error("删除失败!");
        }
        $this->success("删除订单成功!");
	}
	
	public function status(){
		if(IS_AJAX){
			$post = I('post.','');
						
			$payorder = M('payorder');
			$data = $payorder->where(['id'=>$post['id']])->find();
			
			if(is_null($data)){
				$this->ajaxReturn(['status'=>0,'errmsg'=>'数据有误']);
				exit;
			}
			$payorder->where(['id'=>$post['id']])->save(['status'=>1]);

			$Bills = D("bills");
			$arr = array(
				'user'     => $data['user'],
				'addtime'  => time(),
				'money'    => $data['money'],
				'ordernum' => $data['ordernum']
			);
			$Bills->add($arr);
			//订单信息更改已还款期数
			$Order = M("order");
			$Order->where(array('ordernum' => $data['jkorder'],'user' => $data['user']))->setInc('donemonth',1);

			$orderinfo = $Order->where(array('ordernum' => $data['jkorder'],'user' => $data['user']))->find();
			$time = $orderinfo['passtime'] + 86400 * 30;
			$Order->where(array('ordernum' => $data['jkorder'],'user' => $data['user']))->save(array('passtime'=>$time));
			$this->ajaxReturn(['status'=>1,'errmsg'=>'修改成功']);

		}else{
			$this->ajaxReturn(['status'=>0,'errmsg'=>'请求方式错误']);
		}
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
            $res = M('payorder')->delete($v);
        }
        $data['code'] = 1;
        $data['msg'] = '批量删除成功';
        $this->ajaxReturn($data);
		exit;
    }
	
}
