<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$student_id = $student_name = $course_name = $term = $module_code_1 = $module_name_1 = $grade_1
    = $module_code_2 = $module_name_2 = $grade_2 = $module_code_3 = $module_name_3 = $grade_3
    = $module_code_4 = $module_name_4 = $grade_4 = $module_code_5 = $module_name_5 = $grade_5
    = $module_code_6 = $module_name_6 = $grade_6 = $cgpa = "";
$student_id_err = $student_name_err = $course_name_err = $term_err = $module_code_1_err = $module_name_1_err = $grade_1_err
    = $module_code_2_err = $module_name_2_err = $grade_2_err = $module_code_3_err = $module_name_3_err = $grade_3_err
    = $module_code_4_err = $module_name_4_err = $grade_4_err = $module_code_5_err = $module_name_5_err = $grade_5_err
    = $module_code_6_err = $module_name_6_err = $grade_6_err = $cgpa_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate Student ID
    $input_student_id = trim($_POST["student_id"]);
    if(empty($input_student_id)){
        $student_id_err = "Please enter the student ID.";
    } elseif(!ctype_digit($input_student_id)){
        $student_id_err = "Please enter a valid student ID.";
    } else{
        $student_id = $input_student_id;
    }

    // Validate Student Name
    $input_student_name = trim($_POST["student_name"]);
    if(empty($input_student_name)){
        $student_name_err = "Please enter student name.";
    } elseif(!filter_var($input_student_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $student_name_err = "Please enter a valid name.";
    } else{
        $student_name = $input_student_name;
    }

    // Validate Course Name
    $input_course_name = trim($_POST["course_name"]);
    if(empty($input_course_name)){
        $course_name_err = "Please enter a course name.";
    } else{
        $course_name = $input_course_name;
    }

    // Validate Term
    $input_term = trim($_POST["term"]);
    if(empty($input_term)){
        $term_err = "Please enter a valid term.";
    } else{
        $term = $input_term;
    }

    // Validate Module Code 1
    $input_module_code_1 = trim($_POST["module_code_1"]);
    if(empty($input_module_code_1)){
        $module_code_1_err = "Please enter a module code.";
    } else{
        $module_code_1 = $input_module_code_1;
    }

    // Validate Module Name 1
    $input_module_name_1 = trim($_POST["module_name_1"]);
    if(empty($input_module_name_1)){
        $module_name_1_err = "Please enter a module name.";
    } else{
        $module_name_1 = $input_module_name_1;
    }

    // Validate Grade 1
    $input_grade_1 = trim($_POST["grade_1"]);
    if(empty($input_grade_1)){
        $grade_1_err = "Please enter a grade.";
    } else{
        $grade_1 = $input_grade_1;
    }

    // Validate Module Code 2
    $input_module_code_2 = trim($_POST["module_code_2"]);
    if(empty($input_module_code_2)){
        $module_code_2_err = "Please enter a module code.";
    } else{
        $module_code_2 = $input_module_code_2;
    }

    // Validate Module Name 2
    $input_module_name_2 = trim($_POST["module_name_2"]);
    if(empty($input_module_name_2)){
        $module_name_2_err = "Please enter a module name.";
    } else{
        $module_name_2 = $input_module_name_2;
    }

    // Validate Grade 2
    $input_grade_2 = trim($_POST["grade_2"]);
    if(empty($input_grade_2)){
        $grade_2_err = "Please enter a grade.";
    } else{
        $grade_2 = $input_grade_2;
    }

    // Validate Module Code 3
    $input_module_code_3 = trim($_POST["module_code_3"]);
    if(empty($input_module_code_3)){
        $module_code_3_err = "Please enter a module code.";
    } else{
        $module_code_3 = $input_module_code_3;
    }

    // Validate Module Name 3
    $input_module_name_3 = trim($_POST["module_name_3"]);
    if(empty($input_module_name_3)){
        $module_name_3_err = "Please enter a module name.";
    } else{
        $module_name_3 = $input_module_name_3;
    }

    // Validate Grade 3
    $input_grade_3 = trim($_POST["grade_3"]);
    if(empty($input_grade_3)){
        $grade_3_err = "Please enter a grade.";
    } else{
        $grade_3 = $input_grade_3;
    }

    // Validate Module Code 4
    $input_module_code_4 = trim($_POST["module_code_4"]);
    if(empty($input_module_code_4)){
        $module_code_4_err = "Please enter a module code.";
    } else{
        $module_code_4 = $input_module_code_4;
    }

    // Validate Module Name 4
    $input_module_name_4 = trim($_POST["module_name_4"]);
    if(empty($input_module_name_4)){
        $module_name_4_err = "Please enter a module name.";
    } else{
        $module_name_4 = $input_module_name_4;
    }

    // Validate Grade 4
    $input_grade_4 = trim($_POST["grade_4"]);
    if(empty($input_grade_4)){
        $grade_4_err = "Please enter a grade.";
    } else{
        $grade_4 = $input_grade_4;
    }

    // Validate Module Code 5
    $input_module_code_5 = trim($_POST["module_code_5"]);
    if(empty($input_module_code_5)){
        $module_code_5_err = "Please enter a module code.";
    } else{
        $module_code_5 = $input_module_code_5;
    }

    // Validate Module Name 5
    $input_module_name_5 = trim($_POST["module_name_5"]);
    if(empty($input_module_name_5)){
        $module_name_5_err = "Please enter a module name.";
    } else{
        $module_name_5 = $input_module_name_5;
    }

    // Validate Grade 5
    $input_grade_5 = trim($_POST["grade_5"]);
    if(empty($input_grade_5)){
        $grade_5_err = "Please enter a grade.";
    } else{
        $grade_5 = $input_grade_5;
    }

    // Validate Module Code 6
    $input_module_code_6 = trim($_POST["module_code_6"]);
    if(empty($input_module_code_6)){
        $module_code_6_err = "Please enter a module code.";
    } else{
        $module_code_6 = $input_module_code_6;
    }

    // Validate Module Name 6
    $input_module_name_6 = trim($_POST["module_name_6"]);
    if(empty($input_module_name_6)){
        $module_name_6_err = "Please enter a module name.";
    } else{
        $module_name_6 = $input_module_name_6;
    }

    // Validate Grade 6
    $input_grade_6 = trim($_POST["grade_6"]);
    if(empty($input_grade_6)){
        $grade_6_err = "Please enter a grade.";
    } else{
        $grade_6 = $input_grade_6;
    }

    // Validate CGPA
    $input_cgpa = trim($_POST["cgpa"]);
    if(empty($input_cgpa)) {
        $cgpa_err = "Please enter the student's CGPA.";
    }else{
        $cgpa = $input_cgpa;
    }

    // Check input errors before inserting in database
    if(empty($student_id_err) && empty($student_name_err) && empty($course_name_err) && empty($term_err)
        && empty($module_code_1_err) && empty($module_name_1_err) && empty($grade_1_err)
        && empty($module_code_2_err) && empty($module_name_2_err) && empty($grade_2_err)
        && empty($module_code_3_err) && empty($module_name_3_err) && empty($grade_3_err)
        && empty($module_code_4_err) && empty($module_name_4_err) && empty($grade_4_err)
        && empty($module_code_5_err) && empty($module_name_5_err) && empty($grade_5_err)
        && empty($module_code_6_err) && empty($module_name_6_err) && empty($grade_6_err)
        && empty($cgpa_err)){
        // Prepare an update statement
        $sql = "UPDATE student_info SET student_id=?, student_name=?, course_name=?, term=?, 
                module_code_1=?, module_name_1=?, grade_1=?, module_code_2=?, module_name_2=?, grade_2=?, 
                module_code_3=?, module_name_3=?, grade_3=?, module_code_4=?, module_name_4=?, grade_4=?,
                module_code_5=?, module_name_5=?, grade_5=?, module_code_6=?, module_name_6=?, grade_6=?,   
                cgpa=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssi", $param_student_id, $param_student_name, $param_course_name, $param_term,
                $param_module_code_1, $param_module_name_1, $param_grade_1,
                $param_module_code_2, $param_module_name_2, $param_grade_2,
                $param_module_code_3, $param_module_name_3, $param_grade_3,
                $param_module_code_4, $param_module_name_4, $param_grade_4,
                $param_module_code_5, $param_module_name_5, $param_grade_5,
                $param_module_code_6, $param_module_name_6, $param_grade_6,
                $param_cgpa, $param_id);

            // Set parameters
            $param_student_id = $student_id;
            $param_student_name = $student_name;
            $param_course_name = $course_name;
            $param_term = $term;
            $param_module_code_1 = $module_code_1;
            $param_module_name_1 = $module_name_1;
            $param_grade_1 = $grade_1;
            $param_module_code_2 = $module_code_2;
            $param_module_name_2 = $module_name_2;
            $param_grade_2 = $grade_2;
            $param_module_code_3 = $module_code_3;
            $param_module_name_3 = $module_name_3;
            $param_grade_3 = $grade_3;
            $param_module_code_4 = $module_code_4;
            $param_module_name_4 = $module_name_4;
            $param_grade_4 = $grade_4;
            $param_module_code_5 = $module_code_5;
            $param_module_name_5 = $module_name_5;
            $param_grade_5 = $grade_5;
            $param_module_code_6 = $module_code_6;
            $param_module_name_6 = $module_name_6;
            $param_grade_6 = $grade_6;
            $param_cgpa = $cgpa;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: student_info.php");
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
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM student_info WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $student_id = $row["student_id"];
                    $student_name = $row["student_name"];
                    $course_name = $row["course_name"];
                    $term = $row["term"];
                    $module_code_1 = $row["module_code_1"];
                    $module_name_1 = $row["module_name_1"];
                    $grade_1 = $row["grade_1"];
                    $module_code_2 = $row["module_code_2"];
                    $module_name_2 = $row["module_name_2"];
                    $grade_2 = $row["grade_2"];
                    $module_code_3 = $row["module_code_3"];
                    $module_name_3 = $row["module_name_3"];
                    $grade_3 = $row["grade_3"];
                    $module_code_4 = $row["module_code_4"];
                    $module_name_4 = $row["module_name_4"];
                    $grade_4 = $row["grade_4"];
                    $module_code_5 = $row["module_code_5"];
                    $module_name_5 = $row["module_name_5"];
                    $grade_5 = $row["grade_5"];
                    $module_code_6 = $row["module_code_6"];
                    $module_name_6 = $row["module_name_6"];
                    $grade_6 = $row["grade_6"];
                    $cgpa = $row["cgpa"];

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: student_info-error.php");
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
        header("location: student_info-error.php");
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
                    <div class="form-group <?php echo (!empty($student_id_err)) ? 'has-error' : ''; ?>">
                        <label>Student ID</label>
                        <input type="text" name="student_id" class="form-control" value="<?php echo $student_id; ?>">
                        <span class="help-block"><?php echo $student_id_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($student_name_err)) ? 'has-error' : ''; ?>">
                        <label>Student Name</label>
                        <input type="text" name="student_name" class="form-control" value="<?php echo $student_name; ?>">
                        <span class="help-block"><?php echo $student_name_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($course_name_err)) ? 'has-error' : ''; ?>">
                        <label>Course Name</label>
                        <textarea name="course_name" class="form-control"><?php echo $course_name; ?></textarea>
                        <span class="help-block"><?php echo $course_name_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($term_err)) ? 'has-error' : ''; ?>">
                        <label>Term</label>
                        <input type="text" name="term" class="form-control" value="<?php echo $term; ?>">
                        <span class="help-block"><?php echo $term_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_code_1_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code 1</label>
                        <input type="text" name="module_code_1" class="form-control" value="<?php echo $module_code_1; ?>">
                        <span class="help-block"><?php echo $module_code_1_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_name_1_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name 1</label>
                        <input type="text" name="module_name_1" class="form-control" value="<?php echo $module_name_1; ?>">
                        <span class="help-block"><?php echo $module_name_1_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($grade_1_err)) ? 'has-error' : ''; ?>">
                        <label>Grade 1</label>
                        <input type="text" name="grade_1" class="form-control" value="<?php echo $grade_1; ?>">
                        <span class="help-block"><?php echo $grade_1_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_code_2_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code 2</label>
                        <input type="text" name="module_code_2" class="form-control" value="<?php echo $module_code_2; ?>">
                        <span class="help-block"><?php echo $module_code_2_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_name_2_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name 2</label>
                        <input type="text" name="module_name_2" class="form-control" value="<?php echo $module_name_2; ?>">
                        <span class="help-block"><?php echo $module_name_2_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($grade_2_err)) ? 'has-error' : ''; ?>">
                        <label>Grade 2</label>
                        <input type="text" name="grade_2" class="form-control" value="<?php echo $grade_2; ?>">
                        <span class="help-block"><?php echo $grade_2_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_code_3_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code 3</label>
                        <input type="text" name="module_code_3" class="form-control" value="<?php echo $module_code_3; ?>">
                        <span class="help-block"><?php echo $module_code_3_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_name_3_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name 3</label>
                        <input type="text" name="module_name_3" class="form-control" value="<?php echo $module_name_3; ?>">
                        <span class="help-block"><?php echo $module_name_3_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($grade_3_err)) ? 'has-error' : ''; ?>">
                        <label>Grade 3</label>
                        <input type="text" name="grade_3" class="form-control" value="<?php echo $grade_3; ?>">
                        <span class="help-block"><?php echo $grade_3_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_code_4_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code 4</label>
                        <input type="text" name="module_code_4" class="form-control" value="<?php echo $module_code_4; ?>">
                        <span class="help-block"><?php echo $module_code_4_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_name_4_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name 4</label>
                        <input type="text" name="module_name_4" class="form-control" value="<?php echo $module_name_4; ?>">
                        <span class="help-block"><?php echo $module_name_4_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($grade_4_err)) ? 'has-error' : ''; ?>">
                        <label>Grade 4</label>
                        <input type="text" name="grade_4" class="form-control" value="<?php echo $grade_4; ?>">
                        <span class="help-block"><?php echo $grade_4_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_code_5_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code 5</label>
                        <input type="text" name="module_code_5" class="form-control" value="<?php echo $module_code_5; ?>">
                        <span class="help-block"><?php echo $module_code_5_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_name_5_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name 5</label>
                        <input type="text" name="module_name_5" class="form-control" value="<?php echo $module_name_5; ?>">
                        <span class="help-block"><?php echo $module_name_5_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($grade_5_err)) ? 'has-error' : ''; ?>">
                        <label>Grade 5</label>
                        <input type="text" name="grade_5" class="form-control" value="<?php echo $grade_5; ?>">
                        <span class="help-block"><?php echo $grade_5_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_code_6_err)) ? 'has-error' : ''; ?>">
                        <label>Module Code 6</label>
                        <input type="text" name="module_code_6" class="form-control" value="<?php echo $module_code_6; ?>">
                        <span class="help-block"><?php echo $module_code_6_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($module_name_6_err)) ? 'has-error' : ''; ?>">
                        <label>Module Name 6</label>
                        <input type="text" name="module_name_6" class="form-control" value="<?php echo $module_name_6; ?>">
                        <span class="help-block"><?php echo $module_name_6_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($grade_6_err)) ? 'has-error' : ''; ?>">
                        <label>Grade 6</label>
                        <input type="text" name="grade_6" class="form-control" value="<?php echo $grade_6; ?>">
                        <span class="help-block"><?php echo $grade_6_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($cgpa_err)) ? 'has-error' : ''; ?>">
                        <label>CGPA</label>
                        <input type="text" name="cgpa" class="form-control" value="<?php echo $cgpa; ?>">
                        <span class="help-block"><?php echo $cgpa_err;?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="student_info.php" class="btn btn-default">Cancel</a>
                </form>
                <br/><br/><br/><br/>
            </div>
        </div>
    </div>
</div>
</body>
</html>