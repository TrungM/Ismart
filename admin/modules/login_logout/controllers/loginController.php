<?php

function construct(){
          load_model('index');
         //  load("lib","send_mail");
       }


       function loginAction(){
                              if(isset($_POST["btn_login"])){
                                 global $error ,$username,$password;
                                 $error=array();         
                                 if(empty($_POST["username"])){
                                          $error["username"]=" Vui lòng không để trống tên đăng nhập ";
                                 }else{

                                          if(!(strlen($_POST["username"])>6 && strlen($_POST["username"])<32)){
                                                   $error["username"]=" Không đúng yêu cầu độ dài [6-32]";

                                          }else{
                                                   if(is_username()){
                                                               $error["username"]="Không đúng yêu cầu định dạng [A-Z a-z 0-9_\.]";

                                                   }else{
                                                               $username=$_POST["username"];

                                                   }
                                          }
                                 }

                                 if(empty($_POST["password"])){
                                    $error["password"]="Vui lòng không để trống tên mật khẩu";
                        }else{

                                    if(!(strlen($_POST["password"])>5 && strlen($_POST["password"])<31)){
                                             $error["password"]="Không đúng yêu cầu độ dài [5-31]";

                                    }else{
                                             if(is_pass()){
                                                      $error["password"]="Không đúng yêu cầu định dạng ([A-Z]){1}([\w_\.!@#$%^&*()]";

                                             }else{
                                                      $password=md5($_POST["password"]);

                                             }
                                    }
                        }


                        if(check_login($username,$password)){
                           $_SESSION["is_login_admin"]=true;
                           $_SESSION["username_admin"]=$username;
                           $admin_id=admin_id();
                           $_SESSION["admin_id"]=$admin_id;
                           header("Location:?mod=post&controller=list_post&action=list_post");
                        } else if(check_login_manager($username,$password)){
                           $_SESSION["is_login_admin"]=true;
                           $_SESSION["username_admin"]=$username;
                           $_SESSION["manager"]=true;
                           header("Location:?mod=post&controller=list_post&action=list_post");
                        }else{
                           $error["login"]="Đăng nhập thất bại ";
                        }



                        if (isset($_POST["remember_me"]) && check_login($username,$password)) {
                           setcookie("is_login_admin",true, time()+3600);
                           setcookie("user",$_POST['username'], time()+3600);     
                 }



            

       }

          load_view("login");
       }


      //  function mainAction(){
      //    load_view("main");

      //  }


       function logoutAction(){
         logout();
       }


      //  function resetAction(){
      //    global $error ,$mail,$fullname;
      //    $error=array();     
      //       if(isset($_POST["btn_req"])){
      //          if(empty($_POST["email"])){
      //             $error["email"]="Vui long khong  de trong email";
      //           }else{
   
      //             if(!(strlen($_POST["email"])>6 && strlen($_POST["email"])<32)){
      //                       $error["email"]="Khong dung yeu cau do dai [5-32]";
   
      //             }else{
      //                       if(is_email()){
      //                                 $error["email"]="Khong dung yeu cau dinh dang ";
   
      //                       }else{
      //                                 $mail=$_POST["email"];
   
      //                       }
      //             }
      //   }
   
      //                   if(empty($error)){
      //                      if(check_email($mail)){
      //                         $reset_token=md5($mail.time());
      //                         $data=array
      //                         (
      //                            'reset_token'=>$reset_token,
      //                         );
      //                         update_token($data,$mail);
      //                         //gui link vao eamil 
      //                         $link_reset=base_url("?mod=user&controller=login&action=resetpass&reset_token={$reset_token}");
      //                         $content="
      //                         <p>Hello, {$fullname}</p>
      //                         <h3>Toke reset from  Unitop.vn</h3>
      //                         <p><a href='{$link_reset}'>Click here</a> to active account </p>
      //                        ";
   
      //                         //  send_mail($mail,"","Khoi phuc mat khau ",$content);
   
      //                      }else{
      //                         $error["email_not_exists"]="Email khong ton tai";
   
      //                      }
      //                   }
                           
   
      //       }
   
   
      //       load_view("reset");

      //    }

  

       



      //  function resetpassAction(){
      //    global $error ,$password;
      //    $error=array();     
      //    $reset_token =$_GET["reset_token"] ;
      //    if(isset($reset_token)){
      //       if(check_reset_token($reset_token)){
      //          if(isset($_POST['btn_reset'])){
      //             if(empty($_POST["password"])){
      //                $error["password"]="Vui long khong  de trong password";
      //                   }else{
   
      //                  if(!(strlen($_POST["password"])>5 && strlen($_POST["password"])<31)){
      //                         $error["password"]="Khong dung yeu cau do dai [5-31]";
   
      //                }else{
      //                         if(is_pass()){
      //                                  $error["pass"]="Khong dung yeu cau dinh dang ";
   
      //                         }else{
      //                                  $password=$_POST["password"];
   
      //                         }
      //                }
      //                     }
   
   
      //                     if(empty($error)){
      //                      $data=array(
      //                         "password"=>md5($password),
      //                      );
   
      //                      update_pass($data,$reset_token);
   
      //                      header("Location:?mod=user&controller=login&action=resetOk");
      //                     }
   
      //          }
      //          load_view("updatepass");
      //       } else{
      //        echo "Ye cau lay lai mat khau khong hop le";
      //       }
   
   
      //    }
       

      //  }




      //  function resetOkAction(){
      //    load_view("resetOK");

      //  }