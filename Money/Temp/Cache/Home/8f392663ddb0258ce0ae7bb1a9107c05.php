<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title> <?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> </title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<meta name="description" content=" <?php
 $name = "cfg_sitedescription"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> ">

<meta name="Keywords" content=" <?php
 $name = "cfg_sitekeywords"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> ">

<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/mui.min.css">

<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/feiqi-ee5401a8e6.css">

<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css">

<style>

.dant a {

    font-size: 13px;

    display: inline-block;

}

.posfix{

	position: fixed;

	bottom: 0;

}

.jumpdown{

	width: 100%;

}

.jumpdown img{

	padding-top: 10px;

	width: 100%;

}

.orange{

	color: #fb6f00!important;

}

</style>

</head>

<body>

    <!-- header -->

    <header class="mui-bar mui-bar-nav hnav">

		<a href="<?php echo U('User/index');?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>

		<h1 class="mui-title">我的借款</h1>

	</header>

	<!-- header end-->

<div class="mui-content">

	<?php if(empty($data)): ?><div class="xinf">

			<div class="mydiv">

				<img src="__PUBLIC__/home/imgs/p_01.png" alt="">

			</div>

		</div>

		<div class="atxt">

			无需还款哦！<br>

			您还未提交任何借款申请哦。

		</div>

		<section class="bbtn">

			<button onClick="toorder();" class="combtn" type="button">去申请借款</button>

		</section>

	<?php else: ?>

		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><article class="mt10 jiekuan">

			<div class="cf dant">

				<a href="<?php echo U('Order/info',array('oid' => $vo['id']));?>">

				借款编号：<?php echo ($vo["ordernum"]); ?>

				</a>

				<a class="fr f13 danstate datalose" href="<?php echo U('Order/info',array('oid' => $vo['id']));?>">

					<?php if($vo['status'] == 0)echo "正在审核"; if($vo['status'] == 1)echo "审核通过"; if($vo['status'] == 2)echo "提现成功"; if($vo['status'] == '-1')echo "审核未通过"; if($vo['status'] == 3)echo "已提现未出款"; if($vo['status'] == 4)echo "贷款资金冻结"; if($vo['status'] == 5)echo "订单退款"; if($vo['status'] == 6)echo "收取保险费"; if($vo['status'] == 7)echo "待激活用户"; if($vo['status'] == 8)echo "预付首期费用"; if($vo['status'] == 9)echo "VIP加急到账"; ?>

					<span class="fr rightarr"></span>

				</a>

			</div>

			<a class="hlist cf phlist" href="<?php echo U('Order/info',array('oid' => $vo['id']));?>">

				<img src="__PUBLIC__/home/imgs/jkjl.png" alt="">

				<div class="f14">

					<p class="grey"><span class="fc9">金额</span>：¥<?php echo ($vo["money"]); ?>.00元</p>

					<p class="grey orange"><span class="fc9 orange">月供</span>：¥<?php echo ($vo["monthmoney"]); ?>.00元X<?php echo ($vo["months"]); ?>期</p>

				</div>

			</a>

			<?php if($vo['status'] == 1): ?>

			<div style="float:right; margin-top:-70px; margin-right:20px; line-height:40px;font-size: 14px;color: #FF4040">

				提现

			</div>

		<?php endif; ?>

			<?php if($vo['months'] == $vo['donemonth']): ?>

			<div style="float:right; margin-top:-70px; margin-right:20px; line-height:40px;font-size: 14px;color: #FF4040">

				已结清

			</div>

		<?php endif; ?>

		</article><?php endforeach; endif; endif; ?>

</div>

<script src="__PUBLIC__/home/js/jquery-1-fe84a54bc0.11.1.min.js"></script>	

<script>

$('.bottom-bar a').click(function(){

	$('.bottom-bar a').removeClass('cur');

	$('.bottom-bar a span').removeClass('cur');

	$(this).addClass('cur');

	$(this).find('span').eq(0).addClass('cur');

});

function toorder(){

	window.location.href = "<?php echo U('Index/index');?>";

}

</script>

<div style="display: none;">

	<?php
 $name = "cfg_sitecode"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>

</div>

</body>

</html>