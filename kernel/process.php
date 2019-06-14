<?php

session_start();

$errors= array();
 
$mysqli= new mysqli("localhost", "root", "", "webkhambenh");
mysqli_set_charset($mysqli,"utf8");

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['pass'];
    
    if(empty($uname)){
        array_push($errors, "Chưa điền tên đăng nhập!");
    }
    if (empty($password)){
        array_push($errors,"Chưa điền mật khẩu!" );
    }
    
    if(count($errors)==0){
        $sql="select account.*, doctor.* from account, doctor where UserID = DoctorID and Username='".$uname."' and Password='".$password."' limit 1";
    
        $result=$mysqli->query($sql);
        
        if($result->num_rows==1){
            $row1= $result->fetch_assoc();
            $_SESSION['id']= $row1['DoctorID'];
            header('location: updatemeal.php?page=1');
                } else {
                    array_push($errors, "Tên đăng nhập hoặc mật khẩu sai!");
                }
        }
     }
?>
