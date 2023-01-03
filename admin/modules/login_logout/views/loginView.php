<?php 
global $error;
global $field;
?>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
    </head>
    <div id="form-login">
    <div class="login-form-container">
<form action="" method="POST">
    <h3>login admin page</h3>
    <input type="text" name="username" placeholder="Vui lòng nhâp tên đăng nhập" id="" class="box" value="<?php  echo set_value("username")  ?>">
    <p  class="error" style="color:red"><?php   echo error_fn("username"); ?> </p>
    <input type="password" name="password" placeholder="Vui lòng nhâp mật khẩu" id="" class="box" >
    <p  class="error"  style="color:red"><?php   echo error_fn("password"); ?> </p>
    <div class="remember">
        <input type="checkbox" name="remember_me" id="remember-me" >
        <label for="remember-me">Ghi nhớ đăng nhập </label>
    </div>
    <input type="submit" value="Đăng nhập" class="btn" name="btn_login">
    <p  class="error"  style="color:red"><?php   echo error_fn("login"); ?> </p>
</form>

</div>

    </div>

