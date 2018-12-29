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
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/mui.picker.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/mui.poppicker.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/newpay-bb7fcb5546.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/feiqi-ee5401a8e6.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/home/css/pay-2b02ca7987.css">
<style>
	.mui-input-group .mui-input-row, .mui-input-row{
	    height: 45px;
	}
	.marea{padding-right: 15px;}
	.regfrm label {
	    padding: 14px 15px;
	}
	.marea label {
	    padding: 14px 0;
	}
	.mui-input-row label~input, .mui-input-row label~select, .mui-input-row label~textarea {
	    height: 45px;
	    text-align: right;
	}
	.mui-input-row:last-child:after{
    height: 0;
	}
	@media screen and (max-width: 321px){
		.marea label {
		    font-size: 14px;
		    width: 24%;
		    padding-top: 15px;
		}
		.marea label~input {
		    width: 76%;
		}
		.regfrm .mui-input-row label {
		    width: 24%;
		    white-space: nowrap;
		    font-size: 14px;
		    padding: 15px 15px;
		}
		.regfrm .mui-input-row input {
		    font-size: 14px;
		    width: 74%;
		}			
	}
	@media screen and (max-width: 350px){
		.marea label~input {
	        font-size: 13px;			   
		}
	}
	.seltarr {
	    display: block;
	    position: absolute;
	    top: 20px;
	    right: 10px;
	}
	.info_span{
	    float: right;
	    position: absolute;
	    right: 2px;
	    top: 12px;
	}
	.pr{
		padding-right:10px!important;
	}
</style>
</head>
<body class="newbg">
 	<!-- header -->
 	<header class="mui-bar mui-bar-nav hnav">
		<a class="back" href="<?php echo U('Info/index');?>"></a>
		<h1 class="mui-title">个人基本资料</h1>
	</header>
	<!-- header end-->
