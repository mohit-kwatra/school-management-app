<?php
    session_start();
    if( !isset( $_SESSION['username'] ) )
    {
        header("location: ../");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers List</title>
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
        <div class="row justify-content-center" style="max-width: 100%;">
            <div class="col-10">
                <h4 class="text-center text-secondary my-3" style="text-decoration: underline;">List of Teachers</h4>
                <div class="table-responsive">
                <table class="table bg-white table-striped align-middle table-bordered border border-dark rounded mt-3">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Father's Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Category</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Subjects</th>
                        <th scope="col">Status</th>
                        <th scope="col">Address</th>
                        <th scope="col">Joining Date</th>
                    </tr>
                    </thead>
                    <tbody>
<?php  
    require_once "../config/config.php";
    $query = "SELECT * FROM `teachers`;";
    $result = mysqli_query($con, $query);
    if( !is_bool($result) )
    {
        while($row = mysqli_fetch_assoc($result))
        { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['fname']; ?></td>
                <td><?= $row['lname']; ?></td>
                <td><?= $row['father_name']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['dob']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['category']; ?></td>
                <td><?= $row['mobile']; ?></td>
                <td><?= $row['subjects']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['date_created']; ?></td>
            </tr>
        <?php 
        }
    }
    mysqli_close($con);    
?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>