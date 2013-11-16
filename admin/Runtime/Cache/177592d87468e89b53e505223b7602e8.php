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
var session_id = '<?php echo ($session_id); ?>';
var default_lang_id = '<?php echo ($default_lang_id); ?>';
var lang_ids = '<?php echo ($lang_ids); ?>';
var lang_names = '<?php echo ($lang_names); ?>';
var ATTR_TIPS = '<?php echo L("ATTR_TIPS");?>';
var EDIT_SUCCESS = '<?php echo L("EDIT_SUCCESS");?>';
var SELECT_SPEC_TYPE = '==<?php echo L("SELECT_SPEC_TYPE");?>==';
var GOODS_SPEC_ITEM_EXIST = '<?php echo L("GOODS_SPEC_ITEM_EXIST");?>';
var EXIST_SAME_SPEC = '<?php echo L("EXIST_SAME_SPEC");?>';
var CLOSE = '<?php echo L("CLOSE");?>';
var DEFAULT_LANG_ID = '<?php echo ($DEFAULT_LANG_ID); ?>';var lang_ids = '<?php echo ($lang_ids); ?>';
var lang_names = '<?php echo ($lang_names); ?>';
var DIY_URL = '<?php echo L("DIY_URL");?>';
</script>
<div id="main" class="main" >
<div class="content">
<div class="title"><?php echo (L("EDIT_DATA")); ?> [ <a href="<?php echo u($module_name.'/index');?>"><?php echo (L("BACK_LIST")); ?></a> ]</div>
<div id="result" class="result none"></div>
<form method='post' id="form" name="form" action="<?php echo u('Class/update');?>"  enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" width=100%>
	<tr>
		<td valign="top">
		<!-- 普通信息 -->
		<table cellpadding=0 cellspacing=0 class="dataEdit">
    	<tr>
            <td class="tRight" width="120"><?php echo (L("CLASS_NAME")); ?>：</td>
            <td class="tLeft" ><input type='text' name='name' id='' class='bLeftRequire' value='中级口译培训班'  /></td>
        </tr> 
        <tr>
            <td class="tRight">选择行业：</td>
            <td class="tLeft" >
            <select name="cate_id" class="bLeftRequire">
                <option value="0" <?php if($vo['cate_id'] == 0): ?>selected="selected"<?php endif; ?>>选择行业</option>
                <?php if(is_array($trade_list)): foreach($trade_list as $key=>$trade_list): ?><option value="<?php echo ($trade_list["id"]); ?>" <?php if($vo['tradeid'] == $trade_list['id']): ?>selected="selected"<?php endif; ?>><?php echo ($trade_list["name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="tRight">选择类型：</td>
            <td class="tLeft" >
            <select name="cate_id" class="bLeftRequire">
                <option value="0" <?php if($vo['cate_id'] == 0): ?>selected="selected"<?php endif; ?>>选择类型</option>
                <?php if(is_array($style_list)): foreach($style_list as $key=>$style_list): ?><option value="<?php echo ($style_list["id"]); ?>" <?php if($vo['styleid'] == $style_list['id']): ?>selected="selected"<?php endif; ?>><?php echo ($style_list["name"]); ?></option><?php endforeach; endif; ?>
            </select>
            </td>
        </tr>
        <tr>
            <td class="tRight" width="120">现价：</td>
            <td class="tLeft" ><input type='text' name='price' id='' class='bLeftRequire' value='2000'  /></td>
        </tr> 
        <tr>
            <td class="tRight" width="120">原价：</td>
            <td class="tLeft" ><input type='text' name='yprice' id='' class='bLeftRequire' value='5000'  /></td>
        </tr>     
        <tr>
            <td class="tRight" width="120">教学目的：</td>
            <td class="tLeft" ><textarea name='mudi' id='' class='bLeftRequire' rows='' cols='' style='width:350px;height:120px;' >获得《上海市外语口译岗位资格证书》  发证单位： 上海市口译考试办公室，上海紧缺人才培训工程联席会议办公室</textarea></td>
        </tr> 
        <tr>
            <td class="tRight" width="120">教材：</td>
            <td class="tLeft" ><textarea name='book' id='' class='bLeftRequire' rows='' cols='' style='width:350px;height:120px;' >中级翻译教程，中级阅读教程，中级听力教程，中级口语教程，中级口译教程，中级口译自编资料 。</textarea></td>
        </tr> 
        <tr>
            <td class="tRight" width="120">适用对象：</td>
            <td class="tLeft" ><textarea name='objects' id='' class='bLeftRequire' rows='' cols='' style='width:350px;height:120px;' >    高中水平学员、具有大学英语四级水平尤佳。</textarea></td>
        </tr>     
        <tr>
            <td class="tRight" width="80">关键字：</td>
            <td class="tLeft" ><input type='text' name='desc' id='' class='bLeft' value='会计电算化'  /></td>
        </tr>       
		<tr>
			<td class="tRight" width="80"><?php echo (L("ARTICLE_CONTENT")); ?>：</td>
			<td class="tLeft" >
            <script type='text/javascript'>KE.show({id : 'content',cssPath : '__TMPL__ThemeFiles/Css/style.css',skinType: 'tinymce',allowFileManager : true});</script><div  style='margin-bottom:5px;widht:100%;  '><textarea id='content' name='content' style='width:700px;height:400px;visibility:hidden;' >加强听力训练，尤其是最为薄弱的听译部分和新闻听力部分的训练。 阅读强化训练段落主旨的把握能力和短问题回答能力。 翻译突出句型结构和文章题材相结合，分析英汉互译特点。 口译以句型结构出发，范围覆盖政策、经济、文化、旅游、国际合作等热门话题，让学生提高英语能力的同时，扩展知识面。1.证书含金量高：上海市紧缺人才培训工程的重点项目，具有大学英语四级和同等英语水平的考生可以报考。获得证书后可以从事一般的生活翻译，陪同翻译，外事接待，以及外贸业务洽谈等工作。 <br />
2.“航母级”师资阵容：强大的专职教师团队，人教育复旦，上外，交大等重点名校的资深兼职教师和翻译口译专家，口译考试考官，有陪同口译和交传经历，口译教学实战经验丰富，猜题命中率高。系统分析翻译、阅读、口译、听力学习要领，从听说读写四个方面，对学生的语言运用能力进行全面的培训 配以历届真题，了解考试信息，做到有的放矢 结合自编资料，理论学习与实战训练相结合</textarea> </div>
			</td>
		</tr>
		<!-- 价格体系 -->
		</table>
		<!-- 普通信息 -->
		</td>
		<td valign="top" style="padding-left:50px;">
		<!-- 图片上传块 -->
		</td>
	</tr>
</table>
<table cellpadding=0 cellspacing=0 class="dataEdit" >
<tr>
	<td></td>
	<td class="center"><div style="width:85%;margin:5px">
	<input name="click_count" value="<?php echo ($vo["click_count"]); ?>" type="hidden" />
	<input name="id" id="news_id" value="<?php echo ($vo["id"]); ?>" type="hidden" />
	<input type="submit" value="<?php echo (L("SAVE_DATA")); ?>"  class="button small"> <input type="reset" class="button small" onclick="resetEditor()" value="<?php echo (L("RESET_DATA")); ?>" > 
	</div></td>
</tr>

</table>
</form>
</div>