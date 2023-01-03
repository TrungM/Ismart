<?php
   // ham dung chung  co tinh global 
function construct(){
   load_model('index');

}
// use ajax
function select_cat_titleAction(){
   // dữ liệu của active lấy từ file add_product
   $a=$_POST["main_title"];
   // list_cat_child($_POST["main_title"]);
   $sql=db_fetch_array("SELECT * FROM `tb_category` WHERE   `active`='$a'  ");
   echo ' <option value="Không có giá trị">-- Chọn danh mục --</option> ';
      foreach($sql as $item){
          echo    '<option value="' .$item['cat_title'].'"> '.$item['cat_title'].' </option>';
      }
}
function  add_productAction(){
   global $error , $product_name,$product_code,$product_title,$product_price,$product_description,$cat_title,$congratulation,$upload,$product_img,$img_name;
   $error=array();
   $congratulation=array();



   if(isset($_POST["btn-upload-thumb"])){

     
      $upload_dir = "../public/images/";
      // duong dan sau khi upload 
      $upload_img = $upload_dir . $_FILES["file"]["name"];
      $type_allow = array("png", "jpg", "gif", "jpeg");
      // lấy đuôi ảnh 
      $type_img = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
      if (!in_array(strtolower($type_img), $type_allow)) {
            $error["img"] = "Chi duoc upload file co duoi png, jpg,gif, jpeg";
      }
      // upload file co kich thuc cho phep
      $file_size = $_FILES["file"]["size"];
      if ($file_size > 29000000) {
            $error["img"] = "Chi duoc upload file co duoi < 29000000";
      }
      // kiem tra file co ton tai hay chua 
      if (file_exists($upload_img)) {


            $file_name = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
            $file_exists=$file_name."(Copy).";
            // duong dan moi bang cac noi bien 
            $new_upload =$upload_dir.$file_exists.$type_img ;
            $k=1;
            // echo $new_upload;
            while(file_exists($new_upload)){
                  $file_exists=$file_name."(Copy){$k}.";
                  $k++;
                  $new_upload =$upload_dir.$file_exists.$type_img ;
            }
            $upload_img=$new_upload;
      }

      if(empty($error)){
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_img)) {
            $upload=$upload_img;
            $img_name= $_FILES["file"]["name"];
            
         }
      }
}

   
                  if(isset($_POST["btn_add_product"])){

                     if(empty($_POST["product_name"])){
                        $error["product_name"]="Vui lòng không để trống tên sản phẩm";
                  }else{
                  
                        if(!(strlen($_POST["product_name"])>5 && strlen($_POST["product_name"])<200)
                        ){
                                 $error["product_name"]="Không đúng độ dài yêu cầu  [5-200";
                  
                  
                        }else{
                  
                                    $product_name=$_POST["product_name"];  
                                 
                        }
                  }

                     if(empty($_POST["product_code"])){
                        $error["product_code"]="Vui lòng không để trống mã sản phẩm";
                  }else{

                        if(!(strlen($_POST["product_code"])>5 && strlen($_POST["product_code"])<32)
                        ){
                                 $error["product_code"]="Không đúng độ dài yêu cầu  [5-32]";


                        }else{

                           $product_code=$_POST["product_code"];                  
                                 
                        }
                  }

                  if(empty($_POST["product_title"])){
                     $error["product_title"]="Vui lòng không để trống mô tả ngắn ";
                  }else{
                     $product_title=$_POST["product_title"];                  


                  }

                  if(empty($_POST["price"])){
                     $error["price"]="Vui lòng không để trống giá sản phẩm ";
                  }else{

                     if(!($_POST["price"]>0 ))
                     {
                              $error["price"]="Không đúng độ dài yêu cầu  [5-32]";


                     }else{

                        $product_price=$_POST["price"];                  
                              
                     }
                  }



                  if(empty($_POST["desc"])){
                     $error["desc"]="Vui lòng không để trống mô tả chi tiết ";
                  }else{
                     $product_description=$_POST["desc"];                  


              
                  }



                  if(empty($_POST["cat_title"])){
                     $error["cat_title"]="Vui lòng không để trống danh muc chính  ";
                  }else{

                        $cat_title=$_POST["cat_title"];           
                              
                  };

                  // if(empty($_POST["cat_title_child"])){
                  //    $error["cat_title_child"]="Vui lòng không để trống danh muc phụ  ";
                  // }else{

                        $cat_title_child=$_POST["cat_title_child"];           
                              
                  // };
                  if(empty($_POST["product_img"])){
                     $error["product_img"]="Vui lòng không để trống khu vực chọn ảnh";
                  }else{

                     $product_img=$_POST["product_img"];
                              
                  };



             

                  if(empty($error)){
                     add_product($product_name,$product_price,$product_title,$product_description,$product_code,$product_img,$cat_title,$cat_title_child);
                     $congratulation["add_product"]="Bạn đã thêm sản phẩm thành công";
                     // header("location:?mod=product&controller=index&action=list_product");
                     echo header("refresh: 2");


                  }
   }

      
   // $list_cat_child=list_cat_child();
   // $data["list_cat_child"]=$list_cat_child;

   $list_cat=list_cat();
   $data["list_cat"]=$list_cat;
   load_view("add_product",$data);

}

