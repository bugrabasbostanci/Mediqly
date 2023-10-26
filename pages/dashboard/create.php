<?php
// Include config file
require_once "/xampp/htdocs/Mediqly/pages/dashboard/config.php";
 
// Define variables and initialize with empty values

$name = $slug= $power = $powerText = $category = $method = $methodText = $ageA = $ageC = $purpose = $instruction = $imageURL = $prescription = "";
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

    // Validate slug
    $input_slug = trim($_POST["slug"]);
    if (empty($input_slug)) {
        $slug_err = "Please enter a slug.";
    } elseif (!filter_var($input_slug, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(?!\s*$).{1,}$/")))) {
        $slug_err = "Please enter a valid slug.";
    } else {
        $slug = $input_slug;
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
    if(empty($name_err) &&empty($slug_err) &&empty($power_err) && empty($powerText_err) && empty($category_err) && empty($method_err) && empty($ageA_err) && empty($ageC_err) && empty($purpose_err) && empty($instruction_err) && empty($imageURL_err) && empty($prescription_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO medicines (name, slug, power, powerText, category, method, methodText, ageA, ageC, purpose, instruction, imageURL, prescription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_name , $param_slug, $param_power , $param_powerText , $param_category , $param_method , $param_methodText , $param_ageA , $param_ageC , $param_purpose , $param_instruction , $param_imageURL , $param_prescription);
            
            // Set parameters
            $param_name = $name;
            $param_slug = $slug;
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
    <title>Create Medicine</title>
    <link rel="shortcut icon" href="/assets/images/logo-group-16.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="mt-5 text-center text-black fs-1">Create Medicine</h2>
                        <p class="text-center text-black">Please fill this form and submit to add medicine data to the database.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label><b>Name</b></label>
                                <input type="text" name="name" class="form-control mb-3 <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                                <span class="invalid-feedback"><?php echo $name_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>Slug</b></label>
                                <input type="text" name="slug" class="form-control mb-3 <?php echo (!empty($slug_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $slug; ?>">
                                <span class="invalid-feedback"><?php echo $slug_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>Power</b></label>
                                <input type="text" name="power" class="form-control mb-3 <?php echo (!empty($power_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $power; ?>">
                                <span class="invalid-feedback"><?php echo $power_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>PowerText</b></label>
                                <input type="text" name="powerText" class="form-control mb-3 <?php echo (!empty($powerText_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $powerText; ?>">
                                <span class="invalid-feedback"><?php echo $powerText_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>Category</b></label>
                                <input type="text" name="category" class="form-control mb-3 <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                                <span class="invalid-feedback"><?php echo $category_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>Method</b></label>
                                <input type="text" name="method" class="form-control mb-3 <?php echo (!empty($method_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $method; ?>">
                                <span class="invalid-feedback"><?php echo $method_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>MethodText</b></label>
                                <input type="text" name="methodText" class="form-control mb-3 <?php echo (!empty($methodText_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $methodText; ?>">
                                <span class="invalid-feedback"><?php echo $methodText_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>AgeA</b> </label>
                                <input type="text" name="ageA" class="form-control mb-3 <?php echo (!empty($ageA_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ageA; ?>">
                                <span class="invalid-feedback"><?php echo $ageA_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>AgeC</b> </label>
                                <input type="text" name="ageC" class="form-control mb-3 <?php echo (!empty($ageC_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ageC; ?>">
                                <span class="invalid-feedback"><?php echo $ageC_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>purpose</b></label>
                                <textarea name="purpose" class="form-control mb-3 <?php echo (!empty($purpose_err)) ? 'is-invalid' : ''; ?>"><?php echo $purpose; ?></textarea>
                                <span class="invalid-feedback"><?php echo $purpose_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>instruction</b></label>
                                <input type="text" name="instruction" class="form-control mb-3 <?php echo (!empty($instruction_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $instruction; ?>">
                                <span class="invalid-feedback"><?php echo $instruction_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>imageURL</b></label>
                                <input type="text" name="imageURL" class="form-control mb-3 <?php echo (!empty($imageURL_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $imageURL; ?>">
                                <span class="invalid-feedback"><?php echo $imageURL_err;?></span>
                            </div>
                            <div class="form-group">
                                <label><b>Prescription</b></label>
                                <input type="text" name="prescription" class="form-control mb-4 <?php echo (!empty($prescription_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $prescription; ?>">
                                <span class="invalid-feedback"><?php echo $prescription_err;?></span>
                            </div>
                            <div class="w-100 mt-3 d-flex justify-content-between">
                            <a href="index.php" class="btn btn-danger">Cancel</a>
                            <input type="submit" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>