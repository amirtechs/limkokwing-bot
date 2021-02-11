<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$modules_code = $modules_name = "";
$modules_code_err = $modules_name_err = "";

// Processing form data when form is submitted
if(isset($_POST["modules_id"]) && !empty($_POST["modules_id"])){
    // Get hidden input value
    $modules_id = $_POST["modules_id"];

    // Validate modules Code
    $input_modules_code = trim($_POST["modules_code"]);
    if(empty($input_modules_code)){
        $modules_code_err = "Please enter a valid module code.";
    }
    elseif(!filter_var($input_modules_code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $modules_code_err = "Please enter a valid module code.";
    }
    else{
        $modules_code = $input_modules_code;
    }

    // Validate modules Name
    $input_modules_name = trim($_POST["modules_name"]);
    if(empty($input_modules_name)){
        $modules_name_err = "Please enter a modules's name.";
    }
    elseif(!filter_var($input_modules_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $modules_name_err = "Please enter a valid name.";
    }
    else{
        $modules_name = $input_modules_name;
    }

    // Check input errors before inserting in database
    if(empty($modules_code_err) && empty($modules_name_err)){
        // Prepare an update statement
        $sql = "UPDATE modules SET modules_code=?, modules_name=? WHERE modules_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_modules_code, $param_modules_name, $param_modules_id);

            // Set parameters
            $param_modules_code = $modules_code;
            $param_modules_name = $modules_name;
            $param_modules_id = $modules_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["modules_id"]) && !empty(trim($_GET["modules_id"]))){
        // Get URL parameter
        $modules_id =  trim($_GET["modules_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM modules WHERE modules_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_modules_id);

            // Set parameters
            $param_modules_id = $modules_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $modules_code = $row["modules_code"];
                    $modules_name = $row["modules_name"];
                    $modules_id = $row["modules_id"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: module-error.php");
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: module-error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
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
                    <h2>Update Record</h2>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                    <input type="hidden" name="modules_id" value="<?php echo $modules_id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="module.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>