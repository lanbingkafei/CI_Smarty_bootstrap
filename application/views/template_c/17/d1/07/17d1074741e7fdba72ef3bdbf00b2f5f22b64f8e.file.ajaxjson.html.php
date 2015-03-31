<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 12:23:10
         compiled from "application\views\index\ajaxjson.html" */ ?>
<?php /*%%SmartyHeaderCode:668154fecd0063f467-51115293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17d1074741e7fdba72ef3bdbf00b2f5f22b64f8e' => 
    array (
      0 => 'application\\views\\index\\ajaxjson.html',
      1 => 1425986587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '668154fecd0063f467-51115293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fecd006720e2_69045631',
  'variables' => 
  array (
    'URL1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fecd006720e2_69045631')) {function content_54fecd006720e2_69045631($_smarty_tpl) {?><html>
<head>
	<title>bian</title>
	<meta charset="utf-8" />
	<?php echo '<script'; ?>
 src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		function demo(){
			var values1=testAsync();
			var backdata = "您提交的姓名为：" + values1.name +  
			"<br /> 您提交的密码为：" + values1.password;  
			$("#backdata").html(backdata);  
			$("#backdata").css({color: "red"});
		}



		function testAsync() {
		    //定义一个全局变量来接受$post的返回值
		    var result;
		    //用ajax的“同步方式”调用一般处理程序
		    $.ajax({
		        url: "<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/example/ajaxjson/format/json",
		        //url: "/project/CI/index.php/example/perfdata/format/json",
		        async: false,//改为同步方式
		        type: "post",
		        data:{name:$("#name").val(),password:$("#password").val()},
		        success: function (DataValue) {
		            result = DataValue;
		        }
		    });
		    return result;
		}
    <?php echo '</script'; ?>
>

</head>
<body>
	
<p><label for="name">姓名：</label>  
<input id="name" name="name" type="text" />  
</p>  
  
<p><label for="password">密码：</label>  
<input id="password" name="password" type="password" />  
</p>  
  
<span id="backdata"></span>  
<p><input id="subbtn" type="button" value="提交数据" onclick="demo()" /></p>  

</body>
</html>


<?php }} ?>
