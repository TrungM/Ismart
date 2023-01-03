<?php
function list_order(){
      
          
          $sql=db_fetch_array("SELECT * FROM `tb_order` ");


          foreach ($sql as &$item){
 $item["delete"] = "?mod=order&controller=index&action=deleteOrder&order_code=$item[order_code]&order_id=$item[order_id]";

          }

          return $sql;
}

function deleteOrder( $order_code){
          $sql=db_delete("tb_order_detail","order_code='$order_code'");
          $sql=db_delete("tb_order","order_code='$order_code'");



          return $sql ;
}

function detail_order($order_code){
          $sql=db_fetch_array("SELECT * FROM `tb_order_detail` WHERE `order_code`='$order_code'");
          return $sql;
}

function detail_shipping($order_code){
          $sql=db_fetch_array("SELECT  `tb_order`. * , `tb_shipping`. * FROM `tb_order` JOIN   `tb_shipping`  ON `tb_order`.`shipping_id` = `tb_shipping`.`shipping_id` WHERE `order_code`='$order_code' ");
          return $sql;

}

function list_order_total($order_code){
          $sql=db_fetch_row("SELECT `order_total`FROM `tb_order` WHERE `order_code`='$order_code'");
          return $sql;
}
function number_order_total($order_code){
          $result=[];
          $sql=db_fetch_array("SELECT `product_qty` FROM `tb_order_detail` WHERE `order_code`='$order_code'");

          foreach ($sql as $key=>$item){
                    $result[]=$item["product_qty"];

          }
          return  array_sum( $result);
}

function district($district){
          $sql=db_fetch_row("SELECT * FROM `tb_district` WHERE `maqh`='$district'");
          return $sql["name"];
}


function province($province){
          $sql=db_fetch_row("SELECT * FROM `tb_province` WHERE `matp`='$province'");
          return $sql["name"];
}
function ward($ward){
          $sql=db_fetch_row("SELECT * FROM `tb_wards` WHERE `xaid`='$ward'");
          return $sql["name"];
}

function update_status($order_code,$data){

          $sql=db_update("tb_order",$data,"order_code='{$order_code}'");

          return $sql;
}


function status($order_code){

          $sql=db_fetch_row("SELECT * FROM `tb_order` WHERE `order_code`='{$order_code}'");
          return $sql["order_status"];
}
?>