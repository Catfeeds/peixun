<?php  if (! defined ( 'THINK_PATH' )) exit (); require './global/common.php'; function getTabeSize($a, $b) { return byte_format ( $a + $b ); } function byte_format($size, $dec = 2) { $a = array ("B", "KB", "MB", "GB", "TB", "PB" ); $pos = 0; while ( $size >= 1024 ) { $size /= 1024; $pos ++; } return round ( $size, $dec ) . " " . $a [$pos]; } function num_format($total){ return number_format($total); } function utf_substr($str,$len,$endString=""){ for($i=0;$i<$len;$i++){ $temp_str=substr($str,0,1); if(ord($temp_str) > 127){ $i++; if($i<$len){ $new_str[]=substr($str,0,3); $str=substr($str,3); } }else{ $new_str[]=substr($str,0,1); $str=substr($str,1); } } return join($new_str).$endString; } function sysConfL($key) { if (preg_match ( "/TITLE_DEFAULT_LANG_/", $key, $res )) { $key = str_replace ( "TITLE_DEFAULT_LANG_", "", $key ); return $key; } return L ( $key ); } function get_client_ip() { if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" )) $ip = getenv ( "HTTP_CLIENT_IP" ); else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" )) $ip = getenv ( "HTTP_X_FORWARDED_FOR" ); else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" )) $ip = getenv ( "REMOTE_ADDR" ); else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" )) $ip = $_SERVER ['REMOTE_ADDR']; else $ip = "unknown"; return ($ip); } function cmssavecache($name = '', $fields = '') { $Model = D ( $name ); $list = $Model->select (); $data = array (); foreach ( $list as $key => $val ) { if (empty ( $fields )) { $data [$val [$Model->getPk ()]] = $val; } else { if (is_string ( $fields )) { $fields = explode ( ',', $fields ); } if (count ( $fields ) == 1) { $data [$val [$Model->getPk ()]] = $val [$fields [0]]; } else { foreach ( $fields as $field ) { $data [$val [$Model->getPk ()]] [] = $val [$field]; } } } } $savefile = cmsgetcache ( $name ); $content = "<?php\nreturn " . var_export ( array_change_key_case ( $data, CASE_UPPER ), true ) . ";\n?>"; file_put_contents ( $savefile, $content ); } function cmsgetcache($name = '') { return DATA_PATH . '~' . strtolower ( $name ) . '.php'; } function getStatus($status, $imageShow = true) { switch ($status) { case 0 : $showText = L ( "FORBID" ); $showImg = '<IMG SRC="' . APP_TMPL_PATH . '/ThemeFiles/Images/locked.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="' . L ( "FORBID" ) . '">'; break; case 1 : $showText = L ( "NORMAL" ); $showImg = '<IMG SRC="' . APP_TMPL_PATH . '/ThemeFiles/Images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="' . L ( "NORMAL" ) . '">'; break; } return ($imageShow === true) ? $showImg : $showText; } function getMailStatus($status) { switch ($status) { case 0 : $showText = L ( "MAIL_STATUS_0" ); break; case 1 : $showText = L ( "MAIL_STATUS_1" ); break; } return $showText; } function getDefaultStyle($style) { if (empty ( $style )) { return 'blue'; } else { return $style; } } function IP($ip = '', $file = 'UTFWry.dat') { $_ip = array (); if (isset ( $_ip [$ip] )) { return $_ip [$ip]; } else { import ( "ORG.Net.IpLocation" ); $iplocation = new IpLocation ( $file ); $location = $iplocation->getlocation ( $ip ); $_ip [$ip] = $location ['country'] . $location ['area']; } return $_ip [$ip]; } function getNodeName($id) { if (Session::is_set ( 'nodeNameList' )) { $name = Session::get ( 'nodeNameList' ); return $name [$id]; } $Group = D ( "Node" ); $list = $Group->getField ( 'id,name' ); $name = $list [$id]; Session::set ( 'nodeNameList', $list ); return $name; } function showStatus($status, $id) { switch ($status) { case 0 : $info = '<a href="javascript:resume(' . $id . ')">' . L ( "RESUME" ) . '</a>'; break; case 2 : $info = '<a href="javascript:pass(' . $id . ')">' . L ( "PASS" ) . '</a>'; break; case 1 : $info = '<a href="javascript:forbid(' . $id . ')">' . L ( "FORBID" ) . '</a>'; break; case - 1 : $info = '<a href="javascript:recycle(' . $id . ')">' . L ( "RECYCLE" ) . '</a>'; break; } return $info; } function showStatusPayment($status, $id) { if (M ( "Payment" )->where ( "id=" . $id )->getField ( "class_name" ) != "Cod") { switch ($status) { case 0 : $info = '<a href="javascript:resume(' . $id . ')">' . L ( "RESUME" ) . '</a>'; break; case 1 : $info = '<a href="javascript:forbid(' . $id . ')">' . L ( "FORBID" ) . '</a>'; break; } return $info; } else return ''; } function showStatusJq($status, $id) { switch ($status) { case 0 : $info = '<a href="javascript:resumeJq(' . $id . ')">' . L ( "RESUME" ) . '</a>'; break; case 2 : $info = '<a href="javascript:passJq(' . $id . ')">' . L ( "PASS" ) . '</a>'; break; case 1 : $info = '<a href="javascript:forbidJq(' . $id . ')">' . L ( "FORBID" ) . '</a>'; break; case - 1 : $info = '<a href="javascript:recycleJq(' . $id . ')">' . L ( "RECYCLE" ) . '</a>'; break; } return $info; } function build_verify($length = 4, $mode = 1) { return rand_string ( $length, $mode ); } function sort_by($array, $keyname = null, $sortby = 'asc') { $myarray = $inarray = array (); foreach ( $array as $i => $befree ) { $myarray [$i] = $array [$i] [$keyname]; } switch ($sortby) { case 'asc' : asort ( $myarray ); break; case 'desc' : case 'arsort' : arsort ( $myarray ); break; case 'natcasesor' : natcasesort ( $myarray ); break; } foreach ( $myarray as $key => $befree ) { $inarray [] = $array [$key]; } return $inarray; } function rand_string($len = 6, $type = '', $addChars = '') { $str = ''; switch ($type) { case 0 : $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars; break; case 1 : $chars = str_repeat ( '0123456789', 3 ); break; case 2 : $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . $addChars; break; case 3 : $chars = 'abcdefghijklmnopqrstuvwxyz' . $addChars; break; default : $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars; break; } if ($len > 10) { $chars = $type == 1 ? str_repeat ( $chars, $len ) : str_repeat ( $chars, 5 ); } if ($type != 4) { $chars = str_shuffle ( $chars ); $str = substr ( $chars, 0, $len ); } else { for($i = 0; $i < $len; $i ++) { $str .= msubstr ( $chars, floor ( mt_rand ( 0, mb_strlen ( $chars, 'utf-8' ) - 1 ) ), 1 ); } } return $str; } function pwdHash($password, $type = 'md5') { return md5 ( $password ); } function checkUrl($url) { if (strtolower ( substr ( $url, 0, 7 ) ) == "http://") return TRUE; else return false; } function gtZero($id) { return $id > 0; } function genGoodsSn($sn) { if ($sn) { return $sn; } else { return eyooC ( "SN_PREFIX" ) . toDate ( 'ymdhis', gmtTime () ); } } function localStrToTime($str) { $timezone = intval ( eyooC ( 'TIME_ZONE' ) ); $time = strtotime ( $str ) - $timezone * 3600; return $time; } function localStrToTimeMax($str) { if ($str != '') { $str = date ( "Y-m-d H:i:s", strtotime ( $str ) ); return localStrToTime ( $str ); } else { return 0; } } function localStrToTimeMin($str) { if ($str != '') { $str = date ( "Y-m-d H:i:s", strtotime ( $str ) ); return localStrToTime ( $str ); } else { return 0; } } function datediff ($interval, $date1,$date2) { $timedifference = $date2 - $date1; switch ($interval) { case "w": $retval = bcdiv($timedifference ,604800); break; case "d": $retval = bcdiv( $timedifference,86400); break; case "h": $retval = bcdiv ($timedifference,3600); break; case "n": $retval = bcdiv( $timedifference,60); break; case "s": $retval = $timedifference; break; } return $retval; } function timeToLocalStr($time, $format = 'Y-m-d H:i:s') { return toDate ( $time, $format ); } function checkDateFormat($dateStr) { if (preg_match ( "/\b\d{4}-\d{2}-\d{2}\b/i", $dateStr ) == 1) return true; else return false; } function parseToTimeSpan($dateStr) { if ($dateStr) { $dataArr = explode ( "-", $dateStr ); return mktime ( 0, 0, 0, intval ( $dataArr [1] ), intval ( $dataArr [2] ), intval ( $dataArr [0] ) ); } else { return 0; } } function parseToTimeSpanFull($dateStr) { if ($dateStr) { $arr = explode ( " ", $dateStr ); $dataArr = explode ( "-", $arr [0] ); $timeArr = explode ( ":", $arr [1] ); return mktime ( intval ( $timeArr [0] ), intval ( $timeArr [1] ), intval ( $timeArr [2] ), intval ( $dataArr [1] ), intval ( $dataArr [2] ), intval ( $dataArr [0] ) ); } else { return 0; } } function priceFormat($num) { return eyooC ( "BASE_CURRENCY_UNIT" ) . number_format ( round ( $num, 2 ), 2 ); } function priceVal($num) { return str_replace ( ",", "", number_format ( round ( $num, 2 ), 2 ) ); } function getRegionName($arr) { return $arr ['name']; } function getNavType($type) { switch ($type) { case '1' : return L ( 'NAV_TYPE_1' ); case '2' : return L ( 'NAV_TYPE_2' ); case '3' : return L ( 'NAV_TYPE_3' ); } } function getLinkType($type) { switch ($type) { case '1' : return L ( 'LINK_TYPE_1' ); case '2' : return L ( 'LINK_TYPE_2' ); case '0' : return L ( 'LINK_TYPE_0' ); } } function getLogResult($rs) { if ($rs == 1) return L ( 'LOG_SUCCESS' ); else return L ( 'LOG_FAILED' ); } function getLang($var) { return L ( "LOG_" . $var ); } function getAuthType($type) { switch ($type) { case '1' : return L ( 'AUTH_TYPE_1' ); case '2' : return L ( 'AUTH_TYPE_2' ); case '0' : return L ( 'AUTH_TYPE_0' ); } } function getNode($arr, $field) { if ($field == "auth_type") { return getAuthType ( $arr [$field] ); } else return $arr [$field]; } function getAdvType($type) { switch ($type) { case '1' : return L ( 'ADV_TYPE_1' ); case '2' : return L ( 'ADV_TYPE_2' ); case '3' : return L ( 'ADV_TYPE_3' ); } } function getUserName($user_id) { if (D ( "User" )->where ( "id=" . $user_id )->getField ( "email" )) { return D ( "User" )->where ( "id=" . $user_id )->getField ( "email" ); } else { return L ( "NO_USER" ); } } function getMobile($user_id) { if (D ( "User" )->where ( "id=" . $user_id )->getField ( "mobile" )) { return D ( "User" )->where ( "id=" . $user_id )->getField ( "mobile" ); } else { return '联系方式保密'; } } function getRUserName($user_id) { if (D ( "User" )->where ( "id=" . $user_id )->getField ( "user_name" )) { return D ( "User" )->where ( "id=" . $user_id )->getField ( "user_name" ); } } function check_mail($mail) { if (! preg_match ( "/\w+@\w+\.\w{2,}\b/", $mail )) { return false; } else { return true; } } function check_time($timestr) { if (preg_match ( "/\d{4}-\d{1,2}-\d{1,2} \d{1,2}:\d{1,2}:\d{1,2}/", $timestr )) { return true; } else { return false; } } function formatScore($score) { return $score . " " . L ( "SCORE_UNIT" ); } function countScore($score) { return $score * eyooC ( "SCORE_RADIO" ); } function unescape($str, $charcode = "") { $text = preg_replace_callback ( "/%u[0-9A-Za-z]{4}/", "toUtf8", $str ); if (empty ( $charcode )) { return $text; } else { return mb_convert_encoding ( $text, $charcode, "utf-8" ); } } function toUtf8($ar) { $c = ""; foreach ( $ar as $val ) { $val = intval ( substr ( $val, 2 ), 16 ); if ($val < 0x7F) { $c .= chr ( $val ); } elseif ($val < 0x800) { $c .= chr ( 0xC0 | ($val / 64) ); $c .= chr ( 0x80 | ($val % 64) ); } else { $c .= chr ( 0xE0 | (($val / 64) / 64) ); $c .= chr ( 0x80 | (($val / 64) % 64) ); $c .= chr ( 0x80 | ($val % 64) ); } } return $c; } function getAdmName($id) { return M ( "Admin" )->where ( "id=" . $id )->getField ( "adm_name" ); } function getHiddenBox($id) { return $id . "<input type='hidden' name='hiddenid[]' value='" . $id . "' />"; } function formatPrice($price, $radio) { $price = round ( floatval ( $price ), 2 ); $price = eyooC ( "BASE_CURRENCY_UNIT" ) . $price; return $price; } function formatWeight($weight, $goods_id) { $weight_id = D ( "Goods" )->where ( "id=" . $goods_id )->getField ( "weight_unit" ); $weight_item = M ( "Weight" )->getById ( $weight_id ); $weight = round ( $weight / $weight_item ['radio'], 4 ); return $weight . " " . $weight_item ['name_' . FANWE_LANG_ID]; } function formatDiscount($counts, $rate) { $a=$counts*$rate; $b =$a/100; $b=round($b); return $b; } function checkArticleUName($uname) { $id = intval ( $_REQUEST ['id'] ); if (M ( "Article" )->where ( "u_name='" . $uname . "' and id <> $id" )->count () == 0) { return true; } else return false; } function get_role_name($id) { $admin = M ( "Admin" )->getById ( $id ); if ($admin ['adm_name'] == eyooC ( "SYS_ADMIN" )) { return "<span style='color:#f30;'>默认管理员</span>"; } else return M ( "Role" )->where ( "id=" . $admin ['role_id'] )->getField ( "name" ); } function getComImg($id){ $PicGallery =D("PicGallery"); $pgmap['pic_id']=$id; $pgmap['model']='Company'; $pic =$PicGallery->where($pgmap)->order('is_default desc')->find(); if($pic!=false){ return 's_'.$pic['images']; }else{ return 'default.gif'; } } function getSuppliersCateName($cate_id) { return M ( "SuppliersCate" )->where ( "id=" . $cate_id )->getField ( "name" ); } function getIsPaid($is_paid) { if ($is_paid == 0) return "未支付"; if ($is_paid == 1) return "已支付"; } function getPid($id) { $RegionConf = D ( "RegionConf" ); $regWhere ["id"] = $id; $regionConf = $RegionConf->where ( $regWhere )->find (); return $regionConf ["pid"]; } function getCityNames($id) { $RegionConf = D ( "RegionConf" ); $regWhere ["id"] = $id; $regionConf = $RegionConf->where ( $regWhere )->find (); return $regionConf ["name"]; } function getHuxing($id) { $RegionConf = D ( "Category" ); $regWhere ["id"] = $id; $regionConf = $RegionConf->where ( $regWhere )->find (); return $regionConf ["name_1"]; } function getShequImg($id){ $CateGallery=D("CateGallery"); $catemap['pic_id']=$id; $catemap['model']='Shequ'; $res =$CateGallery->where($catemap)->find(); if($res){ return '__PUBLIC__/upload/shequ/'.$res['images']; }else{ return '__PUBLIC__/images/subpic1.jpg'; } } function getHxImg($id){ $CateGallery=D("CateGallery"); $catemap['pic_id']=$id; $catemap['model']='Huxing'; $res =$CateGallery->where($catemap)->find(); if($res){ return '__PUBLIC__/upload/huxing/m_'.$res['images']; }else{ return '__PUBLIC__/images/subpic2.jpg'; } } function getMember($id){ $name = D('User'); $data['id'] = $id; $list = $name->where($data)->find(); if($list){ return $list['user_name']; }else{ return '游客'; } } function getCateName($id){ $name = D('Article_cate'); $data['id'] = $id; $list = $name->where($data)->find(); if($list){ return $list['name_1']; } } function getCatePic($id){ $CateGallery=D("CateGallery"); $catePic =$CateGallery->where('pic_id='.$id)->find(); return $catePic['images']; } function getCaseCount($id){ $Case =D("Case"); $casemap['cate_pid']=$id; $counts=$Case->where($casemap)->count('id'); if($counts==0) return 10; else return $counts; } function getCasePic($id){ $CateGallery=D("PicGallery"); $picmaps['pic_id']=$id; $picmaps['model']='Case'; $catePic =$CateGallery->where($picmaps)->find(); return $catePic['images']; } function getDMember($id){ $name = D('User'); $data['id'] = $id; $list = $name->where($data)->find(); if($list){ return $list['user_name']; }else{ return '匿名'; } } function getUserFace($uid,$size='m'){ $name = D('User'); $data['id'] = $uid; $list = $name->where($data)->find(); if(!empty($list['avator'])){ return $list['avator']; }else{ return 'default.jpg'; } } function friendlyTime($sTime,$type = 'normal',$alt = 'false') { $cTime = time(); $dTime = $cTime - $sTime; $dDay = intval(date("Ymd",$cTime)) - intval(date("Ymd",$sTime)); $dYear = intval(date("Y",$cTime)) - intval(date("Y",$sTime)); if($type=='normal'){ if( $dTime < 60 ){ echo $dTime."秒前"; }elseif( $dTime < 3600 ){ echo intval($dTime/60)."分钟前"; }elseif( $dTime >= 3600 && $dDay == 0 ){ echo intval($dTime/3600)."小时前"; }elseif($dYear==0){ echo date("m月d日",$sTime); }else{ echo date("m月d日",$sTime); } }elseif($type=='full'){ echo date("m月d日 , H:i",$sTime); } } function t($text, $parse_br = false, $quote_style = ENT_NOQUOTES) { if (is_numeric($text)) $text = (string)$text; if (!is_string($text)) return null; if (!$parse_br) { $text = str_replace(array("\r","\n","\t"), ' ', $text); } else { $text = nl2br($text); } $text = htmlspecialchars($text, $quote_style, 'UTF-8'); return $text; } function getCasechild($id){ $Case =D("Case"); $casemap['cate_id']=$id; $casemap['status']=1; $caselist =$Case ->where($casemap)->order('is_top desc,id desc')->limit('4')->select(); return $caselist; } function getCasechilds($id){ $Case =D("Case"); $casemap['cate_id']=$id; $casemap['status']=1; $caselist =$Case ->where($casemap)->order('is_top desc,id desc')->select(); return $caselist; } function getCaseT($id){ $Case =D("Case"); $casemap['cate_id']=$id; $casemap['status']=1; $caselist =$Case ->where($casemap)->count('id'); if($caselist>4){ return '0'; }else{ return '1'; } } function getDesignCase($id){ $Case =D("Case"); $casemap['desinger_id']=$id; $casemap['status']=1; $counts =$Case ->where($casemap)->count('id'); if($counts>0){ return $counts; }else{ return '1'; } } function addFeed($uid,$gid,$model,$state_des,$content){ $Feed =D("Feed"); $data['uid'] =$_SESSION['uid']; $data['gid'] =$gid; $data['model'] =$model; $data['state_des'] =$state_des; $data['content'] =$content; $data['create_time'] =time(); $Feed->add($data); } function sendMail($address,$subject,$body) { import('@.ORG.phpmailer'); $mail = new PHPMailer(); $mail->IsSMTP(); $mail->Host = 'smtp.qq.com'; $mail->SMTPAuth = true; $mail->Username = 'admin@17jincai.com'; $mail->Password ='admin.0408'; $mail->From = 'admin@17jincai.com'; $mail->FromName = '精采网'; $mail->AddAddress($address, ''); $mail->IsHTML(true); $mail->Subject = $subject; $mail->Body = $body; $result = $mail->Send(); return $result; } function htc($content) { $content = str_replace('./Public/upload/kind/',"/Public/upload/kind/",$content); return $content; } function htmlCv($string) { $pattern = array('/(javascript|prop|jscript|js|vbscript|vbs|about):/i','/on(mouse|exit|error|click|dblclick|key|load|unload|change|move|submit|reset|cut|copy|select|start|stop)/i','/<script([^>]*)>/i','/<iframe([^>]*)>/i','/<frame([^>]*)>/i','/<link([^>]*)>/i','/@import/i'); $replace = array('','','&lt;script${1}&gt;','&lt;iframe${1}&gt;','&lt;frame${1}&gt;','&lt;link${1}&gt;','',''); $string = preg_replace($pattern, $replace, $string); $string = str_replace(array('</script>', '</iframe>', '&#'), array('&lt;/script&gt;', '&lt;/iframe&gt;', '&amp;#'), $string); return stripslashes($string); } function getDesinger($id){ $Desinger =D("Designer"); $comp=$Desinger->getById($id); return $comp['name_1']; } function getUname($id){ if($id>0){ $user =D("User")->getById($id); $uname=$user['user_name']; }else{ $uname="游客"; } return $uname; } function getAttentionType($model){ switch ($model) { case 'shequ' : return '收藏社区'; case 'case' : return '收藏案例'; case 'design' : return '收藏设计师'; case 'news' : return '收藏热门促销'; case 'article' : return '收藏企业优惠促销'; } } function getAttentionName($id,$model){ switch ($model) { case 'shequ' : $Category=D("Category"); $catename=$Category->getById($id); return '<a href="__APP__/Shequ/'.$id.'" target="_blank">'.$catename["name_1"].'</a>'; case 'case' : $Case =D("Case"); $casename=$Case->getById($id); return '<a href="__APP__/BusinessChannel/caseshow/id/'.$casename["uid"].'_'.$id.'" target="_blank">'.$casename["name_1"].'</a>'; case 'design' : $Designer =D("Ddesigner"); $dname=$Designer->getById($id); return '<a href="__APP__/BusinessChannel/designershow/id/'.$dname["uid"].'_'.$id.'" target="_blank">'.$dname["name_1"].'</a>'; case 'news' : $News =D("News"); $dname=$News->getById($id); return '<a href="__APP__/News/'.$id.'" target="_blank">'.$dname["name_1"].'</a>'; case 'article' : $Article =D("Article"); $aname=$Article->getById($id); return '<a href="__APP__/BusinessChannel/discountshow/id/'.$aname["uid"].'_'.$id.'" target="_blank">'.$aname["name_1"].'</a>'; } } function getShequ($id) { if($id>0){ $RegionConf = D ( "Category" ); $regWhere ["id"] = $id; $regionConf = $RegionConf->where ( $regWhere )->find (); return $regionConf ["name_1"]; }else{ return '全部社区'; } } function Stringsubname($str){ if(strlen($str)<4){ return substr_replace($str,"**",2); }else{ return substr_replace($str,"***",3); } } function StringsubMobile($str){ return substr_replace($str,"****",-8,4); } function getHomeCompanys($id){ if($id==0){ return '本站'; }else{ $Company =D("Company"); $cmmp['uid']=$id; $comp=$Company->where($cmmp)->find(); return $comp['company_name']; } } function getBookType($model){ switch ($model) { case '1' : return '免费量房'; case '2' : return '免费预算'; case '3' : return '免费设计'; case '4' : return '免费预约咨询'; case '5' : return '促销活动'; } } function getPriceT($model){ switch ($model) { case '1' : return '8万以下'; case '2' : return '8-15万'; case '3' : return '15-30万'; case '4' : return '30万-100万'; case '5' : return '100万以上'; } } function getCaseName($id){ $Case =D("Case"); $case =$Case->getById($id); if($case){ return $case['name_1']; }else{ return '直接预约设计师'; } } function getCconstructionName($id){ $Case =D("Construction"); $case =$Case->getById($id); return $case['name_1']; } function getIds($tags,$tag_id){ $str = ''; for($i = 0;$i<count($tags);$i++){ $str= $str.$tags[$i][$tag_id].','; } return $strs = substr($str,0,-1); } function jiami($txt, $key = null) { if (empty ( $key )) $key = C ( 'SECURE_CODE' ); $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_"; $nh = rand ( 0, 64 ); $ch = $chars [$nh]; $mdKey = md5 ( $key . $ch ); $mdKey = substr ( $mdKey, $nh % 8, $nh % 8 + 7 ); $txt = base64_encode ( $txt ); $tmp = ''; $i = 0; $j = 0; $k = 0; for($i = 0; $i < strlen ( $txt ); $i ++) { $k = $k == strlen ( $mdKey ) ? 0 : $k; $j = ($nh + strpos ( $chars, $txt [$i] ) + ord ( $mdKey [$k ++] )) % 64; $tmp .= $chars [$j]; } return $ch . $tmp; } function jiemi($txt, $key = null) { if (empty ( $key )) $key = C ( 'SECURE_CODE' ); $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-=_"; $ch = $txt [0]; $nh = strpos ( $chars, $ch ); $mdKey = md5 ( $key . $ch ); $mdKey = substr ( $mdKey, $nh % 8, $nh % 8 + 7 ); $txt = substr ( $txt, 1 ); $tmp = ''; $i = 0; $j = 0; $k = 0; for($i = 0; $i < strlen ( $txt ); $i ++) { $k = $k == strlen ( $mdKey ) ? 0 : $k; $j = strpos ( $chars, $txt [$i] ) - $nh - ord ( $mdKey [$k ++] ); while ( $j < 0 ) $j += 64; $tmp .= $chars [$j]; } return base64_decode ( $tmp ); } function getDayNewcout(){ } function getReadStatus($id){ $ReadLog =D("ReadLog"); $rmap['announcement_id']=$id; $rmap['uid']=$_SESSION['uid']; $res =$ReadLog->where($rmap)->find(); if($res){ echo '已读'; }else{ echo '<span style="color:red">未读</span>'; } } return array ( 'app_autorun_sysaction' => true, 'app_debug' => false, 'app_domain_deploy' => false, 'app_plugin_on' => false, 'app_file_case' => true, 'app_group_depr' => '.', 'app_group_list' => '', 'app_autoload_reg' => false, 'app_autoload_path' => '@.ORG.,@.Payment.,@.Sms.,Think.Util.,,@.Lottery.', 'app_config_list' => array ( 0 => 'taglibs', 1 => 'routes', 2 => 'tags', 3 => 'htmls', 4 => 'modules', 5 => 'actions', ), 'app_multileveldomain_deploy_on' => false, 'app_multileveldomain_deploy' => array ( ), 'cookie_expire' => 3600, 'cookie_domain' => '', 'cookie_path' => '/', 'cookie_prefix' => '', 'default_app' => '@', 'default_group' => 'Home', 'default_module' => 'Index', 'default_action' => 'index', 'default_charset' => 'utf-8', 'default_timezone' => 'PRC', 'default_ajax_return' => 'JSON', 'default_theme' => 'default', 'default_lang' => 'zh-cn', 'db_type' => 'mysql', 'db_host' => 'localhost', 'db_name' => 'deli', 'db_user' => 'root', 'db_pwd' => '', 'db_port' => '3306', 'db_prefix' => 'xc_', 'db_suffix' => '', 'db_fieldtype_check' => false, 'db_fields_cache' => true, 'db_charset' => 'utf8', 'db_deploy_type' => 0, 'db_rw_separate' => false, 'data_cache_time' => -1, 'data_cache_compress' => false, 'data_cache_check' => false, 'data_cache_type' => 'File', 'data_cache_path' => './home/Runtime/Temp/', 'data_cache_subdir' => false, 'data_path_level' => 1, 'error_message' => '您浏览的页面暂时发生了错误！请稍后再试～', 'error_page' => '', 'html_cache_on' => true, 'html_cache_time' => 60, 'html_read_type' => 0, 'html_file_suffix' => '.shtml', 'lang_switch_on' => true, 'lang_auto_detect' => true, 'log_exception_record' => true, 'log_record' => false, 'log_file_size' => 2097152, 'log_record_level' => array ( 0 => 'EMERG', 1 => 'ALERT', 2 => 'CRIT', 3 => 'ERR', ), 'page_rollpage' => 5, 'page_listrows' => 20, 'session_auto_start' => true, 'show_run_time' => false, 'show_adv_time' => false, 'show_db_times' => false, 'show_cache_times' => false, 'show_use_mem' => false, 'show_page_trace' => false, 'show_error_msg' => true, 'tmpl_engine_type' => 'Think', 'tmpl_detect_theme' => false, 'tmpl_template_suffix' => '.html', 'tmpl_content_type' => 'text/html', 'tmpl_cachfile_suffix' => '.php', 'tmpl_deny_func_list' => 'echo,exit', 'tmpl_parse_string' => '', 'tmpl_l_delim' => '{', 'tmpl_r_delim' => '}', 'tmpl_var_identify' => 'array', 'tmpl_strip_space' => false, 'tmpl_cache_on' => false, 'tmpl_cache_time' => -1, 'tmpl_action_error' => 'Public:success', 'tmpl_action_success' => 'Public:success', 'tmpl_trace_file' => './ThinkPHP/Tpl/PageTrace.tpl.php', 'tmpl_exception_file' => './ThinkPHP/Tpl/ThinkException.tpl.php', 'tmpl_file_depr' => '/', 'taglib_begin' => '<', 'taglib_end' => '>', 'taglib_load' => true, 'taglib_build_in' => 'cx', 'taglib_pre_load' => '', 'tag_nested_level' => 3, 'tag_extend_parse' => '', 'token_on' => '0', 'token_name' => '_eyoo_hash__', 'token_type' => 'md5', 'url_case_insensitive' => false, 'url_router_on' => false, 'url_dispatch_on' => true, 'url_model' => 1, 'url_pathinfo_model' => 2, 'url_pathinfo_depr' => '/', 'url_html_suffix' => '.shtml', 'url_auto_redirect' => true, 'var_group' => 'g', 'var_module' => 'm', 'var_action' => 'a', 'var_router' => 'r', 'var_page' => 'p', 'var_template' => 't', 'var_language' => 'l', 'var_ajax_submit' => 'ajax', 'var_pathinfo' => 's', 'lang_conf' => array ( 'article' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', 'brief' => 'varchar(255)', ), 'page' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', 'brief' => 'varchar(255)', ), 'category' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'case' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'construction' => array ( 'name' => 'varchar(255)', ), 'news' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'designer' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'brand' => array ( 'name' => 'varchar(255)', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', 'desc' => 'varchar(255)', ), 'link' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'huxing' => array ( 'name' => 'varchar(255)', 'content' => 'text', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'article_cate' => array ( 'name' => 'varchar(255)', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'ask_cate' => array ( 'name' => 'varchar(255)', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', ), 'course_cate' => array ( 'name' => 'varchar(255)', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', 'cate_desc' => 'varchar(255)', ), 'attachment' => array ( 'name' => 'varchar(255)', ), 'goods_attr' => array ( 'attr_value' => 'varchar(255)', ), 'goods_type' => array ( 'name' => 'varchar(255)', ), 'goods_type_attr' => array ( 'name' => 'varchar(255)', 'attr_value' => 'varchar(255)', ), 'goods_cate' => array ( 'name' => 'varchar(255)', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', 'cate_desc' => 'varchar(255)', ), 'goods' => array ( 'name' => 'varchar(255)', 'seokeyword' => 'varchar(255)', 'seocontent' => 'varchar(255)', 'goods_desc' => 'text', 'brief' => 'varchar(255)', ), 'nav' => array ( 'name' => 'varchar(255)', ), 'user_group' => array ( 'name' => 'varchar(255)', ), 'payment' => array ( 'name' => 'varchar(255)', 'description' => 'varchar(255)', ), 'spec' => array ( 'spec_name' => 'varchar(255)', ), 'spec_type' => array ( 'name' => 'varchar(255)', ), 'goods_spec' => array ( 'spec_name' => 'varchar(255)', ), 'currency' => array ( 'name' => 'varchar(100)', ), 'weight' => array ( 'name' => 'varchar(100)', ), 'delivery' => array ( 'name' => 'varchar(255)', 'desc' => 'varchar(255)', ), 'promote' => array ( 'memo' => 'varchar(255)', 'card_name' => 'varchar(255)', ), 'user_money_log' => array ( 'memo' => 'varchar(255)', ), 'user_score_log' => array ( 'memo' => 'varchar(255)', ), ), 'action_404_tmpl' => 'Public:404', 'upload_file_rule' => 'uniqid', 'attachdir' => 'Public', 'attachsize' => 112097192, 'attachext' => 'jpg,gif,png', 'thumbmaxwidth' => 300, 'thumbmaxheight' => 300, 'thumbsuffix' => '_thumb', 'avatar' => 'Public/upload/Avatar/', 'imglink' => '__ROOT__/Public/Resource/images/', 'max_upload' => '3333333330', 'allow_upload_exts' => 'jpg,gif,png,bmp', 'auto_gen_image' => '2', 'avatar_size' => 80, 'secure_code' => 'SECURE17845', '_taglibs_' => array ( 'eyoo' => '@.TagLib.TagLibEyoo', ), ); ?>