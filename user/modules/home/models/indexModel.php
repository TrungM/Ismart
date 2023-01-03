<?php
function list_cat_active(){
      $sql=db_fetch_array("SELECT  * FROM `tb_category`  WHERE `active`='0' ");

      return $sql;

}
  function list_cat_child($item){

          $sql=db_fetch_array("SELECT * FROM `tb_category` WHERE NOT `active`='0' AND `active`='$item'");
    
          return $sql;
    
    };
    function check_cat($item){

          $sql=db_num_rows("SELECT * FROM `tb_category` WHERE  `active`='$item'");
    if($sql>0){

          return true;
}
          return false;
    
    };


function array_cat_title_main(){
      $result=[];

      $sql=db_fetch_array("SELECT `cat_title_main` FROM `tb_product`  ");

      foreach( $sql as $item){
            $result[] =$item["cat_title_main"];

      }

      
      return $result;
}


function list_product(){
      $sql= db_fetch_array( "SELECT *FROM `tb_product`");

      foreach ($sql as &$item){
            $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
            $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
            $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";


      }
 return $sql;
}