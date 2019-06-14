<?php
            $mysqli= new mysqli("localhost", "root", "", "webkhambenh");
            mysqli_set_charset($mysqli,"utf8");
    

        if(isset($_POST['insert']) ){   
            
            if(!empty($_POST['image'])){
                $image=$_POST['image'];
                $sql1=" update doctor set Image = 'assets/anh/".$image."'
                            where DoctorID='".$_SESSION['id']."' ; " ;   
                 $result=$mysqli->query($sql1);
            }
           $name=$_POST['name'];
           $sex=$_POST['sex'];  
           $major=$_POST['major'];  
           $phone=$_POST['phone']; 
           $level=$_POST['level']; 
           
           
           $sql2=" update doctor set 
                                                    DoctorName = '".$name."',
                                                    sex = '".$sex."' ,
                                                    Phone = '".$phone."',
                                                    Description  = '".$level."' ,
                                                    Field='".$major."'

            where DoctorID='".$_SESSION['id']."' ; " ;   
           $result2=  mysqli_query($mysqli, $sql2);
           mysqli_close($mysqli);
    }
    
    
     if(isset($_POST['change']) ){   
            
            $result5= $mysqli->query("select * from account where userid= '".$_SESSION['id']."' ");
            $row5= $result5->fetch_assoc();

            
                    
            
            if( !empty($_POST['newpass']) & !empty($_POST['confirm']) ){

           $username=$_POST['username'];
           $newpass=$_POST['newpass'];  
           $confirm=$_POST['confirm'];  
           $oldpass=$_POST['oldpass'];
           

            if($newpass !=$confirm){
                $message = '<div class="alert alert-danger">Mật khẩu mới không khớp! </div>';
            } else{
                
                       
                       
                       
           if($oldpass == $row5['Password']  & $newpass==$confirm){
           $sql3=" update account set password = '".$newpass."' where userid='".$_SESSION['id']."' ; " ;   
           $result3=  mysqli_query($mysqli, $sql3);
                    $message = '<div class="alert alert-danger">Thành công!</div>';
           }
           else{
              $message = '<div class="alert alert-danger">Mật khẩu cũ sai!</div>';
           }
            }
            } 
           
     }
   
?>
