<?php 
include "kernel/dbconnect.php";$a=1;
           
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Danh sách bệnh nhân</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style_patient1.css">

    </head>
    <style>
        input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px;

    </style>
    <body>
        <div  style="color: #2F3559;">
            
            <?php 
            
                $rpp=1;

                    //check for set page
                    isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;

                    //check for page 1                  
                    if($page > 1){
                          $start = ($page * $rpp) - $rpp;
                    }else{
                          $start=0;
                    }
                    $result=$mysqli->query("select PatientID from patient limit $start, $rpp");
                    while($row1=  mysqli_fetch_assoc($result)){
            
            
            
                    $sql2 ="select patient.*, doctornote.comment  from doctornote, patient where patient.PatientID='".$row1['PatientID']."' and patient.PatientID = doctornote.PatientID; ";
                    $result2= $mysqli->query($sql2);

                    if($rows2 =$result2->fetch_assoc()){
                        $patientid=$rows2['PatientID'];
                        $patientname=$rows2['PatientName'];
                        $patientimage=$rows2['Image'];
                        $patientsex=$rows2['Gender'];
                        $patientphone=$rows2['Phone'];               
                        $patientemail=$rows2['Email'];
                        $patientbirth=$rows2['Birthdate'];
                        $generconsultation=$rows2['comment'];
                        $disease=$rows2['Disease'];
                    } 
                    ?>
            
            <div class="container">
                <div style="margin-top: 30px; ">
                 <button onclick="window.location.href='patient.php?page=<?php echo $row1['PatientID'];?>';" class="refesh">Làm mới <i class="fas fa-sync-alt"></i></button>
             </div>
                <h2>I. Thông tin bệnh nhân</h2>
          
                <div class="col-sm-4">
                    <div style="margin-top: 5px;width: 200px; height: 250px; background-image: url(<?php echo $patientimage; ?> );  background-position: center;  background-repeat: no-repeat; background-size: cover; border: 7px solid white;" ></div>
                </div>
                <div class="col-sm-8" style="font-size: 18px; border: 1px solid #2F3559;border-radius: 10px;background-color:white; padding: 10px 30px;">               
                    <div class="infor " >
                        <div class="col-xs-4"><strong>Tên bệnh nhân: </strong> </div>
                        <div class="col-xs-8"><?php echo $patientname; ?> </div>
                     </div>
                    
                     <div class="infor " >
                        <div class="col-xs-4"><strong>Ms bệnh nhân:</strong></div>
                        <div class="col-xs-8"><?php echo $patientid; ?> </div>
                     </div>
                    
                    <div class="infor " >
                        <div class="col-xs-4"><strong>Giới tính:</strong></div>
                        <div class="col-xs-8"><?php echo $patientsex; ?> </div>
                     </div>
                    
                     <div class="infor " >
                        <div class="col-xs-4"><strong>Ngày sinh:</strong></div>
                        <div class="col-xs-8"> <?php echo $patientbirth; ?></div>
                     </div>
                    
                     <div class="infor " >
                        <div class="col-xs-4"><strong>Số điện thoại:</strong></div>
                        <div class="col-xs-8"> <?php echo $patientphone; ?></div>
                     </div>
                     
                     <div class="infor " >
                        <div class="col-xs-4"><strong>Email:</strong></div>
                        <div class="col-xs-8">  <?php echo $patientemail; ?></div>
                     </div>
                     
                    <div class="infor " >
                        <div class="col-xs-4"><strong>Tiền sử bệnh án:</strong></div>
                        <div class="col-xs-8"> <?php echo $disease; ?></div>
                     </div>
                                       
                </div>
                </div>
            <div class="container" style="margin-top: 20px;">
                    <h2 style="color: #000066 ">II. Thông tin dinh dưỡng</h2>
                    <center><table>
                        <tr>
                            <th>STT</th>
                            <th>Thời gian</th>
                            <th>Chi tiết bữa ăn</th>
                            <th>Ghi chú cụ thể</th>
                            <th>Tư vấn của bác sĩ</th>
                        </tr>
                        <?php
                            $sql3 ="select * from meal where PatientID='".$row1['PatientID']."' order by MealID desc ; ";
                            $result3= $mysqli->query($sql3);
                            if(mysqli_num_rows($result3)>0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                        ?>
                        <tr style="font-size: 18px;">
                            <td style="text-align: center;"><?php echo $row3['MealID']; ?></td>
                            <td><?php echo $row3['SendDate']; ?></td>
                            <td><?php echo '<img src='.$row3['Image'].' width=250px/>'; ?></td>
                            <td><?php echo $row3['MealName']; ?>: <?php echo $row3['Description']; ?></td>
                             <td><?php


                                    $sql4 ="select  meal.MealID,patientID, Doctorcomment, doctor.DoctorName 
                                                    from doctor right join (doctorcomment right join meal
                                                    on doctorcomment.MealID = meal.MealID )
                                                    on doctor.DoctorID = doctorcomment.DoctorID ";                           
                                    $result4= $mysqli->query($sql4);
                                    while ($row4 = mysqli_fetch_assoc($result4)) {             
                                            if(  $row4['patientID']==$row1['PatientID'] & $row3['MealID']==$row4['MealID']){
                                                if($row4['Doctorcomment']==NULL) { ?>
                                                     <div class=" " style="margin: 20px 0; text-align: center;">
                                                         <p>Chưa có tư vấn</p>
                                                     </div>                                               
                                                
                                            
                                            <?php                                           
                                               }
                                                    else {    echo '<p><strong>Bác sĩ '.$row4['DoctorName'].':</strong> '.$row4['Doctorcomment'].' <br></p>';}
                                                                                              
                                            }

                                        } ?>
                                                    
                                 <a onclick="openModal();currentSlide(<?php echo $a;$a++; ?>);" style="  cursor: pointer;font-size: 15px; color: red;">Thêm>></a>
                            </td>
                        </tr>
                        <?php
                                }
                            }
                        ?>
                        <div id="myModal" class="modal">
  
                                        <div class="modal-content">
                                            <div >
                                                
                                            </div>
                                            <?php 

                                          $sql="select * from meal where PatientID='".$row1['PatientID']."' order by MealID desc ; ";
                                          $result= $mysqli->query($sql);



                                          while ($row = mysqli_fetch_assoc($result)) {
                                          ?>


                                          <div class="mySlides">
                                              <div class="infor" style="display: flow-root;">
                                                    <p style="float:left;">Bữa ăn số <?php echo $row['MealID'];?>: <br></p>
                                                    <span style="float: right;" class="close" onclick="closeModal();">&times;</span>
                                              </div>
                                              <div class="infor">
                                                  <div class="col-xs-3" style=" height: 150px; background-image: url(<?php echo $row['Image']; ?> );  background-position: center;  background-repeat: no-repeat; background-size: cover; border: 7px solid white;"">
                                                  </div>
                                                  <div class="col-xs-9">
                                                      <p style="text-align: left;">
                                                      <u>Ghi chú:</u>
                                                          <br>
                                                          <?php echo $row['Description']; ?>
                                                      </p>
                                                  </div>
                                              </div>
                                            <form method="POST" action="patient.php?page=<?php echo $row1['PatientID'];?>" >
                                                        <div class="infor">                                          
                                                            <div class="col-xs-3" style="padding-left: 0;">                 
                                                                <strong>Nội dung tư vấn:</strong>
                                                             </div>                
                                                              <div class="col-xs-9" style="padding-left:0;">
                                                                    <textarea type="text" name="content" placeholder=" " cols="65" rows="4"></textarea>
                                                               </div>
                                                        </div>    
                                                                
                                                        <div class="infor">
                                                            <div class="col-xs-2">  
                                                                <input type="submit" name="submit" value="Gửi" class="button1" /> 
                                                            </div>
                                                            <div class="col-xs-2" style="margin-top:  5px;">
                                                                <input type="checkbox" name="confirm" value=" <?php echo $row['MealID']; ?> " /> Xác nhận
                                                            </div>    
                                                         </div>

                                                </form>
                                          </div>

                                        <?php
                                        }
                                        if(!empty($_POST['content'])  ){

                                                  if(isset($_POST['content']) & isset($_POST['confirm'])){   
                                                 $content=$_POST['content'];
                                                 $sql7=" insert into doctorcomment (MealID, DoctorID, Doctorcomment, Datesend) values(
                                                  ".$_POST['confirm']." ,  ".$_SESSION['id']." , '".$content."', now() ); " ;                                                           
                                                 $result7=$mysqli->query($sql7);                                                                                                                      
                                               }                                                           
                                         }
                                        ?>
                                    </div>
                                  </div>

                    <script type="text/javascript" src="assets/js/clicktoview.js"></script>

                    </table></center>

                    
            </div>
            
            
            <div class="container" style="margin: 30px;" >
                    <h2 style="color: #000066">III. Tư vấn chung</h2>
                    <div style="font-size:18px;">   
                        <?php echo $generconsultation; ?>
                     </div>
                    <form action="patient.php?page=<?php echo $row1['PatientID'];?>" method="POST" enctype="multipart/from-data">
                            <textarea style="width: 680px; height: 200px; margin: 30px 30px 30px 10px;" name="general"></textarea><br>
                        <input type="submit" name="submit" value="Thay đổi  &#11166;" class="button1"  />
                    </form>
                    <?php 
                        if(!empty($_POST['general']) & isset($_POST['general'])){
                            $sql4=" update doctornote set Comment= '".$_POST['general']."' , DoctorID='".$_SESSION['id']."' , UpdateDate =now()  where PatientID= '".$row1['PatientID']."' ;  ";
                            $result4= $mysqli->query($sql4);
                        }
                    ?>
            </div>
                    <?php } ?>
             
            
        </div>
    </body>
</html>
