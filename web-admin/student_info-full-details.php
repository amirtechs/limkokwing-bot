<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM student_info WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

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
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: student_info-error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1>View Record</h1>
                </div>
                <div class="form-group">
                    <label>Student ID</label>
                    <p class="form-control-static"><?php echo $row["student_id"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Student Name</label>
                    <p class="form-control-static"><?php echo $row["student_name"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Course Name</label>
                    <p class="form-control-static"><?php echo $row["course_name"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Term</label>
                    <p class="form-control-static"><?php echo $row["term"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Code 1</label>
                    <p class="form-control-static"><?php echo $row["module_code_1"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Name 1</label>
                    <p class="form-control-static"><?php echo $row["module_name_1"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Grade 1</label>
                    <p class="form-control-static"><?php echo $row["grade_1"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Code 2</label>
                    <p class="form-control-static"><?php echo $row["module_code_2"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Name 2</label>
                    <p class="form-control-static"><?php echo $row["module_name_2"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Grade 2</label>
                    <p class="form-control-static"><?php echo $row["grade_2"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Code 3</label>
                    <p class="form-control-static"><?php echo $row["module_code_3"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Name 3</label>
                    <p class="form-control-static"><?php echo $row["module_name_3"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Grade 3</label>
                    <p class="form-control-static"><?php echo $row["grade_3"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Code 4</label>
                    <p class="form-control-static"><?php echo $row["module_code_4"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Name 4</label>
                    <p class="form-control-static"><?php echo $row["module_name_4"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Grade 4</label>
                    <p class="form-control-static"><?php echo $row["grade_4"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Code 5</label>
                    <p class="form-control-static"><?php echo $row["module_code_5"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Name 5</label>
                    <p class="form-control-static"><?php echo $row["module_name_5"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Grade 5</label>
                    <p class="form-control-static"><?php echo $row["grade_5"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Code 6</label>
                    <p class="form-control-static"><?php echo $row["module_code_6"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Module Name 6</label>
                    <p class="form-control-static"><?php echo $row["module_name_6"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Grade 6</label>
                    <p class="form-control-static"><?php echo $row["grade_6"]; ?></p>
                </div>
                <div class="form-group">
                    <label>CGPA</label>
                    <p class="form-control-static"><?php echo $row["cgpa"]; ?></p>
                </div>
                <p>
                    <button onclick="myFunction()" class="btn btn-primary" ><span class='glyphicon glyphicon-print'></span>  Print</button>
                    <script>
                        function myFunction() {
                            window.print();
                        }
                    </script>
                    <a href="student_info.php" class="btn btn-default">Back</a>
                    <br/><br/><br/><br/><br/><br/>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>