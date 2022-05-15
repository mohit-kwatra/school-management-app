<?php
    session_start();
    if( !isset( $_SESSION['username'] ) )
    {
        header("location: ../");
    }
    
    if( $_SERVER['REQUEST_METHOD'] === "POST" )
    {
        if( isset( $_POST['submit'] ) )
        {
            require_once "../config/config.php";
            if( $_POST['submit'] === "search" )
            {
                $roll_no = trim( $_POST['searchRollNo'] );
                $query = "SELECT * FROM `students` WHERE `roll_no` = '$roll_no';";
                $result = mysqli_query($con, $query);
                if( !is_bool($result) )
                {
                    $arr = mysqli_fetch_assoc($result);
                }
                else
                {
                    echo "<script>alert('missing or invalid roll no!')</script>";
                    
                }
            }
            mysqli_close($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Search</title>
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
                            <a href="./dashboard.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link active dropdown-toggle" role="button" id="studentDropdown" data-bs-toggle="dropdown" aria-expanded="false">Manage Students</a>
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
        <div style="max-width: 100%;" class="row justify-content-center">
            <div class="col-10">
                <h4 style="text-decoration: underline;" class="text-center text-secondary my-4">Search Student</h4>
                <div class="row mb-3 mt-3 justify-content-center">
                    <div class="col-10 col-md-6 col-lg-4">
                            <form method="post">
                                <div class="input-group">
                                    <input type="text" name="searchRollNo" class="form-control" placeholder="Student's Roll No." autocomplete="off" requierd>
                                    <button type="submit" name="submit" value="search" class="input-group-text btn btn-primary">Search</button>
                                </div>
                            </form>    
                    </div>
                </div>
                <form method="post">
                <div class="row gap-2 justify-content-center border-top py-3">
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" value="<?php if(isset($arr)) { echo $arr['fname']; } ?>" autocomplete="off" disabled required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" value="<?php if(isset($arr)) { echo $arr['lname']; } ?>" autocomplete="off" disabled required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="fatherName" class="form-label">Father's Name</label>
                        <input type="text" name="fatherName" id="fatherName" class="form-control" placeholder="Father's Name" autocomplete="off" value="<?php if(isset($arr)) { echo $arr['father_name']; } ?>" disabled required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="motherName" class="form-label">Mother's Name</label>
                        <input type="text" name="motherName" id="motherName" class="form-control" placeholder="Mother's Name" autocomplete="off" value="<?php if(isset($arr)) { echo $arr['mother_name']; } ?>" disabled required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" value="<?php if(isset($arr)) { echo $arr['dob']; } ?>" autocomplete="off" disabled required>
                    </div>
                </div>
                <div class="row justify-content-center gap-2 border-top border-bottom py-3">
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" disabled class="form-select">
                            <option selected disabled>-Select-</option>
                            <option <?php if(isset($arr)) { if($arr['gender'] == 'M') { echo "selected"; } } ?> value="M">Male</option>
                            <option <?php if(isset($arr)) { if($arr['gender'] == 'F') { echo "selected"; } } ?> value="F">Female</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" disabled class="form-select">
                            <option selected disabled>-Select-</option>
                            <option <?php if(isset($arr)) { if($arr['category'] == 'GEN') { echo "selected"; } } ?> value="GEN">GEN</option>
                            <option <?php if(isset($arr)) { if($arr['category'] == 'OBC') { echo "selected"; } } ?> value="OBC">OBC</option>
                            <option <?php if(isset($arr)) { if($arr['category'] == 'ST') { echo "selected"; } } ?> value="ST">ST</option>
                            <option <?php if(isset($arr)) { if($arr['category'] == 'SC') { echo "selected"; } } ?> value="SC">SC</option>
                            <option <?php if(isset($arr)) { if($arr['category'] == 'Other') { echo "selected"; } } ?> value="Other">Other</option>
                        </select>                    
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" disabled  placeholder="Mobile Number" value="<?php if(isset($arr)) { echo $arr['mobile']; } ?>" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="grade" class="form-label">Grade/Class</label>
                        <select name="grade" id="grade" disabled class="form-select">
                            <option selected disabled>-Select-</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '12') { echo "selected"; } } ?> value="12">12th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '11') { echo "selected"; } } ?> value="11">11th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '10') { echo "selected"; } } ?> value="10">10th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '9') { echo "selected"; } } ?> value="9">9th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '8') { echo "selected"; } } ?> value="8">8th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '7') { echo "selected"; } } ?> value="7">7th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '6') { echo "selected"; } } ?> value="6">6th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '5') { echo "selected"; } } ?> value="5">5th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '4') { echo "selected"; } } ?> value="4">4th</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '3') { echo "selected"; } } ?> value="3">3rd</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '2') { echo "selected"; } } ?> value="2">2nd</option>
                            <option <?php if(isset($arr)) { if($arr['grade'] == '1') { echo "selected"; } } ?> value="1">1st</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" disabled value="<?php if(isset($arr)) { echo $arr['status']; } ?>" id="status" class="form-select">
                            <option selected disabled>-Select-</option>
                            <option <?php if(isset($arr)) { if($arr['status'] == '1') { echo "selected"; } } ?> value="1">Active</option>
                            <option <?php if(isset($arr)) { if($arr['status'] == '0') { echo "selected"; } } ?> value="0">Not Active</option>
                        </select>
                    </div>
                </div>
                <div class="row gap-2 justify-content-center border-bottom py-3">
                    <div class="col-12 col-lg-7">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="4" class="form-control" placeholder="Student's Address" disabled autocomplete="off" required><?php if(isset($arr)) { echo $arr['address']; } ?></textarea>
                    </div>
                    <div class="col-12 col-md-6 col-lg">
                        <label for="rollNo" class="form-label">Roll No.</label>
                        <input type="text" name="rollNo" id="rollNo" class="form-control" value="<?php if(isset($arr)) { echo $arr['roll_no']; } ?>" placeholder="Student's Roll No." autocomplete="off" disabled required>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>