<div class="mui-content">
	<!-- paymoney -->
	<article class="tipinfo">
		填写真实有效的信息，审核才会通过哦~
	</article>
	<div class="mui-input-group regfrm">
	<!-- <div class="mui-input-row">
		<label>手机服务密码</label>
		<input id="shouji_pwd" value="<?php echo ($userinfo["shouji_pwd"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入手机服务密码" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>商品类型</label>
		<input id="goods_type" value="<?php echo ($userinfo["goods_type"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入商品类型" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>品牌</label>
		<input id="goods_brand" value="<?php echo ($userinfo["goods_brand"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入品牌" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>型号</label>
		<input id="goods_model" value="<?php echo ($userinfo["goods_model"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入型号" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>颜色</label>
		<input id="goods_color" value="<?php echo ($userinfo["goods_color"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入颜色" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>内存</label>
		<input id="goods_mem" value="<?php echo ($userinfo["goods_mem"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入内存" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>机器总价</label>
		<input id="goods_sum" value="<?php echo ($userinfo["goods_sum"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入机器总价" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>首付金额</label>
		<input id="goods_firstpay" value="<?php echo ($userinfo["goods_firstpay"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入首付金额" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>借款金额</label>
		<input id="goods_borrow" value="<?php echo ($userinfo["goods_borrow"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入借款金额" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>期数</label>
		<input id="goods_time" value="<?php echo ($userinfo["goods_time"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入期数" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>月付</label>
		<input id="goods_monthpay" value="<?php echo ($userinfo["goods_monthpay"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入月付" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>借款人姓名</label>
		<input id="borrow_name" value="<?php echo ($userinfo["borrow_name"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入借款人姓名" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>电话</label>
		<input id="borrow_tel" value="<?php echo ($userinfo["borrow_tel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>身份证号</label>
		<input id="borrow_idcard" value="<?php echo ($userinfo["borrow_idcard"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入身份证号" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>QQ/微信</label>
		<input id="borrow_qqwei" value="<?php echo ($userinfo["borrow_qqwei"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入QQ/微信" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>居住地址</label>
		<input id="borrow_address" value="<?php echo ($userinfo["borrow_address"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入居住地址" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>居住时间</label>
		<input id="borrow_livetime" value="<?php echo ($userinfo["borrow_livetime"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入居住时间" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>工作单位</label>
		<input id="borrow_work" value="<?php echo ($userinfo["borrow_work"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入工作单位" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>固话</label>
		<input id="borrow_fix" value="<?php echo ($userinfo["borrow_fix"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入固话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>部门</label>
		<input id="borrow_section" value="<?php echo ($userinfo["borrow_section"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入部门" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>职位</label>
		<input id="borrow_post" value="<?php echo ($userinfo["borrow_post"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入职位" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>月工资</label>
		<input id="borrow_month" value="<?php echo ($userinfo["borrow_month"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入月工资" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>发薪日</label>
		<input id="borrow_paytime" value="<?php echo ($userinfo["borrow_paytime"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入发薪日" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>工作时间</label>
		<input id="borrow_worktime" value="<?php echo ($userinfo["borrow_worktime"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入工作时间" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>公司地址</label>
		<input id="borrow_company" value="<?php echo ($userinfo["borrow_company"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入公司地址" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>父亲姓名</label>
		<input id="borrow_dad" value="<?php echo ($userinfo["borrow_dad"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入父亲姓名" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>电话</label>
		<input id="borrow_dadtel" value="<?php echo ($userinfo["borrow_dadtel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>母亲姓名</label>
		<input id="borrow_mom" value="<?php echo ($userinfo["borrow_mom"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入母亲姓名" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>电话</label>
		<input id="borrow_momtel" value="<?php echo ($userinfo["borrow_momtel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>紧急联系人</label>
		<input id="borrow_urgent" value="<?php echo ($userinfo["borrow_urgent"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入紧急联系人" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>电话</label>
		<input id="borrow_urgentel" value="<?php echo ($userinfo["borrow_urgentel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>同事姓名</label>
		<input id="borrow_colleague" value="<?php echo ($userinfo["borrow_colleague"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入同事姓名" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>电话</label>
		<input id="borrow_colleaguetel" value="<?php echo ($userinfo["borrow_colleaguetel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>其他联系人</label>
		<input id="borrow_other" value="<?php echo ($userinfo["borrow_other"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入其他联系人" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>电话</label>
		<input id="borrow_othertel" value="<?php echo ($userinfo["borrow_othertel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>借款人姓名</label>
		<input id="borrow_borrow" value="<?php echo ($userinfo["borrow_borrow"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入借款人姓名" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>服务经理</label>
		<input id="service" value="<?php echo ($userinfo["service"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入服务经理" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>办理借款时间</label>
		<input id="transact" value="<?php echo ($userinfo["transact"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入办理借款时间" data-input-clear="2">
	</div>
	<div class="mui-input-row">
		<label>办理门店名称</label>
		<input id="shopname" value="<?php echo ($userinfo["shopname"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入办理门店名称" data-input-clear="2">
	</div> -->
    <!-- <div class="mui-input-row">
			<label>性别</label>
			<input id="sex" value="<?php echo ($userinfo["sex"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入性别" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>籍贯</label>
			<input id="jiguan" value="<?php echo ($userinfo["jiguan"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入籍贯" data-input-clear="2">
		</div>
        
         <div class="mui-input-row">
			<label>每月生活费</label>
			<input id="shenghuofei" value="<?php echo ($userinfo["shenghuofei"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入每月生活费" data-input-clear="2">
		</div>
         <div class="mui-input-row">
			<label>学校所在城市</label>
			<input id="school_address" value="<?php echo ($userinfo["school_address"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入学校所在城市" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>学校名称</label>
			<input id="school_name" value="<?php echo ($userinfo["school_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入学校名称" data-input-clear="2">
		</div>
         <div class="mui-input-row">
			<label>学历</label>
			<input id="xueli" value="<?php echo ($userinfo["xueli"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入学历(专/本/研究生)" data-input-clear="2">
		</div>
           <div class="mui-input-row">
			<label>年级</label>
			<input id="nianji" value="<?php echo ($userinfo["nianji"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入年级" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>班级</label>
			<input id="banji" value="<?php echo ($userinfo["banji"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入班级" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>专业</label>
			<input id="zhuanye" value="<?php echo ($userinfo["zhuanye"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入专业" data-input-clear="2">
		</div>
         <div class="mui-input-row">
			<label>学号</label>
			<input id="xuehao" value="<?php echo ($userinfo["xuehao"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入学号" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>宿舍地址</label>
			<input id="suse_address" value="<?php echo ($userinfo["suse_address"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入宿舍地址（需具体到区,路,号名称）)" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>QQ号码</label>
			<input id="qq_num" value="<?php echo ($userinfo["qq_num"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入QQ号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>常用邮箱号</label>
			<input id="email" value="<?php echo ($userinfo["email"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入常用邮箱号" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>微信号码</label>
			<input id="wechat_num" value="<?php echo ($userinfo["wechat_num"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入微信号码" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>微信昵称</label>
			<input id="wechat_name" value="<?php echo ($userinfo["wechat_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入微信昵称" data-input-clear="2">
		</div>
         <div class="mui-input-row">
			<label>学信网帐号</label>
			<input id="xuexin_num" value="<?php echo ($userinfo["xuexin_num"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入学信网帐号" data-input-clear="2">
		</div>
        <div class="mui-input-row">
			<label>学信网密码</label>
			<input id="xuexin_pwd" value="<?php echo ($userinfo["xuexin_pwd"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="学信网密码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>父亲姓名</label>
			<input id="f_name" value="<?php echo ($userinfo["f_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="父亲姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>父亲电话号码</label>
			<input id="f_phone" value="<?php echo ($userinfo["f_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="父亲电话号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>母亲姓名</label>
			<input id="m_name" value="<?php echo ($userinfo["m_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="母亲姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>母亲电话号码</label>
			<input id="m_phone" value="<?php echo ($userinfo["m_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="母亲电话号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>直系亲属姓名</label>
			<input id="z_name" value="<?php echo ($userinfo["z_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="直系亲属姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>直系亲属电话号码</label>
			<input id="z_phone" value="<?php echo ($userinfo["z_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="直系亲属电话号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>辅导员姓名</label>
			<input id="fudao_name" value="<?php echo ($userinfo["fudao_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="辅导员姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>辅导员电话号码</label>
			<input id="fudao_phone" value="<?php echo ($userinfo["fudao_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="辅导员电话号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>宿舍舍友姓名</label>
			<input id="seyou_name" value="<?php echo ($userinfo["seyou_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="宿舍舍友姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>宿舍舍友电话号码</label>
			<input id="seyou_phone" value="<?php echo ($userinfo["seyou_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="宿舍舍友电话号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>同学姓名</label>
			<input id="tongxue_name" value="<?php echo ($userinfo["tongxue_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="同学姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>同学电话号码</label>
			<input id="tongxue_phone" value="<?php echo ($userinfo["tongxue_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="同学电话号码" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>朋友姓名</label>
			<input id="pengyou_name" value="<?php echo ($userinfo["pengyou_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="朋友姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>朋友电话号码</label>
			<input id="pengyou_phone" value="<?php echo ($userinfo["pengyou_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="朋友电话号码" data-input-clear="2">
		</div> -->
          
		<div class="mui-input-row">
			<label>单位名称</label>
			<input type="text" id="dwname" class="mui-input-clear mui-input nofocus" value="<?php echo ($userinfo["dwname"]); ?>" placeholder="请输入单位名称" data-input-clear="2">
		</div>
		<div class="mui-input-row">
			<label>职位</label>
			<input id="position" value="<?php echo ($userinfo["position"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入职位" data-input-clear="2">
		</div>
		<div class="mui-input-row">
			<label>单位电话</label>
			<input type="text" id="dwphone" class="mui-input-clear mui-input nofocus" value="<?php echo ($userinfo["dwphone"]); ?>" placeholder="号码加区号" data-input-clear="2" style="right: 55px;position: absolute;">
			<span class="info_span">非必填</span>
		</div>
		<div class="mui-input-row">
			<label>工作年龄</label>
			<input id="workyears" value="<?php echo ($userinfo["workyears"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入工作年龄" data-input-clear="2" style="right: 25px;position: absolute;">
			<span class="info_span">年</span>
		</div>
		<div class="mui-input-row">
			<label>单位地址</label>
			 <input id='showCityPicker2' name="showCityPicker2" data-input-clear="2" class="mui-input-clear mui-input inputblur" value="<?php echo ($userinfo["dwaddess_ssq"]); ?>" placeholder="请选择省市区"  type='text'>
		</div>
		<!-- dan -->
		<div class="mui-input-row">
			<label>详细地址</label>
		    <input id="dwaddess_more" type="text" value="<?php echo ($userinfo["dwaddess_more"]); ?>" class="mui-input-clear mui-input nofocus" placeholder="例：东北石油大学启智寝室楼2A608" data-input-clear="2">
		</div>
		<div class="mui-input-row">
			<label>月收入</label>
			<input id="dwysr" value="<?php echo ($userinfo["dwysr"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="请输入现工作月收入" data-input-clear="2" style="right: 25px;position: absolute;">
			<span class="info_span">元</span>
		</div>
		<!--现居住地址-->
		<div class="mui-input-row">
			<label>现居住地址</label>
			 <input id='showCityPicker1' name="showCityPicker1" data-input-clear="2" class="mui-input-clear mui-input inputblur" value="<?php echo ($userinfo["addess_ssq"]); ?>" placeholder="请选择省市区"  type='text'>
		</div>
		<div class="mui-input-row">
			<label>详细地址</label>
		    <input id="addess_more" type="text" value="<?php echo ($userinfo["addess_more"]); ?>" class="mui-input-clear mui-input nofocus" placeholder="例：东北石油大学启智寝室楼2A608" data-input-clear="2">
		</div>
		<!--紧急联系人-->
	
		<!--紧急联系人-->

		<article class="tipinfo">
		直属亲属联系人
		</article>
		<div class="mui-input-row">
			<label>姓名</label>
			<input id="z_name" value="<?php echo ($userinfo["z_name"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="直系亲属姓名" data-input-clear="2">
		</div>
          <div class="mui-input-row">
			<label>手机号</label>
			<input id="z_phone" value="<?php echo ($userinfo["z_phone"]); ?>" type="text" class="mui-input-clear mui-input nofocus" placeholder="直系亲属电话号码" data-input-clear="2">
		</div>
		<div class="mui-input-row">
			<label>关系</label>
			<input id="zxqsname1" value="<?php echo ($userinfo["persongx_1"]); ?>" name="personname1" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请选择关系" data-input-clear="2">
		</div>

		<article class="tipinfo">
		其他联系人
		</article>

		<div class="mui-input-row">
		<label>姓名</label>
		<input id="borrow_colleague" value="<?php echo ($userinfo["borrow_colleague"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入姓名" data-input-clear="2">
		</div>
		<div class="mui-input-row">
			<label>手机号</label>
			<input id="borrow_colleaguetel" value="<?php echo ($userinfo["borrow_colleaguetel"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入电话" data-input-clear="2">
		</div>
		<div class="mui-input-row">
			<label>关系</label>
			<input id="zxqsname2" value="<?php echo ($userinfo["persongx_2"]); ?>" name="personname2" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请选择关系" data-input-clear="2">
		</div>

		</div>
	<section class="msub" style="position: relative;">
		<button type="button" class="mui-btn mui-btn-danger mui-button-pay mui-button-gry" onClick="saveInfo();">提交</button>
		<!-- 提示 -->
		<div style="display: none;position: absolute;" class="errdeo" id="messageBox">
		</div>	
	</section>
