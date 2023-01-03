<?php


function construct()
{
  load_model('index');
}

function cartAction()
{
  $add_cart = get_list_cart();
  $data["add_cart"] = $add_cart;
  load_view("Cart", $data);
}


function add_catAction()
{
  $id = (int) $_POST["product_id"];
  $num_order = $_POST["num_order"];
  $product_cart = get_product_by_id($id);

  $qty =  $num_order;

  if (isset($_SESSION["cart"]["buy"]) && array_key_exists($id, $_SESSION["cart"]["buy"])) {
    $qty = $_SESSION["cart"]["buy"][$id]["qty"] + $num_order;
  };

  $_SESSION["cart"]["buy"][$id] = array(
    'product_id' => $id,
    'product_code' => $product_cart["product_code"],
    'product_name' => $product_cart["product_name"],
    'product_price' => $product_cart["product_price"],
    'product_img' => $product_cart["product_img"],
    'qty' => $qty,
    'sub_total' => $product_cart["product_price"] * $qty,
  );
  load_cart();
  $add_cart = get_list_cart();
  $data["add_cart"] = $add_cart;
  load_view($data);
  header("Location:?mod=product&controller=index&action=detail&product_id=$id");
}

function add_cart_ajaxAction()
{
  $id = $_POST["product_id"];

  $product_cart = get_product_by_id($id);

  $qty = 1;

  if (isset($_SESSION["cart"]["buy"]) && array_key_exists($id, $_SESSION["cart"]["buy"])) {
    $qty = $_SESSION["cart"]["buy"][$id]["qty"] + 1;
  };

  $_SESSION["cart"]["buy"][$id] = array(
    'product_id' => $id,
    'product_code' => $product_cart["product_code"],
    'product_name' => $product_cart["product_name"],
    'product_price' => $product_cart["product_price"],
    'product_img' => $product_cart["product_img"],
    'qty' => $qty,
    'sub_total' => $product_cart["product_price"] * $qty,
  );
  load_cart();
  // $add_cart=get_list_cart();
  // $data["add_cart"]=$add_cart;
  // load_view($data);
  // $total=$_SESSION['cart']["infor"]["total"];
  // $result=array(
  //   'product_id'=>$id,
  //   'product_code'=>$_SESSION["cart"]["buy"][$id]["product_code"],
  //   'product_name'=>$_SESSION["cart"]["buy"][$id]["product_name"],
  //   'product_price'=>$_SESSION["cart"]["buy"][$id]["product_price"],
  //   'product_img'=>$_SESSION["cart"]["buy"][$id]["product_img"],
  //   'qty'=>$qty,
  //   'sub_total'=>$product_cart["product_price"]*$qty,
  //   'total'=>number_format( $total)."đ"

  // );
  // echo json_encode($result);


}

function add_check_outAction()
{
  $id = (int) $_GET["product_id"];
  $product_cart = get_product_by_id($id);

  $qty = 1;

  if (isset($_SESSION["cart"]["buy"]) && array_key_exists($id, $_SESSION["cart"]["buy"])) {
    $qty = $_SESSION["cart"]["buy"][$id]["qty"] + 1;
  };

  $_SESSION["cart"]["buy"][$id] = array(
    'product_id' => $id,
    'product_code' => $product_cart["product_code"],
    'product_name' => $product_cart["product_name"],
    'product_price' => $product_cart["product_price"],
    'product_img' => $product_cart["product_img"],
    'qty' => $qty,
    'sub_total' => $product_cart["product_price"] * $qty,
  );
  load_cart();
  $add_cart = get_list_cart();
  $data["add_cart"] = $add_cart;
  load_view($data);
  header("Location:?mod=checkout&controller=index&action=index");
}


function deleteAction()
{
  $id = (int) $_GET["product_id"];
  delete_cart($id);

  header("Location:?mod=cart&controller=index&action=cart");
}

function delete_cart_allAction()
{
  delete_cart_all();
  header("Location:?mod=cart&controller=index&action=cart");
}

