<?php 
namespace Home\Model;
use Think\Model\ViewModel;
class DropsViewModel extends ViewModel {
   public $viewFields = array(//展示默认文章的视图模型
     'drops'=>array('id','title','detail','writetime','poster'),
   );
 }
?>