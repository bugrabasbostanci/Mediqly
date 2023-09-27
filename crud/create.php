<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $purpose = $instruction = $imageURL = "";
$name_err = $purpose_err = $instruction_err =$imageURL_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate purpose
    $input_purpose = trim($_POST["purpose"]);
    if(empty($input_purpose)){
        $purpose_err = "Please enter a purpose.";     
    } else{
        $purpose = $input_purpose;
    }
    
    // Validate instruction
    $input_instruction = trim($_POST["instruction"]);
    if(empty($input_instruction)){
        $instruction_err = "Please enter the instruction.";     
    } else{
        $instruction = $input_instruction;
    }

    // Validate imageURL
    $input_imageURL = trim($_POST["imageURL"]);
    if(empty($input_imageURL)){
        $imageURL_err = "Please enter the imageURL.";     
    } else{
        $imageURL = $input_imageURL;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($purpose_err) && empty($instruction_err) && empty($imageURL_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO medicines (name, purpose, instruction, imageURL) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_purpose, $param_instruction, $param_imageURL);
            
            // Set parameters
            $param_name = $name;
            $param_purpose = $purpose;
            $param_instruction = $instruction;
            $param_imageURL=$imageURL;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mt-5">Create Record</h2>
                        <p>Please fill this form and submit to add medicine record to the database.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                                <span class="invalid-feedback"><?php echo $name_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>purpose</label>
                                <textarea name="purpose" class="form-control <?php echo (!empty($purpose_err)) ? 'is-invalid' : ''; ?>"><?php echo $purpose; ?></textarea>
                                <span class="invalid-feedback"><?php echo $purpose_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>instruction</label>
                                <input type="text" name="instruction" class="form-control <?php echo (!empty($instruction_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $instruction; ?>">
                                <span class="invalid-feedback"><?php echo $instruction_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>imageURL</label>
                                <input type="text" name="imageURL" class="form-control <?php echo (!empty($imageURL_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $imageURL; ?>">
                                <span class="invalid-feedback"><?php echo $imageURL_err;?></span>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>