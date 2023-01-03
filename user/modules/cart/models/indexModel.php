<?php

function list_product($id){
      $sql= db_fetch_row( "SELECT *FROM `tb_product` WHERE `product_id`=$id");
 return $sql;
};
function list_product_all(){
      $result=[];
      $sql= db_fetch_array( "SELECT * FROM `tb_product` ");

foreach($sql as $a){
$result[]=$a["product_id"];
}
 return $result;
};


function get_product_by_id($id){
      if(in_array($id,list_product_all())){
            return list_product($id);
      }else{
            echo "Khong ton gia tri id ";
      }
}

function get_list_cart(){

      if( isset( $_SESSION["cart"]["buy"])){
                //them truong moi 
                foreach($_SESSION["cart"]['buy'] as $item){

        $_SESSION["cart"]['buy'][$item["product_id"]]=$item;
        $_SESSION["cart"]['buy'][$item["product_id"]]["delete_cart"]=
        "?mod=cart&controller=index&action=delete&product_id={$item["product_id"]}";


                };
                return  $_SESSION["cart"]['buy'];
      }

      return false;
      }

function load_cart(){
      $number_order=0;
      $total=0;
      foreach( $_SESSION["cart"]["buy"] as $item){
        $number_order+=$item["qty"];
        $total+=$item["sub_total"];
      };
      $_SESSION["cart"]["infor"]=array(
             "number_order"=>$number_order,
            "total"=>$total
      );

}

function delete_cart($id){

      if(isset($_SESSION["cart"])){
 unset( $_SESSION["cart"]["buy"][$id]);
 load_cart();
      }
      return false;
}
function delete_cart_all(){

      if(isset($_SESSION["cart"])){
 unset( $_SESSION["cart"]);
 load_cart();
      }
      return false;
}

function delete_list($id){

      if(isset($_SESSION["cart"])){
 unset( $_SESSION["cart"]["buy"][$id]);
 load_cart();
      }
      return false;
}
?>