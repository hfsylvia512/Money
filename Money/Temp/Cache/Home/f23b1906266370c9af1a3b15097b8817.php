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
.huankuan_div{
    position: absolute;
    right: 5%;
    top: 16%;
    background-color: #fb6f00;
    line-height: 30px;
}
</style>
</head>
<body>
    <!-- header -->
    <header class="mui-bar mui-bar-nav hnav">
		<a href="<?php echo U('User/index');?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">我的还款</h1>
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
			您本月暂无需要还款账单。
		</div>
	<?php else: ?>
		<?php if(is_array($data)): foreach($data as $key=>$vo): ?><article class="mt10 jiekuan">
			<div class="cf dant">
				<a href="<?php echo U('Order/billinfo',array('ordernum' => $vo['ordernum']));?>">
				借款编号：<?php echo ($vo["ordernum"]); ?>
				</a>
				<a class="fr f13 danstate datalose" href="<?php echo U('Order/billinfo',array('ordernum' => $vo['ordernum']));?>">
					<span class="fr rightarr"></span>
				</a>
			</div>
			<a class="hlist cf phlist" href="<?php echo U('Order/billinfo',array('ordernum' => $vo['ordernum']));?>">
				<img src="__PUBLIC__/home/imgs/jkjl.png" alt="">
				<div class="f14">
					<p class="grey"><span class="fc9">本月还款金额</span>：¥<?php echo ($vo["money"]); ?>.00元</p>
					<p class="grey orange">第<?php echo ($vo["qishu"]); ?>期&nbsp;&nbsp;共<?php echo ($vo["month"]); ?>期</p>
                   	<p class="grey orange">共¥<?php echo ($vo["paymoney"]); ?>.00元</p>
				</div>
			</a>
			<div style="margin-left: 5%">
				<p class="grey orange"><span class="fc9">还款时间</span>：<?php echo ($vo["paytime"]); ?> 18:00:00</p>
			</div>
			<?php if($vo['p_status'] == 1): ?>
			<div style="float:right; margin-top:-85px; margin-right:20px; line-height:30px;">
				<a href="#" class="mui-btn mui-btn-danger mui-button-pay mui-button-gry" style="background-color: #BFBFBF;font-size: 12px;">等待入账</a>
			</div>
			<?php else: ?>
			<div style="float:right; margin-top:-85px; margin-right:20px; line-height:30px;">
				<a href="<?php echo U('Order/billinfo',array('ordernum' => $vo['ordernum']));?>" class="mui-btn mui-btn-danger mui-button-pay mui-button-gry" style="font-size: 12px;">立即还款</a>
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