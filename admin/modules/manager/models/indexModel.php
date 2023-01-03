<?php
function get_infor_manager($a){
          $result=db_fetch_array("SELECT * FROM `tb_manager` WHERE `username`='$a'");

          return  $result;

}
function update_infor_manager($name,$fullname,
$username,$email,$phone,$address){
          $result=db_update("tb_manager",array( 
                     'fullname'=>$fullname ,
                     'username'=>$username ,
                     'email'=>$email ,
                    'phone'=>$phone ,
                    'address'=>$address ,
                    "update_at"=> date("Y/m/d"),
), " `username`='$name'");

          return $result;
}
function pass_change($name,$pass_new){
          $result=db_update("tb_manager",array( 
           'password'=>$pass_new ,
), " `username`='$name'");

         return $result;
}

 function check_pass($pass_old){
$sql=db_num_rows("SELECT * FROM `tb_manager` WHERE  `password`='{$pass_old}'");

if($sql >0){
          return true;
}
return false;

 }
