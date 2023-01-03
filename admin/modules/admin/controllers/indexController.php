<?php

function construct(){
          load_model('index');
       
}


function indexAction(){
          if(isset($_POST["btn-update_infor"])){
            global $error , $fullname,$username,$email,$phone,$address,$congratulation;
                        $id=$_SESSION["admin_id"];
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
                    update_infor_admin($id,$fullname,$username,$email,$phone,$address);

                    $congratulation["upadate_infor"]="Bạn đã cập nhật thành công ";

              }


          }

$infor_admin=get_infor_admin();
$data["infor_admin"]=$infor_admin;
load_view("index",$data);
}


function changePassAction(){
          global $error ,$pass_old,$pass_new,$confirm_pass,$congratulation;
          $id=$_SESSION["admin_id"];


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

                              pass_change($id,$pass_new);
                              $congratulation["pass_change"]="Bạn đã thay đổi mật khẩu thành công  thành công ";


                    }








          }
          load_view("change_pass");

}


function add_managerAction(){
      global $error , $fullname,$username,$email,$password,$address,$phone,$congratulation;
      $error=array();
      $congratulation=array();
if(isset($_POST["btn-insert-manager"])){
      if(empty($_POST["fullname"])){
            $error["fullname"]=" Vui lòng không để trống tên họ và tên";
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
                        if(check_exists_username($username)){
                              $error["username"]="Tên đăng nhâp đã tồn tại .Vui lòng chọn tên khác";
                        };
      
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
                      $error["address"]=" Không đúng yêu cầu độ dài [6-100]";
      
            }else{
                     
                                $address=$_POST["address"];
      
                      
            }
      }
      
      if(empty($_POST["password"])){
            $error["password"]="Vui lòng không để trống mật khẩu";
      }else{
      
            if(!(strlen($_POST["password"])>5 && strlen($_POST["password"])<32)
             ){
                      $error["pass-old"]="Không đúng độ dài yêu cầu  [5-32]";
      
      
            }else{
                      if(is_pass()){
                                $error["password"]="Không đúng yêu cầu định dạng ([A-Z]){1}([\w_\.!@#$%^&*()]";
      
                       }else{
                                $password=md5($_POST["password"]);
                       }
            }
      }


      if(empty($error)){
            add_manager($fullname,$username,$email,$password,$address,$phone);
            $congratulation["add_manager"]="Bạn đã tạo quản lý thành công";
      }
}

      load_view("add_manager");
}

function list_managerAction(){
global $list_manager;
      if(isset($_POST["btn_search_username"])){
$username_search=$_POST["search_username"];
    $list_manager=  search_username($username_search);
    $data["list_manager"]=$list_manager;


}else{

      $list_manager=list_manager();
      $data["list_manager"]=$list_manager;

}


load_view("list_manager",$data);





}


function deleteManagerAction(){
      $user_id=$_GET["user_id"];
  get_delete_by_id($user_id);

  header("Location:?mod=admin&controller=index&action=list_manager");

}

function deleteManagerAllAction(){
      get_delete_all();

      header("Location:?mod=admin&controller=index&action=list_manager");
}


?>