</div>
<script src="__PUBLIC__/home/js/jquery.js"></script>
<script src="__PUBLIC__/home/js/stuCheck-ae09551939.js"></script>
<script src="__PUBLIC__/home/js/geihuaCom-1088667498.js"></script>
<script src="__PUBLIC__/home/js/mui.min.js"></script>
<script src="__PUBLIC__/home/js/mui-bd98b45634.picker.js"></script>
<script src="__PUBLIC__/home/js/mui-9fb36284ae.poppicker.js"></script>
<script src="__PUBLIC__/home/js/city-564994092a.data.js" type="text/javascript" charset="utf-8"></script>
<script src="__PUBLIC__/home/js/city-67f8c196d0.data-3.js" type="text/javascript" charset="utf-8"></script>
<script>
$('#sel').change(function(){
	change('sel','sela')
});
$('.inputblur').click(function(){
	$(this).blur();
	$('.nofocus').blur();
});
(function($, doc) {
	$.init();
	$.ready(function() {
		var cityPicker2 = new $.PopPicker({
			layer: 3
		});
		cityPicker2.setData(cityData3);
		var showCityPickerButton2 = doc.getElementById('showCityPicker2');
		var showCityPickerButton1 = doc.getElementById('showCityPicker1');

		var cityResult2 = doc.getElementById('cityResult2');
		showCityPickerButton2.addEventListener('tap', function(event) {
			var input = document.getElementsByClassName('nofocus');
			for (var i = 0; i < input.length; i++) {
				var _input = input[i];
				_input.blur();
			}
			cityPicker2.show(function(items) {
				if (typeof(items[2].text) == "undefined") { 
					showCityPickerButton2.value = (items[0] || {}).text + " " + (items[1] || {}).text;
				} else {
					showCityPickerButton2.value = (items[0] || {}).text + " " + (items[1] || {}).text + " " + (items[2] || {}).text;
				}
			});
		}, false);
		showCityPickerButton1.addEventListener('tap', function(event) {
			var input = document.getElementsByClassName('nofocus');
			for (var i = 0; i < input.length; i++) {
				var _input = input[i];
				_input.blur();
			}
			cityPicker2.show(function(items) {
				if (typeof(items[2].text) == "undefined") { 
					showCityPickerButton1.value = (items[0] || {}).text + " " + (items[1] || {}).text;
				} else {
					showCityPickerButton1.value = (items[0] || {}).text + " " + (items[1] || {}).text + " " + (items[2] || {}).text;
				}
			});
		}, false);
		var person = new $.PopPicker({
			layer: 3
		});
		person.setData([{value:"父母",text:"父母"},{value:"同事",text:"同事"},{value:"兄妹",text:"兄妹"},{value:"朋友",text:"朋友"}]);
		var showCityPickerButton = doc.getElementById('zxqsname1');
		var showCityPickerButton3 = doc.getElementById('zxqsname2');
		var personResult = doc.getElementById('cityResult2');
		showCityPickerButton.addEventListener('tap', function(event) {
			var input = document.getElementsByClassName('nofocus');
			for (var i = 0; i < input.length; i++) {
				var _input = input[i];
				_input.blur();
			}
			person.show(function(items) {
				var tmpval = (items[0] || {}).text;
				setPerson("personname1",tmpval);
			});
		}, false);
		showCityPickerButton3.addEventListener('tap', function(event) {
			var input = document.getElementsByClassName('nofocus');
			for (var i = 0; i < input.length; i++) {
				var _input = input[i];
				_input.blur();
			}
			person.show(function(items) {
				var tmpval = (items[0] || {}).text;
				setPerson("personname2",tmpval);
			});
		}, false);
	});
})(mui, document);

