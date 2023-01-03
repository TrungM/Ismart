<?php
global $error;
global $field;
?>
<link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="public/reset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link href="public/style.css" rel="stylesheet" type="text/css" />
<link href="public/responsive.css" rel="stylesheet" type="text/css" />
<script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="public/js/main.js" type="text/javascript"></script>
</head>

<body>
    <div id="form-login">
        <div class="logo-login">
            <img src="public/images/logo.png">
        </div>
        <div class="login-container">
            <form action="" method="POST">
                <h3>Đăng nhập vào ISMART</h3>
                <div>
                    <input type="text" name="email" placeholder="Vui lòng nhập email " id="" class="box">
                    <span class="error_login"><?php echo error_fn("email") ?></span>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu " id="" class="box">
                    <span class="error_login"><?php echo error_fn("password") ?></span>
                </div>
                <div class="option-other">
                    <a href="?mod=login&controller=index&action=forgetPassword">Quên mật khẩu ?</a>
                    <a href="?mod=login&controller=index&action=sign">Tạo tài khoản</a>
                </div>
                <div>
                    <input type="submit" value="Đăng nhập" class="btn" name="btn_login">
                    <span class="error_login"><?php echo error_fn("check_success_login") ?></span>
                </div>
            </form>
        </div>


        <div class="option-login">


            <a href="    <?php
                            require "./helper/redirect.php";
                            echo  $client->createAuthUrl() ?>">
                <div class="google-login">
                    <span>Đăng nhập với Google</span>
                </div>

            </a>
        </div>

    </div>
</body>