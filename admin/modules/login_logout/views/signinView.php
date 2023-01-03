<?php get_header();
global $error;
global $field;
?>

<div class="sign-form-container">
<style>

</style>

<form action="" method="POST">
    <h3>sign form</h3>
    <input type="text"  placeholder="enter your fullname"  class="box" name="fullname" 
    value="<?php echo  set_value("fullname")?>">
    <p ><?php   echo error_fn("fullname"); ?> </p>

    <input type="text" placeholder="enter your username" id="" class="box" name="username"  value="<?php echo  set_value("username")?>">
    <p ><?php   echo error_fn("username"); ?> </p>

    <input type="text" placeholder="enter your email"  class="box" name="email"  value="<?php 
    if(!empty($_POST["email"])){echo $_POST["email"];}?>">
    <p ><?php   echo error_fn("email"); ?> </p>

    <input type="password" placeholder="enter your password" id="" class="box" name="password">
    <p ><?php   echo error_fn("password"); ?> </p>

    <input type="submit" value="Sign up" class="btn" name="btn_sign">
    <p ><?php   echo error_fn("reg"); ?> </p>

    <div class="log_in">
        <a href=""> Login </a>
    </div>


</form>

</div>

<?php get_footer()?>