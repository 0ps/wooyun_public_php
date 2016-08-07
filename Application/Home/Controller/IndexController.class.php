<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$bugs = M('www');
		$drops = M('drops');
		$bugs_number = $bugs ->count();
		$drops_number = $drops ->count();
		$this -> assign('bugs_number',$bugs_number);
		$this -> assign('drops_number',$drops_number);
		$this -> display();
    }
    public function search($keys='',$type=''){
    	$key = I('get.key');
    	$type = I('get.type');
    	if ($type === "bugs") {//搜索功能的时候搜索特定的bugs
			$where['wybug_title'] = array('like', "%$key%");
			$where['wybug_corp'] = array('like', "%$key%");
			$where['wybug_detail'] = array('like', "%$key%");
			$where['wybug_poc'] = array('like', "%$key%");
			$where['bug_result'] = array('like', "%$key%");
			//$where['wybug_replys'] = array('like', "%$key%");
			$where['_logic'] = 'or';
			$model = M('www') -> where($where);
			$count = $model -> count();
			$Page = new \Extend\Page($count, 15);
			$show = $Page -> show();
			// 分页显示输出
			$data = $model -> limit($Page -> firstRow . ',' . $Page -> listRows) -> where($where) -> order('id DESC') -> select();
    		# code...
    		$this -> assign('data', $data);
    		$this -> assign('page', $show);
    		$this -> display('bugs');
    	}
    	elseif ($type === "drops") {//搜索功能的时候搜索特定的drops
    		$this -> display('drops');
    	}
    	else{
    		exit();
    	}
    }
    public function type($key=''){
    	$type = I('get.key');
    	$model = M('www') -> where("wybug_type = '%s'",$type);
    	$count = $model -> count();
		$Page = new \Extend\Page($count, 15);
		$show = $Page -> show();
    	$type = M('www') -> limit($Page -> firstRow . ',' . $Page -> listRows)->where("wybug_type = '%s'",$type)-> order('id DESC')->select();
    	$this -> assign('data', $type);
    	$this -> assign('page', $show);
    	$this ->display('bugs');
        }
    public function corp($key=''){
    	$type = I('get.key');
    	$model = M('www') -> where("wybug_corp = '%s'",$type);
    	$count = $model -> count();
		$Page = new \Extend\Page($count, 15);
		$show = $Page -> show();
    	$type = M('www') -> limit($Page -> firstRow . ',' . $Page -> listRows)->where("wybug_corp = '%s'",$type)-> order('id DESC')->select();
    	$this -> assign('data', $type);
    	$this -> assign('page', $show);
    	$this ->display('bugs');
        }
     public function author($key=''){
    	$type = I('get.key');
    	$model = M('www') -> where("wybug_author = '%s'",$type);
    	$count = $model -> count();
		$Page = new \Extend\Page($count, 15);
		$show = $Page -> show();
    	$type = M('www') -> limit($Page -> firstRow . ',' . $Page -> listRows)->where("wybug_author = '%s'",$type)-> order('id DESC')->select();
    	$this -> assign('data', $type);
    	$this -> assign('page', $show);
    	$this ->display('bugs');
        }
}