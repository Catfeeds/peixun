<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo eyooC('SHOP_NAME');?>管理系统</title>
<link rel="stylesheet" type="text/css" href="__TMPL__ThemeFiles/Css/style.css" />
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/Base.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/prototype.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/mootools.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/common.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/Util/ImageLoader.js"></script>
<script type='text/javascript' charset='utf-8' src='__TMPL__ThemeFiles/Js/kindeditor/kindeditor.js'></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var admin_file = '<?php echo eyooC("ADMIN_FILE_NAME");?>';
var APP	 =	 '__APP__';
var PUBLIC = '__TMPL__ThemeFiles';
ThinkAjax.image = [	 '__TMPL__ThemeFiles/Images/loading2.gif', '__TMPL__ThemeFiles/Images/ok.gif','__TMPL__ThemeFiles/Images/update.gif' ]
ImageLoader.add("__TMPL__ThemeFiles/Images/bgline.gif","__TMPL__ThemeFiles/Images/bgcolor.gif","__TMPL__ThemeFiles/Images/titlebg.gif");
ImageLoader.startLoad();
var VAR_MODULE = '<?php echo c('VAR_MODULE');?>';
var VAR_ACTION = '<?php echo c('VAR_ACTION');?>';
var CURR_MODULE = '<?php echo ($module_name); ?>';
//-->
</script>
<script language="JavaScript">
//定义JS中使用的语言变量
var VIEW = '<?php echo (L("VIEW")); ?>';
var CONFIRM_DELETE = '<?php echo (L("CONFIRM_DELETE")); ?>';
var CONFIRM_DELETE_IMAGE = '<?php echo (L("CONFIRM_DELETE_IMAGE")); ?>';
var NO_SELECT = '<?php echo (L("NO_SELECT")); ?>';
var CHOOSE_RECYCLE_ITEM = '<?php echo (L("CHOOSE_RECYCLE_ITEM")); ?>';
var SELECT_EDIT_ITEM = '<?php echo (L("SELECT_EDIT_ITEM")); ?>';
var SELECT_DEL_ITEM	=	'<?php echo (L("SELECT_DEL_ITEM")); ?>';
var CONFIRM_DELETE_FILE = '<?php echo (L("CONFIRM_DELETE_FILE")); ?>';
var CONFIRM_FOREVER_DELETE = '<?php echo (L("CONFIRM_FOREVER_DELETE")); ?>';
var CONFIRM_DELETE_USER_DATA = '<?php echo (L("CONFIRM_DELETE_USER_DATA")); ?>';
var CONFIRM_RESTORE = '<?php echo (L("CONFIRM_RESTORE")); ?>';
var ATTR_PRICE	=	'<?php echo L("ATTR_PRICE");?>';
var ATTR_STOCK	=	'<?php echo L("ATTR_STOCK");?>';

//ThinkAjax.send(ROOT_PATH+'/services/ajax.php?run=autoSendMail','',doDelete);
//ThinkAjax.send(ROOT_PATH+'/services/ajax.php?run=autoSend','',doDelete);
</script>
</head>

<body onload="loadBar(0)">

<div id="loader" ><?php echo (L("PAGE_LOADING")); ?></div>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/jquery.json.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/model.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/calendar.php?lang=zh-cn" ></script>
<link rel="stylesheet" type="text/css" href="__TMPL__ThemeFiles/Js/calendar/calendar.css" />
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/swfupload/swfupload.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/swfupload/goodsupload/swfupload.queue.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/swfupload/goodsupload/fileprogress.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/swfupload/goodsupload/handlers.js"></script>
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/goods.js"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__ThemeFiles/Css/jqModal.css" />
<script type="text/javascript" src="__TMPL__ThemeFiles/Js/jqModal.js"></script>
<script type="text/javascript">
var news_id = <?php echo ($news_id); ?>;
var session_id = '<?php echo ($session_id); ?>';
var default_lang_id = '<?php echo ($default_lang_id); ?>';
var lang_ids = '<?php echo ($lang_ids); ?>';
var lang_names = '<?php echo ($lang_names); ?>';
var ATTR_TIPS = '<?php echo L("ATTR_TIPS");?>';
var MAX_UPLOAD = '<?php echo (eyooC('MAX_UPLOAD')/1000000)."MB"; ?>';
var MAX_UPLOAD_TIP = "<?php echo (L("GOODS_UPLOAD_MAX_TIP")); ?><?php echo (eyooC('MAX_UPLOAD')/1000000)."MB"; ?>";
var EDIT_SUCCESS = '<?php echo L("EDIT_SUCCESS");?>';

var GOODS_SPEC_ITEM_EXIST = '<?php echo L("GOODS_SPEC_ITEM_EXIST");?>';
var EXIST_SAME_SPEC = '<?php echo L("EXIST_SAME_SPEC");?>';
var CLOSE = '<?php echo L("CLOSE");?>';
var DEFAULT_LANG_ID = '<?php echo ($DEFAULT_LANG_ID); ?>';
var SELECT_SPEC_TYPE = '==<?php echo L("SELECT_SPEC_TYPE");?>==';
//本页验证
var lang_ids = '<?php echo ($lang_ids); ?>';
var lang_names = '<?php echo ($lang_names); ?>';
var DIY_URL = '<?php echo L("DIY_URL");?>';
</script>


