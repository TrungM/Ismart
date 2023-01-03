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
    <div id="form-sigin">

        <div class="logo-sigin">
            <img src="public/images/logo.png">
        </div>
        <div class="sigin-container">
            <form action="" method="POST">
                <h3>Đăng ký tài khoản ISMART</h3>
                <span class="congratulation"><?php echo congratulation("success") ?></span>
                <div class="form-control">
                    <div>
                        <input type="text" name="fullname" placeholder="Vui lòng nhập họ và tên" id="" class="box_1" value="<?php  echo set_value("fullname") ?>">
                        <span class="error_sign"><?php echo error_fn("fullname") ?></span>
                    </div>
                    <div>
                        <input type="text" name="username" placeholder="Vui lòng nhập tên đăng nhập " id="" class="box_1" value="<?php  echo set_value("username") ?>">
                        <span class="error_sign"><?php echo error_fn("username") ?></span>
                    </div>

                </div>


                <div class="form-control">


                    <div>
                        <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu " id="" class="box_1">
                        <span class="error_sign"><?php echo error_fn("password") ?></span>
                    </div>
                    <div>
                        <input type="text" name="phone" placeholder="Vui lòng nhập số điện thoại " id="" class="box_1"  value="<?php  echo set_value("phone") ?>">
                        <span class="error_sign"><?php echo error_fn("phone") ?></span>
                    </div>


                </div>

                <div class="form-email">
                    <input type="text" name="email" placeholder="Vui lòng nhập email " id="" class="box">
                    <span class="error_sign"><?php echo error_fn("email") ?></span>
                </div>

                <div class="option-other">
                   <a href="?mod=login&controller=index&action=login">Đăng nhập</a>
                </div>
                <div>
                    <input type="submit" value="Đăng ký" class="btn" name="btn_sigin">
                    <span class="error_sign" style="text-align:center;"><?php echo error_fn("check_exist") ?></span>
                </div>

            </form>
        </div>
        <div class="option-login">
            <a href="<?php
                        require "./helper/redirect.php";
                        echo  $client->createAuthUrl() ?>">
                <div class="google-login">
                    <span>Đăng nhập với Google</span>
                </div>

            </a>
        </div>

    </div>
</body>