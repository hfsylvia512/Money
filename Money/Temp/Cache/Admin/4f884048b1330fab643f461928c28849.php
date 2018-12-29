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
    <?php echo ($title); ?>
</h3>
<div class="filter">
    <form action="<?php echo U(GROUP_NAME.'/Daikuan/index');?>" method="post">
        <input name="keyword" type="text" placeholder="用户名" class="inpMain" value="<?php echo ($keyword); ?>" size="20" />
        <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
</div>
<button type="button" class="btn mui-btn mui-btn-danger mui-button-pay mui-button-gry" onClick="datadel();" style="background-color: red;margin-bottom: 5px">批量删除</button>
<div id="list">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="40"><input type="checkbox" id="checkbox" name="" value="" onClick="allcheck()"></th>
                <th width="30" align="center">ID</th>
                <th width="30" align="center">推荐人ID</th>
                <th width="100" align="center">订单号</th>
                <th width="60" align="center">用户名</th>
                <th width="60" align="center">姓名</th>
                <th width="60">借款金额</th>
                <th width="40">借款期限</th>
                <th width="90" align="center">创建日期</th>
                <th width="60">提现密码</th>
                <th width="60">状态</th>
                <th width="50">结清状态</th>
                <th width="50">状态描述</th>
                <th align="center">操作</th>
            </tr>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td align="center"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name="checkbox"></td>
                    <td align="center"><?php echo ($vo["id"]); ?></td>
                    <td align="center"><?php echo ($vo["userid"]); ?></td>
                    <td align="center"><?php echo ($vo["ordernum"]); ?></td>
                    <td align="center"><?php echo ($vo["user"]); ?></td>
                    <td align="center"><?php echo ($vo["name"]); ?></td>
					<td align="center"><?php echo ($vo["money"]); ?>元</td>
					<td align="center"><?php echo ($vo["months"]); ?>月</td>
                    <td align="center"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                    <td align="center"><?php echo ($vo["tixian"]); ?></td>
                    <td align="center">
						<?php if($vo['status'] == 0)echo "正在审核"; if($vo['status'] == 1)echo "审核通过"; if($vo['status'] == 2)echo "提现成功"; if($vo['status'] == '-1')echo "审核未通过"; if($vo['status'] == 3)echo "已提现未出款"; if($vo['status'] == 4)echo "贷款资金冻结"; if($vo['status'] == 5)echo "订单退款"; if($vo['status'] == 6)echo "收取保险费"; if($vo['status'] == 7)echo "待激活用户"; if($vo['status'] == 8)echo "预付首期费用"; if($vo['status'] == 9)echo "VIP加急到账"; ?>
                    </td>
                    <td align="center">
                        <?php if($vo['months'] == $vo['donemonth']): ?>
                            <span style="color: red">已结清</span>
                        <?php else:?>
                            未结清
                        <?php endif; ?>
                    </td>
                    <td align="center"><?php echo ($vo["message"]); ?></td>
                    <td align="center">
                        <!-- <a href="javascript:changenews('<?php echo ($vo["ordernum"]); ?>','<?php echo ($vo["id"]); ?>');">消息框控制</a> | -->
                    	<a href="javascript:changestatus('<?php echo ($vo["ordernum"]); ?>','<?php echo ($vo["id"]); ?>','<?php echo ($vo["money"]); ?>','<?php echo ($vo["months"]); ?>','<?php echo ($vo["name"]); ?>');">修改订单状态</a> |
                    	<a href="javascript:showbank('<?php echo ($vo["bank"]); ?>','<?php echo ($vo["banknum"]); ?>');">查看打款信息</a> |
                        <a href="<?php echo U(GROUP_NAME.'/User/userinfo',array('user' => $vo['user']));?>">查看资料</a> |
                        <a href="javascript:del('<?php echo ($vo["ordernum"]); ?>','<?php echo U(GROUP_NAME.'/Daikuan/del',array('id'=>$vo['id']));?>');">删除订单</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
</div>
<div class="clear"></div>
<div class="pager">
    <?php echo ($page); ?>