<div id="main" class="main" >
<div class="content">
<div class="title"><?php echo (L("ADD_DATA")); ?> [ <a href="<?php echo u($module_name.'/index');?>"><?php echo (L("BACK_LIST")); ?></a> ]</div>
<div id="result" class="result none"></div>
<form method='post' id="form" name="form" action="<?php echo u('News/insert');?>"  enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" width=100% >
	<tr>
		<td valign="top">
		<!-- 普通信息 -->
		<table cellpadding=0 cellspacing=0 class="dataEdit">
		
		<tr>
			<td class="tRight" width="120"><?php echo (L("ARTICLE_NAME")); ?>：</td>
			<td class="tLeft" >
				<div  style='margin-bottom:5px; '><input type='text' name='name_1' id='_1' class='bLeftRequire' value='' /> </div>
			</td>
		</tr>
        
        <tr>
	<td class="tRight"><?php echo (L("ARTICLE_CATE")); ?>：</td>
	<td class="tLeft" >
		<select name="cate_id" class="bLeftRequire">
		<option value="0"><?php echo (L("NO_CATE_SELECT")); ?></option>
		<?php if(is_array($cate_list)): foreach($cate_list as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>"><?php echo ($cate_item[$select_dispname]); ?></option><?php endforeach; endif; ?>
		</select>
	</td>
</tr>
		<tr>
			<td class="tRight" width="120">作者</td>
			<td class="tLeft" >
				<input type='text' name='author' id='' class='bLeftRequire' value=''  />
			</td>
		</tr>

		<tr>
			<td class="tRight" width="120">URL别名：</td>
			<td class="tLeft" >
				<input type='text' name='u_name' id='' class='bLeft' value=''  />
			</td>
		</tr>

        <tr>
	<td class="tRight"><?php echo (L("ARTICLE_REF_LINK")); ?>：</td>
	<td class="tLeft" >
		<input type="text" name="ref_link" class="bLeft" />
	</td>
</tr>
<tr>
	<td class="tRight" ><?php echo (L("SORT")); ?>：</td>
	<td class="tLeft" >
		<input type="text" name="sort" class="bLeft" value="<?php echo ($new_sort); ?>" />
	</td>
</tr>

<tr>
	<td class="tRight" width="80"><?php echo (L("SEO_KEYWORD")); ?>：</td>
	<td class="tLeft" >
		<div style='margin-bottom:5px; '><textarea name='seokeyword_1' id='_1' class='bLeft' rows='2' cols='50' ></textarea> </div>
	</td>
</tr>
<tr>
	<td class="tRight" width="80"><?php echo (L("SEO_CONTENT")); ?>：</td>
	<td class="tLeft" >
		<div style='margin-bottom:5px; '><textarea name='seocontent_1' id='_1' class='bLeft' rows='2' cols='50' ></textarea> </div>
	</td>
</tr>
<tr>
	<td class="tRight">相关图片：</td>
	<td class="tLeft" >
		<input type="file" name="image" class="bLeft" />
	</td>
</tr>
<tr>
	<td class="tRight" width="80">文章简介：</td>
	<td class="tLeft" >
				<textarea name='brief_1' id='' class='bLeft' rows='' cols='' style='width:650px;height:200px;' ></textarea>
	</td>
</tr>

<tr>
	<td class="tRight"><?php echo (L("ARTICLE_CONTENT")); ?>：</td>
	<td class="tLeft" >
		<script type='text/javascript'>KE.show({id : 'content_1',cssPath : '__TMPL__ThemeFiles/Css/style.css',skinType: 'tinymce',allowFileManager : true});</script><div  style='margin-bottom:5px;widht:100% '><textarea id='content_1' name='content_1' style='width:700px;height:400px;visibility:hidden;' ></textarea> </div>
	</td>
</tr>
<!--
<tr>
	<td class="tRight">英文<?php echo (L("ARTICLE_CONTENT")); ?>：</td>
	<td class="tLeft" >
		<script type='text/javascript'>KE.show({id : '_editor',cssPath : '__TMPL__ThemeFiles/Css/style.css',skinType: 'tinymce',allowFileManager : true});</script><div  style='margin-bottom:5px;widht:100%;  '><textarea id='_editor' name='encontent_1' style='width:650px;height:200px;visibility:hidden;' ></textarea> </div>
	</td>
</tr>-->		
		<!-- 价格体系 -->
		</table>
		<!-- 普通信息 -->
		</td>
		<td valign="top" style="padding-left:50px;">
		<!-- 图片上传块 -->
		<script type="text/javascript">
		var settings = {
				flash_url : PUBLIC+"/Js/swfupload/swfupload.swf",
				upload_url: APP,				
				post_params: {"<?php echo C('VAR_MODULE'); ?>":"Public","<?php echo C('VAR_ACTION'); ?>":"uploadBatchNews","news_id":news_id,"session_id":session_id},
				file_size_limit : "<?php echo (eyooC('MAX_UPLOAD')/1000000)."MB"; ?>",
				file_types : "*.jpg;*.gif",
				file_types_description : "<?php echo (L("GOODS_UPLOAD_MAX_TIP")); ?><?php echo (eyooC('MAX_UPLOAD')/1000000)."MB"; ?>",
				file_upload_limit : 1000,
				file_queue_limit : 1000,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,
				button_image_url: PUBLIC+"/Images/uploadbtn.png",
				button_width: "100",
				button_height: "30",
				button_placeholder_id: "image_browse",
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	
			};
			var swfu = new SWFUpload(settings);
		</script>
		<!-- 图片上传块 -->
		</td>
	</tr>
</table>
<table cellpadding=0 cellspacing=0 class="dataEdit">
<tr>
	<td></td>
	<td class="center"><div style="width:85%;margin:5px">
    <input name="type" value="2" type="hidden" />
	<input name="click_count" value="0" type="hidden" />
    <input name="sort" value="<?php echo ($new_sort); ?>" type="hidden" />
	<input type="submit" value="<?php echo (L("SAVE_DATA")); ?>"  class="button small"> <input type="reset" class="button small" onclick="resetEditor()" value="<?php echo (L("RESET_DATA")); ?>" > 
	</div></td>
</tr>
</table>
</form>
</div>