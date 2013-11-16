<?php
/**
 * @Link    http://www.to-serve.com
 * @author  eric yang <yangxiao242@gmail.com>
 * @time    2012-03-29
 * @Action  xxx Action
 * @copyright Copyright &copy; 2009-2010 eyoo Software LLC
 */
class ExamAction extends PublicAction{
	/*** 空操作 ***/
    public function _empty($action) {
    	if(is_numeric($action)) {
    		$id=(int)$action;

    		$Case=D("Case");
    		$list=$Case->getById($id);
    		if($list!=false){
    		    $newmap['click_count']= array('exp','click_count+1');
    		    $newmap['id']= $id;
    		    $Case ->save($newmap);
    		    $this->assign('vo', $list);
    			$this->display('read');
    		}else{
    			$this->error("非法操作！");
    		}
    	}else{
    		$this->_404('错误操作');
    	}
    }
    /*** 认证考试 ***/
    public function index(){
    	$Exam = D("Exam");
        import("@.ORG.Pages");
        $map['status']=1;

        $count = $Exam->where($map)->count('id');
        $listRows = empty ( $_REQUEST ["listRows"] ) ? 6 : $_REQUEST ["listRows"];
        $p = new Page ( $count, $listRows );
        $list = $Exam->where($map)->limit($p->firstRow . ',' . $p->listRows)->order('is_top desc,id desc')->select();

        $this->assign('list',$list);
        $page = $p->show ();
        $this->assign('page',$page);

        //考试日历
        $Article=D("News");
        $map['status'] = 1;
        $map['cate_id'] = 9;  //最新资料
        $newslist = $Article->where($map)->limit('5')->order('id desc')->select();
        $this->assign('newslist',$newslist);
        $this->assign('title','认证考试');
        $this->display();
    }
}
?>