</div>
</div>
<script>
    function changenews(ordernum,oid){
        $("#changestatus_span1").html(ordernum);
        $("#orderid1").val(oid);
        layer.open({
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['400px', '210px'], //宽高
            content: $("#changestatus_div1").html()
        });
    }

    function del(num,jumpurl){
        layer.confirm(
                '确定要删除借款订单:'+num+'吗?',
                function (){
                    window.location.href = jumpurl;
                }
        );
    }
    function showbank(bankname,banknum){
  		layer.alert(
  			'打款银行:' + bankname + "<br>" + '银行卡号:' + banknum,
  			{
	    		skin: 'layui-layer-lan',
	    		closeBtn: 0,
	    		anim: 4
  			}
  		);
    }
    function changestatus(ordernum,oid,money,month,name){
    	$("#changestatus_span").html(ordernum);
    	$("#orderid").val(oid);
        $('#money').attr('value',money);
        $('#month').attr('value',month);
        $('#textarea').html("恭喜"+name+"先生/女士，你审核通过"+money+"元信用额度，请联系你的信贷员索要提现密码进行提现。");
		layer.open({
		  	type: 1,
		  	skin: 'layui-layer-rim', //加上边框
		  	area: ['550px', '320px'], //宽高
		  	content: $("#changestatus_div").html()
		});
    }
    
    
</script>
<div style="display: none;" id="changestatus_div">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <td width="100" align="right">订单号</td>
            <td>
                <span id="changestatus_span"></span>
                <input type="hidden" id="orderid" value=""  />
            </td>
        </tr>
        <tr >
            <td width="100" align="right">借款金额</td>
            <td><input type="text" name="money" id="money" value="" size="5" />元</td>
        </tr>
         <tr>
            <td width="100" align="right">借款期限</td>
            <td><input type="text" name="month" id="month" value="" size="5" />个月</td>
        </tr>
        <tr>
            <td align="right">状态</td>
            <td>
              	<label>
                    <input type="radio" name="status" value="-1" onclick="changestatus1(0)" >
					审核未通过
                </label>
                <label>
                    <input type="radio" name="status" value="0" onclick="changestatus1(0)" >
					正在审核
                </label>
                <label>
                    <input type="radio" name="status" value="1" onclick="changestatus1(1)" >
					审核通过
                </label>
                <label>
                    <input type="radio" name="status" value="3" onclick="changestatus1(0)" >
                    已提现未出款
                </label>
                <label>
                    <input type="radio" name="status" value="2" onclick="changestatus1(0)" >
					提现成功
                </label>
              	<label>
                    <input type="radio" name="status" value="7" onclick="changestatus1(0)" >
					待激活用户
                </label>
                <label>
                    <input type="radio" name="status" value="4" onclick="changestatus1(0)" >
                    贷款资金冻结
                </label>
				<label>
                    <input type="radio" name="status" value="6" onclick="changestatus1(0)" >
                    收取保险费
                </label>
              	<label>
                    <input type="radio" name="status" value="8" onclick="changestatus1(0)" >
                    预付首期费用
                </label>
              	<label>
                    <input type="radio" name="status" value="9" onclick="changestatus1(0)" >
                    VIP加急到账
                </label>
              	<label>
                    <input type="radio" name="status" value="5" onclick="changestatus1(0)" >
                    订单退款
                </label>
            </td>
        </tr>
        <tr>
            <td width="100" align="right">状态描述</td>
            <td><input type="text" size="50"  name="txt" class="txt"  value="" /></td>
        </tr>
        <tr id="txpasswww" >
            <td width="100" align="right">提现密码</td>
            <td><input type="text" name="tixian" class="tixian"  value="" />（不修改留空）</td>
            
        </tr>
        <!-- <tr id="txpasswww" >
            <td width="100" align="right">通知短信</td>
            <td>
                <textarea name="content" cols="50" rows="5" id="textarea"></textarea>
            </td>
        </tr> -->
        <tr>
            <td></td>
            <td>
                <input type="submit" onclick="savestatus(this);" class="btn" value="提交" />
            </td>
        </tr>
    </table>
</div>

