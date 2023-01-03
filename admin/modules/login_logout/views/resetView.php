<?php get_header();
global $error;
global $field;
?>

<div class="sign-form-container">
<style>

</style>

<form action="" method="POST">
    <h3>Reset password form</h3>



    <input type="text" placeholder="enter your email"  class="box" name="email"  value="<?php 
    if(!empty($_POST["email"])){echo $_POST["email"];}?>">
    <p ><?php   echo error_fn("email"); ?> </p>

    <input type="submit" value="Send  Request" class="btn" name="btn_req">
    <p ><?php   echo error_fn("email_not_exists"); ?> </p>

</form>

</div>

<?php get_footer()?>