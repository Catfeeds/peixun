<?php
/**
 * @Link    http://www.to-serve.com
 * @author  eric yang <yangxiao242@gmail.com>
 * @time    2012-03-29
 * @Action  xxx Action
 * @copyright Copyright &copy; 2009-2010 eyoo Software LLC
 */
class SenseAction extends PublicAction{
    function _initialize()  {
        $ids=explode('_',$_REQUEST['id']);
        //dump($ids);

        //企业频道右边内容
        $Company =D("Company");
        $coms =$Company->where('uid='.$ids[0])->find();
        $this->assign('coms', $coms);

        //分店地址
        $ComanyAddress =D("ComanyAddress");
        $compmap['uid']=$ids[0];
        $comaddress =$ComanyAddress->where($compmap)->order('id desc')->select();

        $this->assign('comid',$ids[0]);
        parent::_initialize();
    }
	/**
	 * 空操作
	 */
    public function index() {
        
        //案例
        $Case =D("Case");
        $casemaps['uid']=$list['uid'];
        $casemaps['status']=1;
        $count =$Case ->where($casemaps)->count('id');
        if($count<9){
            $this->assign('caseshow',1);
        }
       
		$this->display();
    }

}
?>