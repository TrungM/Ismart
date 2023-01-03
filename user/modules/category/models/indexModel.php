<?php


function list_product_cat($title){
          $sql=db_fetch_array("SELECT  * FROM `tb_product`  WHERE `cat_title_main`='$title' or   `cat_title_child`='$title'");
          foreach ($sql as &$item){
                    $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
                    $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
                    $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";
        
        
              }
          return $sql;
    
    }
    function list_product_page($title)
    {
               global $page_next,$page_prv,$num_page,$page,$number;
               $number = db_num_rows("SELECT  * FROM `tb_product`  WHERE `cat_title_main`='$title' or  `cat_title_child`='$title'");
               $_SESSION["rows_product"] =$number;
    
               // so luong cot trong bảng 
               $total_rows =$number;
               // so luong muon hien thi cua rows
               $num_per_page =8;
               //số lượng trang hân được
               $num_page = ceil($total_rows / $num_per_page);
    
               $page = isset($_GET['page']) ? $_GET['page'] : 1;
               $start = ($page - 1) * $num_per_page;
               $page_prv = $page - 1;
               $page_next = $page +1;
               // để thực phân trang
$sql = "SELECT * FROM `tb_product`  WHERE `cat_title_main`='$title' or  `cat_title_child`='$title' LIMIT {$start},{$num_per_page} ";
               $result =db_query($sql);
                 $list_product_page = array();
                 $stt=0;
                 $num_rows=mysqli_num_rows($result);
                 if ($num_rows > 0) {
                 while ($row = mysqli_fetch_assoc($result)) {
                     $list_product_page[] = $row;
                 }
    
                 foreach($list_product_page as &$item){
                    $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
                    $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
                    $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";
    
                        
    
                 }
                 }
    
    
    
    
              return $list_product_page;
    }
    



    function list_product_page_fill_A_Z($title)
    {
               global $page_next,$page_prv,$num_page,$page,$number;
               $number = db_num_rows("SELECT  * FROM `tb_product`  WHERE `cat_title_main`='$title' or  `cat_title_child`='$title'");
               $_SESSION["rows_product"] =$number;
    
               // so luong cot trong bảng 
               $total_rows =$number;
               // so luong muon hien thi cua rows
               $num_per_page =8;
               //số lượng trang hân được
               $num_page = ceil($total_rows / $num_per_page);
    
               $page = isset($_GET['page']) ? $_GET['page'] : 1;
               $start = ($page - 1) * $num_per_page;
               $page_prv = $page - 1;
               $page_next = $page +1;
               // để thực phân trang
$sql = "SELECT * FROM `tb_product`  WHERE `cat_title_main`='$title' or  `cat_title_child`='$title'  ORDER BY `product_name` ASC  LIMIT {$start},{$num_per_page} ";
// $sql=db_fetch_array("SELECT * FROM `tb_category`  ORDER BY   `active`='0' DESC ");

               $result =db_query($sql);
                 $list_product_page_fill_A_Z = array();
                 $stt=0;
                 $num_rows=mysqli_num_rows($result);
                 if ($num_rows > 0) {
                 while ($row = mysqli_fetch_assoc($result)) {
                     $list_product_page_fill_A_Z[] = $row;
                 }
    
                 foreach($list_product_page_fill_A_Z as &$item){
                    $item["detail_product"]="?mod=product&controller=index&action=detail&product_id=";
                    $item["add_cart_ajax"]="?mod=cart&controller=index&action=add_cart_ajax&product_id={$item['product_id']}";
                    $item["add_cart"]="?mod=cart&controller=index&action=add_check_out&product_id=";
    
                        
    
                 }
                 }
    
    
    
    
              return $list_product_page_fill_A_Z;
    }
    
?>