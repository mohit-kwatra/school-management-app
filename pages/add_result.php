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
            if( isset( $_POST['rollNo'] ) && !empty( $_POST['rollNo'] ) )
            {
                require_once "../config/config.php";

                $roll_no = $_POST['rollNo'];
                $term_1_eng = $_POST['eng-t-1'];
                $term_2_eng = $_POST['eng-t-2'];
                $hf_eng = $_POST['eng-hy'];
                $term_3_eng = $_POST['eng-t-3'];
                $f_eng = $_POST['eng-f'];
                $term_1_hin = $_POST['hin-t-1'];
                $term_2_hin = $_POST['hin-t-2'];
                $hf_hin = $_POST['hin-hy'];
                $term_3_hin = $_POST['hin-t-3'];
                $f_hin = $_POST['hin-f'];
                $term_1_acc = $_POST['acc-t-1'];
                $term_2_acc = $_POST['eng-t-2'];
                $hf_acc = $_POST['acc-hy'];
                $term_3_acc = $_POST['acc-t-3'];
                $f_acc = $_POST['acc-f'];
                $term_1_bs = $_POST['bs-t-1'];
                $term_2_bs = $_POST['bs-t-2'];
                $hf_bs = $_POST['bs-hy'];
                $term_3_bs = $_POST['bs-t-3'];
                $f_bs = $_POST['bs-f'];
                $term_1_m = $_POST['m-t-1'];
                $term_2_m = $_POST['m-t-2'];
                $hf_m = $_POST['m-hy'];
                $term_3_m = $_POST['m-t-3'];
                $f_m = $_POST['m-f'];
                
                $query = "INSERT INTO `marks`(`student_roll_no`,`term_1_english`,`term_1_hindi`,`term_1_accountancy`,`term_1_business_studies`,`term_1_mathematics`,`term_2_english`,`term_2_hindi`,`term_2_accountancy`,`term_2_business_studies`,`term_2_mathematics`,`half_yearly_english`,`half_yearly_hindi`,`half_yearly_accountancy`,`half_yearly_business_studies`,`half_yearly_mathematics`,`term_3_english`,`term_3_hindi`,`term_3_accountancy`,`term_3_business_studies`,`term_3_mathematics`,`finals_english`,`finals_hindi`,`finals_accountancy`,`finals_business_studies`,`finals_mathematics`) VALUES ('$roll_no','$term_1_eng','$term_1_hin','$term_1_acc','$term_1_bs','$term_1_m','$term_2_eng','$term_2_hin','$term_2_acc','$term_2_bs','$term_2_m','$hf_eng','$hf_hin','$hf_acc','$hf_bs','$hf_m','$term_3_eng','$term_3_hin','$term_3_acc','$term_3_bs','$term_3_m','$f_eng','$f_hin','$f_acc','$f_bs','$f_m');";
                if( mysqli_query($con, $query) )
                {
                    echo "<script>alert('Result was added successfully!')</script>";
                }
                else
                {
                    echo "<script>alert('".mysqli_error($con)."')</script>";
                }
                mysqli_close($con);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Result Addition</title>
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
                            <a href="#" class="nav-link active dropdown-toggle" role="button" id="resultDropdown" data-bs-toggle="dropdown" aria-expanded="false">Manage Results</a>
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
        <div class="row justify-content-center" style="max-width: 100%;">
            <div class="col-md-10 col-lg-8">
                <h4 class="text-center text-secondary my-3" style="text-decoration: underline;">Add Student's Result</h4>
                <div class="row justify-content-center">
                    <form method="POST" class="col-11 col-md-9 border px-3 py-2 pb-3 mb-3">
                        <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Term 1 <br> (Out of 10)</th>
                                    <th scope="col">Term 2 <br> (Out of 10)</th>
                                    <th scope="col">Half Yearly <br> (Out of 70)</th>
                                    <th scope="col">Term 3 <br> (Out of 10)</th>
                                    <th scope="col">Finals <br> (Out of 100)</th>   
                                </tr>
                                <tbody>
                                    <tr>
                                        <td>English</td>
                                        <td><input type="number" name="eng-t-1" id="eng-t-1" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="eng-t-2" id="eng-t-2" autocomplete="off required" class="form-control"></td>
                                        <td><input type="number" name="eng-hy" id="eng-hy" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="eng-t-3" id="eng-t-3" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="eng-f" id="eng-f" autocomplete="off" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Hindi</td>
                                        <td><input type="number" name="hin-t-1" id="hin-t-1" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="hin-t-2" id="hin-t-2" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="hin-hy" id="hin-hy" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="hin-t-3" id="hin-t-3" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="hin-f" id="hin-f" autocomplete="off" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Accountancy</td>
                                        <td><input type="number" name="acc-t-1" id="acc-t-1" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="acc-t-2" id="acc-t-2" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="acc-hy" id="acc-hy" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="acc-t-3" id="acc-t-3" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="acc-f" id="acc-f" autocomplete="off" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Business Studies</td>
                                        <td><input type="number" name="bs-t-1" id="bs-t-1" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="bs-t-2" id="bs-t-2" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="bs-hy" id="bs-hy" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="bs-t-3" id="bs-t-3" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="bs-f" id="bs-f" autocomplete="off" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Mathematics</td>
                                        <td><input type="number" name="m-t-1" id="m-t-1" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="m-t-2" id="m-t-2"autocomplete="off" required  class="form-control"></td>
                                        <td><input type="number" name="m-hy" id="m-hy" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="m-t-3" id="m-t-3" autocomplete="off" required class="form-control"></td>
                                        <td><input type="number" name="m-f" id="m-f" autocomplete="off" required class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Student's Roll No.</td>
                                        <td colspan="5"><input type="number" name="rollNo" id="rollNo" required placeholder="Student's Roll Number" autocomplete="off" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add Result</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>