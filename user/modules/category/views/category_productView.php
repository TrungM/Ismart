
<?php  get_header();
      global $page_next,$page_prv,$num_page,$page,$number;    

?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo $title ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $title ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <?php echo   count($paging) ?> trên <?php echo   $_SESSION["rows_product"]  ?> sản phẩm</p>
                    
                    </div>
                </div>
                <div class="section-detail">
          <?php if(!empty($paging)){
          ?>
          <ul class="list-item clearfix list-arrange">
                              <?php foreach($paging as $item){
                                        ?>
                                    <li>
                            <a href="<?php echo $item['detail_product']?><?php echo $item['product_id']?>" title="" class="thumb">
                            <img src="../public/images/<?php echo $item["product_img"]?>">
                            </a>
                            <a href="<?php echo $item['detail_product']?><?php echo $item['product_id']?>" title="" class="product-name"><?php echo $item["product_name"] ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format( $item["product_price"])."đ"?></span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="Thêm giỏ hàng" class="add-cart fl-left  cart-shopping" >Thêm giỏ hàng</a>
                                <!-- <span  title="Thêm giỏ hàng" class="add-cart fl-left  cart-shopping" >Thêm giỏ hàng</span> -->

                               <input type="hidden" id="add_cart" value="<?php echo $item['product_id']?>">
                                <a href="<?php echo $item['add_cart']?><?php echo $item['product_id']?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>          
                                        <?php
                              }  ?>
               
                    </ul>
          <?php
                    


          }else{
 echo "<p style='color:red; text-align:center;   font-style: italic;'>Đang cập nhật</p>";
          } 
          
          ?>
                    
                </div>
            </div>

            <?php if(!empty($paging) && $num_page>1 ){

                    ?>
                           <div class="section" id="paging-wp">
                        <div class="section-detail">

                         <ul  class="list-item clearfix" >

                                <?php
                                if($page>1){
                                ?>
                                <li ><a href="?mod=category&controller=index&action=index&title=<?php echo $title ?>&page=<?php
                                echo  $page_prv;?>">Trước </a></li>
                                <?php
                                }
                                ?>

                                <?php
                                for($i=1; $i<=$num_page;$i++){
                                $active="";

                                ?>
                                <li><a href="?mod=category&controller=index&action=index&title=<?php echo $title ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>

                                <?php
                                }

                                ?>

                                <?php
                                if($page<$num_page){
                                ?>
                                <li ><a href="?mod=category&controller=index&action=index&title=<?php echo $title ?>&page=<?php
                                echo  $page_next;?>">Sau </a></li>
                                <?php
                                }
                                ?>
                          </ul>
                </div>
            </div>
                    <?php
            }else{
                ?>

                <?php
            }
            ?>
     
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                <?php echo  get_sidebar()?>
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price" value="5000000" id="price1">
                                    <input type="hidden" name="" id="title" value="<?php echo $title?>">
                                
                                </td>
                                    <td>Dưới 5.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" id="price2"></td>
                                    <td>5.000.000đ - 20.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"  id="price3"></td>
                                    <td>20.000.000đ - 40.000.000đ</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price" value="40000000" id="price4"></td>
                                    <td>Trên 40.000.000đ</td>
                                </tr>
                            </tbody>
                        </table>
          
                    </form>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      $(document).ready(function(e) {

$("#price1").on("click", function(e) {
    var price = $(this).val();
    var title= $("#title").val();
    var data_main_title = {
        price: price,
        title:title
    };
    // console.log(data_main_title);
    $.ajax({
        url: "?mod=category&controller=index&action=arrange_price_1",
        method: "POST",
        data: data_main_title,
        dataType: "html",

        success: function(data) {
         $(".list-arrange").html(data);
         $("#paging-wp").attr("style","display:none")
         cart_arrange();
        },


    });


})

$("#price2").on("click", function(e) {
    var title= $("#title").val();
    var data_main_title = {
        title:title
    };
    // console.log(data_main_title);
    $.ajax({
        url: "?mod=category&controller=index&action=arrange_price_2",
        method: "POST",
        data: data_main_title,
        dataType: "html",

        success: function(data) {
         $(".list-arrange").html(data);
         $("#paging-wp").attr("style","display:none")
         cart_arrange();
        },


    });


})

$("#price3").on("click", function(e) {
    var title= $("#title").val();
    var data_main_title = {
        title:title
    };
    // console.log(data_main_title);
    $.ajax({
        url: "?mod=category&controller=index&action=arrange_price_3",
        method: "POST",
        data: data_main_title,
        dataType: "html",

        success: function(data) {
         $(".list-arrange").html(data);
         $("#paging-wp").attr("style","display:none")
         cart_arrange();
        },


    });


})

$("#price4").on("click", function(e) {
    var price = $(this).val();
    var title= $("#title").val();
    var data_main_title = {
        price:price,
        title:title
    };
    // console.log(data_main_title);
    $.ajax({
        url: "?mod=category&controller=index&action=arrange_price_4",
        method: "POST",
        data: data_main_title,
        dataType: "html",

        success: function(data) {
         $(".list-arrange").html(data);
         $("#paging-wp").attr("style","display:none")
         cart_arrange();
        },


    });


})
function cart_arrange(){

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
}



})
</script>
<?php  get_footer() ?>
