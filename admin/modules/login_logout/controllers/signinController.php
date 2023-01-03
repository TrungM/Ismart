<?php

function construct(){
          load_model('index');
load("lib","send_mail");
}
       
       function signinAction(){
                    global $error , $fullname,$username,$mail;
                    $error=array();
          if(isset($_POST["btn_sign"])){
                    if(empty($_POST["fullname"])){
                              $error["fullname"]="Vui long khong  de trong fullname";
                    }else{

                              if(!(strlen($_POST["fullname"])>6 && strlen($_POST["fullname"])<32)){
                                        $error["fullname"]="Khong dung yeu cau do dai [5-32]";

                              }else{
                                        if(is_fullname()){
                                                  $error["fullname"]="Khong dung yeu cau dinh dang ";

                                        }else{
                                        $fullname=$_POST["fullname"];
                                        }
                              }
                    }


                    if(empty($_POST["username"])){
                              $error["username"]="Vui long khong  de trong username";
                    }else{

                              if(!(strlen($_POST["username"])>6 && strlen($_POST["username"])<32)){
                                        $error["username"]="Khong dung yeu cau do dai [5-32]";

                              }else{
                                        if(is_username()){
                                                  $error["username"]="Khong dung yeu cau dinh dang ";

                                        }else{
                                                  $username=$_POST["username"];

                                        }
                              }
                    }


                    if(empty($_POST["email"])){
                              $error["email"]="Vui long khong  de trong email";
                    }else{

                              if(!(strlen($_POST["email"])>6 && strlen($_POST["email"])<32)){
                                        $error["email"]="Khong dung yeu cau do dai [5-32]";

                              }else{
                                        if(is_email()){
                                                  $error["email"]="Khong dung yeu cau dinh dang ";

                                        }else{
                                                  $mail=$_POST["email"];

                                        }
                              }
                    }





                    if(empty($_POST["password"])){
                              $error["password"]="Vui long khong  de trong password";
                    }else{

                              if(!(strlen($_POST["password"])>5 && strlen($_POST["password"])<31)){
                                        $error["password"]="Khong dung yeu cau do dai [5-31]";

                              }else{
                                        if(is_pass()){
                                                  $error["pass"]="Khong dung yeu cau dinh dang ";

                                        }else{
                                                  $password=$_POST["password"];

                                        }
                              }
                    }

                 

// tu du lam ma kich hoat 
// insert database voi  ma token 
// gui ma token qua email 
//cap nhap lai active la 1 (da dc kich hoat hay chua )
      //               if( !field_exists($_POST["username"],$_POST["email"])){
      //                         if(empty($error)){
      //                                   // tu duy bao mat 
      //                                   $active_token=md5($username.time());
      //                                   $data=array(
      //                                             "username"=> $_POST["username"],
      //                                             "fullname"=> $_POST["fullname"],
      //                                             "email"=> $_POST["email"],
      //                                             "password"=> md5($_POST["password"]),
      //                                             'active_token'=>  $active_token,
      //                                           // //   chi chon kich hoat trong 24 h hoac co tai khoan khac 
      //                                           //   'reg_date'=>time(),
      //                                   );
      //                                   $link_active=base_url("?mod=user&controller=signin&action=active&token={$active_token}");
      //                                   $content="
      //                                   <p>Hello, {$fullname}</p>
      //                                   <h3>Welcome to Unitop.vn</h3>
      //                                   <p><a href='{$link_active}'>Click here</a> to active account </p>
      //                                   <p>Thank you for using our program</p>";
      //                                   add_user($data);
      //                                                     //  echo  send_mail("minhtrung1810123@gmail.com","Minh Trung","How cam I hepl you ??",$content);
      //                                   header("Location:?mod=user&controller=login&action=login");

      //                         }

      //               }else{

      //                         $error["reg"]="Username hoac email da ton tai ";

      //               }




      //     }

      //     load_view("signin");
       }




      //  function activeAction(){
      //     $active_token=$_GET["token"];
      //     $link=base_url("?mod=user&controller=login&action=login");
      //     if(check_token($active_token)){
      //         active($active_token);
      //       echo "Ma kich hoat  hop le !!! <a href='$link'>Click here</a>";
      //     }else{
      //       echo "Ma kich hoat khong hop le hoac tai khoan da kich hoat truoc do !!! <a href='$link'>Click here</a>";
      //     }

       }
