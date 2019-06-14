<?php
$message=NULL;
include "kernel/dbconnect.php";
include "kernel/infor_var.php";
include 'kernel/edit.php'; 

           
?>

<!DOCTYPE html>
<html lang="arial">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="assets/css/style_user.css">
    </head>
 
    <body>
       
         <div class="container" style="height: 600px; margin: 40px 20px; color: #2F3559; ">
            <strong><?php echo $message; ?></strong>
             <div style="margin-top: 30px; ">
                 <button onclick="window.location.href='user.php';" class="refesh">Làm mới <i class="fas fa-sync-alt"></i></button>
             </div>
             
             <h2><i class="fas fa-info-circle"></i> THÔNG TIN TÀI KHOẢN: </h2>
             <div class="container" style="padding:40px 0;">
                  <div class="col-sm-4">
                    <div style="margin-top: 5px;width: 200px; height: 250px; background-image: url(<?php echo $doctorimage; ?> );  background-position: center;  background-repeat: no-repeat; background-size: cover; border: 1px solid rgb(47,53,89);" ></div>
                </div>
                <div class="col-sm-6" style="font-size: 18px; border: 1px solid #2F3559;border-radius: 10px;background-color:white; padding: 10px 30px;">     
                     
                     
                     <div class="infor " >
                        <div class="col-xs-4"><strong>Tên tài khoản:</strong></div>
                        <div class="col-xs-8"><?php echo $doctorname;?></div>
                     </div>
                     
                     <div class="infor ">
                       <div class="col-xs-4"><strong>Giới tính:</strong></div>
                       <div class="col-xs-8"><?php echo $doctorsex;?></div>
                     </div>
                     <div class="infor ">  
                        <div class="col-xs-4"><strong>Chuyên ngành:</strong></div>
                        <div class="col-xs-8"><?php echo $doctormajor;?></div>
                     </div>
                     <div class="infor " >  
                        <div class="col-xs-4"><strong>Số điện thoại:</strong></div>
                        <div class="col-xs-8"><?php echo $doctorphone;?></div>
                     </div>
                     
                     <div class="infor ">
                       <div class="col-xs-4"><strong>Trình độ:</strong></div>
                       <div class="col-xs-8"><?php echo $doctordes;?></div>
                     </div>
                     
                   </div>
                 
             </div>
             
             <div class="infor" style="margin: 20px 0;">
                         <button id="myBtn" class="button1" onclick="openModal();currentSlide(1);">Cập nhật</button>
                         <a onclick="openModal();currentSlide(2);" style="cursor:pointer; margin: 10px 40px;">Đổi mật khẩu?</a>
             </div>
             
             </div>                
                 
        
        
        
        <div id="myModal" class="modal">
  
                    <div class="modal-content">
                        
                        <div class="infor" style="display: flow-root;">
                            <span class="close cursor" onclick="closeModal()"  style="float: right;">&times;</span>
                        </div>

                      <div class="mySlides">

                        <form method="POST" action="user.php">

                                  <div class="infor " >
                                       <div class="col-xs-3">                 
                                          Thay ảnh:
                                       </div>
                                      <div class="col-xs-9">
                                          <input type="file" name="image"  placeholder=" ">
                                       </div>
                                  </div>

                                  <div class="infor">
                                      <div class="col-xs-3">                 
                                         Tên:
                                      </div>                
                                      <div class="col-xs-9">                 
                                          <input type="text" name="name" required="Vui lòng nhập vào!" placeholder="  " /> 
                                      </div>
                                  </div>    
                                  <div class="infor">
                                      <div class="col-xs-3">                 
                                         Giới tính:
                                      </div>              
                                      <div class="col-xs-9">                 
                                          <input type="text" name="sex" required="Vui lòng nhập vào!" placeholder="  " /> 
                                      </div>
                                  </div>  

                                  <div class="infor">
                                      <div class="col-xs-3">                 
                                         Chuyên ngành:
                                      </div>              
                                      <div class="col-xs-9">                 
                                          <input type="text" name="major" required="Vui lòng nhập vào!" placeholder="  " /> 
                                      </div>
                                  </div>  

                                  <div class="infor">
                                      <div class="col-xs-3">                 
                                         Số điện thoại:
                                      </div>              
                                      <div class="col-xs-9">                 
                                          <input type="text" name="phone" required="Vui lòng nhập vào!" placeholder="  " /> 
                                      </div>
                                  </div>  

                                  <div class="infor">
                                      <div class="col-xs-3">                 
                                         Trình độ:
                                      </div>              
                                      <div class="col-xs-9">                 
                                          <input type="text" name="level" required="Vui lòng nhập vào!" placeholder="  " /> 
                                      </div>
                                  </div>  

                                      <div class="infor">
                                          <input type="submit" name="insert" value="Đồng ý" class="button1" />
                                      </div>

                              </form>
                      </div>

                            <div class="mySlides">

                                <form method="POST" action="user.php">
                                    
                                    
                                    
                                    <div class="infor">
                                      <div class="col-xs-4" style="padding:0;">                 
                                         Nhập mật khẩu mới:
                                      </div>              
                                      <div class="col-xs-8">                 
                                          <input type="password" name="newpass" value="" id="myInput1" style="width:90%;">
                                          <span onclick="showpass1();" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                      </div>
                                  </div>   
                                    
                                    <div class="infor">
                                      <div class="col-xs-4" style="padding:0;">                 
                                         Xác nhận khẩu mới:
                                      </div>              
                                      <div class="col-xs-8">                 
                                          <input type="password" name="confirm" value="" id="myInput2" style="width:90%;">
                                          <span onclick="showpass2();" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                      </div>
                                  </div>   
                                    
                                    
                                 <div class="infor">
                                      <div class="col-xs-4" style="padding:0;">                 
                                         Mật khẩu cũ( bắt buộc):
                                      </div>              
                                      <div class="col-xs-8">                 
                                          <input type="password" name="oldpass" required="" value="" id="myInput3" style="width:90%;">
                                          <span onclick="showpass3();" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                          <script type="text/javascript" src="assets/js/showpass.js"></script>
                                      </div>
                                  </div>   
                                    
                                    <div class="infor">
                                          <input type="submit" name="change" value="Đồng ý" class="button1" style="margin-left:0;"/>
                                      </div>
                                    
                                </form>



                    </div>

                    <script type="text/javascript" src="assets/js/clicktoview.js"></script>

                  </div>

        </div>
    </body>
</html>
