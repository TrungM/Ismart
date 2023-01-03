<?php

function add_customer($customer_fullname,$customer_username,$customer_email,$customer_password,$customer_phone,$customer_img,  $google_id){
   
          $result=db_insert("tb_customer",array
          (
                'customer_fullname'=>$customer_fullname,
                'customer_username'=>$customer_username,
                'customer_email'=>$customer_email,
                'customer_password'=>$customer_password,
                'customer_phone'=>$customer_phone,
                'customer_img'=>$customer_img,
                'google_id'=>  $google_id,
                'created_at'=>date("Y/m/d") ,
  
  
  
          ));
  
          return $result;

}


function check_login($google_id){

          $sql=db_num_rows("SELECT *FROM `tb_customer` WHERE  `google_id`=$google_id");
          
          if($sql>0){
                    return true;
          }
          return false;
}

function check_login_username($username){

      $sql=db_num_rows("SELECT *FROM `tb_customer` WHERE  `customer_username`='$username'");
      
      if($sql>0){
                return true;
      }
      return false;
}

function check_login_normal($email){

      $sql=db_num_rows("SELECT *FROM `tb_customer` WHERE  `customer_email`='$email'");
      
      if($sql>0){
                return true;
      }
      return false;
}


function check_login_form($email, $pasword){

      $sql=db_num_rows("SELECT *FROM `tb_customer` WHERE  `customer_email`='$email' AND `customer_password`='$pasword' ");
      
      if($sql>0){
                return true;
      }
      return false;
}
function get_phone($email, $password){

      $sql=db_fetch_row ("SELECT `customer_phone` FROM `tb_customer` WHERE  `customer_email`='$email' AND `customer_password`='$password' ");
      
  return $sql["customer_phone"];
}


function get_fullname($email, $password){
      $sql=db_fetch_row ("SELECT `customer_fullname` FROM `tb_customer` WHERE  `customer_email`='$email' AND `customer_password`='$password' ");


      
  return   $sql["customer_fullname"];
}

function update_reset_token($email,$data){
      $sql= db_update(  "tb_customer",$data,"`customer_email`='$email' ");
      return $sql;
}

function check_token($token,$email){
      $sql=db_num_rows("SELECT *FROM `tb_customer` WHERE  `reset_token`='$token'  AND `customer_email`='$email' ");
      
      if($sql>0){
                return true;
      }
      return false;

}

function update_password($data,$reset_token){
      $sql= db_update(  "tb_customer",$data,"`reset_token`='$reset_token' ");
      return $sql;
}
?>