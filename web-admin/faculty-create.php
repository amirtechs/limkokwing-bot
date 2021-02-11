<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$faculty_code = $faculty_name = "";
$faculty_code_err = $faculty_name_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate faculty ID
    $input_faculty_code = trim($_POST["faculty_code"]);
    if(empty($input_faculty_code)){
        $faculty_code_err = "Please enter the faculty code.";
    } elseif(!filter_var($input_faculty_code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $faculty_code_err = "Please enter a valid faculty code.";
    } else{
        $faculty_code = $input_faculty_code;
    }

    // Validate faculty Name
    $input_faculty_name = trim($_POST["faculty_name"]);
    if(empty($input_faculty_name)){
        $faculty_name_err = "Please enter faculty name.";
    } elseif(!filter_var($input_faculty_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $faculty_name_err = "Please enter a valid name.";
    } else{
        $faculty_name = $input_faculty_name;
    }

    // Check input errors before inserting in database
    if(empty($faculty_code_err) && empty($faculty_name_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO faculty (faculty_code, faculty_name) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_faculty_code, $param_faculty_name);

            // Set parameters
            $param_faculty_code = $faculty_code;
            $param_faculty_name = $faculty_name;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: faculty.php");
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
                <p>Please fill this form and submit to add new faculty record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($faculty_code_err)) ? 'has-error' : ''; ?>">
                        <label>Faculty Code</label>
                        <input type="text" name="faculty_code" class="form-control" value="<?php echo $faculty_code; ?>">
                        <span class="help-block"><?php echo $faculty_code_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($faculty_name_err)) ? 'has-error' : ''; ?>">
                        <label>Faculty Name</label>
                        <input type="text" name="faculty_name" class="form-control" value="<?php echo $faculty_name; ?>">
                        <span class="help-block"><?php echo $faculty_name_err;?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="faculty.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>