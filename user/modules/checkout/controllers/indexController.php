<?php

function construct()
{
    load_model('index');
    load("lib", "send_mail");
}
function textareaAction()
{
    global $length;
    $amount = $_POST["amount"];
    // echo  $amount;
    $length = strlen($amount);
    echo $length;
    // if($length<=500){
    //     echo $length;

    // }else{
    //     echo "500";
    // }

}
function indexAction()
{

    //     global $error,$fullname,$email,$phone,$note;
    //     $error=array();

    // if(isset($_POST["order-now"])){


    //     if(empty($_POST["fullname"])){
    //         $error["fullname"]="Vui lòng nhập tên khách hàng";
    // }else{

    //         if(!(strlen($_POST["fullname"])>5 && strlen($_POST["fullname"])<32)
    //          ){
    //                   $error["fullname"]="Không đúng độ dài yêu cầu   [5-32]";


    //         }else{
    //                   if( is_fullname()){
    //                             $error["fullname"]="Không đúng yêu cầu định dạng";

    //                    }else{
    //                             $fullname=$_POST["fullname"];
    //                    }
    //         }
    // }

    // if(empty($_POST["email"])){
    //     $error["email"]="Vui lòng nhập email khách hàng";
    // }else{

    //     if(!(strlen($_POST["email"])>5 && strlen($_POST["email"])<32)
    //      ){
    //               $error["email"]="Không đúng độ dài yêu cầu[5-32]";


    //     }else{
    //               if( is_email()){
    //                         $error["email"]="Không đúng yêu cầu định dạng";

    //                }else{
    //                         $email=$_POST["email"];
    //                }
    //     }
    // }

    // if(empty($_POST["phone"])){
    //     $error["phone"]="Vui lòng nhập số điện thoại khách hàng";
    // }else{

    //     if(!(strlen($_POST["phone"])>10 && strlen($_POST["phone"])<12)
    //      ){
    //               $error["phone"]="Không đúng độ dài yêu cầu[10-12]";


    //     }else{
    //               if( is_phone($_POST["phone"])){
    //                         $error["phone"]="Không đúng yêu cầu định dạng";

    //                }else{
    //                         $phone=$_POST["phone"];
    //                }
    //     }
    // }

    //     if(  strlen($_POST["note"])>=500
    //      ){
    //               $error["note"]="Độ dài không phù hợp [0-500]";
    //     }else{       
    //     $note=$_POST["note"];

    //     }

    // }


    $list_province = list_province();
    $data["list_province"] = $list_province;
    $list_product = get_list_cart();
    $data["list_product"] = $list_product;
    load_view("Checkout", $data);
}


function delete_checkAction()
{
    $id = $_GET["product_id"];
    delete_cart($id);
    header("Location:?mod=checkout&controller=index&action=index");
}





function select_addressAction()
{
    $province = $_POST["province"];
    $sql = db_fetch_array("SELECT * FROM `tb_district` WHERE   `matp`='$province'  ");
    echo ' <option value="Không có giá trị"> Chọn quận/huyện </option> ';
    foreach ($sql as $item) {
        echo    '<option value="' . $item['maqh'] . '"> ' . $item['name'] . ' </option>';
    }
}

function select_address_townsAction()
{
    $district = $_POST["district"];
    $sql = db_fetch_array("SELECT * FROM `tb_wards` WHERE   `maqh`='$district'  ");
    echo ' <option value="Không có giá trị"> Chọn phường/xã </option> ';
    foreach ($sql as $item) {
        echo    '<option value="' . $item['xaid'] . '"> ' . $item['name'] . ' </option>';
    }
}



