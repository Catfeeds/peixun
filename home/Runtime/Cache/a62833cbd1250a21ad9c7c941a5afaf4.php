<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="360得利网" /> 
<meta name="description" content="360得利网" /> 
<link href="__PUBLIC__/css/global.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/focus.css" rel="stylesheet" type="text/css" />
<title>家居</title>
<script src="__PUBLIC__/js/jquery-1.7.1.min.js"></script> 
<!--[if IE 6]> 
<script src="__PUBLIC__/js/DD_belatedPNG.js"></script> 
<script> 
DD_belatedPNG.fix('.top_k,.top_menu li a,.top_menu,.kuang_m,.date_pre,.date_next,.kuang_f,.link_main,img'); 
</script> 
<![endif]--> 
</head>
<body>
<SCRIPT src="__PUBLIC__/js/superfish.js" type=text/javascript></SCRIPT>
<script type="text/javascript" src="__PUBLIC__/js/jquery.bgiframe.min.js"></script> 
<div class="header">
<form method="post" name="frm" id="frm" action="__APP__/Index/dosearch" >
<div class="hd_top">
	<div class="logo"><a href="__APP__/"><img src="__PUBLIC__/images/logo.png" /></a></div>
	<div class="search">
		<div class="login-top">欢迎访问警戒365网站 <a href="__APP__/Public/login">登录</a><a href="__APP__/Public/reg">注册</a></div>		
		<div class="searchBar">     
			<input onblur="if(this.value==''){this.value='请输入要查找的课程';}" class="keyin" onfocus="if(this.value=='请输入要查找的课程'){this.value='';}" value="请输入要查找的课程" name="keyword">
			<input type="submit" value="" class="subtn" />			
		</div>
	</div>
</div>
</form>   
</div>
<DIV id=toplink>
	<UL class=sf-menu>
        <LI><A href="__APP__/" >首页</A> </LI>
        <LI><A href="__APP__/exam" >认证考试</A></LI>
        <LI><A href="__APP__/sense" >意识管理</A></LI>
        <LI><A href="__APP__/Trainees" >学历研修</A></LI>
        <LI><A href="__APP__/Customize">行业定制</A></LI>
        <LI><A href="__APP__/Active" >活动专区</A> </LI>
        <LI><A href="__APP__/Hiring" >招聘专区</A> </LI>
	</UL>
