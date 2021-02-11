<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
//$student_id =
$student_name = "";
//$course_name = $term = $cgpa = "";
//$student_id_err =
$student_name_err = "";
//$course_name_err = $term_err = $cgpa_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

//    // Validate Student ID
//    $input_student_id = trim($_POST["student_id"]);
//    if(empty($input_student_id)){
//        $student_id_err = "Please enter the student ID.";
//    } elseif(!ctype_digit($input_student_id)){
//        $student_id_err = "Please enter a valid student ID.";
//    } else{
//        $student_id = $input_student_id;
//    }

    // Validate Student Name
    $input_student_name = trim($_POST["student_name"]);
    if(empty($input_student_name)){
        $student_name_err = "Please enter student name.";
    } elseif(!filter_var($input_student_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z]/")))){
        $student_name_err = "Please enter a valid name.";
    } else{
        $student_name = $input_student_name;
    }
//
//    // Validate Course Name
//    $input_course_name = trim($_POST["course_name"]);
//    if(empty($input_course_name)){
//        $course_name_err = "Please enter a course name.";
//    } else{
//        $course_name = $input_course_name;
//    }
//
//    // Validate Term
//    $input_term = trim($_POST["term"]);
//    if(empty($input_term)){
//        $term_err = "Please enter a valid term.";
//    } else{
//        $term = $input_term;
//    }
//
//    // Validate CGPA
//    $input_cgpa = trim($_POST["cgpa"]);
//    if(empty($input_cgpa)) {
//        $cgpa_err = "Please enter the student's CGPA.";
//    }else{
//        $cgpa = $input_cgpa;
//    }

    // Check input errors before inserting in database
    if(empty($student_name_err)){

        //&& empty($student_name_err) && empty($course_name_err) && empty($term_err) && empty($cgpa_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO student_info (student_name) VALUES (?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_student_name);
                //$param_student_id);
                //, $param_student_name, $param_course_name, $param_term, $param_cgpa);

            // Set parameters
            //$param_student_id = $student_id;
            $param_student_name = $student_name;
//            $param_course_name = $course_name;
//            $param_term = $term;
//            $param_cgpa = $cgpa;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
                <p>Please fill this form and submit to add new student record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!---<div class="form-group <?php echo (!empty($student_id_err)) ? 'has-error' : ''; ?>">
                        <label>Student ID</label>
                        <input type="text" name="student_id" class="form-control" value="<?php echo $student_id; ?>">
                        <span class="help-block"><?php echo $student_id_err;?></span>
                    </div> --->
                    <div class="form-group <?php echo (!empty($student_name_err)) ? 'has-error' : ''; ?>">
                        <label>Student Name</label>
                        <input type="text" name="student_name" class="form-control" value="<?php echo $student_name; ?>">
                        <span class="help-block"><?php echo $student_name_err;?></span>
                    </div>
                    <!---<div class="form-group <?php echo (!empty($course_name_err)) ? 'has-error' : ''; ?>">
                        <label>Course Name</label>
                        <textarea name="course_name" class="form-control"><?php echo $course_name; ?></textarea>
                        <span class="help-block"><?php echo $course_name_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($term_err)) ? 'has-error' : ''; ?>">
                        <label>Term</label>
                        <input type="text" name="term" class="form-control" value="<?php echo $term; ?>">
                        <span class="help-block"><?php echo $term_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($cgpa_err)) ? 'has-error' : ''; ?>">
                        <label>CGPA</label>
                        <input type="text" name="cgpa" class="form-control" value="<?php echo $cgpa; ?>">
                        <span class="help-block"><?php echo $cgpa_err;?></span>
                    </div> --->
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="student_info.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>