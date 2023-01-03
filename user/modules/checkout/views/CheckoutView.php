<?php get_header() ?>
<style>
    .error,
    .error_textarea,
    .error_fullname,
    .error_email,
    .error_phone,
    .error_province,
    .error_towns,
    .error_district,
    .error_number_address,.error_method,#not_product,.error_method_payment {
        color: red;
        font-style: italic;
    }
.success_order{
    color:green;
}

#not_product{
    padding: 3px 3px;
    text-align: center;
    font-weight: 500;

};

.error_method_payment{
    padding: 20px 20px;

    margin-top: 50px;

}

    /* .error::before{
     content: "**";
    } */
</style>
<?php if (!empty($_SESSION['cart']["buy"])) {
?>

    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?mod=home&controller=index&action=index" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="?mod=checkout&controller=index&action=index" title="">Thông tin đặt hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="" method="Post">
            <div id="wrapper" class="wp-inner clearfix">
                <div class="section" id="customer-info-wp">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin khách hàng</h1>
                    </div>
                    <span class="success_order"></span>
                    <div class="section-detail">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="fullname">Họ tên</label>
                                <input type="text" name="fullname" id="fullname" value="<?php if (isset($_SESSION["is_login"])) {
                                                                                            echo $_SESSION["fullname"];
                                                                                        } else {
                                                                                            echo  set_value("fullname");
                                                                                        }
                                                                                        ?>">
                                <!-- <span class="error"> <?php echo error_fn("fullname") ?></span> -->

                                <span class="error_fullname"></span>

                            </div>
                            <div class="form-col fl-right">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="
                            <?php if (isset($_SESSION["is_login"])) {
                                echo $_SESSION["email"];
                            } else {
                                echo  set_value("email");
                            }

                            ?>">
                                <!-- <span class="error"> <?php echo error_fn("email") ?></span> -->
                                <span class="error_email"></span>

                            </div>
                        </div>

                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" name="phone" id="phone" value="<?php  if(isset($_SESSION["phone"])){echo $_SESSION["phone"];}?>">
                                <!-- <span class="error"> <?php echo error_fn("phone") ?></span> -->
                                <span class="error_phone"></span>

                            </div>

                            <div class="form-col fl-right">
                                <label for="">Hình thức nhận hàng</label>
                                <select name="" id="method_product" style="width: 100%;padding:8px 12px;border: 1px solid #cccccc">
                                <option value="">--Chọn hình thức--</option>
                                    <option value="Nhận hàng tại nhà">Nhận hàng tại nhà</option>
                                    <option value="Nhận hàng tại cửa hàng">Nhận hàng tại cửa hàng</option>
                                </select>
                                <span class="error_method"></span>
                            </div>

                        </div>


                        <div class="form-row clearfix">
                            <div id="address-payment" style="display:none;">
                                <div class="form-col">
                                    <label for="address" style="padding-top:10px; ">Tỉnh </label>
                                    <select name="" id="province" style="width: 100%;padding:8px 12px;border: 1px solid #cccccc">
                                        <option value="Không có giá trị">Chọn tỉnh/thành phố</option>
                                        <?php foreach ($list_province as $item) {

                                        ?>
                                            <option value="<?php echo $item["matp"] ?>"><?php echo $item["name"] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                    <span class="error_province"></span>

                                </div>

                                <div class="form-col ">
                                    <label for="address" style="padding-top:10px;">Quận</label>
                                    <select name="" id="district" style="width: 100%;padding:8px 12px;border: 1px solid #cccccc">
                                        <option value="Không có giá trị" > Chọn quận/huyện</option>
                                    </select>
                                    <span class="error_district"></span>

                                </div>

                                <div class="form-col ">
                                    <label for="address" style="padding-top:10px;">Huyện</label>
                                    <select name="" id="towns" style="width: 100%;padding:8px 12px;border: 1px solid #cccccc">
                                    <option value="Không có giá trị"> Chọn phường/xã </option>
                                    </select>
                                    <span class="error_towns"></span>

                                </div>
                                <div class="form-col">
                                    <label for="" style="padding-top:10px;">Địa chỉ nhà </label>
                                    <input type="text" name="number_address" id="number_address">
                                    <span class="error_number_address"></span>
                                </div>

                            </div>
                            <div class="form-col">
                                <label for="notes" style="padding-top:10px;">Yêu cầu : <span id="letter">0</span>/200</label>
                                <input type="text" name="note" id="note">
                                <span class="error_textarea" style="color:red;"> <?php echo error_fn("note") ?></span>
                            </div>
                        </div>

                    </div>
                    <div id="section-payment">
                <div class="section-head">
                        <h1 class="section-title">Hình thức thanh toán</h1>

                        <input type="hidden" class="method_payment" >
                    </div>
                    <div><span class="error_method_payment"></span></div> 
                        <div id="payment">
              
                            <div class="payment_paypal">
                                <div class="radio_payment_paypal">
                                <input type="radio" name="payment_option" id="paypal" value="Paypal">
                                </div>
                                <div class="payment_title_paypal">
                                <img src="public/images/paypal.png" alt="">
                                <span>Thanh toán bằng Paypal</span>
                                </div>
                            </div>


                            <div class="payment_momo">
                                <div class="radio_payment_momo">
                                <input type="radio" name="payment_option" id="momo" value="Momo">
                                </div>
                                <div class="payment_title_momo">
                                <img src="public/images/momo.png" alt="" >
                                <span>Thanh toán bằng Momo</span>
                                </div>
                            </div>
                        </div>


                </div>


                <!-- <div id="paypal-button-container"></div> -->

                </div>
                <div class="section" id="order-review-wp">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin đơn hàng</h1>
                    </div>
                    <div class="section-detail">
                        <table class="shop-table">
                            <thead>
                                <tr>
                                    <td>Sản phẩm</td>
                                    <td>Tổng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list_product as $item) {
                                ?>
                                    <tr class="cart-item">
                                        <td class="product-name"><?php echo $item["product_name"] ?><strong class="product-quantity">x <?php echo $item["qty"] ?></strong><a href="<?php echo $item["delete_check"] ?>"><i class="fa-solid fa-trash-can" style="color:red; margin-left:5px;"> </i></a> </td>
                                        <td class="product-total"><?php echo number_format($item["product_price"]) . "đ" ?></td>
                                        <!-- <input type="hidden" name="" id="product_id" value="<?php echo $item["product_id"] ?>"> -->

                                    </tr>
                                <?php

                                } ?>

                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <td>Tổng đơn hàng:</td>
                                    <td><strong class="total-price"> <?php
                                                                        if (isset($_SESSION["cart"]["infor"])) {
                                                                            echo number_format($_SESSION["cart"]["infor"]["total"]) . "đ";
                                                                            ?>
                                                                                <input type="hidden" name="" id="total_input" value="<?php echo round ( $_SESSION["cart"]["infor"]["total"]/23755)?>">

                                                                            <?php
                                                                        } else {
                                                                            echo "0";
                                                                        }

                                                                        ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                      

                        <div class="place-order-wp clearfix">
                            <input type="button" id="order-now" name="order-now" value="Đặt hàng">
                            <!-- <input type="submit" name="order_2" value="Mẫu"> -->
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>

