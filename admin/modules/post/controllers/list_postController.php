<?php
function construct(){
   load_model('index');

}

function list_postAction(){
   //http://localhost/php/project/admin/?mod=user&controller=list_post&action=list_post
   load_view("list_post");
}
?>