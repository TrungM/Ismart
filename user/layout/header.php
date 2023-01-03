<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?page=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?page=blog" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>

                                    <?php 
                                    if(isset( $_SESSION["is_login"])){
                                        ?>
                                        <li>
                                        <a href="?mod=sign_in&controller=index&action=index" title="">Thông tin cá nhân</a>
                                    </li>
                                        <?php

                                    }else{
                                        ?>
                                        <li>
                                        <a href="?mod=sign_in&controller=index&action=index" title="">Đăng ký</a>
                                    </li>
                                        <?php
                                    }

                        
                                    ?>
                                 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?mod=home&controller=index&action=index" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="search_product" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                                <div id="search_result">
                                    <div id="title_search">
                                        <h4>Kết quả tìm kiếm</h4>
                                    </div>
                                    <ul id="main_result" >
                               
                                    
                                    </ul>
                                </div>
                            </div>
                            <div id="action-wp" class="fl-right">
                            <?php 
                            require "./helper/redirect.php";

                            if(isset( $_SESSION["is_login"])){
                                    echo' <a href="?mod=login&controller=index&action=logout">';
                                    }else{
                                        // echo "<a href='".$client->createAuthUrl()."'>";

                                        echo' <a href="?mod=login&controller=index&action=login">';

                                    }
                                    ?>
                              <div id="login-wp" class="fl-left">

                                <div class="login-img">
                                <img src="<?php   if(isset( $_SESSION["img"])){ echo  $_SESSION["img"];}?>" alt="">
                                </div>
                                <div>
                                  <?php if(isset( $_SESSION["is_login"])){

                                    // echo"<span class='title'>".$_SESSION['username']."</span>";
                                    echo"<span class='title'>Đăng xuất</span>";
                                }else{
                                    echo"<span class='title'>Đăng nhập</span>";

                                }
                                 ?>
                 
                                </div>
                                </div>
                               

                      
                              </a>
            
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">  <?php
                                                            if(isset($_SESSION["cart"]["infor"])){
                                                                echo number_format($_SESSION["cart"]["infor"]["number_order"] );

                                                            }else{
                                                                echo "0";
                                                            }

                                                         

                                          ?></span>
                                    </div>
                                    <div id="dropdown">
                           
                                        <p class="desc">Có <span><?php
                                                            if(isset($_SESSION["cart"]["infor"])){
                                                                echo number_format($_SESSION["cart"]["infor"]["number_order"] );

                                                            }else{
                                                                echo "0";
                                                            }


                                                ?> </span> sản phẩm trong giỏ hàng</p>
                                                    <ul class="list-cart">
                                                    
                                                        <?php 
                                            if(!empty($_SESSION["cart"]['buy'])){
                                            foreach( $_SESSION["cart"]['buy'] as $item){
                                                ?>
                                           <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                <img src="../public/images/<?php echo $item["product_img"]?>" alt="">  </a>
                                                <div class="info  fl-left">
                                                    <a href="" title="" class="product-name"><?php echo $item["product_name"]?></a>
                                                    <p class="price "><?php echo number_format( $item["product_price"])."đ"?></p>
                                                    <p class="qty">Số lượng: <span><?php echo $item["qty"]?></span></p>
                                                </div>
                                                
                                                <div class="delete_cart fl-right">
                                   

                                                <i class="fa-solid fa-trash-can" style="color:red;"> </i>
                                                <input type="hidden" id="delete_cart_val" value="<?php echo $item['product_id']?>">
                                            
                                                </div>
                                            </li>
                                            <?php
                                                }
                                            }else{
                                                ?>
                                                <p style="color:red; text-align:center;">Không có sản phẩm trong giỏ hàng</p>
                                                <?php
                                            }

                                        
                                             ?>
                                          
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right price-header">     <?php
                                                            if(isset($_SESSION["cart"]["infor"])){
                                                                echo number_format($_SESSION["cart"]["infor"]["total"] )."đ";

                                                            }else{
                                                                echo "0";
                                                            }

                                            ?></p>
                                        </div>
                                        <div class="action-cart clearfix" >
                                            <a href="?mod=cart&controller=index&action=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?mod=checkout&controller=index&action=index" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <script>
    $(document).ready(function () {

 function fetchData(){
    $(".fa-trash-can").click(function (e) {
var product_id= $(this).next("#delete_cart_val").val();


var data_main_title={product_id:product_id};
$.ajax({
url: "?mod=cart&controller=index&action=delete_list",
method: "get",
data: data_main_title,
dataType: "html",

success: function (data) {
$("#cart-wp").html(data)
alert("Xoá thành công sản phẩm")
// location.replace();
delete_continue();
location.reload();

},


});


  })

 }
 fetchData();
 
function delete_continue(){
 $(".delete_second").click(function (e) {

var product_id= $(this).next("#delete_cart_val").val();


var data_main_title={product_id:product_id};

$.ajax({
url: "?mod=cart&controller=index&action=delete_list",
method: "get",
data: data_main_title,
dataType: "html",

success: function (data) {
    $("#cart-wp").html(data)
alert("Xoá thành công sản phẩm")

fetchData();

},


});


  })

}
})
    

  

$(document).ready(function () {

$(".cart-shopping").click(function (e) {
var product_id=$(this).next("#add_cart").val();

// alert(product_id);
var data_main_title={product_id:product_id};
// console.log(data_main_title);
$.ajax({
url: "?mod=cart&controller=index&action=add_cart_ajax",
method: "POST",
data: data_main_title,
dataType: "json",

success: function (data) {




},


});


  })


  $("#s").keyup(function (e) {

    var search_product= $(this).val();
// alert(search_product);
var data_main_title={search_product:search_product};
$.ajax({
url: "?mod=home&controller=index&action=search",
method: "POST",
data: data_main_title,
dataType: "html",

success: function (data) {


if(search_product==""){
    $("#search_result").attr("style"," ");

}else{

    $("#main_result").html(data);
$("#search_result").attr("style","top: 60px; opacity: 1; visibility: visible;");
}

},


});


  })




})




</script>