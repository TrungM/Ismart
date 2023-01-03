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
    <div id="form-forget_pass">
        <div class="logo-forget_pass">
            <img src="public/images/logo.png">
        </div>
        <div class="forget_pass-container">
            <form action="" method="POST">
                <h3>Đăt lại mật khẩu </h3>
                <span class="congratulation"><?php echo congratulation("success_change") ?></span>
                <div>
                    <input type="text" name="token" placeholder="Vui lòng nhập mã " id="" class="box">
                    <span class="error_pass"><?php echo error_fn("token") ?></span>
                </div>
                <div>
                    <input type="password" name="new_password" placeholder="Vui lòng nhập mật khẩu mới " id="" class="box">
                    <span class="error_pass"><?php echo error_fn("new_password") ?></span>
                </div>
                <div class="option-other">
                    <a href="?mod=login&controller=index&action=login">Đăng nhập</a>
                </div>
                <div>
                    <input type="submit" value="Tạo mật khẩu mới" class="btn" name="btn_reset_pass">
                </div>
            </form>
        </div>




    </div>
</body>