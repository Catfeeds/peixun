<?php
/**
 * @Link    http://www.top-serve.com
 * @author  eric yang <yangxiao242@gmail.com>
 * @time    2012-03-09
 * @Action  Index Action
 * @copyright Copyright &copy; 2009-2012 eyoo Software LLC
 */
class IndexAction extends PublicAction{
    
    public function index(){       
		//行业动态
        $News = D("News");
		$newmap['status']=1;
		$news =$News->where($newmap)->order('create_time')->limit('8')->select();
		$this->assign('news',$news);

		//公告
        $announcement = D("Announcement");
		$ann['status']=1;
		$ann_news=$announcement->where($ann)->order('id desc')->find();
		$this->assign('ann_news',$ann_news);	

        //独家优惠课程
        $Exam = D("Exam");
        $Exams=$Exam->order('id desc')->findAll();
        //print_r($Exams);exit();
        $this->assign('Exams',$Exams);        

		//焦点图片
		$Flashimg =D("Flashimg");
		$flashimg =$Flashimg->where('status=1')->limit('5')->order('id desc')->select();
		$this->assign('flashimg',$flashimg);

        //合作伙伴
        $Brand =D("Brand");
        $brandmap['logo']=array('neq','');
        $brand =$Brand->where($brandmap)->order('sort asc,id desc')->select();

        //logo
        $brandmap1['logo']=array('eq','');
        $brand1 =$Brand->where($brandmap1)->order('sort asc,id desc')->select();
        //print_r($brand1);exit();

        //友情链接 
        $Link =D("Link");
        $linkmap['status']=1;
        $link =$Link->where($linkmap)->order('sort asc,id desc')->select();

        $this->assign('brand',$brand);
        $this->assign('brand1',$brand1);
        $this->assign('link',$link);
        $this->assign('top',$top);
        $this->assign('shequ',$shequ);
        $this->display();
    }
    public function getPassport(){
        $username =$_REQUEST['username'];
        $password =$_REQUEST['password'];
        $_SESSION['laopoUsername']=$username;
        $_SESSION['laopoPassword']=$password;       
    }
    public function dosearch(){
       $type =$_POST['type'];
       $keyword =$_POST['keyword'];
       if($type==1){
            //搜索案例
            $Article=D("Case");
            import("@.ORG.Pages");
            $map['status']=1;
            $map['name_1']=array('like','%'.$keyword.'%');
            $count = $Article->where($map)->count('id');
            $listRows = empty ( $_REQUEST ["listRows"] ) ? 6 : $_REQUEST ["listRows"];
            $p = new Page ( $count, $listRows );
            $list = $Article->where($map)->limit($p->firstRow . ',' . $p->listRows)->order('id desc')->select();

            if($list!=false){
                $this->assign('searchshow','1');
                $this->assign('keyword', $keyword);
                $this->assign('list',$list);
            }else{
                $this->assign('keyword', $keyword);
                $this->assign('searchshow','2');
            }

            $page = $p->show ();
            $this->assign('page',$page);
            //促销活动
            $Article=D("News");
            $newslist = $Article->where($map)->limit('6')->order('id desc')->select();
            //dump();
            $this->assign('newslist',$newslist);
            $this->assign('title','搜索案例');
            $this->display("Case:index");
            exit;
       }elseif($type==2){
           //搜索社区
            $Article=D("Category");
            import("@.ORG.Pages");
            $map['status']=1;
            $map['pid']=0;
            $map['name_1']=array('like','%'.$keyword.'%');
            if(!empty($_GET['hot'])){
                $order ='click_count desc,id desc';
            }else{
                $order='id desc';
            }
            $count = $Article->where($map)->count('id');
            $listRows = empty ( $_REQUEST ["listRows"] ) ? 12 : $_REQUEST ["listRows"];
            $p = new Page ( $count, $listRows );
            $list = $Article->where($map)->limit($p->firstRow . ',' . $p->listRows)->order($order)->select();
            //echo  $Article->getlastsql();
            if($list!=false){
                $this->assign('searchshow','1');
                $this->assign('keyword', $keyword);
                $this->assign('shequList',$list);
            }else{
                $this->assign('keyword', $keyword);
                $this->assign('searchshow','2');
            }
            $page = $p->show ();
            $this->assign('page',$page);

            //促销活动
            $Article =D("News");
            $article =$Article->order('is_top desc,id desc')->limit('9')->select();
            $this->assign('article', $article);
            $this->assign('title','搜索社区');
            $this->display("Shequ:index");
            exit;

       }elseif($type==3){
            $Company =D("CompanyView");
            $cmap['type']=2;
            $cmap['active']=1;
            $cmap['company_name']=array('like','%'.$keyword.'%');
            import("@.ORG.Pages");

            $count = $Company->where($cmap)->count('id');
            $listRows = empty ( $_REQUEST ["listRows"] ) ? 20 : $_REQUEST ["listRows"];
            $p = new Page ( $count, $listRows );
            $list = $Company->where($cmap)->limit($p->firstRow . ',' . $p->listRows)->order('id desc')->select();
            if($list!=false){
                $this->assign('searchshow','1');
                $this->assign('keyword', $keyword);
                $this->assign('list',$list);
            }else{
                $this->assign('keyword', $keyword);
                $this->assign('searchshow','2');
            }
            $page = $p->show ();
            $this->assign('page',$page);
            //促销活动
            $Article=D("News");
            $newslist = $Article->where($map)->limit('6')->order('id desc')->select();
            //dump();
            $this->assign('newslist',$newslist);
            $this->assign('title','搜索公司');
            $this->display("Company:showlist");
            exit;
       }elseif($type==4){
            $Article=D("News");
            import("@.ORG.Pages");
            $map['status']=1;
            $map['name_1']=array('like','%'.$keyword.'%');
            if($_GET['cid']){
                $map['cate_id']=$_GET['cid'];
            }
            $count = $Article->where($map)->count('id');
            $listRows = empty ( $_REQUEST ["listRows"] ) ? 6 : $_REQUEST ["listRows"];
            $p = new Page ( $count, $listRows );
            $list = $Article->where($map)->limit($p->firstRow . ',' . $p->listRows)->order('id desc')->select();

            if($list!=false){
                $this->assign('searchshow','1');
                $this->assign('keyword', $keyword);
                $this->assign('newsList',$list);
            }else{
                $this->assign('keyword', $keyword);
                $this->assign('searchshow','2');
            }
            $page = $p->show ();
            $this->assign('page',$page);
            $ArticleCate =D("ArticleCate");
            $catemap['status']=1;
            $cate =$ArticleCate->select();
            $this->assign('cate',$cate);

            //推荐促销活动
            $maps['is_top']=1;
            $toplist = $Article->where($maps)->limit('6')->order('id desc')->select();
            $this->assign('toplist',$toplist);

            $this->display("News:index");
            exit;
       }else{ }
    }
}
