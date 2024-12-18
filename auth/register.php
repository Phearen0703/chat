<?php
    require("../db.connection.php");
    session_start();
    if(isset($_SESSION["email"])){
        header("Location: ../index.php");
        die();
    }


    // Register process
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $state = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $state->execute([
            ":username" => $username,
            ":email" => $email,
            ":password" => $password,
        ]);

        if($state->rowCount() > 0){
            header("Location: login.php");
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-5">
                <h4>Register to quick chat</h4>
                <form method="POST">
                    <div class="form-group my-2">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group my-2">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="form-control">
                    </div>
                    <p>You already have an accout? <a href="/auth/login.php">Login now!</a></p>
                    <div class="d-flex justify-content-end gap-3">
                        <button class="btn btn-outline-secondary">Cancel</button>
                        <button class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
</body>
</html>