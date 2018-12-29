<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo ($title); ?> - <?php
 $name = "cfg_sitetitle"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?> </title>
    <link href="__PUBLIC__/main/css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="__PUBLIC__/main/js/jquery.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/main/js/global.js"></script>
    <script type="text/javascript" src="__PUBLIC__/main/js/jquery.tab.js"></script>
    <script src="__PUBLIC__/layer/layer.js"></script>
</head>
<body>
<div id="dcWrap">

    <div id="dcHead">
    <div id="head">
        <div class="logo">
          <a href="<?php echo U(GROUP_NAME.'/Main/index');?>">
            <div style="width: 178px;height: 40px;background-image: url('__PUBLIC__/main/images/dk_name.jpg');background-size:cover;"></div>
          </a>
        </div>
        <div class="nav">
            <ul>
                <li class="M">
                    <a href="JavaScript:void(0);" class="topAdd">新建</a>
                    <div class="drop mTopad">
                        <a href="<?php echo U(GROUP_NAME.'/Article/add');?>">文章</a>
                        <a href="<?php echo U(GROUP_NAME.'/Article/addcat');?>">文章分类</a>
                        <!--<a href="<?php echo U(GROUP_NAME.'/link/add');?>">友情链接</a>-->
                        <a href="<?php echo U(GROUP_NAME.'/Admin/add');?>">管理员</a>
                    </div>
                </li>
                <li><a href="<?php
 $name = "cfg_siteurl"; if(empty($name)){ echo ""; }else{ echo htmlspecialchars_decode(C($name)); } ?>" target="_blank">查看站点</a></li>
                <li><a href="<?php echo U(GROUP_NAME.'/Main/clearcache');?>">清除缓存</a></li>
                
            </ul>

            <ul class="navRight">
              <li class="M noLeft">
                  <a href="JavaScript:void(0);">您好，<?php echo session('admin_user');?> </a>
                  <div class="drop mUser">
                      <a href="<?php echo U(GROUP_NAME.'/Admin/chagemypass');?>">修改密码</a>
                  </div>
              </li>
              <li class="noRight">
                  <a href="<?php echo U(GROUP_NAME.'/Index/logout');?>">退出</a>
              </li>
          </ul>
        </div>
    </div>
</div>
    <!-- dcHead 结束 -->
    <div id="dcLeft">
	<div id="menu">
		<ul class="top">
            <li>
                <a href="<?php echo U(GROUP_NAME.'/Main/index');?>">
                    <i class="home"></i>
                    <em>管理首页</em>
                </a>
            </li>
        </ul>
        <ul>
            <li id="nav_System_index">
                <a href="<?php echo U(GROUP_NAME.'/System/index');?>">
                    <i class="system"></i>
                    <em>系统设置</em>
                </a>
            </li>
            <li id="nav_Admin_index">
                <a href="<?php echo U(GROUP_NAME.'/Admin/index');?>">
                    <i class="manager"></i>
                    <em>网站管理员</em>
                </a>
            </li>
            <li id="nav_Block_index">
            	<a href="<?php echo U(GROUP_NAME.'/Block/index');?>">
            		<i class="theme"></i>
            		<em>自由块</em>
            	</a>
            </li>
        </ul>
        <ul>
            <li id="nav_Article_catlist">
                <a href="<?php echo U(GROUP_NAME.'/Article/catlist');?>">
                    <i class="articleCat"></i>
                    <em>文章分类</em>
                </a>
            </li>
            <li id="nav_Article_index">
                <a href="<?php echo U(GROUP_NAME.'/Article/index');?>">
                    <i class="article"></i>
                    <em>文章列表</em>
                </a>
            </li>
        </ul>
        <ul>
        	<li id="nav_User_index">
        		<a href="<?php echo U('User/index');?>">
        			<i class="user"></i>
        			<em>用户管理</em>
        		</a>
        	</li>
        	<li id="nav_Daikuan_index">
        		<a href="<?php echo U(GROUP_NAME.'/Daikuan/index');?>">
        			<i class="product"></i>
        			<em>借款列表</em>
        		</a>
        	</li>
        	<li id="nav_Huankuan_index">
        		<a href="<?php echo U(GROUP_NAME.'/Bills/index');?>">
        			<i class="guestbook"></i>
        			<em>还款列表</em>
        		</a>
        	</li>
        	<li id="nav_Payorder_index">
        		<a href="<?php echo U(GROUP_NAME.'/Payorder/index');?>">
        			<i class="order"></i>
        			<em>订单列表</em>
        		</a>
        	</li>
            <!-- <li id="nav_Payorder_index">
        		<a href="<?php echo U(GROUP_NAME.'/Fenxiao/index');?>">
        			<i class="order"></i>
        			<em>分销中心</em>
        		</a>
        	</li> -->
        </ul>


	</div>