function  list_productAction(){


   $list_product=list_product();
   $data["list_product"]=$list_product;

   $count_product=count_product();
   $data["count_product"]=$count_product;
   load_view("list_product",$data);

}

function search_productAction(){
   $product_search=$_GET["name_search"];

   $sql=array();
   $sql= db_fetch_array("SELECT * FROM `tb_product` WHERE `product_code` LIKE '%$product_search%'");
   // $sql= db_fetch_array( "SELECT  FROM `tb_product` JOIN `tb_category` ON `tb_product`.`cat_title_main` = `tb_category`.`cat_id` WHERE `product_code` LIKE '%$product_search%'");

if(!empty($sql)){
   foreach($sql as $item){
      $item["delete"] = "?mod=product&controller=index&action=deleteProduct&product_id=";
      $item["detail"] = "?mod=product&controller=index&action=detailProduct&product_id=";

    echo ' <tr>';
    echo ' <td><span class="tbody-text">'.$item["product_code"].'</h3></span></td>';
    echo ' <td><div class="tbody-thumb"><img src="public/images/'.$item["product_img"].'" alt="" title=""></div></td>';
    echo  '<td class="clearfix">
    <div class="tb-title fl-left">
    <a href="" title="' .$item['product_name'].'">' .$item['product_name'].'</a>
     </div>
    <ul class="list-operation fl-right">
    <li><a href="'. $item["detail"].$item['product_id'].'" title="Chi tiết" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
    <li><a href='. $item["delete"].$item['product_id'].' " title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
      </ul>
    </td>';

    echo'<td><span class="tbody-text">'. number_format( $item["product_price"])."đ".'</span></td>';
    echo'<td><span class="tbody-text">'. $item["cat_title"].'</span></td>';
    echo'<td><span class="tbody-text">Hoạt động</span></td>';
    echo'<td><span class="tbody-text">'.$item["created_at"].'</span></td>';
    echo '</tr>';

}
}else{
   echo "<span class='error' style='color:red;text-align:center'>Không có kết quả tìm kiếm </span>";
}

}
function  deleteProductAction(){
$id=$_GET["product_id"];


   delete_product($id);
   header("Location:?mod=product&controller=index&action=list_product");

}
function detailProductAction(){

   global $error , $product_name,$product_code,$product_title,$product_price,$product_description,$cat_title,$congratulation,$upload,$product_img,$img_name,$id;
   $error=array();
   $congratulation=array();
   $id=$_GET["product_id"];
   // echo $id;


   if(isset($_POST["btn-upload-thumb"])){

     
      $upload_dir = "public/images/";
      // duong dan sau khi upload 
      $upload_img = $upload_dir . $_FILES["file"]["name"];
      $type_allow = array("png", "jpg", "gif", "jpeg");
      // lấy đuôi ảnh 
      $type_img = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
      if (!in_array(strtolower($type_img), $type_allow)) {
            $error["img"] = "Chi duoc upload file co duoi png, jpg,gif, jpeg";
      }
      // upload file co kich thuc cho phep
      $file_size = $_FILES["file"]["size"];
      if ($file_size > 29000000) {
            $error["img"] = "Chi duoc upload file co duoi < 29000000";
      }
      // kiem tra file co ton tai hay chua 
      if (file_exists($upload_img)) {


            $file_name = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
            $file_exists=$file_name."(Copy).";
            // duong dan moi bang cac noi bien 
            $new_upload =$upload_dir.$file_exists.$type_img ;
            $k=1;
            // echo $new_upload;
            while(file_exists($new_upload)){
                  $file_exists=$file_name."(Copy){$k}.";
                  $k++;
                  $new_upload =$upload_dir.$file_exists.$type_img ;
            }
            $upload_img=$new_upload;
      }

      if(empty($error)){
         if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_img)) {
            $upload=$upload_img;
            $img_name= $_FILES["file"]["name"];
            
         }
      }
}


   if(isset($_POST["btn_update_product"])){

      if(empty($_POST["product_name"])){
         $error["product_name"]="Vui lòng không để trống tên sản phẩm";
   }else{
   
         if(!(strlen($_POST["product_name"])>5 && strlen($_POST["product_name"])<200)
         ){
                  $error["product_name"]="Không đúng độ dài yêu cầu  [5-200";
   
   
         }else{
   
                     $product_name=$_POST["product_name"];  
                  
         }
   }

      if(empty($_POST["product_code"])){
         $error["product_code"]="Vui lòng không để trống mã sản phẩm";
   }else{

         if(!(strlen($_POST["product_code"])>5 && strlen($_POST["product_code"])<32)
         ){
                  $error["product_code"]="Không đúng độ dài yêu cầu  [5-32]";


         }else{

            $product_code=$_POST["product_code"];                  
                  
         }
   }

   if(empty($_POST["product_title"])){
      $error["product_title"]="Vui lòng không để trống mô tả ngắn ";
   }else{
      $product_title=$_POST["product_title"];                  


   }

   if(empty($_POST["price"])){
      $error["price"]="Vui lòng không để trống giá sản phẩm ";
   }else{

      if(!($_POST["price"]>0 ))
      {
               $error["price"]="Không đúng độ dài yêu cầu  [5-32]";


      }else{

         $product_price=$_POST["price"];                  
               
      }
   }



   if(empty($_POST["desc"])){
      $error["desc"]="Vui lòng không để trống mô tả chi tiết ";
   }else{
      $product_description=$_POST["desc"];                  



   }



   if(empty($_POST["cat_title"])){
      $error["cat_title"]="Vui lòng không để trống danh muc chính  ";
   }else{

         $cat_title=$_POST["cat_title"];           
               
   };

   // if(empty($_POST["cat_title_child"])){
   //    $error["cat_title_child"]="Vui lòng không để trống danh muc phụ  ";
   // }else{

         $cat_title_child=$_POST["cat_title_child"];           
               
   // };
   if(empty($_POST["product_img"])){
      $error["product_img"]="Vui lòng không để trống khu vực chọn ảnh";
   }else{

      $product_img=$_POST["product_img"];
               
   };





   if(empty($error)){
      update_product($id,$product_name,$product_price,$product_title,$product_description,$product_code,$product_img,$cat_title,$cat_title_child);
      $congratulation["add_product"]="Bạn đã cập nhật sản phẩm thành công";


   }
}


   $list_product_by_id=list_product_by_id($id);
   $data["list_product_by_id"]=$list_product_by_id;


   $list_cat=list_cat();
   $data['list_cat']=$list_cat;
   load_view("detail_product",$data);

}


