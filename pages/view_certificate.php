<?php
    session_start();
    if( !isset($_SESSION['username']) )
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
    <title>Student's Certificate</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body > .container-fluid {
            position: relative;
            min-height: 100vh;
        }
    </style>
</head>
<body>
<?php
    if( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        if( isset($_POST['submit']) )
        {
            if( isset($_POST['searchRollNo']) && !empty(trim($_POST['searchRollNo'])) )
            {
                $roll_no = trim($_POST['searchRollNo']);
                require_once "../config/config.php";
                $query = "SELECT * FROM `students` WHERE `roll_no` = '$roll_no';";
                $result = mysqli_query($con, $query);
                if( $result )
                {
                    if( !is_bool($result) )
                    {
                        if( mysqli_num_rows($result) > 0 )
                        {
                            $arr = mysqli_fetch_assoc($result);
                            $student_name = $arr['fname'].' '.$arr['lname'];
                            $student_father_name = $arr['father_name'];
                            $student_dob = $arr['dob'];
?>
                            <div class="container-fluid" style="max-width: 100%;">
                            <div class="row my-4 justify-content-center">
                                <div class="col-8 border border-3" style="padding: 40px 30px;">
                                    <h2 class="text-center text-dark py-3 mb-3">My School</h2>
                                    <h3 class="text-center text-dark mb-3 text-decoration-underline">Character Certificate</h3>
                                    <div class="row justify-content-around border-top border-2">
                                        <p class="col-4 py-2 pb-1">Name: <?= $student_name ?></p>
                                        <p class="col-4 py-2 pb-1 text-center">Roll No: <?= $roll_no ?></p>
                                    </div>
                                    <div class="row justify-content-around border-top border-bottom border-2">
                                        <p class="col-4 py-2 pb-1">Father's Name: <?= $student_father_name ?></p>
                                        <p class="col-4 py-2 pb-1 text-center">DOB: <?= $student_dob ?></p>
                                    </div>
                                    <p class="my-5">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This is to certify that I have known <strong><?= $student_name ?></strong> S/o <strong><?= $student_father_name ?></strong> for the last five years and that to the best of my knowledge and belief he bears reputable character. He is not related to me and has not antecedent which render him unsuitable for Government employment.</p>
                                    <div class="row justify-content-between align-items-center">
                                        <p class="col-auto">Date: <?= date("d F Y") ?></p>
                                        <p class="col-auto">Mr. Ashok Grover <br> (Wise Principal)</p>
                                    </div>                                
                                </div>
                            </div>
                            </div>
<?php
                        }
                    }
                }
            }
        }
    }
?>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>