</div>
<script>
    //设置cur效果
    var MODULE_NAME = "<?php echo MODULE_NAME;?>";
    var ACTION_NAME = "<?php echo ACTION_NAME;?>";
    if(MODULE_NAME != "Main"){
        $("#nav_"+MODULE_NAME+"_"+ACTION_NAME).addClass("cur");
    }
</script>


    <div id="dcMain"> <!-- 当前位置 -->
        <div id="urHere">
            <?php echo ($title); ?>
        </div>
        <div id="index" class="mainBox" style="padding-top:18px;height:auto!important;height:550px;min-height:550px;">


            <h3>
    <a href="<?php echo U(GROUP_NAME.'/User/index');?>" class="actionBtn">返回列表</a>
 	基本资料
</h3>
    <link rel="stylesheet" href="__PUBLIC__/admin/css/msgbox.css" />

    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <td width="100" align="right">手机号/用户名</td>
            <td>
                <span class="phone"><?php echo ($baseinfo["user"]); ?></span>
            </td>
        </tr>
        <tr>
            <td width="100" align="right">姓名/身份证号</td>
            <td>
                <span><?php echo ($baseinfo["name"]); ?> | <?php echo ($baseinfo["usercard"]); ?></span>
            </td>
        </tr>
        <!-- <tr>
            <td width="100" align="right">我的邀请码</td>
            <td>
                <span><?php echo ($invitation); ?></span>
            </td>
        </tr> -->
        <tr>
            <td width="100" align="right">身份证拍照</td>
            <td>
            	<span>
            		身份证正面:<a href="<?php echo ($baseinfo["cardphoto_1"]); ?>" target="_blank">点击查看</a>
            	</span>
            	<br />
            	<span>
            		身份证反面:<a href="<?php echo ($baseinfo["cardphoto_2"]); ?>" target="_blank">点击查看</a>
            	</span>
            	<br />
            	<span>
            		手持身份证:<a href="<?php echo ($baseinfo["cardphoto_3"]); ?>" target="_blank">点击查看</a>
            	</span>
            </td>
        </tr>
      
        <tr>
            <td width="100" align="right">个人资料</td>
            <td>
            	<!-- <span>
            		手机服务密码: <span class="pass"><?php echo ($baseinfo["shouji_pwd"]); ?></span>
            	</span>
            	<br />
            	<span>
            	    商品类型: <?php echo ($baseinfo["goods_type"]); ?>
            	</span>
            	<br />
            	<span>
            		品牌: <span class="pass"><?php echo ($baseinfo["goods_brand"]); ?></span>
            	</span>
            	<br />
            	<span>
            		型号: <?php echo ($baseinfo["goods_model"]); ?> 
            	</span>
            	<br />
            	<span>
            		颜色: <?php echo ($baseinfo["goods_color"]); ?>
            	</span>
            	<br />
            	<span>
            		内存: <?php echo ($baseinfo["goods_mem"]); ?>
            	</span>
            	<br />
                	<span>
            		机器总价: <?php echo ($baseinfo["goods_sum"]); ?>
            	</span>
            	<br />
            	<span>
            		首付金额: <?php echo ($baseinfo["goods_firstpay"]); ?>
            	</span>
            	<br />
            	<span>
            		借款金额: <?php echo ($baseinfo["goods_borrow"]); ?>
            	</span>
            	<br />
            	<span>
            		期数: <?php echo ($baseinfo["goods_time"]); ?> 
            	</span>
            	<br />
            	<span>
            		月付: <?php echo ($baseinfo["goods_monthpay"]); ?>
            	</span>
            	<br />
            	<span>
            		借款人姓名: <?php echo ($baseinfo["borrow_name"]); ?>
            	</span>
            	<br />
                	<span>
            		电话: <?php echo ($baseinfo["borrow_tel"]); ?>
            	</span>
            	<br />
            	<span>
            		身份证号: <?php echo ($baseinfo["borrow_idcard"]); ?> 
            	</span>
            	<br />
            	<span>
            		QQ/微信: <?php echo ($baseinfo["borrow_qqwei"]); ?>
            	</span>
            	<br />
            	<span>
            		居住地址: <?php echo ($baseinfo["borrow_address"]); ?>
            	</span>
            	<br />
                	<span>
            		居住时间: <?php echo ($baseinfo["borrow_livetime"]); ?>
            	</span>
            	<br />
            	<span>
            		工作单位: <?php echo ($baseinfo["borrow_work"]); ?> 
            	</span>
            	<br />
            	
            	
            	<span>
            		固话: <?php echo ($baseinfo["borrow_fix"]); ?>
            	</span>
            	<br />
            	<span>
            		部门: <?php echo ($baseinfo["borrow_section"]); ?>
            	</span>
            	<br />
                	<span>
            		职位: <?php echo ($baseinfo["borrow_post"]); ?>
            	</span>
            	<br />
            	<span>
            		月工资: <?php echo ($baseinfo["borrow_month"]); ?>
            	</span>
            	<br />
                	<span>
            		发薪日: <?php echo ($baseinfo["borrow_paytime"]); ?>
            	</span>
            	<br />
            	<span>
            		工作时间: <?php echo ($baseinfo["borrow_worktime"]); ?>
            	</span>
            	<br />
                	<span>
            		公司地址: <?php echo ($baseinfo["borrow_company"]); ?>
            	</span>
            	<br />
            	<span>
            		父亲姓名: <?php echo ($baseinfo["borrow_dad"]); ?>
            	</span>
            	<br />
                	<span>
            		电话: <?php echo ($baseinfo["borrow_dadtel"]); ?>
            	</span>
            	<br />
            	<span>
            		母亲姓名: <?php echo ($baseinfo["borrow_mom"]); ?>
            	</span>
            	<br />
                	<span>
            		电话: <?php echo ($baseinfo["borrow_momtel"]); ?>
            	</span>
            	<br />
            	<span>
            		紧急联系人: <?php echo ($baseinfo["borrow_urgent"]); ?>
            	</span>
            	<br />
                	<span>
            		电话: <?php echo ($baseinfo["borrow_urgentel"]); ?>
            	</span>
            	<br />
            	<span>
            		同事姓名: <?php echo ($baseinfo["borrow_colleague"]); ?>
            	</span>
            	<br />
                <span>
                    电话: <?php echo ($baseinfo["borrow_colleaguetel"]); ?>
                </span>
                <br />
                <span>
                    其他联系人: <?php echo ($baseinfo["borrow_other"]); ?>
                </span>
                <br />
                <span>
                    电话: <?php echo ($baseinfo["borrow_othertel"]); ?>
                </span>
                <br />
                <span>
                    借款人姓名: <?php echo ($baseinfo["borrow_borrow"]); ?>
                </span>
                <br />
                <span>
                    服务经理: <?php echo ($baseinfo["service"]); ?>
                </span>
                <br />
                <span>
                    办理借款时间: <?php echo ($baseinfo["transact"]); ?>
                </span>
                <br />
                <span>
                    办理门店名称: <?php echo ($baseinfo["shopname"]); ?>
                </span>
                <br /> -->
                <span>
                    单位名称: <?php echo ($baseinfo["dwname"]); ?>
                </span>
                <br />
                    <span>
                    职位: <?php echo ($baseinfo["position"]); ?>
                </span>
                <br />
                <span>
                    单位电话: <?php echo ($baseinfo["dwphone"]); ?>
                </span>
                <br />
                <span>
                    工作年龄: <?php echo ($baseinfo["workyears"]); ?>
                </span>
                <br />
                <span>
                    单位地址: <?php echo ($baseinfo["dwaddess_ssq"]); ?>
                </span>
                <br />
                <span>
                    详细地址: <?php echo ($baseinfo["dwaddess_more"]); ?>
                </span>
                <br />
                <span>
                    月收入: <?php echo ($baseinfo["dwysr"]); ?>
                </span>
                <br />
                <span>
                    现居住地址: <?php echo ($baseinfo["addess_ssq"]); ?>
                </span>
                <br />
                <span>
                    详细地址: <?php echo ($baseinfo["addess_more"]); ?>
                </span>
                <br />
                <span>
                    姓名: <?php echo ($baseinfo["z_name"]); ?>
                </span>
                <br />
                <span>
                    电话: <?php echo ($baseinfo["z_phone"]); ?>
                </span>
                <br />
                <span>
                    关系: <?php echo ($baseinfo["persongx_1"]); ?>
                </span>
                <br />
                <span>
                    姓名: <?php echo ($baseinfo["borrow_colleague"]); ?>
                </span>
                <br />
                    <span>
                    电话: <?php echo ($baseinfo["borrow_colleaguetel"]); ?>
                </span>
                 <br />
                 <span>
                    关系: <?php echo ($baseinfo["persongx_2"]); ?>
                </span>
                <br />
            </td>
        </tr>
        <tr>
            <td width="100" align="right">银行卡信息</td>
            <!-- <td>
            	<span>
            		银行名称: <?php echo ($baseinfo["bankname"]); ?>
            	</span>
            	<br />
            	<span>
            		银行卡号: <?php echo ($baseinfo["bankcard"]); ?>
            	</span>
            </td> -->
            <td>
                <div class="mui-input-row">
                <label>银行名称：</label>
                    <input id="bankname" value="<?php echo ($baseinfo["bankname"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入银行名称" data-input-clear="2">
                </div>
                <div class="mui-input-row">
                    <label>银行卡号：</label>
                    <input id="bankcard" value="<?php echo ($baseinfo["bankcard"]); ?>" type="text" class="pr mui-input-clear mui-input nofocus" placeholder="请输入银行卡号" data-input-clear="2">
                </div>
                <button type="button" class="btn mui-btn mui-btn-danger mui-button-pay mui-button-gry" onClick="saveInfo();" >保存</button>
            </td>
        </tr>
    </table>
   

   <!--  <h3 style="position:relative;">淘宝账户信息</h3>
    
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <?php if(is_array($otherinfo)): foreach($otherinfo as $key=>$vo): ?><p>
                    <?php echo ($vo); ?> | 
                    <a href="<?php echo ($vo); ?>" target="_blank">点击查看</a>
                </p><?php endforeach; endif; ?>
        </tr>
    </table> -->


    <!-- <h3 style="">芝麻信用分数</h3>
    
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <td width="100" align="right">芝麻信用分数</td>
            <td>
                <span>
                    <?php echo ($score); ?>
                </span>
            </td>
        </tr>
    </table> -->
     <h3>请上传其他收入或财务证明</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <?php if(is_array($otherinfo)): foreach($otherinfo as $key=>$vo): ?><p>
                    <?php echo ($vo); ?> | 
                    <a href="<?php echo ($vo); ?>" target="_blank">点击查看</a>
                </p><?php endforeach; endif; ?>
        </tr>
    </table>
    <!-- <h3 style="position:relative;">通话详单
        <a href="javascript:;" class="getMobileInfo" style="position:absolute;right:0;text-decoration:none;top:17px;font-size:16px" >获取通话详单</a>
    </h3>
    
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" id="mobileInfo">
        <?php if(is_array($updata)): foreach($updata as $key=>$upv): ?><tr class="trphone">
            <td width="100" align="right"><?php echo ($upv["phone_num"]); ?></td>
            <td><span>通话地址：<?php echo ($upv["phone_address"]); ?></span> <br /><span>通话时间：<?php echo ($upv["phone_time"]); ?></span><br /><span>通话时长：<?php echo ($upv["phone_calltime"]); ?></span> <br /><span>通话方式：<?php echo ($upv["phone_type"]); ?></span></td>

            </tr><?php endforeach; endif; ?>
        
    </table> 
    <div style="top:400px;display:none" id="q_Msgbox" class="zeng_msgbox_layer_wrap"><span id="mode_tips_v2" style="z-index:10000" class="zeng_msgbox_layer"><span class="gtl_ico_clear"></span><span class="gtl_ico_loading"></span>正在加载中，请稍后...<span class="gtl_end"></span></span></div> -->

    <div class="zeng_msgbox_layer_wrap" id="q_Msgbox" style=" display:block"></div>


    <script type="text/javascript" src="__PUBLIC__/admin/js/msgbox.js"></script>
    <script src="__PUBLIC__/home/js/jquery.js"></script>

    <script>
        var arr;

        $('.getMobileInfo').click(function(){
            ZENG.msgbox.show("正在加载中，请稍后...", 6,999999);
            $.post('<?php echo U("User/getMobileInfo");?>',{phone:$('.phone').html(),pass:$('.pass').html()},function(data){
             
                

                // console.log(data);
                // console.log(typeof(data));

                if(data.errcode == 0){
                    ZENG.msgbox._hide();
                    alert(data.errmsg);

                }else{
                    ZENG.msgbox._hide();
                    if($('tr[class="trphone"]').length > 0){
                        $('tr[class="trphone"]').remove();
                    }

                    if($('#mobileInfo').children().length > 0){
                        $('#mobileInfo').empty();
                    }
                    arr = data.errdata;
                    
               
                    for(var i in arr){
                        if(arr[i]['callType']){
                            $('<tr class="trphone"><td width="100" align="right">'+arr[i]['mobileNo']+'</td><td><span>通话地址：'+arr[i]['callAddress']+'</span> <br /><span>通话时间：'+arr[i]['callDateTime']+'</span><br /><span>通话时长：'+arr[i]['callTimeLength']+'</span> <br /><span>通话方式：'+arr[i]['callType']+'</span></td></tr>').appendTo('#mobileInfo');
                        }
                    }
                }
            },'json');
            
            
        });

        function saveInfo(){
            var bankname = $('#bankname').val();
            var bankcard = $('#bankcard').val();
            if(bankcard.length<16 || bankcard.length>20){
                alert('不是有效的银行卡号');
                return false;
            }
            $.post(
                "<?php echo U('User/unitinfo').'&user='.$baseinfo['user'];?>",
                {
                    bankname:bankname,
                    bankcard:bankcard,
                },
                function (data){
                    if(data.status == 0){
                        alert(data.errmsg);
                    }else if(data.status == 1){
                        alert(data.errmsg);
                        // window.location.href = "<?php echo U('User/index');?>";
                        window.location.reload();
                    }else{
                        alert(data.errmsg);
                    }
                }
            );
        }

    </script>


        </div>
    </div>
    <div class="clear"></div>
    	<div id="dcFooter">
		 <div id="footer">
		  <div class="line"></div>
			  <ul>
			 
			  </ul>
		 </div>
	</div>

    <!-- dcFooter 结束 -->
    <div class="clear"></div>
</div>
</body>
</html>