function  add_categoryAction(){
global $cat_title ,$active,$error,$congratulation,$option_cat_child ;

$error=array();
$congratulation=array();
if(isset($_POST["btn-add-cat"])){

   if(empty($_POST["cat_title"])){
      $error["cat_title"]="Vui lòng không để trống tên danh mục ";
}else{

      if(!(strlen($_POST["cat_title"])>2 && strlen($_POST["cat_title"])<50)
       ){
                $error["cat_title"]="Không đúng độ dài  [2-20]";


      }else{
       
                  $cat_title=$_POST["cat_title"];                  
                 
      }
}

if(empty($_POST["creater"])){
   $error["creater"]="Vui lòng không để trống tên người tạo  ";
}else{

   if(!(strlen($_POST["creater"])>5 && strlen($_POST["creater"])<20)
    ){
             $error["creater"]="Không đúng độ dài yêu cầu   [5-20]";


   }else{
    
               $creater=$_POST["creater"];                  
              
   }
}



                     
                  if(!isset($_POST["cat_value"])){
                     $error["cat_value"]="Vui lòng không để trống lựa chọn ";

                  }else{

                     $active=$_POST["cat_value"];



                  }

                  if( $active==" " && empty($_POST["actions"])){
                     $error["actions"]="Vui lòng không để trống lựa chọn danh mục chính";

                  }else{

                     $option_cat_child=$_POST["actions"];



                  }


                  if(empty($error)){
                     if($active==" "){
                        add_cat($cat_title,$creater,$option_cat_child);
                        $congratulation["add_cat_child"]="Bạn đã thêm danh mục con thành công";
                     }else{
                        add_cat($cat_title,$creater,$active);
                        $congratulation["add_cat_main"]="Bạn đã thêm danh mục chính thành công";
                     }

                  }



}
$list_cat=list_cat();
$data['list_cat']=$list_cat;
   load_view("add_category",$data);

}
function category_productAction(){

$list_cat_all=list_cat_all();
   $data['list_cat_all']=$list_cat_all;
   load_view("category_product",$data);
   

}

