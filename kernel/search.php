

<!DOCTYPE html>
<html lang="arial">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="assets/css/style_search.css">
    </head>
    <body>
        <div class="container" style="height: 600px; margin: 40px 20px; color: #2F3559; ">
        

            <div>
                <div class="col-xs-2"></div>
                <div class="col-xs-10">
                        <form action="search.php" method="post">
                            <div class="col-xs-6">
                                <input type="text" name="keyword" placeholder="Nhập họ tên hoặc số ID" class="search_box">
                            </div>
                            <div class="col-xs-2" style="padding:0;">
                                <button type="submit" name="search" class="button_search">Tìm kiếm  <i class="fas fa-search"></i></button>
                            </div>
                        </form>
                </div>
            </div>
            <div>
                <div class="col-xs-1"></div>
                <div class="col-xs-11">
                    <table>
                        <tr>
                            <th style="width: 3%;">Id</th>
                            <th>Tên bệnh nhân</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Chi tiết</th>
                        </tr>

                        <?php
                            $mysqli= new mysqli("localhost", "root", "", "webkhambenh");
                            mysqli_set_charset($mysqli,"utf8");

                            if(isset($_POST['search']))
                            {
                                $value = $_POST['keyword'];

                                $query = "SELECT * FROM patient WHERE CONCAT( PatientID, patientname) LIKE '%".$value."%'  ";

                                $search_result= mysqli_query($mysqli, $query);

                                $a= $search_result->num_rows;
                                if($a==0)       { ?>
                                  <tr>
                                                <td>trống</td>
                                                <td>trống </td>
                                                <td>trống</td>
                                                <td>trống</td>
                                                <td>trống</td>
                                  </tr>
                                <?php } 

                                while ($row =  mysqli_fetch_assoc($search_result)){ 
                                    ?>

                                <tr>
                                    <td><?php echo $row['PatientID'];?></td>
                                    <td><?php echo $row['PatientName'];?></td>
                                    <td><?php echo $row['Gender'];?></td>
                                    <td><?php echo $row['Birthdate'];?></td>
                                    <td><a style="cursor: pointer;" href= 'patient.php?page=<?php echo $row['PatientID']; ?>'> Xem>> </a></td>
                                </tr>
                                    <?php 

                                    }  
                                 }
                                ?>
                        </table>
                </div>
        </div>
        
    </body>
</html>