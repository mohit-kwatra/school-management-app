<?php
    session_start();
    if( !isset( $_SESSION['username'] ) )
    {
        header("location: ../");
    }
    
    $arr = array("active_students" => 0, "deactive_students" => 0, "active_teachers" => 0, "deactive_students" => 0);
    
    require_once "../config/config.php";
    $query = "SELECT COUNT(`roll_no`) AS `count` FROM `students` WHERE `status` = 1;";
    $result = mysqli_query($con, $query);
    
    if(!is_bool($result))
    {
        $temp = mysqli_fetch_assoc($result);
        $arr['active_students'] = $temp['count'];
    }
    
    $query = "SELECT COUNT(`roll_no`) AS `count` FROM `students` WHERE `status` = 0;";
    $result = mysqli_query($con, $query);
    if(!is_bool($result))
    {
        $temp = mysqli_fetch_assoc($result);
        $arr['deactive_students'] = $temp['count'];
    }
    
    $query = "SELECT COUNT(`id`) AS `count` FROM `teachers` WHERE `status` = 1;";
    $result = mysqli_query($con, $query);
    if(!is_bool($result))
    {
        $temp = mysqli_fetch_assoc($result);
        $arr['active_teachers'] = $temp['count'];
    }
    
    $query = "SELECT COUNT(`id`) AS `count` FROM `teachers` WHERE `status` = 0;";
    $result = mysqli_query($con, $query);
    if(!is_bool($result))
    {
        $temp = mysqli_fetch_assoc($result);
        $arr['deactive_teachers'] = $temp['count'];
    }
    
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body > .container-fluid {
            position: relative;
            min-height: 100vh;
        }
    </style>
</head>
<body class="bg-light">
    
    <div class="container-fluid" style="padding: 0;">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand mb-0">My School</span>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="./dashboard.php" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">Manage Students</a>
                            <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                                <li><a href="./student_registration.php" class="dropdown-item">Add Student</a></li>
                                <li><a href="./student_updation.php" class="dropdown-item">Edit Student</a></li>
                                <li><a href="./search_student.php" class="dropdown-item">Search Student</a></li>
                                <li><a href="./student_deletion.php" class="dropdown-item">Delete Student</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="./view_students.php" class="dropdown-item">Print Students List</a></li>        
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" id="teacherDropdown" data-bs-toggle="dropdown" aria-expanded="false">Manage Teachers</a>
                            <ul class="dropdown-menu" aria-labelledby="studentDropdown">
                                <li><a href="./teacher_registration.php" class="dropdown-item">Add Teacher</a></li>
                                <li><a href="./teacher_updation.php" class="dropdown-item">Edit Teacher</a></li>
                                <li><a href="./search_teacher.php" class="dropdown-item">Search Teacher</a></li>
                                <li><a href="./teacher_deletion.php" class="dropdown-item">Delete Teacher</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="./view_teachers.php" class="dropdown-item">Print Teachers List</a></li>        
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" id="resultDropdown" data-bs-toggle="dropdown" aria-expanded="false">Manage Results</a>
                            <ul class="dropdown-menu" aria-labelledby="resultDropdown">
                                <li><a href="./add_result.php" class="dropdown-item">Add Result</a></li>
                                <li><a href="./search_result.php" class="dropdown-item">Search Result</a></li>
                                <li><a href="./delete_result.php" class="dropdown-item">Delete Result</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a href="./view_results.php" class="dropdown-item">Print Results</a></li>        
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./certificate.php" class="nav-link">Generate Certificate</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" id="feeDropdown" data-bs-toggle="dropdown" aria-expanded="fakse">Manage Fees</a>
                            <ul class="dropdown-menu">
                                <li><a href="./pay_fee.php" class="dropdown-item">Pay Fee</a></li>
                                <li><a href="./fee_deposited.php" class="dropdown-item">Who has paid?</a></li>
                                <li><a href="./fee_pending.php" class="dropdown-item">Who has not paid?</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="./logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div style="max-width: 100%;" class="row my-4 px-3 gap-3 justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Student's Record
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Active: <?= $arr['active_students'] ?></h6>
                        <h6 class="card-title">In-Active: <?= $arr['deactive_students'] ?></h6>
                        <h6 class="card-title border-top border-bottom py-2 my-3">Total: <?= $arr['deactive_students'] + $arr['active_students'] ?></h6>
                        <a href="./view_students.php" class="btn btn-sm btn-primary">View All Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Teacher's Record
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Active: <?= $arr['active_teachers'] ?></h6>
                        <h6 class="card-title">In-Active: <?= $arr['deactive_teachers'] ?></h6>
                        <h6 class="card-title border-top border-bottom py-2 my-3">Total: <?= $arr['active_teachers'] + $arr['deactive_teachers'] ?></h6>
                        <a href="./view_teachers.php" class="btn btn-sm btn-primary">View All Teachers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Latest News
                    </div>
                    <div class="card-body">
                        <marquee behavior="scroll" direction="up" scrollamount="3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0"><a href="#">1. New registration starts from 1 May 2022</a></li>
                                <li class="list-group-item border-0"><a href="#">2. Click here to check fee status</a></li>
                                <li class="list-group-item border-0"><a href="#">3. Know the complete syllabus</a></li>
                                <li class="list-group-item border-0"><a href="#">4. Check supplementary examination dates </a></li>
                            </ul>
                        </marquee> 
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Some Important Links
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><a href="#">Examination 2021 re-checking result declared</a></li>
                            <li><a href="#">University forms for UG courses released today</a></li>
                            <li><a href="#">College board members meeting scheduled</a></li>
                            <li><a href="#">Government scholarships for college students</a></li>
                            <li><a href="#">College students protest regarding reducing syllabus</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>