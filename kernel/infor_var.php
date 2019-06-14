<?php
    
            include "kernel/dbconnect.php";
            
            $sql ="select * from doctor where DoctorID='".$_SESSION['id']."' ; ";
            $result= $mysqli->query($sql);
            
            if($rows =$result->fetch_assoc()){
                $doctorname=$rows['DoctorName'];
                $doctorsex=$rows['sex'];
                $doctorimage=$rows['Image'];               
                $doctorphone=$rows['Phone'];
                $doctordes=$rows['Description'];
                $doctormajor=$rows['Field'];
            }
            
            
?>
