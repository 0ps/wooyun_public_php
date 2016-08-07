<?php
namespace Home\Controller;
use Think\Controller;
class ShowController extends Controller {
    public function index($id=''){
    	$id = I('get.id');
    	$data = M('www')->where("wooyun_id = '%s'",$id)->select();
    	$this -> assign('data', $data);
    	$this -> display();
    }
}