function setPerson(spanid,valname){
	$("input[name='"+spanid+"']").val(valname);
}

function showalert(msg){
	$("#messageBox").html(msg);
	$("#messageBox").show();
	setTimeout(function(){
		$("#messageBox").hide();
	},2000);
}

function checkval(val_){
	if(val_ == '' || val_ == null){
		return false;
	}else{
		return true;
	}
}

//保存资料
function saveInfo(){

	var z_name = $("#z_name").val();
	var z_phone = $("#z_phone").val();
	var borrow_colleague = $("#borrow_colleague").val();
 	var borrow_colleaguetel = $("#borrow_colleaguetel").val();

	var dwname = $("#dwname").val();
	var dwaddess_ssq = $("#showCityPicker2").val();
	var dwaddess_more = $("#dwaddess_more").val();
	var dwposition = $("#position").val();
	var workyears = $("#workyears").val();
	var dwphone = $("#dwphone").val();
	var dwysr = $("#dwysr").val();
	var addess_ssq = $("#showCityPicker1").val();
	var addess_more = $("#addess_more").val();
	// var personname_1 = $("#xingming1").val();
	// var personname_2 = $("#xingming2").val();
	// var personphone_1 = $("#phone1").val();
	// var personphone_2 = $("#phone1").val();
	var persongx_1 = $("#zxqsname1").val();
	var persongx_2 = $("#zxqsname2").val();
	// 	var school_address = $("#school_address").val();
	// 	var school_name = $("#school_name").val();
	// 	var xueli = $("#xueli").val();
	// 	var nianji = $("#nianji").val();
	// 	var banji = $("#banji").val();
	// 	var zhuanye = $("#zhuanye").val();
	// 	var xuehao = $("#xuehao").val();
	// 	var suse_address = $("#suse_address").val();
	// 	var qq_num = $("#qq_num").val();
	// 	var email = $("#email").val();
	// 	var wechat_num = $("#wechat_num").val();
	// 	var wechat_name = $("#wechat_name").val();
	// 	var xuexin_num = $("#xuexin_num").val();
	// 	var xuexin_pwd = $("#xuexin_pwd").val();
	// 	var sex = $("#sex").val();
	// 	var jiguan = $("#jiguan").val();
	// 	var shouji_pwd = $("#shouji_pwd").val();
	// 	var shenghuofei = $("#shenghuofei").val();
		
	// 	var f_name = $("#f_name").val();
	// 	var f_phone = $("#f_phone").val();
	// 	var m_name = $("#m_name").val();
	// 	var m_phone = $("#m_phone").val();
	// 	var z_name = $("#z_name").val();
	// 	var z_phone = $("#z_phone").val();
	// 	var fudao_name = $("#fudao_name").val();
	// 	var fudao_phone = $("#fudao_phone").val();
	// 	var seyou_name = $("#seyou_name").val();
	// 	var seyou_phone = $("#seyou_phone").val();
	// 	var tongxue_name = $("#tongxue_name").val();
	// 	var tongxue_phone = $("#tongxue_phone").val();
	// 	var pengyou_name = $("#pengyou_name").val();
	// 	var pengyou_phone = $("#pengyou_phone").val();
	
	//if(checkval(shenghuofei)&& checkval(f_phone) && checkval(m_phone) && checkval(pengyou_phone))
	if(checkval(z_phone)&& checkval(borrow_colleaguetel) && checkval(borrow_colleague)){
		$.post(
			"<?php echo U('Info/unitinfo');?>",
			{

				z_name:z_name,
 				z_phone:z_phone,
 				borrow_colleague:borrow_colleague,
 				borrow_colleaguetel:borrow_colleaguetel,

				dwname:dwname,
				dwaddess_ssq:dwaddess_ssq,
				dwaddess_more:dwaddess_more,
				position:dwposition,
				workyears:workyears,
				dwphone:dwphone,
				dwysr:dwysr,
				addess_ssq:addess_ssq,
				addess_more:addess_more,

		// 		personname_1:personname_1,
		// 		personname_2:personname_2,
		// 		personphone_1:personphone_1,
		// 		personphone_2:personphone_2,
				persongx_1:persongx_1,
				persongx_2:persongx_2,
		// school_address:school_address,
		// school_name:school_name,
		// xueli:xueli,
		// nianji:nianji,
		// banji:banji,
		// zhuanye:zhuanye,
		// xuehao:xuehao,
		// suse_address:suse_address,
		// qq_num:qq_num,
		// email:email,
		// wechat_num:wechat_num,
		// wechat_name:wechat_name,
		// xuexin_num:xuexin_num,
		// xuexin_pwd:xuexin_pwd,
		// sex:sex,
		// jiguan:jiguan,
		// shouji_pwd:shouji_pwd,
		// shenghuofei:shenghuofei,
		
		// f_name:f_name,
		// f_phone:f_phone,
		// m_name:m_name,
		// m_phone:m_phone,
		// z_name:z_name,
		// z_phone:z_phone,
		// fudao_name:fudao_name,
		// fudao_phone:fudao_phone,
		// seyou_name:seyou_name,
		// seyou_phone:seyou_phone,
		// tongxue_name:tongxue_name,
		// tongxue_phone:tongxue_phone,
		// pengyou_name:pengyou_name,
		// pengyou_phone:pengyou_phone,
			},
			function (data,state){
				if(state != "success"){
					showalert("请求数据失败,请重试!");
				}else if(data.status == 1){
					showalert("保存成功!");
					window.location.href = "<?php echo U('Info/index');?>";
				}else{
					showalert(data.msg);
				}
			}
		);
	}else{
		showalert("资料填写不完整,请检查!");
	}
}


