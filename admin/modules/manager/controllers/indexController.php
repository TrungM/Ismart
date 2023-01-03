<?php

function construct(){
          load_model('index');
       
}
///////////////////////////////////////////////////////////////////////////////
function infor_managerAction(){
      if(isset($_POST["btn-update_infor_manager"])){
            global $error ,$name, $fullname,$username,$email,$phone,$address,$congratulation;
            $name=$_SESSION["username"];
            $error=array();
            $congratulation=array();
            if(empty($_POST["fullname"])){
                      $error["fullname"]=" Vui lòng không để trống tên hiển thị  ";
            }else{

                      if(!(strlen($_POST["fullname"])>6 && strlen($_POST["fullname"])<32)){
                                $error["fullname"]=" Không đúng yêu cầu độ dài [6-32]";

                      }else{
                                if(is_fullname()){
                                          $error["fullname"]="Không đúng yêu cầu định dạng [A-Z a-z 0-9_\.]";

                                }else{
                                $fullname=$_POST["fullname"];
                                }
                      }
            }


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


            if(empty($_POST["email"])){
                      $error["email"]="Vui lòng không để trống email";
            }else{

                      if(!(strlen($_POST["email"])>6 && strlen($_POST["email"])<32)){
                                $error["email"]="Không đúng độ dài yêu cầu [6-32]";

                      }else{
                                if(is_email()){
                                          $error["email"]="Không đúng định dạng";

                                }else{
                                          $email=$_POST["email"];

                                }
                      }
            }

            if(empty($_POST["phone"])){
                      $error["phone"]="Vui lòng không để trống số điện thoại ";
            }else{

                      if(!(strlen($_POST["phone"])>7 && strlen($_POST["phone"])<12)){
                                $error["email"]="Không đúng yêu cầu độ dài [7-12";

                      }else{
                                if(is_phone(($_POST["phone"]))){
                                          $error["email"]="Không đúng yêu cầu định dạng  ";

                                }else{
                                          $phone=$_POST["phone"];

                                }
                      }
            }

            if(empty($_POST["address"])){
                      $error["address"]=" Vui lòng không để trống tên địa chỉ  ";
            }else{

                      if(!(strlen($_POST["address"])>6 && strlen($_POST["address"])<100)){
                                $error["username"]=" Không đúng yêu cầu độ dài [6-100]";

                      }else{
                               
                                          $address=$_POST["address"];

                                
                      }
            }



  
      if(empty($error)){
            update_infor_manager($name,$fullname,$username,$email,$phone,$address);

            $congratulation["upadate_infor_manager"]="Bạn đã cập nhật thành công ";

      }


  }
$name=$_SESSION["username"];
$infor_manager=get_infor_manager($name);
$data["infor_manager"]=$infor_manager;
load_view("infor",$data);


}

////////////////////////////////////////////////////////////
function changePassAction(){
      global $error ,$pass_old,$pass_new,$confirm_pass,$congratulation;
      $name=$_SESSION["username"];
      $error=array();
      $congratulation=array();
      if(isset($_POST["btn_update_pass"])){

                if(empty($_POST["pass-old"])){
                          $error["pass-old"]="Vui lòng không để trống mật khẩu cũ";
                }else{

                          if(!(strlen($_POST["pass-old"])>5 && strlen($_POST["pass-old"])<32)
                           ){
                                    $error["pass-old"]="Không đúng độ dài yêu cầu mật khẩu cũ  [5-32]";


                          }else{
                                    if(is_pass_change($_POST["pass-old"])){
                                              $error["pass-old"]="Không đúng yêu cầu định dạng ([A-Z]){1}([\w_\.!@#$%^&*()]";

                                     }else{
                                              $pass_old=md5($_POST["pass-old"]);
                                              if(!check_pass($pass_old)){
                                                        $error["pass-old"]="Mật khẩu không tồn tại .Vui lòng nhập lại ";

                                              }
                                     }
                          }
                }


                if(empty($_POST["pass-new"])){
                          $error["pass-new"]="Vui lòng không để trống mật khẩu mới";
                }else{



                          if(!(strlen($_POST["pass-new"])>5 && strlen($_POST["pass-new"])<32)
                           ){
                                    $error["pass-new"]="Không đúng độ dài yêu cầu mật khẩu mới  [5-32]";


                          }else{
                                    if(is_pass_change($_POST["pass-new"])){
                                              $error["pass-new"]="Không đúng yêu cầu định dạng ([A-Z]){1}([\w_\.!@#$%^&*()]";

                                     }else{

                                              if($_POST["pass-old"]==$_POST["pass-new"]){
                                                        $error["pass-new"]="Vui lòng không nhập giống mật khẩu cũ";

                                              }else{
                                                        $pass_new=md5($_POST["pass-new"]);

                                              }

                                     }
                          }
                }



                if(empty($_POST["confirm-pass"])){
                          $error["confirm-pass"]="Vui lòng không để trống xác nhận mật khẩu mới";
                }else{

                       

                          if(!(strlen($_POST["confirm-pass"])>5 && strlen($_POST["confirm-pass"])<32))
                          {
                                    $error["confirm-pass"]="Không đúng độ dài yêu cầu mật khẩu mới  [5-32]";


                          }else{
                                    if(is_pass_change($_POST["confirm-pass"])){
                                              $error["confirm-pass"]="Không đúng yêu cầu định dạng ([A-Z]){1}([\w_\.!@#$%^&*()]";

                                     }else{
                                              if($_POST["confirm-pass"]!=$_POST["pass-new"]){

                                                        $error["confirm-pass"]="Mật khẩu xác nhận không hợp lệ .Vui lòng nhập lại ";
                          
                                                        }else{
                                                                  $confirm_pass=md5($_POST["confirm-pass"]);

                                                        }

                                     }
                          }
                }

                if(empty($error)){

                          pass_change($name,$pass_new);
                          $congratulation["pass_change"]="Bạn đã thay đổi mật khẩu thành công  thành công ";


                }








      }
      load_view("change_pass");

}


