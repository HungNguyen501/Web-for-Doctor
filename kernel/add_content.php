<?php

                        if(!empty($_POST['content'])){
                            if(isset($_POST['content'])){   
                               $content=$_POST['content'];
                               $sql7=" insert into doctorcomment (MealID, DoctorID, Doctorcomment, Datesend) values(
                                            ".$row['MealID']." ,  ".$_SESSION['id']." , '".$content."', now() ); " ;   
                               $result7=$mysqli->query($sql7);
                               }
                        }

                        echo $row6["MealID"];

                    ?>