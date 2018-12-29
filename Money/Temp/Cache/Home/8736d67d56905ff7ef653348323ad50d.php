<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> <?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content=" <?php
 $name = "cfg_sitedescription"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> ">
<meta name="Keywords" content=" <?php
 $name = "cfg_sitekeywords"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> ">
<!-- 忽略页面中的数字识别为电话号码 -->
<meta name="format-detection" content="telephone=no,email=no"/>
<link rel="shortcut icon" href="__PUBLIC__/home/images/logo.ico">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/mui.min.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/feiqi-ee5401a8e6.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newindex-09d04b32f3.css"/>
<script src="__PUBLIC__/home/js/jquery.js"></script>
<script src="__PUBLIC__/home/js/jquery.slider-min.js"></script>
<script src="__PUBLIC__/home/js/jquery.dependClass.js"></script>
<style>
.gundong{
	line-height: 26px;
    font-size: 18px;
    background-color: #f5f5f9;
}
.gundong_phone{
	color: #fb6f00;
}
.gundong_money{
	color:red;
}
</style>
</head>
<body class="whitebg newindex">
<!--头部-->
<header>
    <div class="mui-log">
        <img src="__PUBLIC__/home/imgs/banner.jpg" alt="">
    </div>
    <section class="pr new-huahead">
        <div class="new-smoney">申请金额(元)</div>
        <div class="new-money" id="money_str">0.00</div>
    </section>
</header>
<!--表单-->
<form id="submitform">
    <section class="new-form">
        <!--滑块部分-->
        <div class="sliderwarp">
            <div class="minmoney commoney"><?php echo C('cfg_minmoney');?>元</div>
            <div class="maxmoney commoney"><?php echo C('cfg_maxmoney');?>元</div>
            <div id="subtract" class="subtract new-btn"></div>
            <div id="tap1" class="layout-slider">
				<input id="SliderSingle11" type="slider" name="money" value="0;<?php echo C('cfg_definamoney');?>;" style="display: none">
            </div>
            <div id="plus" class="plus new-btn"></div>
        </div>
        <!--借款期限-->
        <section class="time">
            <h3>借款期限</h3>
            <div class="timelimit">

            </div>
        </section>
        <!--每期还款-->
        <section class="huankuan mui-clearfix">
            <h3>每期还款</h3>
            <div class="huankuan-right">
                <i id="yuegong">0.00</i>元
                <span>&nbsp;&nbsp;(含日利率<span id="rixi">0.00</span>% ￥<i id="fuwufei">0.00</i>元)</span>
            </div>
        </section>
        <!--条款-->
        <section class="tiaokuan">
            <div class="cf mt20">
                <label class="fl rev">
                    <input type="checkbox" checked="checked" id="xieyi">
                    <em></em>
                </label>
                <span class="fl arge">同意
                  <!--  <a class="" id="qbtn5"  href="javascript:;">《委托授权协议》</a>-->
                    <a class="" id='qbtn33'   href="javascript:;">《借款协议》</a>
                   <!-- <a class="" id='qbtn4'  href="javascript:;">《承诺书》</a> -->
                </span>
            </div>
        </section>
        <!--申请接借贷-->
        <div class="protit sevagreee " style="border: 0px;margin-bottom: 2%">
            <a class="logBtn" href="javascript:subForm();">立即申请</a>
        </div>
        <!--other-->
		 <div class="gundong">
			<marquee scrollamount="2" scrolldelay="50" direction="up" style="    text-align: center;    font-size: 16px;width: 100%;height: 24px; margin-bottom: 20%">
			<?php if(is_array($redaydata)): foreach($redaydata as $key=>$vo): ?><span><?php echo date("Y-m-d"); ?></span> : <span class="gundong_phone"><?php echo ($vo["phone"]); ?></span> 获得资助 <span class="gundong_money"><?php echo ($vo["money"]); ?></span>元! <br><?php endforeach; endif; ?>
			</marquee>
		</div> 
        <!-- <section class="other">
            <a id="dnapp" href="javascript:;">
            	<img src="__PUBLIC__/home/imgs/other.png" alt="">
            </a>
        </section> -->
        <!-- <div class="com" style="text-align: center;">
        	<?php
 $name = "首页底部公司名"; $Block = D("block"); $blockinfo = $Block->where(array('name' => $name))->find(); if(empty($blockinfo)){ echo ""; }else{ echo $blockinfo['cont']; } ?><br/><?php
 $name = "cfg_siteicp"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>
        </div> -->
    </section>
    <!-- 底部固定栏 -->
    <!-- bottom bar -->
    <nav class="mui-bar mui-bar-tab bottom-bar">
        <a class="mui-tab-item cur" href="<?php echo U('Index/index');?>">
            <span class="mui-icon cur">
                <img src="__PUBLIC__/home/imgs/home.png" style="width: 100%">
            </span>
            <span class="mui-tab-label">首页</span>
        </a>
       <!--  <a class="mui-tab-item" href="<?php echo U('Help/index');?>">
            <span class="mui-icon mui-icon-contact muihelp"></span>
            <span class="mui-tab-label">客服</span>
        </a> -->
        <a class="mui-tab-item" href="<?php echo U('User/index');?>">
            <span class="mui-icon">
                <img src="__PUBLIC__/home/imgs/me2.png" style="width: 100%">
            </span>
            <span class="mui-tab-label">我</span>
        </a>
    </nav>
