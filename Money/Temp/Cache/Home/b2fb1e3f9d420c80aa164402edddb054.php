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
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css">
<style>
	.mui-input-group .mui-input-row {
	    height: 45px;
	}
	.mui-input-row label {
	    padding: 13px 15px;
	}
	.regfrm .mui-input-row input {
	    height: 45px;
	}
	.mui-input-row:last-child:after{
	    height: 0;
	}
	@media screen and (max-width: 348px){
		.regfrm .mui-input-row label {
		    font-size: 14px;
		    padding: 15px 15px;
		}
	}
</style>
</head>
<body>
	<header class="header">
	<a class="back" href="<?php echo U('User/login');?>"></a>
		注册
	</header>
	<div class="mui-content">
	<form id="back-form" onSubmit="return false">
	    <div class="mui-input-group regfrm">
			<div class="mui-input-row">
				<label>手机号</label>
				<input  id="account" name="account" type="number" class="mui-input-clear mui-input" placeholder="请输入手机号" data-input-clear="2"><span class="mui-icon mui-icon-clear mui-hidden"></span>
			</div>
            <!-- <div class="mui-input-row">
				<label>推荐人ID</label>
				<input  id="userid" name="userid" type="text" class="mui-input-clear mui-input" placeholder="请输入ID(必填)" data-input-clear="2"><span class="mui-icon mui-icon-clear mui-hidden"></span>
			</div> -->
			<div class="mui-input-row pr">
				<label for="account">图片验证码</label>
				<input id="verifycode" name="tpyzm" type="text" class="mui-input-clear mui-input" placeholder="请输入图片验证码" data-input-clear="2">
				<img class="chkimg" style="position:absolute;right:20px;top:9px;height: 28px;" onClick="change_img(this)" id="verifycode_img">
			</div>
			<div class="mui-input-row pr">
				<label>验证码</label>
				<input id="checkma" name="checkma" type="text" class="mui-input-clear mui-input" placeholder="请输入验证码" data-input-clear="2"><span class="mui-icon mui-icon-clear mui-hidden"></span>
				<button id="count" type="button" class="mui-btn mui-btn-warning mui-btn-outlined ckbtn" style="top:12px;">
					获取验证码
				</button>
			</div>
			<div class="mui-input-row pr">
				<label>登录密码</label>
				<input id="password" name="password" type="password" class="mui-input-clear mui-input" placeholder="请设置6-16位密码" data-input-clear="3"><span class="mui-icon mui-icon-clear mui-hidden"></span>
				<i class="seltarr password_icon_off pab" id='switch'></i>
			</div>
		</div>
		<div class="cf mt20">
			<label class="fl rev">
				<input type="checkbox" checked="checked" id="xieyi">
				<em></em>
			</label>
			<span class="fl arge">同意<a class="org" href="javascript:;" id="qbtn3">《用户注册协议》</a></span>
		</div>
		<article class="msub">
		 	<input class="submit" onClick="Reg()" type="submit" value="注册" >
		 </article>
		<!-- 提示 -->
		<div style="display: none;top: 45%;" class="errdeo" id="messageBox">
		</div>	
	</form>	
  </div>
<!-- 弹窗三开始 -->
<div class="deowin" style="display: none;padding:0 6%;" id="deowin3">
	<div class="deocon">
	<h3 style="text-align: center;font-size: 16px; color:#fb6f00;height: 40px;line-height: 40px;border-bottom: 1px solid #fb6f00;">《用户注册协议》</h3>
		<div class="divpad" style="height: 340px;overflow-y: auto;">
			<iframe src="" style="width:100%;height:100%;border:none"></iframe>
		</div>
		<div class="wobtn">
			<!-- 一个按钮用这个结构 -->
				<a style="color:#fb6f00;" id="winbtn3" href="javascript:;">关闭</a>
		</div>
	</div>
</div>
<div class="emask" style="display: none;" id="mask3"></div>

