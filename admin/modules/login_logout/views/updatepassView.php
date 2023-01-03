<?php get_header();
global $error;
global $field;
?>

<div class="sign-form-container">
<style>

</style>

<form action="" method="POST">
    <h3>Reset pass  form</h3>
    <input type="password" placeholder="enter your password" id="" class="box" name="password">
    <p ><?php   echo error_fn("password"); ?> </p>

    <input type="submit" value="Reset" class="btn" name="btn_reset">


</form>

</div>

<?php get_footer()?>