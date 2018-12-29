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


            <h3><?php echo ($title); ?></h3>
<script type="text/javascript">
    $(function(){ $(".idTabs").idTabs(); });
</script>
<div class="idTabs">
    <ul class="tab">
        <li><a href="#main">常规设置</a></li>
        <li><a href="#daikuan">贷款设置</a></li>
        <li><a href="#api">接口设置</a></li>
        <li><a href="#upload">二维码</a></li>
    </ul>
    <div class="items">
        <form action="<?php echo U(GROUP_NAME.'/System/index');?>" method="post">
            <div id="main">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th width="131">名称</th>
                        <th>内容</th>
                    </tr>
                    <tr>
                        <td align="right">站点名称</td>
                        <td>
                            <input type="text" name="sitename" value="<?php echo C('cfg_sitename');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点标题</td>
                        <td>
                            <input type="text" name="sitetitle" value="<?php echo C('cfg_sitetitle');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点地址</td>
                        <td>
                            <input type="text" name="siteurl" value="<?php echo C('cfg_siteurl');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点关键字</td>
                        <td>
                            <input type="text" name="sitekeywords" value="<?php echo C('cfg_sitekeywords');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">站点描述</td>
                        <td>
                            <input type="text" name="sitedescription" value="<?php echo C('cfg_sitedescription');?>" size="80" class="inpMain" />
                        </td>
                    </tr>

                    <tr>
                        <td align="right">是否关闭网站</td>
                        <td>
                            <label for="siteclosed_0">
                                <input type="radio" name="siteclosed" id="siteclosed_0" value="0" <?php if(C('cfg_siteclosed') == 0): ?>checked<?php endif; ?> >
                                否
                            </label>
                            <label for="siteclosed_1">
                                <input type="radio" name="siteclosed" id="siteclosed_1" value="1" <?php if(C('cfg_siteclosed') == 1): ?>checked<?php endif; ?> >
                                是
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">网站关闭提示</td>
                        <td>
                            <textarea name="siteclosemsg" cols="83" rows="8" class="textArea" /><?php echo C('cfg_siteclosemsg');?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">ICP备案证书号</td>
                        <td>
                            <input type="text" name="siteicp" value="<?php echo C('cfg_siteicp');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
					
                    <tr>
                        <td align="right">统计/客服代码调用</td>
                        <td>
                            <textarea name="abcd123456" cols="83" rows="8" class="textArea" /><?php echo C('cfg_abcd123456');?></textarea>
                        </td>
                    </tr>
					 <tr>
                    <td width="131"></td>
                    <td>
                        <input class="btn" type="submit" value="提交" />
                    </td>
                    </tr>
                </table>					
            </div>
            <!-------------->
            <div id="daikuan">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th width="131">名称</th>
                        <th>内容</th>
                    </tr>
                    <tr>
                        <td align="right">贷款最小金额</td>
                        <td>
                            <input type="text" name="minmoney" value="<?php echo C('cfg_minmoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">贷款最大金额</td>
                        <td>
                            <input type="text" name="maxmoney" value="<?php echo C('cfg_maxmoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">初始显示金额</td>
                        <td>
                            <input type="text" name="definamoney" value="<?php echo C('cfg_definamoney');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">允许选择月数</td>
                        <td>
                            <input type="text" name="dkmonths" value="<?php echo C('cfg_dkmonths');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">初始选择月数</td>
                        <td>
                            <input type="text" name="definamonth" value="<?php echo C('cfg_definamonth');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">服务费率</td>
                        <td>
                            <input type="text" name="fuwufei" value="<?php echo C('cfg_fuwufei');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">借款审核费用</td>
                        <td>
                            <input type="text" name="shenhefei" value="<?php echo C('cfg_shenhefei');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">每月还款日</td>
                        <td>
                            <input type="text" name="huankuanri" value="<?php echo C('cfg_huankuanri');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">是否自动拒绝</td>
                        <td>
                            <label for="siteclosed_0">
                                <input type="radio" name="autodisdk" id="autodisdk_0" value="0" <?php if(C('cfg_autodisdk') == 0): ?>checked<?php endif; ?> >
                                否
                            </label>
                            <label for="siteclosed_1">
                                <input type="radio" name="autodisdk" id="autodisdk_1" value="1" <?php if(C('cfg_autodisdk') == 1): ?>checked<?php endif; ?> >
                                是
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">自动拒绝天数</td>
                        <td>
                            <input type="text" name="autodisdkday" value="<?php echo C('cfg_autodisdkday');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">拒绝提交等待天数</td>
                        <td>
                            <input type="text" name="disdkdleyday" value="<?php echo C('cfg_disdkdleyday');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">支付宝账户</td>
                        <td>
                            <input type="text" name="zhifubao" value="<?php echo C('cfg_zhifubao');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">微信账户</td>
                        <td>
                            <input type="text" name="weixin" value="<?php echo C('cfg_weixin');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
					 <td width="131"></td>
                    <td>
                        <input class="btn" type="submit" value="提交" />
                    </td>
                    </tr>
                </table>
            </div>
            <div id="api">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th width="131">名称</th>
                        <th>内容</th>
                    </tr>
                   <!-- <tr>
                        <td align="right">短信ID</td>
                        <td>
                            <input type="text" name="smsid" value="<?php echo C('cfg_smsid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">短信账号</td>
                        <td>
                            <input type="text" name="smssid" value="<?php echo C('cfg_smssid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">短信密码</td>
                        <td>
                            <input type="text" name="smstoken" value="<?php echo C('cfg_smstoken');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                   <tr>
                        <td align="right">短信接口签名</td>
                        <td>
                            <input type="text" name="smssign" value="<?php echo C('cfg_smssign');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">立木征信appkey</td>
                        <td>
                            <input type="text" name="limu_apikey" value="<?php echo C('cfg_limu_apikey');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">立木征信apiSecret</td>
                        <td>
                            <input type="text" name="limu_apisecret" value="<?php echo C('cfg_limu_apisecret');?>" size="80" class="inpMain" />
                        </td>
                    </tr>-->
                    <tr>
                        <td align="right">通知短信账号</td>
                        <td>
                            <input type="text" name="smsuid" value="<?php echo C('cfg_smsuid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">通知短信密码</td>
                        <td>
                            <input type="text" name="smspwd" value="<?php echo C('cfg_smspwd');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
 					<tr>
                        <td align="right">验证码模板id</td>
                        <td>
                            <input type="text" name="codeid" value="<?php echo C('cfg_codeid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">审核通过模板id</td>
                        <td>
                            <input type="text" name="smspassid" value="<?php echo C('cfg_smspassid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
					<tr>
                        <td align="right">订单冻结模板</td>
                        <td>
                            <input type="text" name="dddj" value="<?php echo C('cfg_dddj');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">审核未通过模板id</td>
                        <td>
                            <input type="text" name="shwtgid" value="<?php echo C('cfg_shwtgid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">正在审核模板id</td>
                        <td>
                            <input type="text" name="zzshid" value="<?php echo C('cfg_zzshid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  <tr>
                        <td align="right">已提现未出款模板id</td>
                        <td>
                            <input type="text" name="ytxwckid" value="<?php echo C('cfg_ytxwckid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">提现成功模板id</td>
                        <td>
                            <input type="text" name="txcgid" value="<?php echo C('cfg_txcgid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">待激活用户模板id</td>
                        <td>
                            <input type="text" name="djhyhid" value="<?php echo C('cfg_djhyhid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">收取保险费模板id</td>
                        <td>
                            <input type="text" name="sqbxfid" value="<?php echo C('cfg_sqbxfid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  <tr>
                        <td align="right">预付首期费用模板id</td>
                        <td>
                            <input type="text" name="yfsqfyid" value="<?php echo C('cfg_yfsqfyid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">VIP加急到账模板id</td>
                        <td>
                            <input type="text" name="vipjjdzid" value="<?php echo C('cfg_vipjjdzid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                  	<tr>
                        <td align="right">订单退款模板id</td>
                        <td>
                            <input type="text" name="ddtkid" value="<?php echo C('cfg_ddtkid');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                   <!--  <tr>
                        <td align="right">申请短信内容</td>
                        <td>
                            <textarea name="smscontent" cols="83" rows="8" class="textArea" /><?php echo C('cfg_smscontent');?></textarea>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <td align="right">当日获取最大次数</td>
                        <td>
                            <input type="text" name="smsmaxcount" value="<?php echo C('cfg_smsmaxcount');?>" size="80" class="inpMain" />
                        </td>
                    </tr> -->
                    <!--<tr>
                        <td align="right">支付商户号</td>
                        <td>
                            <input type="text" name="payuserseller" value="<?php echo C('cfg_payuserseller');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">支付PID</td>
                        <td>
                            <input type="text" name="client_id" value="<?php echo C('cfg_client_id');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">支付KEY码</td>
                        <td>
                            <input type="text" name="client_secret" value="<?php echo C('cfg_client_secret');?>" size="80" class="inpMain" />
                        </td>
                    </tr>
                </table>
            </div>-->


            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="131"></td>
                    <td>
                        <input class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="upload" >
        <form action="<?php echo U('System/upload');?>" method="post" enctype="multipart/form-data">
        <table style='text-align: center;'>
            <tr><td>
                <div><img id="codeimg" src="/Upload/code/11.jpg"></div>
            </td></tr>
            <tr><td style="height: 40px;">
                <input type="file" name="qr_code" id="qr_code" />
            </td></tr>
            <input type="hidden" name="type" value="1" />
            <tr><td>
                <div><input class="btn" type="submit" value="提交"/></div>
            </td></tr>
        </table>
        </form>
     </div>
</div>
</div>



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