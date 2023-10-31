<?php
session_start();
include "../../config/config.php";
if (isset($_SESSION['username']) && isset($_SESSION['id']))   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Dashboard</title>
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .wrapper{
            width: 100%;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 100px;
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
                    <div class="col-md-12 d-flex flex-column justify-content-center align-items-center bg-secondary bg-gradient">
                        <div class="mt-5 mb-3 mx-auto d-flex flex-column justify-content-center align-items-center row-gap-3" style="width:max-content">
                            <h1 class="fs-1 text-light">Medicine Database Dashboard</h1>
                            <p class="fs-4 text-black">Hello <?=$_SESSION['name']?></p>
                            <a href="/pages/login/logout.php" class="btn btn-danger">Logout</a>
                        </div>
                        <?php
                        require_once "../../config/config.php";
                        $sql = "SELECT * FROM medicines";

                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<a href="create.php" class="btn btn-success mb-5"><i class="fa fa-plus"></i> Add New Medicine</a>';
                                echo '<table class="table table-warning table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr class='text-center'>";
                                            echo "<th>#</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Slug</th>";
                                            echo "<th>Power</th>";
                                            echo "<th>PowerText</th>";
                                            echo "<th>Category</th>";
                                            echo "<th>Method</th>";
                                            echo "<th>MethodText</th>";
                                            echo "<th>AgeA</th>";
                                            echo "<th>ageC</th>";
                                            echo "<th>Purpose</th>";
                                            echo "<th>Instruction</th>";
                                            echo "<th>ImageURL</th>";
                                            echo "<th>Prescription</th>";
                                            echo "<th>Operations</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['slug'] . "</td>";
                                            echo "<td>" . $row['power'] . "</td>";
                                            echo "<td>" . $row['powerText'] . "</td>";
                                            echo "<td>" . $row['category'] . "</td>";
                                            echo "<td>" . $row['method'] . "</td>";
                                            echo "<td>" . $row['methodText'] . "</td>";
                                            echo "<td>" . $row['ageA'] . "</td>";
                                            echo "<td>" . $row['ageC'] . "</td>";
                                            echo "<td>" . $row['purpose'] . "</td>";
                                            echo "<td>" . $row['instruction'] . "</td>";
                                            echo "<td><a href=" . $row['imageURL'] . " target='_blank'><img src=" . $row['imageURL'] . " style='width: 100px;height: 100px;'></a> </td>";
                                            echo "<td class='text-center align-middle fs-2'><a href=" . $row['prescription'] . " target='_blank' >&rx;</a> </td>";

                                            echo "<td class='d-flex flex-column justify-content-center align-items-center gap-2' style='height:120px'>";
                                                echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye text-black fs-5"></span></a>';
                                                echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil text-black fs-5"></span></a>';
                                                echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash text-black fs-5"></span></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                echo '<p class="text-white">All information has been prepared by reviewing the official prescriptions of the medicines.</p>';  
                                mysqli_free_result($result);
                            } else{
                                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                            }
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                </div>        
            </div>
        </div>
        
    </body>
</html>