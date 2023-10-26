<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM medicines WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $purpose = $row["purpose"];
                $instruction = $row["instruction"];
                $imageURL = $row["imageURL"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Medicine Data</title>
    <link rel="shortcut icon" href="/assets/images/logo-group-16.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .wrapper{
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mt-5 mb-3 text-black text-center fs-1">View Medicine Data</h1>
                        <table class="table table-info table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Power</th>
                                    <th>PowerText</th>
                                    <th>Category</th>
                                    <th>Method</th>
                                    <th>MethodText</th>
                                    <th>AgeA</th>
                                    <th>AgeC</th>
                                    <th>Purpose</th>
                                    <th>Instruction</th>
                                    <th>ImageURL</th>
                                    <th>Prescription</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["slug"]; ?></td>
                                    <td><?php echo $row["power"]; ?></td>
                                    <td><?php echo $row["powerText"]; ?></td>
                                    <td><?php echo $row["category"]; ?></td>
                                    <td><?php echo $row["method"]; ?></td>
                                    <td><?php echo $row["methodText"]; ?></td>
                                    <td><?php echo $row["ageA"]; ?></td>
                                    <td><?php echo $row["ageC"]; ?></td>
                                    <td><?php echo $row["purpose"]; ?></td>
                                    <td><?php echo $row["instruction"]; ?></td>
                                    <td>
                                        <a href="<?php echo $row["imageURL"]; ?>" target="_blank">
                                        <img src="<?php echo $row["imageURL"]; ?>" alt="" style="width:100px; height:100px;">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $row["prescription"]; ?>" class='d-flex justify-content-center align-items-center fs-2' target="_blank" style="height:90px">&rx;</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center"><a href="index.php" class="btn btn-primary">Back</a></p>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>