<?php


function get_infor_admin()
{
          $result = db_fetch_array("SELECT * FROM `tb_admin`");

          return  $result;
}



function update_infor_admin(
          $id,
          $fullname,
          $username,
          $email,
          $phone,
          $address
) {
          $result = db_update("tb_admin", array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    "update_at" => date("Y/m/d"),
          ), " `admin_id`=$id");

          return $result;
}



function pass_change($id, $pass_new)
{
          $result = db_update("tb_admin", array(
                    'password' => $pass_new,
          ), " `admin_id`=$id");

          return $result;
}

function check_pass($pass_old)
{
          $sql = db_num_rows("SELECT * FROM `tb_admin` WHERE  `password`='{$pass_old}'");

          if ($sql > 0) {
                    return true;
          }
          return false;
}


function check_exists_username($username){
$sql= db_num_rows("SELECT * FROM `tb_manager` WHERE `username`='{$username}'");

if($sql>0){
          return true;
}
return false;
} 


function add_manager($fullname, $username, $email, $password, $address, $phone)
{


          $sql = db_insert("tb_manager", array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'phone' => $phone,
                    'address' => $address,
                    "created_at" => date("Y/m/d"),
          ));

          return $sql;
}


function list_manager()
{
           global $page_next,$page_prv,$num_page,$page,$number;
           $number = db_num_rows("SELECT * FROM `tb_manager` ");
           $_SESSION["rows"] = db_num_rows("SELECT * FROM `tb_manager` ");

           // so luong cot trong bảng 
           $total_rows =$number;
           // so luong muon hien thi cua rows
           $num_per_page =2;
           //số lượng trang phân được
           $num_page = ceil($total_rows / $num_per_page);

           $page = isset($_GET['page']) ? $_GET['page'] : 1;
           $start = ($page - 1) * $num_per_page;
           $page_prv = $page - 1;
           $page_next = $page +1;
           $sql = "SELECT * FROM `tb_manager` LIMIT {$start},{$num_per_page}";
           $result =db_query($sql);
             $list_manager = array();
             $stt=0;
             $num_rows=mysqli_num_rows($result);
             if ($num_rows > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
                 $list_manager[] = $row;
             }

             foreach($list_manager as &$item){
                              $item["delete"] = "?mod=admin&controller=index&action=deleteManager&user_id=";

                    

             }
             }




          return $list_manager;
}

function get_delete_by_id($user_id){

          $result =db_delete("tb_manager","  `user_id`='{$user_id}'");

          return $result;


}

function get_delete_all(){
          $result =db_delete_all("tb_manager");

          return $result;


}


function search_username($username_search){
          $sql= db_fetch_array("SELECT * FROM `tb_manager` WHERE `username` LIKE '%$username_search%'");
          foreach($sql as &$item){
                    $item["delete"] = "?mod=admin&controller=index&action=deleteManager&user_id=";
   }

   return $sql;

}