// function saveInfo(){
// 	var goods_type = $("#goods_type").val();
// 	var goods_brand = $("#goods_brand").val();
// 	var goods_model = $("#goods_model").val();
// 	var goods_color = $("#goods_color").val();
// 	var goods_mem = $("#goods_mem").val();
// 	var goods_sum = $("#goods_sum").val();
// 	var goods_firstpay = $("#goods_firstpay").val();
// 	var goods_borrow = $("#goods_borrow").val();
// 	var goods_time = $("#goods_time").val();
// 	var goods_monthpay = $("#goods_monthpay").val();
// 	var borrow_name = $("#borrow_name").val();
// 	var borrow_tel = $("#borrow_tel").val();
// 	var borrow_idcard = $("#borrow_idcard").val();
// 	var borrow_qqwei = $("#borrow_qqwei").val();
// 	var borrow_address = $("#borrow_address").val();
// 		var borrow_livetime = $("#borrow_livetime").val();
// 		var borrow_work = $("#borrow_work").val();
// 		var borrow_fix = $("#borrow_fix").val();
// 		var borrow_section = $("#borrow_section").val();
// 		var borrow_post = $("#borrow_post").val();
// 		var borrow_month = $("#borrow_month").val();
// 		var borrow_paytime = $("#borrow_paytime").val();
// 		var borrow_worktime = $("#borrow_worktime").val();
// 		var borrow_company = $("#borrow_company").val();
// 		var borrow_dad = $("#borrow_dad").val();
// 		var borrow_dadtel = $("#borrow_dadtel").val();
// 		var borrow_mom = $("#borrow_mom").val();
// 		var borrow_momtel = $("#borrow_momtel").val();
// 		var borrow_urgent = $("#borrow_urgent").val();
// 		var borrow_urgentel = $("#borrow_urgentel").val();
// 		var borrow_colleague = $("#borrow_colleague").val();
// 		var borrow_colleaguetel = $("#borrow_colleaguetel").val();
// 		var borrow_other = $("#borrow_other").val();
// 		var borrow_borrow = $("#borrow_borrow").val();
		
