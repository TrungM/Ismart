<?php get_header()?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm làm đẹp da</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="1">Thành tiền</td>
                            <td></td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(!empty($add_cart)){
                        foreach(  $add_cart as $item){
                            ?>
                                 <tr>
                            <td><?php echo $item["product_code"]?></td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="../public/images/<?php echo $item["product_img"]?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product"><?php echo $item["product_name"]?></a>
                            </td>
                            <td><?php echo number_format( $item["product_price"])."đ"?></td>
                            <td>
                                <input type="number" name="num-order" value="<?php echo $item["qty"]?>" class="num-order" min="1" data-id="<?php echo $item["product_id"]?>">
                            </td>
                            <td id="sub_total-<?php echo $item["product_id"] ?>"><?php echo number_format( $item["product_price"]*$item["qty"])."đ"?></td>
                            <td >
                                <a href="<?php echo $item["delete_cart"]?>" title="" class="del-product" ><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                

                            <?php
                                }
                            }else{
                                ?>
                                <p style="color:red; text-align:center;">Không có sản phẩm trong giỏ hàng</p>
                                <?php
                            }

                        
                        ?>
                   
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span id="total-price_span"> 
                                        <?php
                                                            if(isset($_SESSION["cart"]["infor"])){
                                                                echo number_format($_SESSION["cart"]["infor"]["total"] )."đ";

                                                            }else{
                                                                echo "0";
                                                            }

                                    ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="?mod=checkout&controller=index&action=index" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
           
                <a href="?mod=home&controller=index&action=index" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&controller=index&action=delete_cart_all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

$(".num-order").change(function (e) {
var number_order=$(this).val();
var product_id=$(this).attr("data-id");

// alert(number_order);
var data_main_title={number_order:number_order,product_id:product_id};
// console.log(data_main_title);
$.ajax({
url: "?mod=cart&controller=index&action=update_cart",
method: "POST",
data: data_main_title,
dataType: "json",

success: function (data) {
    $("#sub_total-"+product_id).html(data.sub_total);
    $("#total-price_span").html(data.total);
    location.reload();

},


});


  })


})


</script>

<?php get_footer()?>
