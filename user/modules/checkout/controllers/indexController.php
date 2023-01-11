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
        $error["method_payment"] = "**Vui lòng thanh toán trước khi đặt hàng ";
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
        // $_SESSION["shipping_id"] = add_order_shipping($fullname,  $email, $province, $district, $towns, $number_address, $phone, $note, $method_payment);
        // if (isset($_SESSION["email"])) {
        //     $_SESSION["customer_id"] = customer_id();
        // } else {
        //     $_SESSION["customer_id"] = null;
        // }
        // $_SESSION["order_code"] = substr(md5(microtime()), random_int(0, 26), 5);
        // $_SESSION["order_id"] = add_order($_SESSION["order_code"], $method);
        // add_order_detail();

        $result["congra"] = "Đặt hàng thành công "; 
        // $result["link_payment"] = "?mod=checkout&controller=index&action=payment"; 


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

function  Momo_paymentAction(){

    load_view("momo_payment");
}

// function  TestAction(){

//     load_view("test");
// }


// function  TestATMAction(){

//     load_view("testATM");
// }


function paymentAction(){
    $_POST["momo"]="Momo";
    $pay_value = $_POST["momo"];
    if(isset($pay_value)){
        updatePayement( $pay_value);
        load_view("payment");
    }else{
        load_view("payment");

    }
}