</form>




<!-- 加减提示 -->
<div class="plusmore">不能大于最大金额</div>
<div class="subtractmore">不能小于最小金额</div>
<div class="deowin" style="display: none;padding:0 6%;" id="deowin4">
    <div class="deocon">
    <h3 style="text-align: center;font-size: 16px; color:#fb6f00;height: 40px;line-height: 40px;border-bottom: 1px solid #fb6f00;">《承诺书》</h3>
        <div class="divpad" style="height: 340px;overflow-y: auto;">
            <iframe src="" style="width:100%;height:100%;border:none;"></iframe>
        </div>
        <div class="wobtn">
            <!-- 一个按钮用这个结构 -->
                <a style="color:#fb6f00;" id="winbtn4" href="javascript:;">关闭</a>
        </div>
    </div>
</div>
<div class="deowin" style="display: none;padding:0 6%;" id="deowin33">
    <div class="deocon">
    <h3 style="text-align: center;font-size: 16px; color:#fb6f00;height: 40px;line-height: 40px;border-bottom: 1px solid #fb6f00;">《借款协议》</h3>
        <div class="divpad" style="height: 340px;overflow-y: auto;">
            <iframe src="" style="width:100%;height:100%;border:none;"></iframe>
        </div>
        <div class="wobtn">
            <!-- 一个按钮用这个结构 -->
                <a style="color:#fb6f00;" id="winbtn33" href="javascript:;">关闭</a>
        </div>
    </div>
</div>
<div class="deowin" style="display: none;padding:0 6%;" id="deowin5">
    <div class="deocon">
    <h3 style="text-align: center;font-size: 16px; color:#fb6f00;height: 40px;line-height: 40px;border-bottom: 1px solid #fb6f00;">《委托授权协议》</h3>
        <div class="divpad" style="height: 340px;overflow-y: auto;">
            <iframe src="" style="width:100%;height:100%;border:none;"></iframe>
        </div>
        <div class="wobtn">
            <!-- 一个按钮用这个结构 -->
                <a style="color:#fb6f00;" id="winbtn5" href="javascript:;">关闭</a>
        </div>
    </div>
</div>
<div class="emask" id="mask3" style="display: none;"></div>
<div class="deowin2" style="display:none;" id="deowin31">
    <div class="deocon2">
        <div class="divpad2" style="text-align:center;height:110px">
            <p class='tex' style="color: #4c4c4c;line-height: 30px;font-size:16px;"></p>
        </div>
        <div class="wobtn">
            <!-- 一个按钮用这个结构 -->
                <a id="winbtn3" href="javascript:;">确定</a>
        </div>
    </div>