function add_orderAction()
{
    global  $error;

    $order_mail = array();

    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $towns = $_POST["towns"];
    $number_address = $_POST["number_address"];
    $note = $_POST["note"];
    $method = $_POST["method"];
    $method_payment = $_POST["method_payment"];

    if (empty($_POST["fullname"])) {
        $error["fullname"] = "**Vui lòng nhập tên khách hàng";
    } else {

        if (!(strlen($_POST["fullname"]) > 5 && strlen($_POST["fullname"]) < 32)) {
            $error["fullname"] = "**Không đúng độ dài yêu cầu   [5-32]";
        } else {
            if (is_fullname()) {
                $error["fullname"] = "**Không đúng yêu cầu định dạng";
            } else {
                // $fullname=$_POST["fullname"];
                $error["fullname"] = "";
            }
        }
    }


    if (empty($_POST["email"])) {
        $error["email"] = "**Vui lòng nhập email khách hàng";
    } else {

        if (!(strlen($_POST["email"]) > 5 && strlen($_POST["email"]) < 32)) {
            $error["email"] = "**Không đúng độ dài yêu cầu[5-32]";
        } else {
            if (is_email()) {
                $error["email"] = "**Không đúng yêu cầu định dạng";
            } else {
                $error["email"] = "";
            }
        }
    }

    if (empty($_POST["phone"])) {
        $error["phone"] = "**Vui lòng nhập điện thoại khách hàng";
    } else {

        if (!(strlen($_POST["phone"]) > 9 && strlen($_POST["phone"]) < 12)) {
            $error["phone"] = "**Không đúng độ dài yêu cầu[9-12]";
        } else {
            if (is_phone($_POST["phone"])) {
                $error["phone"] = "**Không đúng yêu cầu định dạng";
            } else {
                $error["phone"] = "";
            }
        }
    }


    if (empty($_POST["province"])) {
        $error["province"] = "**Vui lòng chọn tỉnh/thành";
    } else {
        $error["province"] = "";
    }
    if (empty($_POST["district"])) {
        $error["district"] = "**Vui lòng chọn quận/huyện";
    } else {
        $error["district"] = "";
    }
    if (empty($_POST["towns"])) {
        $error["towns"] = "**Vui lòng chọn xã/huyện";
    } else {
        $error["towns"] = "";
    }

    if (empty($_POST["number_address"])) {
        $error["number_address"] = "**Vui lòng chọn địa chỉ nhà";
    } else {
        $error["number_address"] = "";
    }
    if (empty($_POST["method"])) {
        $error["method"] = "**Vui lòng chọn hình thức nhận hàng";
    } else {
        $error["method"] = "";
    }

    if (empty($_POST["method_payment"])) {
        $error["method_payment"] = "**Vui lòng chọn hình thức thanh toán ";
    } else {
        $error["method_payment"] = "";
    }

    $result = array(
        "error_fullname" => $error["fullname"],
        "error_email" => $error["email"],
        "error_phone" => $error["phone"],
        "error_province" => $error["province"],
        "error_towns" => $error["towns"],
        "error_district" => $error["district"],
        "error_number_address" => $error["number_address"],
        "error_method" => $error["method"],
        "error_method_payment" => $error["method_payment"],



    );


    if ($result["error_fullname"] == "" && $result["error_email"] == "" && $result["error_phone"] == "" && $result["error_province"] == "" && $result["error_towns"] == "" && $result["error_district"] == "" && $result["error_number_address"] == "" && $result["error_method"] == "" &&   $result["error_method_payment"] == "") {
        $_SESSION["shipping_id"] = add_order_shipping($fullname,  $email, $province, $district, $towns, $number_address, $phone, $note, $method_payment);
        if (isset($_SESSION["email"])) {
            $_SESSION["customer_id"] = customer_id();
        } else {
            $_SESSION["customer_id"] = null;
        }
        $_SESSION["order_code"] = substr(md5(microtime()), random_int(0, 26), 5);
        $_SESSION["order_id"] = add_order($_SESSION["order_code"], $method);
        add_order_detail();











        $title = "Xác nhận thông tin đơn hàng từ Ismart ";
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
        echo send_mail($email, $fullname, $title, $content);
        $result["congra"] = "Đặt hàng thành công ";
    }
    echo json_encode($result);
}



function ActionAction()
{
    foreach ($_SESSION["cart"]["buy"] as $p) {
        echo "<pre>";
        echo ' <tr>';
        echo     '<td> ' . $p["product_name"] . ' </td>';
        echo   ' <td> ' . $p["product_price"] . ' </td>';
        echo  ' <td> ' . $p["qty"] . ' </td>';
        echo '    <td> ' . $p["product_price"] * $p["qty"] . ' </td>
             </tr>';
        echo "</pre>";
    }
}
