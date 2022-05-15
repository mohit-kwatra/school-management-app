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
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $father_name = $_POST['fatherName'];
            $mother_name = $_POST['motherName'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $category = $_POST['category'];
            $mobile = $_POST['mobile'];
            $grade = $_POST['grade'];
            $status = $_POST['status'];
            $address = $_POST['address'];
            $roll_no = $_POST['rollNo'];

            require_once "../config/config.php";
            $query = "INSERT INTO `students` (`roll_no`,`fname`,`lname`,`mother_name`,`father_name`,`dob`,`gender`,`category`,`mobile`,`grade`,`status`,`address`) VALUES ('$roll_no','$fname','$lname','$mother_name','$father_name','$dob','$gender','$category','$mobile','$grade','$status','$address');";
            $query .= "INSERT INTO `fee_status` (`student_roll_no`) VALUES ('$roll_no');";
            if( mysqli_multi_query($con, $query) )
            {
                echo "<script>alert('Registration was successful!')</script>";
            }
            else
            {
                echo "<script>alert('".mysqli_error($con)."')</script>";
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
    <title>Student Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body > .container-fluid {
            position: relative;
            min-height: 100vh;
        }
        .redMark {
            color: red;
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
            <form method="POST" class="col-10">
                <h4 style="text-decoration: underline;" class="text-center text-secondary my-4">Student Registration Form</h4>
                <p class="text-danger mb-4">Attention: * Mark fields are mandatory.</p>
                <div class="row gap-2 justify-content-center border-top py-3">
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="firstName" class="form-label"><span class="redMark">*</span> First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="lastName" class="form-label"><span class="redMark">*</span> Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="fatherName" class="form-label"><span class="redMark">*</span> Father's Name</label>
                        <input type="text" name="fatherName" id="fatherName" class="form-control" placeholder="Father's Name" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="motherName" class="form-label"><span class="redMark">*</span> Mother's Name</label>
                        <input type="text" name="motherName" id="motherName" class="form-control" placeholder="Mother's Name" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="dob" class="form-label"><span class="redMark">*</span> Date of Birth</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" autocomplete="off" required>
                    </div>
                </div>
                <div class="row justify-content-center gap-2 border-top border-bottom py-3">
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="gender" class="form-label"><span class="redMark">*</span> Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option selected disabled>-Select-</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="category" class="form-label"><span class="redMark">*</span> Category</label>
                        <select name="category" id="category" class="form-select">
                            <option selected disabled>-Select-</option>
                            <option value="GEN">GEN</option>
                            <option value="OBC">OBC</option>
                            <option value="ST">ST</option>
                            <option value="SC">SC</option>
                            <option value="Other">Other</option>
                        </select>                    
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="mobile" class="form-label"><span class="redMark">*</span> Mobile</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="grade" class="form-label"><span class="redMark">*</span> Grade/Class</label>
                        <select name="grade" id="grade" class="form-select">
                            <option selected disabled>-Select-</option>
                            <option value="12">12th</option>
                            <option value="11">11th</option>
                            <option value="10">10th</option>
                            <option value="9">9th</option>
                            <option value="8">8th</option>
                            <option value="7">7th</option>
                            <option value="6">6th</option>
                            <option value="5">5th</option>
                            <option value="4">4th</option>
                            <option value="3">3rd</option>
                            <option value="2">2nd</option>
                            <option value="1">1st</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="status" class="form-label"><span class="redMark">*</span> Status</label>
                        <select name="status" id="status" class="form-select">
                            <option selected disabled>-Select-</option>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                    </div>
                </div>
                <div class="row gap-2 justify-content-center border-bottom py-3">
                    <div class="col-12 col-lg-7">
                        <label for="address" class="form-label"><span class="redMark">*</span> Address</label>
                        <textarea name="address" id="address" rows="4" class="form-control" placeholder="Student's Address" autocomplete="off" required></textarea>
                    </div>
                    <div class="col-12 col-md-6 col-lg">
                        <label for="rollNo" class="form-label"><span class="redMark">*</span> Roll No.</label>
                        <input type="number" name="rollNo" id="rollNo" class="form-control" placeholder="Assign Roll No." autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2 align-self-center">
                        <button type="submit" name="submit" class="btn btn-primary">Register</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>