<?php
session_start();
include "config.php";
if (isset($_SESSION['username']) && isset($_SESSION['id']))   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="d-flex justify-content-between w-100">
                    <!-- <a href="/medicine-page.php" class="btn btn-danger">Back to Main</a> -->
                    <a href="/login/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    <div class="col-md-12">
                        <div class="mt-5 mb-3 clearfix">
                            <h2 class="pull-left">Medicines Database</h2>
                            <p>Merhaba <?=$_SESSION['name']?></p>
                            <!-- <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Medicine</a> -->
                        </div>
                        <?php
                        require_once "config.php";
                        $sql = "SELECT * FROM medicines";

                        if($result = mysqli_query($link, $sql)){
                           
                        }

                        if($_SESSION['role'] == 'admin') {
                            if(mysqli_num_rows($result) > 0){
                                echo '<a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Medicine</a>';
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>power</th>";
                                            echo "<th>powerText</th>";
                                            echo "<th>category</th>";
                                            echo "<th>method</th>";
                                            echo "<th>methodText</th>";
                                            echo "<th>ageA</th>";
                                            echo "<th>ageC</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Instruction</th>";
                                            echo "<th>ImageURL</th>";
                                            echo "<th>prescription</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['power'] . "</td>";
                                            echo "<td>" . $row['powerText'] . "</td>";
                                            echo "<td>" . $row['category'] . "</td>";
                                            echo "<td>" . $row['method'] . "</td>";
                                            echo "<td>" . $row['methodText'] . "</td>";
                                            echo "<td>" . $row['ageA'] . "</td>";
                                            echo "<td>" . $row['ageC'] . "</td>";
                                            echo "<td>" . $row['purpose'] . "</td>";
                                            echo "<td>" . $row['instruction'] . "</td>";
                                            echo "<td><img src=" . $row['imageURL'] . " style='width: 100px;height: 100px;'  > </td>";
                                            echo "<td><a href=" . $row['prescription'] . " target='_blank'>Prospektüs</a> </td>";

                                            echo "<td>";
                                                echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                                echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                                echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        }

                        else if($_SESSION['role'] == 'user'){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>power</th>";
                                            echo "<th>powerText</th>";
                                            echo "<th>category</th>";
                                            echo "<th>method</th>";
                                            echo "<th>methodText</th>";
                                            echo "<th>ageA</th>";
                                            echo "<th>ageC</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Instruction</th>";
                                            echo "<th>ImageURL</th>";
                                            echo "<th>prescription</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['power'] . "</td>";
                                            echo "<td>" . $row['powerText'] . "</td>";
                                            echo "<td>" . $row['category'] . "</td>";
                                            echo "<td>" . $row['method'] . "</td>";
                                            echo "<td>" . $row['methodText'] . "</td>";
                                            echo "<td>" . $row['ageA'] . "</td>";
                                            echo "<td>" . $row['ageC'] . "</td>";
                                            echo "<td>" . $row['purpose'] . "</td>";
                                            echo "<td>" . $row['instruction'] . "</td>";
                                            echo "<td><img src=" . $row['imageURL'] . " style='width: 100px;height: 100px;'  > </td>";
                                            echo "<td><a href=" . $row['prescription'] . " target='_blank'>Prospektüs</a> </td>";

                                        
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        }
                        
                         else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                </div>        
            </div>
        </div>
        
    </body>
</html>