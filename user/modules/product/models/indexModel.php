<?php
function list_product($id){
      $sql= db_fetch_array( "SELECT *FROM `tb_product` WHERE `product_id`=$id");


      foreach ($sql as &$item){
$item["add_cat"]="?mod=cart&controller=index&action=add_cat&product_id=$id";
      }
 return $sql;
};
function list_product_all(){
      $sql= db_fetch_array( "SELECT *FROM `tb_product` ");


//       foreach ($sql as &$item){
// $item["add_cat"]="?mod=product&controller=index&action=add_cat&product_id=$id";
//       }
 return $sql;
};



?>