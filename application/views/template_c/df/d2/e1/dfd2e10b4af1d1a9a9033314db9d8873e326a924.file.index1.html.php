<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-03-18 09:17:59
         compiled from "application\views\index\index1.html" */ ?>
<?php /*%%SmartyHeaderCode:1106654fe9592e934e0-07781200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfd2e10b4af1d1a9a9033314db9d8873e326a924' => 
    array (
      0 => 'application\\views\\index\\index1.html',
      1 => 1426666676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1106654fe9592e934e0-07781200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54fe9592ed03e3_69192463',
  'variables' => 
  array (
    'URL1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54fe9592ed03e3_69192463')) {function content_54fe9592ed03e3_69192463($_smarty_tpl) {?>	<div class="page-content">
		<div class="page-header">
							<h1>
								控制台
								<small>
									<i class="icon-double-angle-right"></i>
									 查看
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>

									<i class="icon-ok green"></i>

									欢迎使用
									<strong class="green">
										管理平台
									</strong>	
								</div>
						<div>
							<a  class="btn btn-app btn-success no-radius" href="<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/welcome/mutilviewload"><i class="icon-twitter bigger-180"></i>redis 监控图</a>
							<a  class="btn btn-app btn-primary no-radius" href="<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/welcome/line">
								<i class="icon-comments bigger-180"></i>性能监控图</a>
							<a  class="btn btn-app btn-info" href="<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/welcome/redirect"><i class="icon-refresh bigger-180"></i>重定向</a>
							<a  class="btn btn-app btn-warning" href="<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/welcome/redirect1"><i class="icon-spinner icon-spin orange bigger-180"></i>重定向百度</a>
							<a  class="btn btn-app btn-pink" href="<?php echo $_smarty_tpl->tpl_vars['URL1']->value;?>
/welcome/ajax"><i class="icon-desktop icon-desktop bigger-180"></i>ajax异步调用DEMO</a>
						</div>



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->







<?php }} ?>