</DIV>
<div class="container">
		<div class="hdp">
			<div id="banner"> 
					<div id="banner_list"> 
						<?php if(is_array($flashimg)): $i = 0; $__LIST__ = $flashimg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><a href="<?php echo ($vo["url"]); ?>" ><img src="__PUBLIC__/upload/Flashimg/<?php echo ($vo["image"]); ?>" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
					</div> 
			  </div>     
        </div>
		<div class="new_c">
			<h1><a href="__APP__"><img src="__PUBLIC__/images/more.png" /></a>行业动态</h1>
			<div class="notice">[公告] <a href=""><?php echo (utf_substr($ann_news["title"],28)); ?></a></div>
			<div class="new_cont">
            	<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): ++$i;$mod = ($i % 2 )?><p><em>2012-04-12</em><a href="__APP__/News/<?php echo ($news["id"]); ?>.shtml"><?php echo ($news["name_1"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="clear10"></div>
		<div class="adertit"><img src="__PUBLIC__/images/adert3.png" /></div>
		<div class="clear10"></div>
		<div class="newstit">
			<div class="ne_t"><a href="__APP__"><img src="__PUBLIC__/images/more.jpg" /></a>独家优惠课程</div>
		</div>
		<div class="class_div">
			<table class="cltab" border="0" cellpadding="0" cellspacing="0" width="100%">
            	<?php if(is_array($Exams)): $i = 0; $__LIST__ = $Exams;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Exams): ++$i;$mod = ($i % 2 )?><tr>
					<td width="15%" align="center"><strong>&middot; [ 认证考试 ]</strong></td>
					<td width="40%"><a href=""><?php echo (utf_substr($Exams["name_1"],28)); ?></a></td>
					<td width="10%"><em>￥<?php echo ($Exams["price"]); ?></em></td>
					<td width="15%"><span style=" text-decoration:line-through">学校价格：￥<?php echo ($Exams["yprice"]); ?></span></td>
					<td width="20%" align="center"><a href="__APP__/Booking"><img src="__PUBLIC__/images/book.jpg" /></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
		</div>
		<div class="adertit"><img src="__PUBLIC__/images/cert1.png" /></div>
		<div class="clear10"></div>
		<div class="ksclass">
			<div class="kstit">课程介绍</div>
			<div class="kstot">
				<p><a href="">CISSP</a><a href="">BS25999</a><a href="">ISO202</a></p>
				<p><a href="">CISSP</a><a href="">LA</a><a href="">IA/NA</a></p>
				<p><a href="">CISSA</a><a href="">ITIL</a></p>
				<p><a href="">COBIT</a><a href="">IOS20071</a></p>
				<p><a href="">PMP</a><a href="">IA/LA</a></p>
			</div>
		</div>
		<div class="clear10"></div>
		<div class="adertit"><img src="__PUBLIC__/images/adert2.jpg" /></div>
		<div class="clear10"></div>
		
		<div class="ksclass">
			<div class="kstit">课程介绍</div>
			<div class="cla_div">
				<h3>管理</h3>
				<div class="clas-mod">信息安全管理</div><div class="clas-mod">信息管理方法</div>
				<div class="clas-mod">考试论证</div><div class="clas-mod">测试体验价</div><div class="clas-mod">信息安全</div>
				<h3>意识</h3>
				<div class="clas-mod">信息安全管理</div><div class="clas-mod">信息管理方法</div>
				<div class="clas-mod">考试论证</div><div class="clas-mod">测试体验价</div>
			</div>
		</div>	
</div>
<div class="clear10"></div>
<div class="footer">
	<div class="foot">
		<div class="ftmodel">
			<div><img src="__PUBLIC__/images/tip4.png" /></div>
			<p><em>购物指南</em></p>
			<p><a href="">怎样购物</a></p>
			<p><a href="">会员俱乐部</a></p>
			<p><a href="">积分知道</a></p>
			<p><a href="">优惠券使用</a></p>
			<p><a href="">订单状态说明</a></p>
		</div>
		<div class="ftmodel">
			<div><img src="__PUBLIC__/images/tip5.png" /></div>
			<p><em>购物指南</em></p>
			<p><a href="">怎样购物</a></p>
			<p><a href="">会员俱乐部</a></p>
			<p><a href="">积分知道</a></p>
			<p><a href="">优惠券使用</a></p>
			<p><a href="">订单状态说明</a></p>
		</div>
		<div class="ftmodel">
			<div><img src="__PUBLIC__/images/tip6.png" /></div>
			<p><em>购物指南</em></p>
			<p><a href="">怎样购物</a></p>
			<p><a href="">会员俱乐部</a></p>
			<p><a href="">积分知道</a></p>
			<p><a href="">优惠券使用</a></p>
			<p><a href="">订单状态说明</a></p>
		</div>
		<div class="ftmodel">
			<div><img src="__PUBLIC__/images/tip7.png" /></div>
			<p><em>购物指南</em></p>
			<p><a href="">怎样购物</a></p>
			<p><a href="">会员俱乐部</a></p>
			<p><a href="">积分知道</a></p>
			<p><a href="">优惠券使用</a></p>
			<p><a href="">订单状态说明</a></p>
		</div>
		<div class="ftmodel">
			<div><img src="__PUBLIC__/images/header.png" /></div>
			<p><em>购物指南</em></p>
			<p><a href="">怎样购物</a></p>
			<p><a href="">会员俱乐部</a></p>
			<p><a href="">积分知道</a></p>
			<p><a href="">优惠券使用</a></p>
			<p><a href="">订单状态说明</a></p>
		</div>
		
		<div class="copy">Copyright © 1996 - 2010 DeDeng Corporation, All Rights Reserved</div>
	</div>
</div>
</body>
</html>