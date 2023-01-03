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
                <h3>Lấy lại  mật khẩu </h3>
                <div>
                    <input type="text" name="email" placeholder="Vui lòng nhập email " id="" class="box">
                    <span class="error_pass"><?php echo error_fn("email") ?></span>
                </div>
                <div class="option-other">
                   <a href="?mod=login&controller=index&action=login">Đăng nhập</a>
                </div>
                <div>
                    <input type="submit" value="Gửi email" class="btn" name="btn_forget_pass">
                </div>
            </form>
        </div>




    </div>
</body>