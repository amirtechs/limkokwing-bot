<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$faculty_code = $faculty_name = "";
$faculty_code_err = $faculty_name_err = "";

// Processing form data when form is submitted
if(isset($_POST["faculty_id"]) && !empty($_POST["faculty_id"])){
    // Get hidden input value
    $faculty_id = $_POST["faculty_id"];

    // Validate Faculty Code
    $input_faculty_code = trim($_POST["faculty_code"]);
    if(empty($input_faculty_code)){
        $faculty_code_err = "Please enter a valid faculty code.";
    } elseif(!filter_var($input_faculty_code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $faculty_code_err = "Please enter a valid faculty code.";
    } else{
        $faculty_code = $input_faculty_code;
    }

    // Validate Faculty Name
    $input_faculty_name = trim($_POST["faculty_name"]);
    if(empty($input_faculty_name)){
        $faculty_name_err = "Please enter a faculty's name.";
    } elseif(!filter_var($input_faculty_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $faculty_name_err = "Please enter a valid name.";
    } else{
        $faculty_name = $input_faculty_name;
    }

    // Check input errors before inserting in database
    if(empty($faculty_code_err) && empty($faculty_name_err)){
        // Prepare an update statement
        $sql = "UPDATE faculty SET faculty_code=?, faculty_name=? WHERE faculty_id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_faculty_code, $param_faculty_name, $param_faculty_id);

            // Set parameters
            $param_faculty_code = $faculty_code;
            $param_faculty_name = $faculty_name;
            $param_faculty_id = $faculty_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["faculty_id"]) && !empty(trim($_GET["faculty_id"]))){
        // Get URL parameter
        $faculty_id =  trim($_GET["faculty_id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM faculty WHERE faculty_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_faculty_id);

            // Set parameters
            $param_faculty_id = $faculty_id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $faculty_code = $row["faculty_code"];
                    $faculty_name = $row["faculty_name"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: faculty-error.php");
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
        header("location: faculty-error.php");
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
                    <input type="hidden" name="faculty_id" value="<?php echo $faculty_id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="faculty.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>