<!-- 弹窗三结束 -->
<script src="__PUBLIC__/home/js/jquery.js"></script>
<script src="__PUBLIC__/home/js/mui.min.js"></script>
<script src="__PUBLIC__/home/js/jquery.validate.js"></script>
<script>
var index;//验证码再次获取倒计时
$(function(){
	var capKey=Date.parse(new Date());
	$('#verifycode_img').attr("src", "<?php echo U('Common/verify');?>&time="+capKey);
	//密码开关
	var on = true;
	$('#switch').click(function(){
	    if(on == true){
	    	$('#password')[0].type = "text";
		    $('#switch').removeClass('password_icon_off');
		    $('#switch').addClass('password_icon_on');
		    on = false;
		}else{
			$('#password')[0].type = "password";
		    $('#switch').removeClass('password_icon_on');
		    $('#switch').addClass('password_icon_off');
		    on = true;
		}
	});
	$("#count").click(function(){
		var mobile=$('#account').val();
		var verifycode=$('#verifycode').val();
		if (mobile.length==11) {
			if(!(/^1\d{10}$/.test(mobile))){ 
				salert("请输入正确手机号");
				return false;
			}
			if(!verify()){
				return false;
			}
			//发送验证码
			$.post(
				'<?php echo U("User/sendsmscode");?>',
				{phone:mobile,verifycode:verifycode,type:"reg"},
				function(data,state){
					if(state != "success"){
						salert("发送请求失败");
					}else{
						if(data.status == 0){
							salert(data.msg);
						}else if(data.status == 1){
							salert("验证码发送成功");
							index = 60;
							var stime = setInterval(function(){
								if(index > 0){
									$("#count").html(index+'s');
									$("#count").attr("disabled", true);
									index--;
								}else if(index == 0){
									$("#count").html("重新获取");
									$("#count").className = "mui-btn mui-btn-warning mui-btn-outlined ckbtn";
									$("#count").removeAttr("disabled");
									$('#perpho').removeAttr("disabled");
									clearInterval(stime);
								}					
							},1000);
						}else{
							salert("未知错误");
						}
					}
					return false;
				}
			);
		}else{
			salert("请输入正确手机号");
			return false;
		}
	});
					
	
});
var oRemind=document.getElementById('messageBox');
//验证码
function change_img(obj)
{
	var capKey=Date.parse(new Date());
	$('#verifycode_img').attr("src", "<?php echo U('Common/verify');?>&time="+capKey);
}
function close_time() {
	oRemind.style.display='none';
}
function salert(msg){
	oRemind.innerHTML = msg;
	oRemind.style.display = "block";
	setTimeout('close_time()',2000);
}
//图片验证码位数验证
function verify(){
	var verifycode=$('#verifycode').val();
	if(verifycode=='' || verifycode==null || verifycode.length!=4){
		salert("请输入图片4位验证码");
		return false;
	}else{
		oRemind.style.display = "none";
		return true;
	}
}
$("#qbtn3").click(function() {
	$('#deowin3').show();
	$('#mask3').show();
});
$('#winbtn3').click(function(){
	    	$('#deowin3').hide();
	    	$('#mask3').hide();
})
middle();
function middle(){
	var h = $('#deowin3').height();
	var t = -h/2 + "px";
	$('#deowin3').css('marginTop',t);
}
function Reg(){
	//二次验证手机号
	var mobile=$('#account').val();
	if (mobile=='' || mobile==null || mobile.length!=11) {
		salert("请输入正确手机号");
		return false;
	}
	if(!(/^1\d{10}$/.test(mobile))){ 
		salert("请输入正确手机号");
		return false;
	}
	//验证短信验证码
	var checkma = $("#checkma").val();
	var userid = $("#userid").val();
	if(checkma=='' || checkma==null || checkma.length < 4){
		salert("请输入短信验证码");
		return false;
	}
	// if(userid == ""){
	// 	salert("邀请ID不能为空，请入邀请码");
	// 	return false;
	// }

	//验证密码格式
	stroInp1 = $("#password").val();
	var reg = new RegExp(/[a-zA-Z0-9_]{6,16}/);
	if(stroInp1.length == 0){
		salert("密码不能为空，请入密码");
		return false;
	}else if(!reg.test(stroInp1)){
		salert("请入6-16位密码!");
		return false;
	}
	if($("#xieyi").attr("checked") == false){
		salert("您需同意协议方能注册");
		return false;
	}
	//提交注册
	$.post(
		"<?php echo U('User/signup');?>",
		{
			phone:mobile,
			code:checkma,
			password:stroInp1,
			userid:userid
		},
		function (data,state){
			if(state != "success"){
				salert("请求失败,请重试");
				return false;
			}else if(data.status == 0){
				salert(data.msg);
				return false;
			}else{
				//注册成功同时会自动登陆,跳转到借款页面
				//salert("注册成功!");
				window.location.href = "<?php echo U('Index/index');?>";
			}
		}
	);
}
</script>
<div style="display: none;">
	<?php
 $name = "cfg_sitecode"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>
</div>
</body>
</html>