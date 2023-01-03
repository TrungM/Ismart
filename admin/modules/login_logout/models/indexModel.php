<?php


// function field_exists($username,$email){
// $sql=db_num_rows("SELECT *FROM `tb_user` WHERE `username`='{$username}' OR `email`='{$email}' " );

// if($sql>0){
//           return true;
// }
// return false;
// }

// function add_user($item){

//           $sql=db_insert("tb_user",$item);

//           return $sql;
          
// }

// function active($item){
//           // update lai active khi co token=token trong bang 
//           $sql=db_update('tb_user',array("is_active"=>1)," `active_token`='{$item}' ");
//           return$sql;
// }



// function check_token($active_token){
//           // enum nen 0 phai de dang chuoi 
//           $sql=db_num_rows("SELECT *FROM `tb_user` WHERE `active_token`='{$active_token}' AND `is_active`='0' ");

//           if($sql>0){
//                     return true;
//           }
//           return false;
// }

function admin_id(){
          $sql=db_num_rows("SELECT `admin_id` FROM `tb_admin` WHERE `username`='admin34567'");

          if($sql>0){
                    return true;
          }
          return false;
}

function check_login($username,$password){
          $sql=db_num_rows("SELECT *FROM `tb_admin` WHERE `username`='{$username}' AND `password`='{$password}' " );


          if($sql>0 ){
                    return true;
          }
          return false;

}

function check_login_manager($username,$password){
          $sql_manager=db_num_rows("SELECT *FROM `tb_manager` WHERE `username`='{$username}' AND `password`='{$password}' " );
          if($sql_manager>0 ){
                    return true;
          }
          return false;
}

function logout(){

          if($_SESSION["is_login_admin"]){
                    setcookie("is_login_admin",true, time()-3600);
                    setcookie("user",$_POST['username'], time()-3600);     
                    unset($_SESSION["is_login_admin"]);
                    unset($_SESSION["username_admin"]);
                    unset($_SESSION["admin_id"]);
                    unset($_SESSION["manager"]);
                    header("Location:?mod=login_logout&controller=login&action=login");

          }
 
}



// function check_email($email){
//           $sql=db_num_rows("SELECT *FROM `tb_user` WHERE `email`='{$email}' " );
//           if($sql>0){
//                     return true;
//           }
//           return false;
// }

// function update_token($data,$mail){
//           $sql=db_update('tb_user',$data," `email`='{$mail}' ");
//           return$sql;
// }

// function  check_reset_token($reset_token){
//           $sql=db_num_rows("SELECT *FROM `tb_user` WHERE `reset_token`='{$reset_token}'  " );

//           if($sql>0){
//                     return true;
//           }
//           return false;
// }


// function update_pass($data,$reset_token){
//           $sql=db_update('tb_user',$data," `reset_token`='{$reset_token}' ");
//           return$sql;
// }
?>