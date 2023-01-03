<?php

function construct() {
    load_model('index');
}

function indexAction() {

$list_product=list_product();
$data["list_product"]=$list_product;

$list_cat_active=list_cat_active();
$data["list_cat_active"]=$list_cat_active;

    load_view('index',$data);
}



function searchAction(){
  $search_product=$_POST["search_product"];
  $sql= db_fetch_array("SELECT * FROM `tb_product` WHERE `product_name` LIKE '%$search_product%'");


if(!empty($sql)){
   foreach($sql as $item){

   echo   '<li class="clearfix">
  <a href="?mod=product&controller=index&action=detail&product_id='.$item["product_id"].' " title="" class="thumb fl-left">
<img src="../public/images/'.$item["product_img"].'" alt="">
      </a>
      <div class="info ">
          <a href="?mod=product&controller=index&action=detail&product_id='.$item["product_id"].' " title="" class="product-name">'.$item["product_name"].'</a>
          <p class="price">'. number_format( $item["product_price"])."đ".'</p>
      </div>

</li>';

}
}else{
   echo "<p style='color:red;text-align:center; margin-top:25px'>Không có kết quả tìm kiếm </p>";
}
}


