<?php
   // ham dung chung  co tinh global 
function construct(){
   load_model('index');
    load("lib","send_mail");
      }
function  loginAction(){
   if(isset($_POST["btn_login"])){
      global $error ,$mail,$password;
      $error=array();
      if(empty($_POST["email"])){
                $error["email"]="Vui lòng không để trống email";
      }else{

                if(!(strlen($_POST["email"])>6 && strlen($_POST["email"])<32)){
                          $error["email"]="Không đúng yêu cầu độ dài [5-32]";

                }else{
                          if(is_email()){
                                    $error["email"]="Không đúng yêu cầu định dạng ";

                          }else{
                           $mail=$_POST["email"];
                          }
                }
      }

      if(empty($_POST["password"])){
                $error["password"]="Vui lòng không để trống mật khẩu";
      }else{

                if(!(strlen($_POST["password"])>5 && strlen($_POST["password"])<31)){
                          $error["password"]="Không đúng yêu cầu độ dài [5-31]";

                }else{
                          if(is_pass()){
                           $error["password"]="Không đúng yêu cầu định dạng ";

                          }else{
                                    $password=md5($_POST["password"]);

                          }
                }
      }


if(empty($error)){

   if(check_login_form($mail,$password)){
      $_SESSION["is_login"]=true;
      $_SESSION["phone"]= get_phone($mail, $password);
      $_SESSION["email"]=$mail;
      $_SESSION["fullname"]=get_fullname($mail, $password);


      header("Location:?mod=home&controller=index&action=index");
   }else{
      $error["check_success_login"]="Đăng nhập không thành công ";

   }
}



}



   load_view("login");
}
function  signAction(){

   if(isset($_POST["btn_sigin"])){
      global $error ,$username,$mail, $phone, $password,$fullname,$congratulation;
      $error=array();

      if(empty($_POST["fullname"])){
         $error["fullname"]="Vui lòng không để trống họ và tên";
}else{

         if(!(strlen($_POST["fullname"])>6 && strlen($_POST["fullname"])<32)){
                   $error["fullname"]="Không đúng độ dài yêu cầu [5-32]";

         }else{
                   if(is_fullname()){
                             $error["fullname"]="Không đúng yêu cầu định dạng ";

                   }else{
                             $fullname=$_POST["fullname"];

                   }
         }
}
      if(empty($_POST["username"])){
                $error["username"]="Vui lòng không để trống tên đăng nhập";
      }else{

                if(!(strlen($_POST["username"])>6 && strlen($_POST["username"])<32)){
                          $error["username"]="Không đúng độ dài yêu cầu [5-32]";

                }else{
                          if(is_username()){
                                    $error["username"]="Không đúng yêu cầu định dạng ";

                          }else{
                           $username=$_POST["username"];
                           if(check_login_username($username)){
                              $error["username"]="Tên đăng nhập đã tồn tại";
                           }






                          }
                }
      }


      if(empty($_POST["email"])){
                $error["email"]="Vui lòng không để trống email";
      }else{

                if(!(strlen($_POST["email"])>6 && strlen($_POST["email"])<32)){
                          $error["email"]="Không đúng yêu cầu độ dài [5-32]";

                }else{
                          if(is_email()){
                                    $error["email"]="Không đúng yêu cầu định dạng ";

                          }else{
                           $mail=$_POST["email"];

                             if(check_login_normal($mail)){
                               $error["email"]="Email đã tồn tại";
                               }
                          }
                }
      }





      if(empty($_POST["password"])){
                $error["password"]="Vui lòng không để trống mật khẩu";
      }else{

                if(!(strlen($_POST["password"])>5 && strlen($_POST["password"])<31)){
                          $error["password"]="Không đúng yêu cầu độ dài [5-31]";

                }else{
                          if(is_pass()){
                           $error["password"]="Không đúng yêu cầu định dạng ";

                          }else{
                                    $password=md5($_POST["password"]);

                          }
                }
      }

      if(empty($_POST["phone"])){
         $error["phone"]="Vui lòng không để trống điện thoại";
}else{

         if(!(strlen($_POST["phone"])>9 && strlen($_POST["phone"])<12)){
                   $error["phone"]="Không đúng yêu cầu độ dài [9-12]";

         }else{
                   if(is_phone($_POST["phone"])){
                    $error["phone"]="Không đúng yêu cầu định dạng ";

                   }else{
                             $phone=$_POST["phone"];

                   }
         }
}


if(empty($error)){

   if(!check_login_normal($mail)){
      add_customer($fullname,$username,$mail,$password,$phone,null,null);
      $congratulation["success"]="Đăng ký thành công";
   }else{
      $error["check_exist"]="Tài khoản đã tồn tại";

   }
}
}





load_view("sign");

}

