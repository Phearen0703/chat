<?php

    session_start();
    require("db.connection.php");
    if(! isset($_SESSION["email"])){
        header("Location: ./auth/login.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Chat App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
     integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between">
            <h5><?= $_SESSION["username"];?></h5>
            <form>
                <button class="btn btn-outline-danger">Log out</button>
            </form>
        </div>

        <div class="row">
            <div class="col-3 bg-secondary" id="user-list" style="height: 100vh;">
                All users are here.
            </div>

            <div class="col-9 p-3 d-flex flex-column" style="height: 100vh;">
                <h5 id="receiver_info">You have to select a user to chat with.</h5>
                <div id="message-list" class="flex-grow-1">

                </div>


                <div class="d-flex mt-auto">
                    <div class="input-group">
                        <input type="text" class="form-control p-2" placeholder="Whit message hear" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text btn btn-primary p-2"  id="basic-addon2"> <i class="fa-regular fa-paper-plane px-3 fs-3"></i></span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <script>
    $(document).ready(function() {
        function getAllUsers() {
            $.ajax({
                url: "services/getAllUser.php",
                success: function(data) {
                    $("#user-list").html(data);
                }
            })
        }

        getAllUsers();
    })
    </script>
</body>

</html>