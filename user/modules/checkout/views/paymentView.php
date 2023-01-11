<?php get_header() ?>


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
                        <li>
                            <a href="?mod=checkout&controller=index&action=payment" title="">Thanh toán </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>




        <form action="" method="Post" target="_blank" enctype="application/x-www-form-urlencoded">
            <div id="wrapper" class="wp-inner clearfix">
                <div class="section" id="customer-info-wp">
                    <span class="success_order"></span>
                    <div id="section-payment">
                        <div class="section-head">
                            <h1 class="section-title">Hình thức thanh toán</h1>

                            <input type="hidden" class="method_payment">
                        </div>
                        <div><span class="error_method_payment"></span></div>
                        <div id="payment">

                            <!-- <div class="payment_paypal">
                                <div class="radio_payment_paypal">
                                    <input type="radio" name="payment_option" id="paypal" value="Paypal">
                                </div>
                                <div class="payment_title_paypal">
                                    <img src="public/images/paypal.png" alt="">
                                    <span>Thanh toán bằng Paypal</span>
                                </div>
                            </div> -->


                            <div class="payment_momo">
                                <div class="radio_payment_momo">
                                    <input type="radio" name="payment_option" id="momo" value="Momo">
                                </div>
                                <div class="payment_title_momo">
                                    <img src="public/images/momo.png" alt="">
                                    <span>Thanh toán bằng Momo</span>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </form>

    </div>

<script>
        $(document).ready(function(e) {

          $(".payment_paypal").on("click", function() {
            var paypal = $("#paypal").val();

            $(".payment_title_paypal").addClass("border-click");
            $(".method_payment").attr("value", paypal);
            $(".payment_title_momo").removeClass("border-click");
            //    alert(paypal);



        })

        $(".payment_momo").on("click", function() {
            var momo = $("#momo").val();
            // $(".payment_title_momo").addClass("border-click");
            // $(".method_payment").attr("value", momo);
            // $(".payment_title_paypal").removeClass("border-click");



            // var getUrlParameter = function getUrlParameter(sParam) {
            //     var sPageURL = window.location.search.substring(1),
            //  sURLVariables = sPageURL.split('&'),
            //         sParameterName,
            //         i;

            //     for (i = 0; i < sURLVariables.length; i++) {
            //         sParameterName = sURLVariables[i].split('=');

            //         if (sParameterName[0] === sParam) {
            //             return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            //         }
            //     }
            // };

            // var tech = getUrlParameter('partnerCode');

            // alert(tech);

      var data_main_title = {
          momo: momo
            };
            $.ajax({
                url: "?mod=checkout&controller=index&action=payment",
                method: "POST",
                data: data_main_title,
                dataType: "html",

                success: function(data) {
                    window.location.assign("?mod=checkout&controller=index&action=Momo_payment")

                },


            });

        })


        })

</script>

<?php get_footer() ?>
