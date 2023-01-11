<!-- Mã QR Momo -->

<!-- <form action="?mod=checkout&controller=index&action=Momo_payment" method="POST" target="_blank" enctype="application/x-www-form-urlencoded">


<input type="submit" value="Thanh toán Momo">



</form> -->



<!-- $title = "Xác nhận thông tin đơn hàng từ Ismart ";
        $content = '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    
    <body>
              <div id="wrapper">
                        <div class="container">
                                  <div id="header">
                                            <div class="header_title">
                                                      <h2>Xác nhận thanh toán</h2>
    
                                            </div>
                                            <div>
    
                                                  
                                                      <div class="order_code">
                                                                <h3 style="color: brown; font-family:"Courier New", Courier, monospace" > Mã số đơn hàng: ' . $_SESSION["order_code"] . '</h3>
    
                                                      </div>
                                            </div>
    
    
                                  </div>
                                  <div id="content">
    
                                            <div class="content_title">
                                                      <p>Kính chào quý khách: <span style="font-weight: boild;">' . $fullname . '</span>
                                                      </p>
    
                                                      <p>Đơn hàng <span style="font-weight: boild;">' . $_SESSION["order_code"] . '</span>  của Quý khách tại
                                                                <span class="bold_css">Ismart</span> đã được đặt hàng thành công
                                                      </p>
    
                                            </div>
    
                                            <div class="detail_order">
    
                                                      <h3>Chi tiết đơn hàng </h3>
                                                      <table class="table table-bordered " border="2">
                                                                <thead>
                                                                  <tr>
                                                                          <th>Tên sản phẩm </th>
                                                                          <th>Đơn giá </th>
                                                                          <th>Số lượng </th>
                                                                          <th>Thành tiền </th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>

                                                             

                                                                
                                                                


                                                                </tbody>
                                                              </table>
    
                                              
                                                      <div class="detail">
                                                                <div class="view_detail_price" style="display:flex; justify-content: space-between;">
                                                                          <div>
                                                                                    <h5 style="padding: 0.5rem 0px;">Tổng giá trị sản phẩm : </h5>
                                                                                    <h5 style="padding: 0.5rem 0px;">Giảm giá : </h5>
                                                                                    <h5 style="padding: 0.5rem 0px;">Phí vận chuyển : </h5>
    
                                                                          </div>
    
                                                                          <div  style="margin-left: 1rem;;">
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">' . $_SESSION["cart"]["infor"]["total"] . "đ" . '</h5>
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">300000</h5>
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">500000</h5>
                                                                          </div>
    
                                                                </div>
    
                                                                <div class="view_total"  style="display:flex; justify-content: space-between;">
                                                                          <div >
                                                                                    <h3 style="color: red;">Thành tiền :</h3>
                                                                          </div>
    
                                                                          <div  style="margin-left: 4rem;" >
                                                                                    <h3 style="font-weight: 200; color: red;">' . $_SESSION["cart"]["infor"]["total"] . "đ" . '</h3>
                                                                                 
                                                                          </div>
    
                                                                </div>
                                                      </div>
    
    
    
    
    
    
    
                                            </div>
    
                                            <div class="order_info" style="padding:1rem 0px">
                                                      <h3>Thông tin đặt hàng</h3>
                                                      <div class="detail">
                                                                <div class="order_info_content" style="display:flex">
                                                                          <div >
                                                                                    <h5 style="padding: 0.5rem 0px;">Mã đơn hàng của quý khách : </h5>
                                                                                    <h5 style="padding: 0.5rem 0px;" >Thời gian đặt hàng : </h5>
                                                                                    <h5 style="padding: 0.5rem 0px;">Phương thức giao hàng :</h5>
                                                                                    <h5 style="padding: 0.5rem 0px;">Phương thức thanh toán :</h5>
    
                                                                          </div>
    
                                                                          <div style="margin-left: 1rem;">
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">' . $_SESSION["order_code"] . '</h5>
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">' . date("Y/m/d") . '</h5>
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">' . $method . ' </h5>
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">' . $method_payment . '</h5>
                                                                          </div>
    
                                                                </div>
    
    
                                                      </div>
    
                                            </div>
    
    
                                            <div class="order_shipping" style="padding:1rem 0px">
                                                      <h3>Địa chỉ giao hàng </h3>
                                                      <div class="detail">
                                                                <div class="order_shipping_content" style="display:flex">
                                                                          <div>
                                                                                    <h5 style="padding: 0.5rem 0px;">Tên người nhận : </h5>
                                                                                    <h5 style="padding: 0.5rem 0px;">Địa chỉ nhận hàng : </h5>
                                                                                    <h5 style="padding: 0.5rem 0px;">Số điện thoại liên hệ : </h5>
    
                                                                          </div>
    
                                                                          <div style="margin-left: 1rem;;">
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">' . $fullname . '</h5>
                                                                                    <h5 style="font-weight: 200; padding: 0.5rem 0px;">
                                                                                            
                                                                                    <h5 style="font-weight: 200;padding: 0.5rem 0px;">' . $phone . '</h5>
                                                                          </div>
    
                                                                </div>
    
    
                                                      </div>
    
                                            </div>
    
    
    
    
    
    
                                  </div>
    
                                  <div id="footer">
                                            <p>
                                                      Mọi thắc mắc và góp ý, xin Quý khách vui lòng liên hệ với chúng tôi
                                                      qua:
                                            </p>
                                            <p>
                                                      Email hỗ trợ: <a href=""></a>
                                            </p>
                                            <p>
                                                      Số hotline: 0966 158 666
                                            </p>
                                            <p> Ismart Trân trọng cảm ơn và rất hân hạnh được phục vụ Quý khách.</p>
    
    
    
    
    
    
    
                                            </p>
                                  </div>
                        </div>
              </div>
    </body>
    
    </html>';
        // // echo send_mail($email, $fullname, $title, $content);
        // $result["congra"] = "Đặt hàng thành công "; --> -->