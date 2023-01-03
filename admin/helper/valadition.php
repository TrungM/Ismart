<?php
function is_fullname()
{
          $parttern = "/^[A-Z a-z 0-9_\.]{6,32}$/";

          if (!preg_match($parttern, $_POST['fullname'], $matchs)) {
                    return   true;
          }

          return false;
}



function is_username()
{
          $parttern = "/^[A-Z a-z 0-9_\.]{6,32}$/";

          if (!preg_match($parttern, $_POST['username'], $matchs)) {
                    return      true;
          }
          return false;
}


function is_email()
{
          $parttern_email = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";


          if (!preg_match($parttern_email, $_POST['email'], $matchs)) {
                    return      true;
          }
          return false;

}


function is_pass()
{
          $parttern_pass = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";


          if (!preg_match($parttern_pass, $_POST['password'], $matchs)) {
                    return      true;
          }
          return false;

}

function is_pass_change($item)
{
          $parttern_pass = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";


          if (!preg_match($parttern_pass, $item, $matchs)) {
                    return      true;
          }
          return false;

}

function is_phone($phone){
          // toi thieu 10 so 
          $parttern_phone = "/^(09|08|01[2|6|8|9] )+([0-9]{7})$/";
        
           if(!preg_match($parttern_phone ,$_POST['phone'],$matchs)){
          return false;
          }
            return true;
          
        }

function set_value($field){
          global $$field;
          global $error;
          if(!empty($_POST[$field]) && empty($error["$field"])){
                    return $_POST[$field];
   }
}

function error_fn($item){
          global $error;
          if(!empty($error["$item"])){

                    return $error["$item"];

          }
}

function congratulation($item){
          global $congratulation;
          if(!empty($congratulation["$item"])){

                    return $congratulation["$item"];

          }
}

// function set_img(){
//   global $upload;
//   return $upload["img_upload_product"];

  
// }