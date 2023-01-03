<?php

function construct() {
    load_model('index');
}

function detailAction(){
$product_id=$_GET["product_id"];
  $list_product=list_product($product_id);
  $data["list_product"]=$list_product;
  load_view("detail",$data);
}