<?php

} else {
?>

<div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="not_product">
        <p>Không có sản phẩm </p>

        </div>


    </div>
<?php
}
?>


<script>
    $(document).ready(function(e) {

        $("#note").on("keyup", function(e) {
            // var letter=$("#letter").html;
            var amount = $(this).val();
            // alert(number_order);
            var data_main_title = {
                amount: amount
            };
            // console.log(data_main_title);
            $.ajax({
                url: "?mod=checkout&controller=index&action=textarea",
                method: "POST",
                data: data_main_title,
                dataType: "text",

                success: function(data) {
                    if (data < 200) {
                        $("#letter").html(data);

                    } else {
                        $("#note").attr("readonly", "readonly")
                        $("#letter").html("200");
                        $(".error_textarea").html("**Đủ độ dài yêu cầu [0-200]");



                    }
                },


            });


        })

    })

    $(document).ready(function(e) {
        $("#method_product").on("change", function() {
            var method = $(this).val();
            // alert(method);

            if (method == "Nhận hàng tại cửa hàng") {
                $("#address-payment").hide();
                var province = $("#province option:first").attr("selected","selected");
                var province = $("#province option:first").attr("value","Không có giá trị");
            var district = $("#district option:first").attr("selected","selected");
            var district = $("#district option:first").attr("value","Không có giá trị");
            var towns = $("#towns option:first").attr("selected","selected");
            var towns = $("#towns option:first").attr("value","Không có giá trị");
            var number_address = $("#number_address").attr("value","Không có giá trị");


            } else if (method == "Nhận hàng tại nhà") {
                $("#address-payment").show();

                var province = $("#province option:first").removeAttr("selected","selected");
                var province = $("#province option:first").attr("value","");
            var district = $("#district option:first").removeAttr("selected","selected");
            var district = $("#district option:first").attr("value","");
            var towns = $("#towns option:first").removeAttr("selected","selected");
            var towns = $("#towns option:first").attr("value","");
            var number_address = $("#number_address").removeAttr("value","Không có giá trị");

            }






        })
        $("#province").on("change", function() {
            var province = $(this).val();
            var data_main_title = {
                province: province
            };
            $.ajax({
                url: "?mod=checkout&controller=index&action=select_address",
                method: "POST",
                data: data_main_title,
                dataType: "html",

                success: function(data) {
                    $("#district").html(data);
                },


            });

        })

        $("#district").on("change", function() {
            var district = $(this).val();
            var data_main_title = {
                district: district
            };
            $.ajax({
                url: "?mod=checkout&controller=index&action=select_address_towns",
                method: "POST",
                data: data_main_title,
                dataType: "html",

                success: function(data) {
                    $("#towns").html(data);
                },


            });

        })



        $(".payment_paypal").on("click", function() {
            var paypal = $("#paypal").val();

           $ (".payment_title_paypal").addClass("border-click");
           $ (".method_payment").attr("value",paypal);
           $ (".payment_title_momo").removeClass("border-click");
           alert(paypal);

        
        
        })

        $(".payment_momo").on("click", function() {
            var momo = $("#momo").val();
            $ (".payment_title_momo").addClass("border-click");
            $ (".method_payment").attr("value",momo);
            $ (".payment_title_paypal").removeClass("border-click");

            alert(momo);
        
        
        })





        $("#order-now").on("click", function(e) {
  
            var fullname = $("#fullname").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var province = $("#province").val();
            var district = $("#district").val();
            var towns = $("#towns").val();
            var number_address = $("#number_address").val();
            var note = $("#note").val();

            var method = $("#method_product").val();
            var method_payment = $(".method_payment").val();

            var data_main_title = {
                fullname: fullname,
                email: email,
                phone: phone,
                province: province,
                district: district,
                towns: towns,
                number_address: number_address,
                note:note,
                method:method,
                method_payment,
            };
            $.ajax({
                url: "?mod=checkout&controller=index&action=add_order",
                method: "POST",
                data: data_main_title,
                dataType: "json",

                success: function(data) {

                    $(".error_fullname").html(data.error_fullname)
                    $(".error_email").html(data.error_email)
                    $(".error_phone").html(data.error_phone)
                    $(".error_province").html(data.error_province)
                    $(".error_district").html(data.error_district)
                    $(".error_towns").html(data.error_towns)
                    $(".error_number_address").html(data.error_number_address)
                    $(".error_method").html(data.error_method);
                    $(".error_method_payment").html(data.error_method_payment);
                    $(".success_order").html(data.congra);

                    // location.reload();






                },


            });
        })



     
    })






</script>



<script>
    // paypal.Buttons({
    //   // Sets up the transaction when a payment button is clicked
    //   createOrder: (data, actions) => {
    //     var total=document.getElementById("total_input").value;
    //     return actions.order.create({
    //       purchase_units: [{
    //         amount: {
    //           value: total, // Can also reference a variable or function
    //         }
    //       }]
    //     });
    //   },
    //   // Finalize the transaction after payer approval
    //   onApprove: (data, actions) => {
    //     return actions.order.capture().then(function(orderData) {
    //       // Successful capture! For dev/demo purposes:
    //       console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
    //       const transaction = orderData.purchase_units[0].payments.captures[0];
    //       alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
    //       window.location.replace("http://localhost/php/project/user/?mod=home&controller=index&action=index");
    //       // When ready to go live, remove the alert and show a success message within this page. For example:
    //       // const element = document.getElementById('paypal-button-container');
    //       // element.innerHTML = '<h3>Thank you for your payment!</h3>';
    //       // Or go to another URL:  actions.redirect('thank_you.html');
    //     });
    //   }
    // }).render('#paypal-button-container');
  </script>
<?php get_footer() ?>