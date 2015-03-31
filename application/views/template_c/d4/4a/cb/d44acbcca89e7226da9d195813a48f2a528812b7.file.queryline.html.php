<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-10 08:19:05
         compiled from "application\views\index\queryline.html" */ ?>
<?php /*%%SmartyHeaderCode:2581354fe8ae03670c2-40578659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd44acbcca89e7226da9d195813a48f2a528812b7' => 
    array (
      0 => 'application\\views\\index\\queryline.html',
      1 => 1425971943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2581354fe8ae03670c2-40578659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fe8ae0392042_96042453',
  'variables' => 
  array (
    'URL1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fe8ae0392042_96042453')) {function content_54fe8ae0392042_96042453($_smarty_tpl) {?><html>
<head>
	<title>bian</title>
	<meta charset="utf-8" />
	<?php echo '<script'; ?>
 src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript">
		function check(){
			var aData=testAsync();
			if(aData.login==1){
				$('#message').css({display:'block'});
				$('.error').html('用户名存在');				

			}
		}

		function testAsync() {
		    //定义一个全局变量来接受$post的返回值
		    var result;
		    //用ajax的“同步方式”调用一般处理程序
		    $.ajax({
		        url: "<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/example/perfdata/format/json",
		        //url: "/project/CI/index.php/example/perfdata/format/json",
		        async: false,//改为同步方式
		        type: "post",
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
	
<h1>ajax异步调用演示</h1>


	<button  type="button" onclick="check()">异步调用</button>
    <div id="message" style="display:none">
    <p class="error"></p>


</body>
</html>


<?php }} ?>
