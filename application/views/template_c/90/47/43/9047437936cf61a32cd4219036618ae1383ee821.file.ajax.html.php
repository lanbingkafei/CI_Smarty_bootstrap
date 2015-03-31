<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-11 04:54:45
         compiled from "application\views\index\ajax.html" */ ?>
<?php /*%%SmartyHeaderCode:743054fec5f25573e0-25007501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9047437936cf61a32cd4219036618ae1383ee821' => 
    array (
      0 => 'application\\views\\index\\ajax.html',
      1 => 1425987074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '743054fec5f25573e0-25007501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fec5f258dee6_36306473',
  'variables' => 
  array (
    'URL1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fec5f258dee6_36306473')) {function content_54fec5f258dee6_36306473($_smarty_tpl) {?><html>
<head>
	<title>bian</title>
	<meta charset="utf-8" />
	<?php echo '<script'; ?>
 src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
	   /*
		*PHP ajax json交互操作
		*
		*/
		function demo(){
			var params = $("input").serialize(); 
			var values1=testAsync(params);
			//alert(params);
			//alert(values1.password);
			var backdata = "您提交的姓名为：" + values1.name +  
			"<br /> 您提交的密码为：" + values1.password;  
			$("#backdata").html(backdata);  
			$("#backdata").css({color: "red"});
		}



		function testAsync(aValue) {
		    //定义一个全局变量来接受$post的返回值
		    var result;
		    //用ajax的“同步方式”调用一般处理程序
		    $.ajax({
		        url: "<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/example/ajax/format/json",
		        //url: "/project/CI/index.php/example/perfdata/format/json",
		        async: false,//改为同步方式
		        type: "post",
		        data:aValue,
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
