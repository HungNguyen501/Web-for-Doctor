<?php include "kernel/infor_var.php";?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MenuFrame</title>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/css/style_menu1.css">
    </head>
    
    <body>
        <div id="page-header-left"> 
            <img src="assets/anh/logo.svg" 
                 style="height: 30px;margin: 10px 42px 5px 34px;width: 124px;">
        </div>
        <div id="page-header-right">
                <p style="color:grey;float:left;letter-spacing:0.6px;padding: 12px 10px 10px 20px; ">
                    <b style="color:#ff3a6d;">VIỆN DINH DƯỠNG BÁCH KHOA</b> <br>
                    <b>Địa chỉ:</b>  1 Đại Cồ Việt, Bách Khoa, Hai Bà Trưng, Hà Nội |
                    <b>Hotline: </b> 024 3671 7090
                </p>
            <?php  if (isset($_SESSION['id'])) : ?>
                <a href="updatemeal.php?logout='1'"><button> Thoát <i class="fas fa-sign-out-alt"></i></button> </a>
            <?php endif ?>    
           
        </div>
        <div id="page-sidebar">
            <div id="page-sidebar-profile">
                <div class="col-xs-4" style="padding: 0;">
                    <img src="<?php echo $doctorimage;?>">
                </div>
                <div class="col-xs-8" style="padding: 0;">
                    <p style="margin-top: 12px;">Chào bác sĩ,
                        <br>
                        <strong style="color: white;"><?php echo $doctorname; ?></strong>
                    </p>
                </div>
                
            </div>
            <button id="<?php if($active == 1) {echo 'page-sidebar-menu-current';} else { echo 'page-sidebar-menu';}; ?>"  onclick="window.location.href='updatemeal.php?page=1'; ">
                <div class="col-xs-2" style="padding: 0;"><i class="fas fa-cloud-upload-alt"></i></div>
                <div class="col-xs-10" style="padding: 0;">Thông tin bữa ăn được cập nhật</div>
            </button>
            <button id="<?php if($active == 2) {echo 'page-sidebar-menu-current';} else { echo 'page-sidebar-menu';}; ?>" onclick="window.location.href='search.php '; ">
                <div class="col-xs-2" style="padding: 0;"><i class="fas fa-search"></i></div>
                <div class="col-xs-10" style="padding: 0;">Tìm kiếm bệnh nhân</div>
            </button>
            <button id="<?php if($active == 3) {echo 'page-sidebar-menu-current';} else { echo 'page-sidebar-menu';}; ?>" onclick="window.location.href='user.php'; ">
                <div class="col-xs-2" style="padding: 0;"><i class="fas fa-user-tie"></i></div>
                <div class="col-xs-10" style="padding: 0;">Tài khoản</div>
            </button>
            
        </div>
    </body>
</html>
