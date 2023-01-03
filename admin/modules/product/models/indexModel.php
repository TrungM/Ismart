<?php

function add_cat($cat_title,$creater,$item){
          global $cat_title ;
          $result=db_insert("tb_category",array
          (
                    'cat_title'=>$cat_title ,
                    'created_at'=>date("Y/m/d") ,
                    'creater'=>$creater ,
                   'active'=>$item ,
          ));

          return $result;
}

function list_cat_child($item){

      $sql=db_fetch_array("SELECT * FROM `tb_category` WHERE NOT  `active`='$item'  ");

      foreach($sql as $item){
          return   '<option value="<?php echo  $item["cat_title"]?>"><?php echo  $item["cat_title"]?></option>';
      }
}
function list_cat(){

          $sql=db_fetch_array("SELECT * FROM `tb_category` WHERE `active`='0'  ");

          return $sql;
}

function list_cat_all(){

          $sql=db_fetch_array("SELECT * FROM `tb_category`  ORDER BY   `active`='0' DESC ");

          return $sql;
}


function delete_cat($item){
          
          $sql= db_delete("tb_category", "`cat_title`='$item' OR `active`='$item'");


          return $sql;

}

function update_cat(){

}

function update_infor_admin( $id, $cat_title, $active ,   
) {
          $result = db_update("tb_category", array(
               
                    "cat_title"=>$cat_title,
                    "active"=>$active,
                    "creater_update"=> $_SESSION["username_admin"],
                    "update_at" => date("Y/m/d"),
          ), " `cat_id`='$id'");


          return $result;
}
function update_second($title ,$cat_title){
          $result = db_update("tb_category", array(
             "active"=>$cat_title     ,      
         "creater_update"=> $_SESSION["username_admin"],
           "update_at" => date("Y/m/d"),
          ), " `active`='$title'");
          return $result;

}

function check_cat_title($cat_title){
          $sql = db_num_rows("SELECT `active` FROM `tb_category` WHERE `active`='$cat_title'");
          if ($sql > 0) {
                    return true;
          }
          return false;
}
function list_cat_by_id($id){

          $sql=db_fetch_array("SELECT * FROM `tb_category` WHERE `cat_id`='$id'");

          return $sql;
}
// check tồn tại trong select
function list_cat_update($cat_title){
          $sql=db_fetch_array("SELECT * FROM `tb_category` WHERE NOT  `cat_title`='$cat_title'  AND   `active`='0'  ");

          return $sql;
}


function add_product($product_name,$product_price,$product_title,$product_description,$product_code,$product_img,$cat_title,$cat_title_child){
    
        $result=db_insert("tb_product",array
        (
              'product_name'=>$product_name,
              'product_price'=>$product_price,
              'product_title'=>$product_title,
              'product_name'=>$product_name,
              'product_description'=>$product_description,
              'product_code'=>$product_code,
              'product_img'=>$product_img,
              'creater'=> $_SESSION["username_admin"],
              'cat_title_main'=>$cat_title,
              'cat_title_child'=>$cat_title_child,
              'created_at'=>date("Y/m/d") ,



        ));

        return $result;
}



function list_product(){
      $sql= db_fetch_array( "SELECT *FROM `tb_product`");


        foreach($sql as &$item){
                  $item["delete"] = "?mod=product&controller=index&action=deleteProduct&product_id=";
                  $item["detail"] = "?mod=product&controller=index&action=detailProduct&product_id=";

 }

 return $sql;
}


function delete_product($item){
          
      $sql= db_delete("tb_product", "`product_id`='$item' ");


      return $sql;

}

function count_product(){
      $sql =db_num_rows("SELECT *FROM  `tb_product`");
      return $sql;

}
function list_product_by_id($id){
      $sql= db_fetch_array( "SELECT* FROM `tb_product` WHERE `product_id`=$id ");

     
 return $sql;
}
function update_product($id,$product_name,$product_price,$product_title,$product_description,$product_code,$product_img,$cat_title,$cat_title_child){

      $result = db_update("tb_product", array(
               
            'product_name'=>$product_name,
              'product_price'=>$product_price,
              'product_title'=>$product_title,
              'product_name'=>$product_name,
              'product_description'=>$product_description,
              'product_code'=>$product_code,
              'product_img'=>$product_img,
              'creater_update'=> $_SESSION["username_admin"],
              'cat_title_main'=>$cat_title,
              'cat_title_child'=>$cat_title_child,
              'update_at'=>date("Y/m/d") ,
  ), " `product_id`='$id'");

  return $result;

}

?>