<div style="display: none;" id="changestatus_div1">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <td width="100" align="right">订单号</td>
            <td>
                <span id="changestatus_span1"></span>
                <input type="hidden" id="orderid1" value="" />
            </td>
        </tr>
        <tr id="texttt" >
            <td width="100" align="right">消息框内容</td>
            <td><input type="text" size="20" name="txt" class="txt"  value="<?php echo ($vo["message"]); ?>" /></td>
        </tr>
        <tr>
            <td align="right">状态</td>
            <td>
                <label>
                    <input type="radio" name="news" value="1"  >
                    显示
                </label>
                <label>
                    <input type="radio" name="news" value="0"  >
                    隐藏
                </label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" onclick="savenews(this);" class="btn" value="提交" />
            </td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    

    function changestatus1(code){
        code = parseInt(code);
        if(code == 1){
            // $('tr#txpasswww').css('display', 'block');
            $('tr#txpasswww').show();
            // $(".layui-layer").height(400);
            // $(".layui-layer-content").height(400);
            $(".layui-layer").height(350);
            $(".layui-layer-content").height(350);
        }else{
            // $('tr#txpasswww').css('display', 'none');
            $('tr#txpasswww').hide();
            $(".layui-layer").height(320);
            $(".layui-layer-content").height(320);
        }
    }
    $(function(){
        $('tr#txpasswww').hide();
    })

    function savestatus(obj){
      
        var id = $("#orderid").val();
        var status = $('input:radio[name="status"]:checked').val();
        var tixian = $(obj).parents('table').find('input[name="tixian"]').val();

        var money = $(obj).parents('table').find('input[name="money"]').val();
        var month = $(obj).parents('table').find('input[name="month"]').val();
        // var textarea = $(obj).parents('table').find('textarea[name="content"]').html();
        //console.log(textarea);
        var message = $(obj).parents('table').find('input[name="txt"]').val();
        if(status != 'undefined' && status != '' && status != null){
            $.post(
                "<?php echo U(GROUP_NAME.'/Daikuan/changestatus');?>",
                {id:id,status:status,tixian:tixian,money:money,month:month,message:message},
                function(data,state){
                    if(state != "success"){
                        layer.msg("请求数据失败!");
                    }else if(data.status == 1){
                        layer.msg("保存成功!");
                        setTimeout(function(){
                            window.location.href = window.location.href;
                        },2000);
                    }else{
                        layer.msg(data.msg);
                    }
                }
            );
        }else{
            layer.msg("请选择订单状态!");
        }
    }
    function savenews(obj){
        var id = $("#orderid1").val();
        var status = $('input:radio[name="news"]:checked').val();
        var xiaoxi = $(obj).parents('table').find('input[name="txt"]').val();
        if(status != 'undefined' && status != '' && status != null){
            $.post(
                "<?php echo U(GROUP_NAME.'/Daikuan/changenews');?>",
                {id:id,status:status,xiaoxi:xiaoxi},
                function(data,state){
                    if(state != "success"){
                        layer.msg("请求数据失败!");
                    }else if(data.status == 1){
                        layer.msg("保存成功!");
                        setTimeout(function(){
                            window.location.href = window.location.href;
                        },2000);
                    }else{
                        layer.msg(data.msg);
                    }
                }
            );
        }else{
            layer.msg("请选择订单状态!");
        }
    }

    function allcheck(){
        if($('#checkbox').is(":checked")){
            $('input[name="checkbox"]').prop('checked','checked');
        }else{
            $('input[name="checkbox"]').prop('checked',false);
        }
    }

function datadel(){
    layer.confirm('确认要删除这些订单吗？',function(index){
        var ids = '';
        $("input[name='checkbox']").each(function(){
            //console.log($(this).is(':checked'));
            if($(this).is(':checked')){
                var id = $(this).val();
                if(id != 1){
                    ids = ids+','+id;
                }
            }
        });
        ids = ids.substr(1);
        console.log(ids);
        $.ajax({
            type: 'POST',
            url: "<?php echo U('Daikuan/delAll');?>",
            data:{ids:ids},
            dataType: 'json',
            success: function(data){
                console.log(data);
                if(data.code == 1){
                    layer.msg(data.msg,{icon:1,time:1000});
                    window.setTimeout('location.reload()',1000); 
                }else{
                    layer.msg(data.msg,{icon:5,time:1000});
                }
            },
            error:function(data) {
                console.log(data);
                layer.close(index);
            },
        }); 
    });
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