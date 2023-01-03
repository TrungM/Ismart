<?php
function construct(){
   load_model('index');

}
function  indexAction(){
   $title=$_GET['title'];



$paging=list_product_page($title);
$data["paging"]=$paging;




   $title_main= list_product_cat($title);
$data["title_main"]=$title_main;
$data["title"]=$title;


   load_view("category_product",$data);

}


function  arrange_price_1Action(){
   $price=$_POST['price'];
   $title=$_POST['title'];

      $sql=db_fetch_array("SELECT * FROM `tb_product`  WHERE  `product_price`  BETWEEN  0 AND  '$price'  AND  `cat_title_main`='$title' or  `cat_title_child`='$title'  ");
      foreach($sql as &$item){
         $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
         $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
         $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";

             

      }
if(!empty($sql)){
   foreach ($sql as $item){
      echo '<li>
         <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="thumb">
         <img src="../public/images/'.$item["product_img"].'">
         </a>
         <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="product-name">'.$item["product_name"] .'</a>
         <div class="price">
             <span class="new">'. number_format( $item["product_price"])."đ".'</span>
             <span class="old">20.900.000đ</span>
         </div>
         <div class="action clearfix">
             <a  href="" title="Thêm giỏ hàng" class="add-cart fl-left cart-shopping" >Thêm giỏ hàng</a>
      
            <input type="hidden" id="add_cart" value="'. $item['product_id'].'">
             <a href="'.$item['add_cart'].$item['product_id'].'" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
         </div>
      </li>  ' ;       
      }
}else{
   echo '<p style="color:red; text-align:center;   font-style: italic;">Đang cập nhật</p>';
}



}


function  arrange_price_2Action(){
   $title=$_POST['title'];

      $sql=db_fetch_array("SELECT * FROM `tb_product`  WHERE  `product_price`  BETWEEN  '5000000' AND  '20000000'  AND  `cat_title_main`='$title' or  `cat_title_child`='$title'  ");
      foreach($sql as &$item){
         $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
         $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
         $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";

             

      }

      if(!empty($sql)){
         foreach ($sql as $item){
            echo '<li>
               <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="thumb">
               <img src="../public/images/'.$item["product_img"].'">
               </a>
               <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="product-name">'.$item["product_name"] .'</a>
               <div class="price">
                   <span class="new">'. number_format( $item["product_price"])."đ".'</span>
                   <span class="old">20.900.000đ</span>
               </div>
               <div class="action clearfix">
                   <a  href="" title="Thêm giỏ hàng" class="add-cart fl-left cart-shopping" >Thêm giỏ hàng</a>
            
                  <input type="hidden" id="add_cart" value="'. $item['product_id'].'">
                   <a href="'.$item['add_cart'].$item['product_id'].'" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
               </div>
            </li>  ' ;       
            }
      }else{
         echo '<p style="color:red; text-align:center;   font-style: italic;">Đang cập nhật</p>';
      }

}


function  arrange_price_3Action(){
   $title=$_POST['title'];

      $sql=db_fetch_array("SELECT * FROM `tb_product`  WHERE  `product_price`  BETWEEN  '20000000' AND  '40000000'  AND  `cat_title_main`='$title' or  `cat_title_child`='$title'  ");
      foreach($sql as &$item){
         $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
         $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
         $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";

             

      }

      if(!empty($sql)){
         foreach ($sql as $item){
            echo '<li>
               <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="thumb">
               <img src="../public/images/'.$item["product_img"].'">
               </a>
               <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="product-name">'.$item["product_name"] .'</a>
               <div class="price">
                   <span class="new">'. number_format( $item["product_price"])."đ".'</span>
                   <span class="old">20.900.000đ</span>
               </div>
               <div class="action clearfix">
                   <a  href="" title="Thêm giỏ hàng" class="add-cart fl-left cart-shopping" >Thêm giỏ hàng</a>
            
                  <input type="hidden" id="add_cart" value="'. $item['product_id'].'">
                   <a href="'.$item['add_cart'].$item['product_id'].'" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
               </div>
            </li>  ' ;       
            }
      }else{
         echo '<p style="color:red; text-align:center;   font-style: italic;">Đang cập nhật</p>';
      }


}


function  arrange_price_4Action(){
   $price=$_POST['price'];
   $title=$_POST['title'];

      $sql=db_fetch_array("SELECT * FROM `tb_product`  WHERE  `product_price` >='$price'     AND  `cat_title_main`='$title' or  `cat_title_child`='$title'  ");
      foreach($sql as &$item){
         $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
         $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
         $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";

             

      }

      if(!empty($sql)){
         foreach ($sql as $item){
            echo '<li>
               <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="thumb">
               <img src="../public/images/'.$item["product_img"].'">
               </a>
               <a href="'.$item['detail_product'].$item['product_id'].'" title="" class="product-name">'.$item["product_name"] .'</a>
               <div class="price">
                   <span class="new">'. number_format( $item["product_price"])."đ".'</span>
                   <span class="old">20.900.000đ</span>
               </div>
               <div class="action clearfix">
                   <a  href="" title="Thêm giỏ hàng" class="add-cart fl-left cart-shopping" >Thêm giỏ hàng</a>
            
                  <input type="hidden" id="add_cart" value="'. $item['product_id'].'">
                   <a href="'.$item['add_cart'].$item['product_id'].'" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
               </div>
            </li>  ' ;       
            }
      }else{
         echo '<p style="color:red; text-align:center;   font-style: italic;">Đang cập nhật</p>';
      }

}
?>