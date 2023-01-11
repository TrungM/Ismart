<?php


function get_list_cart(){

          if( isset( $_SESSION["cart"]["buy"])){
                    //them truong moi 
                    foreach($_SESSION["cart"]['buy'] as $item){
    
            $_SESSION["cart"]['buy'][$item["product_id"]]=$item;
            $_SESSION["cart"]['buy'][$item["product_id"]]["delete_check"]=
            "?mod=checkout&controller=index&action=delete_check&product_id={$item["product_id"]}";
    
    
                    };
                    return  $_SESSION["cart"]['buy'];
          }
    
          return false;
          }

          function load_cart(){
                    $number_order=0;
                    $total=0;
                    foreach( $_SESSION["cart"]["buy"] as $item){
                      $number_order+=$item["qty"];
                      $total+=$item["sub_total"];
                    };
                    $_SESSION["cart"]["infor"]=array(
                           "number_order"=>$number_order,
                          "total"=>$total
                    );
              
              }
              
              function delete_cart($id){
              
                    if(isset($_SESSION["cart"])){
               unset( $_SESSION["cart"]["buy"][$id]);
               load_cart();
                    }
                    return false;
              }


              function list_province(){

                  $sql=db_fetch_array("SELECT * FROM `tb_province` ");

                  return $sql;

              }



              function add_order_shipping($shipping_name,$shipping_email,$shipping_province,$shipping_district,$shipping_towns,$shipping_num_address,$shipping_phone,$shipping_note,$shipping_payment){
                  $data=array(
                        'shipping_name'=>$shipping_name,
                        'shipping_email'=>$shipping_email,
                        'shipping_number_address'=>$shipping_num_address,
                        'shipping_wards'=>$shipping_towns,
                        'shipping_district'=>$shipping_district,
                        'shipping_province'=>$shipping_province,
                        'shipping_phone'=>$shipping_phone,
                        'shipping_note'=>$shipping_note,
                        // 'shipping_time'=>date("h:i:sa"),
                        'shipping_payment'=>$shipping_payment,
                        'created_at'=>date("Y/m/d") ,

                  );
                  
            $result=db_insert("tb_shipping",$data);

            return  $result;
              };

              function customer_id(){
                  $result=db_fetch_row("SELECT `customer_id` FROM tb_customer  WHERE `customer_email`='$_SESSION[email]'");
                  return $result["customer_id"];

  
              }

              function add_order($order_code,$method){
                  $result=db_insert("tb_order",array(
                        'customer_id'=>$_SESSION["customer_id"],
                        'shipping_id'=>$_SESSION["shipping_id"],
                        'order_total'=>$_SESSION["cart"]["infor"]["total"],
                        'order_status'=>"Đang xử lý",
                        'order_code'=>$order_code,
                        'delivery'=>$method,
                        'created_at'=>date("Y/m/d") ,
          
                  ) );
      
                  return $result;
              }


              function add_order_detail(){
                  foreach($_SESSION["cart"]["buy"] as $p){

                  $data=array(
                        'order_id'=>$_SESSION["order_id"],
                        'order_code'=> $_SESSION["order_code"],
                        'product_id'=> $p["product_id"],
                        'product_name'=>$p["product_name"],
                        'product_code'=>  $p["product_code"],
                        'product_price'=> $p["product_price"],
                        'product_qty'=>  $p["qty"],
                        'created_at'=>date("Y/m/d") ,
          
                  );


                  $result=db_insert("tb_order_detail",$data);

                              
                  }
      
                  return $result;
              };



              function updatePayement($pay_value){

                  if(isset($_SESSION["shipping_id"])){
                        $result = db_update("tb_shipping",array(

                              "shipping_payment"=>   $pay_value,
      
                        ),"`shipping_id`=$_SESSION[shipping_id] ");
          
                    return $result;
                  }else{
                        return false;
                  }


   
              }



?>