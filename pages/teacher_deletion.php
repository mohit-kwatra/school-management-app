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
                $id = trim( $_POST['searchTeacherId'] );
                $query = "SELECT * FROM `teachers` WHERE `id` = '$id';";
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
            elseif( $_POST['submit'] === "delete" )
            {
                $id = trim($_POST['teacherId']);
                if(!empty($id))
                {
                    $query = "DELETE FROM `teachers` WHERE `id` = '$id';";
                    if( mysqli_query($con, $query) )
                    {
                        echo "<script>alert('Deletion was successful!')</script>";
                    }
                    else 
                    {
                        echo "<script>alert('".mysqli_error($con)."')</script>";
                    }
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
    <title>Teacher Deletion</title>
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
                            <a href="#" class="nav-link active dropdown-toggle" role="button" id="teacherDropdown" data-bs-toggle="dropdown" aria-expanded="false">Manage Teachers</a>
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
                <h4 style="text-decoration: underline;" class="text-center text-secondary my-4">Teacher Deletion Form</h4>
                <div class="row mb-3 mt-3 justify-content-center">
                    <div class="col-10 col-md-6 col-lg-4">
                            <form method="post">
                                <div class="input-group">
                                    <input type="text" name="searchTeacherId" class="form-control" placeholder="Teacher's ID" autocomplete="off" requierd>
                                    <button type="submit" name="submit" value="search" class="input-group-text btn btn-primary">Search</button>
                                </div>
                            </form>    
                    </div>
                </div>
                <form method="post">
                <div class="row gap-2 justify-content-center border-top py-3">
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="firstName" disabled id="firstName" class="form-control" placeholder="First Name" value="<?php if(isset($arr)) { echo $arr['fname']; } ?>" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="lastName" disabled id="lastName" class="form-control" placeholder="Last Name" value="<?php if(isset($arr)) { echo $arr['lname']; } ?>" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="fatherName" class="form-label">Father's Name</label>
                        <input type="text" name="fatherName" disabled id="fatherName" class="form-control" placeholder="Father's Name" autocomplete="off" value="<?php if(isset($arr)) { echo $arr['father_name']; } ?>" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="email" class="form-label">Email ID</label>
                        <input type="email" name="email" disabled id="email" class="form-control" placeholder="Email Address" autocomplete="off" value="<?php if(isset($arr)) { echo $arr['email']; } ?>" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" name="dob" disabled id="dob" class="form-control" placeholder="Date of Birth" value="<?php if(isset($arr)) { echo $arr['dob']; } ?>" autocomplete="off" required>
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
                        <input type="text" name="mobile" disabled id="mobile" class="form-control" placeholder="Mobile Number" value="<?php if(isset($arr)) { echo $arr['mobile']; } ?>" autocomplete="off" required>
                    </div>
                    <div class="col-12 col-md-5 col-lg-2">
                        <label for="subjects" class="form-label">Subjects</label>
                        <input type="text" name="subjects" disabled id="subjects" class="form-control" placeholder="Subject Names" value="<?php if(isset($arr)) { echo $arr['subjects']; } ?>" autocomplete="off" required>
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
                        <textarea name="address" id="address" rows="4" class="form-control" disabled placeholder="Teacher's Address" autocomplete="off" required><?php if(isset($arr)) { echo $arr['address']; } ?></textarea>
                    </div>
                    <div class="col-12 col-md-6 col-lg">
                        <label for="teacherId" class="form-label">Teacher's ID</label>
                        <input type="number" name="teacherId" id="teacherId" class="form-control" value="<?php if(isset($arr)) { echo $arr['id']; } ?>" placeholder="Teacher's ID" autocomplete="off" readonly required>
                    </div>
                    <div class="col-12 col-md-4 col-lg-2 align-self-center">
                        <button type="submit" name="submit" value="delete" class="btn btn-danger <?php if(!isset($arr)) { echo "disabled"; } ?>">Delete</button>
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