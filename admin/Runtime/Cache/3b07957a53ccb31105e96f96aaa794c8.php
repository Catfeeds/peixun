<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo eyooC('SHOP_NAME');?>管理系统 </title>
<script>
//重载窗口
function resetwindow()
{
	if(top.location != self.location)
	{
		top.location.href = self.location.href;
		return
	}
}
resetwindow();
</script>
<FRAMESET FRAMEBORDER=10 framespacing=0 border=0 rows="60, *,32">
<FRAME SRC="<?php echo u('Index/top');?>" name="top" FRAMEBORDER=0 NORESIZE SCROLLING='no' marginwidth=0 marginheight=0>
<FRAMESET FRAMEBORDER=0  framespacing=0 border=0 cols="200,7, *" id="frame-body">
	<FRAME SRC="<?php echo u('Index/menu');?>" FRAMEBORDER=0 id="menu-frame" name="menu">
    <frame src="<?php echo u('Index/drag');?>" id="drag-frame" name="drag-frame" frameborder="no" scrolling="no">
	<FRAME SRC="<?php echo u('Index/main');?>" FRAMEBORDER=0 id="main-frame" name="main">
</FRAMESET>
<FRAME SRC="<?php echo u('Index/footer');?>" name="footer" FRAMEBORDER=0 NORESIZE SCROLLING='no' marginwidth=0 marginheight=0>
</FRAMESET><noframes></noframes>
</html>