<?php
   // ham dung chung  co tinh global 
function construct(){
   load_model('index');

}
function   orderAction(){

   $list_order=list_order();
   $data["list_order"]=$list_order;
   load_view("order",$data);

}

function deleteOrderAction(){

   $order_code=$_GET["order_code"];
   // $order_id=$_GET["order_id"];
   deleteOrder( $order_code);


header("Location:?mod=order&controller=index&action=order");
}

function   customerAction(){


   
   load_view("customer");

}


function   detailOrderAction(){
   $order_code=$_GET["order_code"];
$data["order_code"]=$order_code;
   $detail_order=detail_order($order_code);
   $data["detail_order"]=$detail_order;
   


   $detail_shipping=detail_shipping($order_code);
   $data["detail_shipping"]=$detail_shipping;


   $list_order_total=list_order_total($order_code);
   $data["list_order_total"]=$list_order_total;


   $number_order_total=number_order_total($order_code);
   $data["number_order_total"]=$number_order_total;

   $status=status($order_code);
   $data["status"]=$status;
   load_view("detailOrder",$data);

}


function detailShippingAction(){
   $order_code=$_GET["order_code"];
   $data["order_code"]=$order_code;

   $detail_shipping=detail_shipping($order_code);
   $data["detail_shipping"]=$detail_shipping;

   load_view("detailShipping",$data);

}


function update_statusAction(){
   $status= $_POST['status_now'];
   $order_code=$_POST["order_code"];
$data=array(
   "order_status"=>$status,
);
   update_status($order_code,$data);
// if($status=="Hoàn thành"){
//    echo "<option value='Đang xử lý'>Đang xử lý</option>
//    <option value='Đang vận chuyển'>Đang vận chuyển</option>
//        <option value='Hoàn thành' selected='selected'> Hoàn thành</option>";
// }
}

?>