function delete_categoryAction(){
   global $error;
   $error=array();
   $title=$_GET["title"];
   // $sql= db_num_rows( "SELECT `tb_product`.* , `tb_category`.`cat_title` FROM `tb_product` JOIN `tb_category` ON `tb_product`.`cat_title_main` = `tb_category`.`cat_id` WHERE `cat_title` ='$title' OR  `cat_title_child` ='$title' ");
   $sql= db_num_rows( "SELECT *FROM `tb_category`  WHERE `active` ='$title'  ");

   if($sql>0){
      $error["delete_category"]="Danh mục đang thực hiện chức năng";
      header("Location:?mod=product&controller=index&action=category_product");

   }
   if(empty($error)){
      delete_cat($title);
      header("Location:?mod=product&controller=index&action=category_product");
   }



   
}




function update_categoryAction(){
   global $cat_title ,$active,$error,$congratulation,$option_cat_child ;
$id=$_GET["id"];
$title=$_GET["title"];
   $error=array();
   $congratulation=array();
   if(isset($_POST["btn-update-cat"])){
   
      if(empty($_POST["cat_title"])){
         $error["cat_title"]="Vui lòng không để trống tên danh mục ";
   }else{
   
         if(!(strlen($_POST["cat_title"])>2 && strlen($_POST["cat_title"])<50)
          ){
                   $error["cat_title"]="Không đúng độ dài  [2-20]";
   
   
         }else{
          
                     $cat_title=$_POST["cat_title"];                  
                    
         }
   }
   
   if(empty($_POST["creater"])){
      $error["creater"]="Vui lòng không để trống tên người tạo  ";
   }else{
   
      if(!(strlen($_POST["creater"])>5 && strlen($_POST["creater"])<20)
       ){
                $error["creater"]="Không đúng độ dài yêu cầu   [5-20]";
   
   
      }else{
       
                  $creater=$_POST["creater"];                  
                 
      }
   }
   
   
   
                        
                     if(!isset($_POST["cat_value"])){
                        $error["cat_value"]="Vui lòng không để trống lựa chọn ";
   
                     }else{
   
                        $active=$_POST["cat_value"];
   
   
   
                     }
   
                     if( $active==" " && empty($_POST["actions"])){
                        $error["actions"]="Vui lòng không để trống lựa chọn danh mục chính";
   
                     }else{
                        
   
                        $option_cat_child=$_POST["actions"];
   
   
   
                     }

                     // if(check_cat_title($cat_title)){
                     //    $error["check_cat_title"]="Danh mục đang thực hiên chức năng";

                     // }
   
   
                     if(empty($error)){
                        if($active==" "){
                           update_infor_admin($id,$cat_title,$option_cat_child);
                           $congratulation["update_cat_child"]="Bạn đã thêm danh mục con thành công";
                        }else{
                           if(  update_infor_admin($id,$cat_title,$active)==true){
                              update_second($title,$cat_title);


                           }
                         
                           $congratulation["update_cat_main"]="Bạn đã thêm danh mục chính thành công";
                        }
   
                     }
   
   

   }
   $list_cat_update=list_cat_update($title);
   $data['list_cat_update']=$list_cat_update;
   $list_cat_by_id=list_cat_by_id($id);
   $data["list_cat_by_id"]=$list_cat_by_id;
   load_view("update_category",$data);

}





?>