function layoutAction(){
   require "./helper/redirect.php";
   $code=$_GET["code"];
 if (isset($_GET['code'])) {
   $token= $client->fetchAccessTokenWithAuthCode($code);
   // print_r( $token);
   $client->setAccessToken($token['access_token']);
      // get profile info
   $google_oauth = new Google_Service_Oauth2($client);
   $google_account_info = $google_oauth->userinfo->get();
// echo "<pre>";
//    print_r($google_account_info);
//    echo "</pre>";

   $customer_fullname=$google_account_info["givenName"];
   $customer_username=$google_account_info["name"];
   $customer_email=$google_account_info["email"];
   $customer_img=$google_account_info["picture"];
   $customer_phone="";
   $customer_password="";
   $google_id=$google_account_info["id"];
   if(!check_login( $google_id)){
      add_customer($customer_fullname,$customer_username,$customer_email,$customer_password,$customer_phone,$customer_img,  $google_id);   
   }
   $_SESSION["is_login"]=true;
   $_SESSION["username"]=$customer_username;
   $_SESSION["img"]=$customer_img;
   $_SESSION["email"]=$customer_email;
   $_SESSION["fullname"]=$customer_fullname;



header("Location:?mod=home&controller=index&action=index");

 } 


}

function logoutAction(){
   unset($_SESSION["is_login"]);
   unset( $_SESSION["username"]);
   unset($_SESSION["img"]);
   unset($_SESSION["email"]);
   unset($_SESSION["email_pass"]);
   unset($_SESSION["fullname"]);
   unset($_SESSION["phone"]);


   header("Location:?mod=home&controller=index&action=index");

 }


 function forgetPasswordAction(){
   global $error ,$mail,$congratulation;
   $error=array();
if(isset($_POST["btn_forget_pass"])){

   if(empty($_POST["email"])){
      $error["email"]="Vui lòng không để trống email";
}else{

      if(!(strlen($_POST["email"])>6 && strlen($_POST["email"])<32)){
                $error["email"]="Không đúng yêu cầu độ dài [5-32]";

      }else{
                if(is_email()){
                          $error["email"]="Không đúng yêu cầu định dạng ";

                }else{
                 $mail=$_POST["email"];

                   if(!check_login_normal($mail)){
                     $error["email"]="Email không tồn tại";
                     }
                }
      }
}


if(empty($error)){
   $reset_token="A".substr(md5(time()), rand(0, 26), 6);
// echo $reset_token;
   $data=array(
      'reset_token'=>$reset_token,
   );

update_reset_token($mail,$data);
// send email 

$subject="Khoi phuc mat khau ";
$content="
<p>Chào bạn </p>
<h3>Mã reset mật khẩu: </h3><span>$reset_token</span>
";
 send_mail($mail,"",$subject,$content);
//  $congratulation["success_email"]="Gửi email  thành công";
$_SESSION["email_pass"]=$mail;
 header("Location:?mod=login&controller=index&action=resetPassword");

}
}

   load_view('forget_password');
 }

 function resetPasswordAction(){
   global $error ,$mail,$congratulation;

   if(isset($_POST["btn_reset_pass"])){
      if(empty($_POST["token"])){
         $error["token"]="Vui lòng không để trống mã ";
   }else{
   
      $token=$_POST["token"];
      if(!check_token($token,$_SESSION["email_pass"])){
        $error["token"]="Mã số không tồn tại";
        }
   }


   if(empty($_POST["new_password"])){
      $error["new_password"]="Vui lòng không để trống mật khẩu mới";
}else{

      if(!(strlen($_POST["new_password"])>6 && strlen($_POST["new_password"])<32)){
                $error["new_password"]="Không đúng yêu cầu độ dài [5-32]";

      }else{
                if(is_pass_change($_POST["new_password"])){
                          $error["new_password"]="Không đúng yêu cầu định dạng ";

                }else{
                 $new_pass=md5($_POST["new_password"]);
                }
      }
}


if(empty($error)){
   $data=array(
      'customer_password'=>$new_pass,
   );
update_password($data,$token);
$congratulation["success_change"]="Thay đổi mật khẩu thành công";
}

   }

   load_view('resetPass');

 }
?>