// 		var borrow_othertel = $("#borrow_othertel").val();
// 		var service = $("#service").val();
// 		var transact = $("#transact").val();
// 		var shopname = $("#shopname").val();
// 		var shouji_pwd = $('#shouji_pwd').val();	
	
// 	if(checkval(shopname)&& checkval(shouji_pwd)){
// 		$.post(
// 			"<?php echo U('Info/unitinfo');?>",
// 			{
// 				shouji_pwd:shouji_pwd,
// 				goods_type:goods_type,
// 				goods_brand:goods_brand,
// 				goods_model:goods_model,
// 				goods_color:goods_color,
// 				goods_mem:goods_mem,
// 				goods_sum:goods_sum,
// 				goods_firstpay:goods_firstpay,
// 				goods_borrow:goods_borrow,
// 				goods_time:goods_time,
// 				goods_monthpay:goods_monthpay,
// 				borrow_name:borrow_name,
// 				borrow_idcard:borrow_idcard,
// 				borrow_tel:borrow_tel,
// 				borrow_qqwei:borrow_qqwei,
// 				borrow_address:borrow_address,
// 				borrow_livetime:borrow_livetime,
// 				borrow_work:borrow_work,
// 				borrow_fix:borrow_fix,
// 				borrow_section:borrow_section,
// 				borrow_post:borrow_post,
// 				borrow_month:borrow_month,
// 				borrow_worktime:borrow_worktime,
// 				borrow_company:borrow_company,
// 				borrow_dad:borrow_dad,
// 				borrow_dadtel:borrow_dadtel,
// 				borrow_mom:borrow_mom,
// 				borrow_momtel:borrow_momtel,
// 				borrow_urgent:borrow_urgent,
// 				borrow_urgentel:borrow_urgentel,
// 				borrow_colleague:borrow_colleague,
// 				borrow_other:borrow_other,
// 				borrow_colleaguetel:borrow_colleaguetel,
// 				borrow_othertel:borrow_othertel,
// 				borrow_borrow:borrow_borrow,
// 				service:service,
// 				transact:transact,
// 				shopname:shopname,		
// 			},
// 			function (data){
// 				if(data.status == 0){
// 					showalert(data.errmsg);
// 				}else if(data.status == 1){
// 					showalert(data.errmsg);
// 					window.location.href = "<?php echo U('Info/index');?>";
// 				}else{
// 					showalert(data.errmsg);
// 				}
// 			}
// 		);
// 	}else{
// 		showalert("资料填写不完整,请检查!");
// 	}
// }
</script>
<div style="display: none;">
	<?php
 $name = "cfg_sitecode"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>
</div>
</body>
</html>