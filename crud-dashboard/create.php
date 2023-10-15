<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values

$name = $power = $powerText = $category = $method = $methodText = $ageA = $ageC = $purpose = $instruction = $imageURL = $prescription = "";
$name_err = $power_err = $powerText_err = $category_err = $method_err = $methodText_err = $ageA_err = $ageC_err = $purpose_err = $instruction_err = $imageURL_err = $prescription_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?!\s*$).{1,}$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }
    
    // Validate power
    $input_power = trim($_POST["power"]);
    if(empty($input_power)){
        $power_err = "Please enter a power.";     
    } else{
        $power = $input_power;
    }

    // Validate powerText
    $input_powerText = trim($_POST["powerText"]);
    if(empty($input_powerText)){
        $powerText_err = "Please enter a power text.";     
    } else{
        $powerText = $input_powerText;
    }

     // Validate category
     $input_category = trim($_POST["category"]);
     if(empty($input_category)){
         $category_err = "Please enter a category.";     
     } else{
         $category = $input_category;
     }

     // Validate method
     $input_method = trim($_POST["method"]);
     if(empty($input_method)){
         $method_err = "Please enter a method.";     
     } else{
         $method = $input_method;
     }

     // Validate categoryText
     $input_categoryText = trim($_POST["categoryText"]);
     if(empty($input_categoryText)){
         $categoryText_err = "Please enter a method.";     
     } else{
         $categoryText = $input_categoryText;
     }

     // Validate ageA
     $input_ageA = trim($_POST["ageA"]);
     if(empty($input_ageA)){
         $ageA_err = "Please enter a ageA.";     
     } else{
         $ageA = $input_ageA;
     }

     // Validate ageC
     $input_ageC = trim($_POST["ageC"]);
     if(empty($input_ageC)){
         $ageC_err = "Please enter a ageC.";     
     } else{
         $ageC = $input_ageC;
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

    // Validate prescription
    $input_prescription = trim($_POST["prescription"]);
    if(empty($input_prescription)){
        $prescription_err = "Please enter the prescription.";     
    } else{
        $prescription = $input_prescription;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) &&empty($power_err) && empty($powerText_err) && empty($category_err) && empty($method_err) && empty($ageA_err) && empty($ageC_err) && empty($purpose_err) && empty($instruction_err) && empty($imageURL_err) && empty($prescription_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO medicines (name, power, powerText, category, method, ageA, ageC purpose, instruction, imageURL, prescription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $name , $power , $powerText , $category , $method , $methodText , $ageA , $ageC , $purpose , $instruction , $imageURL , $prescription);
            
            // Set parameters
            $param_name = $name;
            $param_power = $power;
            $param_powerText = $powerText;
            $param_category = $category;
            $param_method = $method;
            $param_methodText = $methodText;
            $param_ageA = $ageA;
            $param_ageC = $ageC;
            $param_purpose = $purpose;
            $param_instruction = $instruction;
            $param_imageURL=$imageURL;
            $param_prescription=$prescription;
            
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
                                <label>Power</label>
                                <input type="text" name="power" class="form-control <?php echo (!empty($power_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $power; ?>">
                                <span class="invalid-feedback"><?php echo $power_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Power Text</label>
                                <input type="text" name="powerText" class="form-control <?php echo (!empty($powerText_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $powerText; ?>">
                                <span class="invalid-feedback"><?php echo $powerText_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                                <span class="invalid-feedback"><?php echo $category_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Method</label>
                                <input type="text" name="method" class="form-control <?php echo (!empty($method_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $method; ?>">
                                <span class="invalid-feedback"><?php echo $method_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Method Text</label>
                                <input type="text" name="methodText" class="form-control <?php echo (!empty($methodText_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $methodText; ?>">
                                <span class="invalid-feedback"><?php echo $methodText_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Age A</label>
                                <input type="text" name="ageA" class="form-control <?php echo (!empty($ageA_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ageA; ?>">
                                <span class="invalid-feedback"><?php echo $ageA_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>Age C</label>
                                <input type="text" name="ageC" class="form-control <?php echo (!empty($ageC_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ageC; ?>">
                                <span class="invalid-feedback"><?php echo $ageC_err;?></span>
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
                            <div class="form-group">
                                <label>Prescription</label>
                                <input type="text" name="prescription" class="form-control <?php echo (!empty($prescription_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prescription; ?>">
                                <span class="invalid-feedback"><?php echo $prescription_err;?></span>
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