</div>
<div style="display:none;">
<form action="<?php echo U('Order/daikuan');?>" method="post" id="orderform">
	<input type="hidden" name="money" value="" id="order_money" />
	<input type="hidden" name="month" value="" id="order_month" />
</form>
</div>
<script>
var num = 0;
var MINMONEY = <?php echo C('cfg_minmoney');?>;
var MAXMONEY = <?php echo C('cfg_maxmoney');?>;
var nowmoney = {};
var feilv_value = "<?php echo C('cfg_fuwufei');?>";
var months=[<?php echo C('cfg_dkmonths');?>];
var definamonth = <?php echo C('cfg_definamonth');?>;
var feilv = feilv_value.split(',');
var STEP = 100;
var user_id = '<?php echo ($user); ?>';
var SliderSingle1 = jQuery("#SliderSingle11");
var LoginUrl = "<?php echo U('User/login');?>";
var PublicUrl = "<?php echo C('cfg_siteurl');?>/Public/";
function subForm(){
    if(user_id=='0'){
        window.location.href = LoginUrl;
        return false;
    }
    if(!$('#xieyi').attr('checked')){
        $(".tex").html('请您同意并勾选协议');
        $("#deowin31").show();
        $('#mask3').show();
        return false;
    }
    //判断失败订单是否超过预期
    $.post(
    	"<?php echo U('Order/checkorder');?>",
    	{},
    	function(data,state){
    		if(state != "success"){
		        $(".tex").html('请求数据失败!');
		        $("#deowin31").show();
		        $('#mask3').show();
    		}else if(data.status == 1){
    			$("#orderform").submit();
    		}else{
		        $(".tex").html(data.msg);
		        $("#deowin31").show();
		        $('#mask3').show();
    		}
    	}
    );
}
$(function(){
	for(var i=0;i<months.length;i++){
		var tmp;
		tmp = months[i];
		var html = '<button id="'+i+'m" class="timeBtn "><span id="timeSpanVal_'+i+'">'+tmp+'</span>个月</button>';
		$(".timelimit").append(html);
	}
	    $("#qbtn5").click(function() {
	        var url="<?php
 $name = "协议1地址"; $Block = D("block"); $blockinfo = $Block->where(array('name' => $name))->find(); if(empty($blockinfo)){ echo ""; }else{ echo $blockinfo['cont']; } ?>";
	        $('#deowin5 iframe').attr('src',url); 
	         setTimeout(function (){
	            $('#deowin5').show();
	            $('#mask3').show();  
	        },500);
	    });
	    $("#qbtn4").click(function() {
	       var url="<?php
 $name = "协议3地址"; $Block = D("block"); $blockinfo = $Block->where(array('name' => $name))->find(); if(empty($blockinfo)){ echo ""; }else{ echo $blockinfo['cont']; } ?>";
	        $('#deowin4 iframe').attr('src',url); 
	         setTimeout(function (){
	            $('#deowin4').show();
	            $('#mask3').show();  
	        },500);
	    });
	    $("#qbtn33").click(function() {
	         var url="<?php
 $name = "协议2地址"; $Block = D("block"); $blockinfo = $Block->where(array('name' => $name))->find(); if(empty($blockinfo)){ echo ""; }else{ echo $blockinfo['cont']; } ?>";
	        $('#deowin33 iframe').attr('src',url);           
	        setTimeout(function (){
	            $('#deowin33').show();
	            $('#mask3').show();  
	        },500);
	    });
    	$('#winbtn33').click(function(){
            $('#deowin33').hide();
            $('#mask3').hide();
            $('#deowin33 iframe').attr('src','');      

       });
});
</script>
<script src="__PUBLIC__/home/appjs/Index.js"></script>

</body>
</html>