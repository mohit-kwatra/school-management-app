<?php
    if( $_SERVER['REQUEST_METHOD'] === "POST" )
    {
        if( isset( $_POST['submit'] ) )
        {
            $username = $password = "";

            if( !isset( $_POST['inputUsername'] ) || empty( trim( $_POST['inputUsername']) ) )
            {
                die("<script>alert('username is required!')</script>");   
            }
            else 
            {
                $username = trim( $_POST['inputUsername'] );
            }
            if( !isset( $_POST['inputPassword'] ) || empty( trim( $_POST['inputPassword']) ) )
            {
                die("<script>alert('password is required!')</script>");   
            }
            else 
            {
                $password = trim( $_POST['inputPassword'] );
            }
            
            if( !empty($username) && !empty($password) )
            {
                require_once "./config/config.php";
                $query = "SELECT * FROM `users` WHERE `username` = ?;";
                $stmt = mysqli_prepare($con, $query);
                if($stmt)
                {
                    if( mysqli_stmt_bind_param($stmt, "s", $username) )
                    {
                        if( mysqli_stmt_execute($stmt) )
                        {
                            mysqli_stmt_store_result($stmt);
                            if( mysqli_stmt_num_rows($stmt) == 1 )
                            {
                                mysqli_stmt_bind_result($stmt, $id, $username_fetched, $password_fetched, $is_admin, $date_created, $email);
                                if( mysqli_stmt_fetch($stmt) )
                                {
                                    if( password_verify($password, $password_fetched) )
                                    {
                                        session_start();
                                        $_SESSION['id'] = $id;
                                        $_SESSION['username'] = $username_fetched;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['is_admin'] = $is_admin;
                                        header("location: ./pages/dashboard.php");
                                    }
                                    else 
                                    {
                                        die("<script>alert('Username or Password is wrong!')</script>");
                                    }
                                }
                            }
                            else 
                            {
                                die("<script>alert('Username or Password is wrong!')</script>");
                            } 
                        }
                        else
                        {
                            die("<script>alert('".mysqli_stmt_error($stmt)."')</script>");
                        }
                         
                    }
                    mysqli_stmt_close($stmt);   
                }
                else 
                {
                    die("<script>alert('')</script>Something went wrong!");
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
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <style>
        body > .container-fluid {
            position: relative;
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url("./images/bg/bg.jpg");
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
        .form-container {
            min-height: 80vh;
        }
        .form-box {
            padding: 30px 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid" style="padding: 0;">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="navbar-brand mb-0">My School</span>
            </div>
        </nav>
        <div class="form-container row justify-content-center align-items-center" style="margin: 0;">
            <form method="POST" class="col-8 col-md-6 col-lg-3 bg-white form-box border rounded-3 text-secondary">
                <h2 class="text-center">Admin Login</h2>
                <div class="mb-3">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" name="inputUsername" id="inputUsername" class="form-control" placeholder="Enter Username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Enter Password" autocomplete="off" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>