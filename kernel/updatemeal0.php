<?php include "kernel/dbconnect.php" ?>

<!DOCTYPE html>
<html lang="arial">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="assets/css/update_meal.css">
    </head>
 
    <body onload="startTime()">
        <div class="container" style="padding-bottom: 30px; color: #2F3559; ">
            
            <div class="container"  style="font-size: 20px; margin: 30px 0 10px 0;">
                
                
                <p style="float: right; font-size: 20px; padding: 10px; border: 1.5px solid #2F3559; border-radius: 5px; "><i class="fas fa-clock"></i>  <span id="txt"></span></p>
                    <script type="text/javascript" src="assets/js/time.js"></script>

                    <script>
                        var dt = new Date();
                        document.getElementById("datetime").innerHTML =(("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2)) +" - "+ (("0"+dt.getDate()).slice(-2)) +" / "+ (("0"+(dt.getMonth()+1)).slice(-2)) +" / "+ (dt.getFullYear()) ;
                    </script>
                
            </div>
            
        
        <div class="container text-center" style="font-size: 18px;">
        
      
        
             <?php
                
                //records per page
                $rpp=4;
        
                //check for set page
                isset($_GET['page']) ? $page = $_GET['page'] : $page = 0;
      
                //check for page 1                  
                if($page > 1){
                      $start = ($page * $rpp) - $rpp;
                }else{
                      $start=0;
                }
                //query db for total records
                $resultset= $mysqli->query("select distinct meal.MealID from meal, doctorcomment where meal.MealID not in (select MealID from doctorcomment);");
                
                //get total records
                $numrows= $resultset->num_rows;
        
                //get total number of pages
                $totalpages= ceil($numrows/ $rpp);
         
                //query results
                $resultset= $mysqli->query("  select distinct meal.*,PatientName 
                                                                from meal, patient, doctorcomment
                                                                where meal.PatientID = patient.PatientID and meal.MealID not in ( select MealID from doctorcomment)
                                                                order by MealID desc 
                                                                limit $start, $rpp");

                //start table
                echo ' <div> ';
         
                while ($rows =$resultset->fetch_assoc()){   
                        $name= $rows['PatientName'];
                        
                        $mealname=$rows['MealName'];
                        $url=$rows['Image'];
                        $time=$rows['SendDate'];
                        $description=$rows['Description'];
                        
                        echo '<div class="container well col-sm-12 text-left">';
                            echo '<div class="col-sm-4 ">';
                                echo '<img src='.$url.' style="margin-left: 10px;" width=95%;/>';
                            echo '</div>';
                            
                            echo '<div class="col-sm-8" >
                                           
                                            <div class="col-xs-3 padding0" >
                                                <i class="fas fa-user"></i> Tên bệnh nhân:
                                            </div>    
                                            <div class="col-xs-9 padding0">
                                                <a href="http://localhost/demoweb/patient.php?page='.$rows['PatientID'].' " style="" >'. $name.'</a>
                                            </div>
                                            
                                            <div class="col-xs-3 padding0">
                                                <i class="fas fa-drumstick-bite"></i> Tên bữa ăn: 
                                             </div>
                                             <div class="col-xs-9 padding0">
                                                 '.$mealname.'
                                            </div>

                                            <div class="col-xs-3 padding0">
                                                <i class="fas fa-calendar-alt"></i> Thời gian:
                                             </div>
                                             <div class="col-xs-9 padding0">
                                                 '.$time.'
                                            </div>

                                            <div class="col-xs-3 padding0">
                                                <i class="fas fa-marker"></i> Mô tả bữa ăn:
                                            </div>
                                            <div class="col-xs-9 padding0">
                                                '.$description.'
                                            </div></div>
                                
                        </div>';
                      
                        }
                        echo "</div>";
                                    
                        
                        if($page>1) $prev = $page -1;
                            else $prev=$totalpages;
                        if($page < $totalpages) $next=$page+1;
                            else $next=1;
                      
                            //pagination
                        
                        echo '<div id="page-navi">';    
                        echo "<a href='?page=$prev' > <font size='4'> &#11164;  </font></a>";
                        
                        for($x =1; $x<=$totalpages;$x++){
                            if($x == $page || $x==0){
                                echo "<a href='?page=$x' style='color:white; background-color: rgb(58,67,112); '> <font size='4'> $x </font> </a>";
                            }
                            else {echo "<a href='?page=$x'  > <font size='4'> $x </font> </a>";};
                        }
                        
                        echo "<a href='?page=$next' > <font size='4'> &#11166; </font></a>";
                        echo '</div>';
                        
            ?>    
        </div>
        </div>
    </body>
</html>