function delete_listAction()
{
  $product_id = $_GET["product_id"];
  // delete_list($product_id);
  if (isset($_SESSION["cart"]) && array_key_exists($product_id, $_SESSION["cart"]["buy"])) {
    unset($_SESSION["cart"]["buy"][$product_id]);
    load_cart();
    //  $total_new=$_SESSION['cart']["infor"]["total"];
    if (!empty($_SESSION["cart"]['buy'])) {
        echo '  <div id="btn-cart">';
        echo '   <i class="fa fa-shopping-cart" aria-hidden="true"></i>';
        echo ' <span id="num"> ' . $_SESSION["cart"]["infor"]["number_order"] . ' </span>';
        echo ' </div>';

        echo ' <div id="dropdown">';
        echo '   <p class="desc">Có <span>' . $_SESSION["cart"]["infor"]["number_order"] . ' </span>  sản phẩm  trong giỏ hàng</p>';
        echo '  <ul class="list-cart">';
        foreach ($_SESSION["cart"]["buy"] as $item) {
        echo ' <li class="clearfix">';
        echo ' <a href="" title="" class="thumb fl-left">';
        echo '<img src="../public/images/' . $item['product_img'] . ' " alt="">  </a>';
        echo ' <div class="info  fl-left">';
        echo '  <a href="" title="" class="product-name"> ' . $item['product_name'] . ' </a>';
        echo ' <p class="price "> ' . number_format($item["product_price"]) . "đ" . '</p>';
        echo '<p class="qty">Số lượng: <span> ' . $item["qty"] . '</span></p>';
        echo '</div>';
        echo '<div class="delete_cart fl-right">
     <i class="fa-solid fa-trash-can delete_second" style="color:red;" > </i>
      <input type="hidden" id="delete_cart_val" value="' . $item['product_id'] . '">
      </div>';
        echo '</li>';
        };
        echo '  </ul>';
        echo ' <div class="total-price clearfix">';
        echo '  <p class="title fl-left">Tổng:</p>';
        echo '  <p class="price fl-right"> ' . number_format($_SESSION["cart"]["infor"]["total"]) . "đ" . '</p>';
        echo '     </div>';
        echo '<div class="action-cart clearfix" >
     <a href="?mod=cart&controller=index&action=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
      <a href="?mod=checkout&controller=index&action=index" title="Thanh toán" class="checkout fl-right">Thanh toán</a> </div>';
        echo '  </div>';
    } else {
      echo '  <div id="btn-cart">';
      echo '   <i class="fa fa-shopping-cart" aria-hidden="true"></i>';
      echo ' <span id="num"> ' . $_SESSION["cart"]["infor"]["number_order"] . ' </span>';
      echo ' </div>';
      echo ' <div id="dropdown">';
      echo '   <p class="desc">Có <span>' . $_SESSION["cart"]["infor"]["number_order"] . '  </span> sản phẩm trong giỏ hàng</p>';
      echo '  <ul class="list-cart">';
      echo "<p style='color:red; text-align:center;'>Không có sản phẩm trong giỏ hàng</p>";
      echo '  </ul>';
      echo '   <div class="total-price clearfix">';
      echo '      <p class="title fl-left">Tổng:</p>';
      echo '         <p class="price fl-right"> ' . number_format($_SESSION["cart"]["infor"]["total"]) . "đ" . '</p>';
      echo '     </div>';
      echo '<dic class="action-cart clearfix" >
  <a href="?mod=cart&controller=index&action=cart" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
   <a href="?mod=checkout&controller=index&action=index" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
</dic>';
      echo '     </div>';
    }
  }
}


function update_cartAction()
{
  $product_id = $_POST["product_id"];
  $number_order = $_POST["number_order"];

  $item = get_product_by_id($product_id);

  if (isset($_SESSION["cart"]) && array_key_exists($product_id, $_SESSION["cart"]["buy"])) {
    $_SESSION["cart"]["buy"][$product_id]["qty"] = $number_order;
    $sub_total_new = $number_order * $item["product_price"];
    $_SESSION["cart"]["buy"][$product_id]["sub_total"] = $sub_total_new;
    load_cart();

    $total_new = $_SESSION['cart']["infor"]["total"];
    $result = array(
      'sub_total' => number_format($sub_total_new) . "đ",
      'total' => number_format($total_new) . "đ"
    );
    echo json_encode($result);
  };
}
