<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$modules_code = $modules_name = "";
$modules_code_err = $modules_name_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate modules ID
    $input_modules_code = trim($_POST["modules_code"]);
    if(empty($input_modules_code)){
        $modules_code_err = "Please enter the modules code.";
    } elseif(!filter_var($input_modules_code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $modules_code_err = "Please enter a valid modules code.";
    } else{
        $modules_code = $input_modules_code;
    }

    // Validate modules Name
    $input_modules_name = trim($_POST["modules_name"]);
    if(empty($input_modules_name)){
        $modules_name_err = "Please enter modules name.";
    } elseif(!filter_var($input_modules_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $modules_name_err = "Please enter a valid name.";
    } else{
        $modules_name = $input_modules_name;
    }

    // Check input errors before inserting in database
    if(empty($modules_code_err) && empty($modules_name_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO modules (modules_code, modules_name) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_modules_code, $param_modules_name);

            // Set parameters
            $param_modules_code = $modules_code;
            $param_modules_name = $modules_name;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: module.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
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
                <div class="page-header">
                    <h2>Create Record</h2>
                </div>
                <p>Please fill this form and submit to add new module record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($modules_code_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code</label>
                        <input type="text" name="modules_code" class="form-control" value="<?php echo $modules_code; ?>">
                        <span class="help-block"><?php echo $modules_code_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($modules_name_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name</label>
                        <input type="text" name="modules_name" class="form-control" value="<?php echo $modules_name; ?>">
                        <span class="help-block"><?php echo $modules_name_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="module.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>