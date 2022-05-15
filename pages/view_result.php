<?php
    session_start();
    if(!isset($_SESSION['username']))
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
    <title>Student's Result</title>
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
<?php
    if( $_SERVER['REQUEST_METHOD'] === "POST" )
    {
        if( isset($_POST['submit']) )
        {
            if( isset($_POST['searchRollNo']) && !empty($_POST['searchRollNo']) )
            {
                $roll_no = trim($_POST['searchRollNo']);
                require_once "../config/config.php";
                $query = "SELECT * FROM `marks` INNER JOIN `students` ON `marks`.`student_roll_no` = `students`.`roll_no` WHERE `roll_no` = '$roll_no';";
                $result = mysqli_query($con, $query);
                if( $result )
                {
                    if( !is_bool($result))
                    {
                        $row = mysqli_fetch_assoc($result);
                        if($row != NULL && $row != false)
                        {
                            $t_1_eng = $row['term_1_english']; 
                            $t_1_hin = $row['term_1_hindi']; 
                            $t_1_acc = $row['term_1_accountancy']; 
                            $t_1_bs = $row['term_1_business_studies']; 
                            $t_1_m = $row['term_1_mathematics']; 
                            $t_2_eng = $row['term_2_english']; 
                            $t_2_hin = $row['term_2_hindi'];  
                            $t_2_acc = $row['term_2_accountancy']; 
                            $t_2_bs = $row['term_2_business_studies']; 
                            $t_2_m = $row['term_2_mathematics']; 
                            $hy_eng = $row['half_yearly_english']; 
                            $hy_hin = $row['half_yearly_hindi']; 
                            $hy_acc = $row['half_yearly_accountancy']; 
                            $hy_bs = $row['half_yearly_business_studies']; 
                            $hy_m = $row['half_yearly_mathematics']; 
                            $t_3_eng = $row['term_3_english'];
                            $t_3_hin = $row['term_3_hindi']; 
                            $t_3_acc = $row['term_3_accountancy']; 
                            $t_3_bs = $row['term_3_business_studies']; 
                            $t_3_m = $row['term_3_mathematics']; 
                            $f_eng = $row['finals_english']; 
                            $f_hin = $row['finals_hindi']; 
                            $f_acc = $row['finals_accountancy']; 
                            $f_bs = $row['finals_business_studies']; 
                            $f_m = $row['finals_mathematics'];  
                            $student_name = $row['fname'].' '.$row['lname']; 
                            $student_father_name = $row['father_name']; 
                            $student_dob = $row['dob'];
                            $term_1_total = $t_1_eng + $t_1_hin + $t_1_acc + $t_1_bs + $t_1_m;
                            $term_2_total = $t_2_eng + $t_2_hin + $t_2_acc + $t_2_bs + $t_2_m;
                            $term_3_total = $t_3_eng + $t_3_hin + $t_3_acc + $t_3_bs + $t_3_m;
                            $half_yearly_total = $hy_eng + $hy_hin + $hy_acc + $hy_bs + $hy_m;
                            $finals_total = $f_eng + $f_hin + $f_acc + $f_bs + $f_m;
                            $obtained_marks = $term_1_total + $term_2_total + $term_3_total + $half_yearly_total + $finals_total;
                            $percentage = $obtained_marks * 0.1;
?>
    <div class="container-fluid" style="max-width: 100%;">
        <div class="row justify-content-center">
            <div class="col-8" style="padding: 25px 0;">
                <h2 class="text-center text-dark py-3 mb-3">My School</h2>
                <div class="row justify-content-around border-top border-2">
                    <p class="col-4 py-2 pb-1">Name: <?= $student_name ?></p>
                    <p class="col-4 py-2 pb-1 text-center">Roll No: <?= $roll_no ?></p>
                </div>
                <div class="row justify-content-around border-top border-bottom border-2">
                    <p class="col-4 py-2 pb-1">Father's Name: <?= $student_father_name ?></p>
                    <p class="col-4 py-2 pb-1 text-center">DOB: <?= $student_dob ?></p>
                </div>
                <div class="table-responsive my-3 mt-4">
                <table class="table border border-secondary align-center">
                    <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Term 1</th>
                        <th scope="col">Term 2</th>
                        <th scope="col">Half Yearly</th>
                        <th scope="col">Term 3</th>
                        <th scope="col">Finals</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>English</td>
                        <td><?= $t_1_eng ?></td>
                        <td><?= $t_2_eng ?></td>
                        <td><?= $hy_eng ?></td>
                        <td><?= $t_3_eng ?></td>
                        <td><?= $f_eng ?></td>
                    </tr>
                    <tr>
                        <td>Hindi</td>
                        <td><?= $t_1_hin ?></td>
                        <td><?= $t_2_hin ?></td>
                        <td><?= $hy_hin ?></td>
                        <td><?= $t_3_hin ?></td>
                        <td><?= $f_hin ?></td>
                    </tr>
                    <tr>
                        <td>Accountancy</td>
                        <td><?= $t_1_acc ?></td>
                        <td><?= $t_2_acc ?></td>
                        <td><?= $hy_acc ?></td>
                        <td><?= $t_3_acc ?></td>
                        <td><?= $f_acc ?></td>
                    </tr>
                    <tr>
                        <td>Business Studies</td>
                        <td><?= $t_1_bs ?></td>
                        <td><?= $t_2_bs ?></td>
                        <td><?= $hy_bs ?></td>
                        <td><?= $t_3_bs ?></td>
                        <td><?= $f_bs ?></td>
                    </tr>
                    <tr>
                        <td>Mathematics</td>
                        <td><?= $t_1_m ?></td>
                        <td><?= $t_2_m ?></td>
                        <td><?= $hy_m ?></td>
                        <td><?= $t_3_m ?></td>
                        <td><?= $f_m ?></td>
                    </tr>
                    <tr class="table-active fw-bold">
                        <td>Total</td>
                        <td><?= $term_1_total ?></td>
                        <td><?= $term_2_total ?></td>
                        <td><?= $half_yearly_total ?></td>
                        <td><?= $term_3_total ?></td>
                        <td><?= $finals_total ?></td>
                    </tr>
                    <tr class="table-active text-center fw-bold">
                        <td colspan="3">Obtained Marks: <?= $obtained_marks ?>/1000</td>
                        <td colspan="3">Percentage: <?= $percentage ?>%</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" onclick="print();">Print Result</button>
                </div>
            </div>
        </div>
    </div>
<?php 
                        }
                    }
                }
                mysqli_close($con);
            }
        }
    }
?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>