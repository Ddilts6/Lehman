<?php
session_start();
?>
<html lang="EN">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body>
<!--<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><h1>Lehman Property Management</h1></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="listings.php">Listings</a></li>
            <li><a href="applications.php">Applications</a></li>
            <li><a href="bills.php">Bills</a></li>
            <li><a href="addlisting.php">Add Listing</a></li>
        </ul>
    </div>
</nav>
-->
<script>
    function registerFunction() {
        if (document.getElementById("registerPassword").value.length < 8) {
            alert("password too short");
            if (document.getElementById("registerPassword").value !== document.getElementById("registerPasswordConfirm").value) {
                alert("passwords do not match");
            }
        } else {
            $.ajax({
                type: "POST",
                data: {
                    username: document.getElementById("registerUsername").value,
                    password: document.getElementById("registerPassword").value
                },
                url: "register.php",
                success: function (data) {
                    alert("account successfully created");
                }
            });
        }
    }

    function loginFunction() {
        $.ajax({
            type: "POST",
            data: {
                username: document.getElementById("username").value,
                password: document.getElementById("password").value
            },
            url: "login.php",
            success: function (data) {
                alert("Logged In!");
                location.reload();
            },
            error: function (data) {
                alert('account credentials not found');
            }
        });
    }
</script>
<img src="../images/thumbnail_Image.jpg" style="width: 100%; height: 30%" alt="lehman image"/>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listings.php">Listings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="bills.php">Pay Bills</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login">
                    User Login
                </button>
                <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginTitle">User Login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <label for="username"><h4>Username</h4></label>
                                <input type="text" required="required" id="username">
                                <br>
                                <label for="password"><h4>Password</h4></label>
                                <input type="password" required="required" id="password">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick='loginFunction()'>Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                   Register
                </button>
                <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="registerTitle">Register</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <label for="username"><h4>Username</h4></label>
                                <input type="text" id="registerUsername">
                                <br>
                                <label for="registerPassword"><h4>Password</h4></label>
                                <input type="password" id="registerPassword">
                                <br>
                                <label for="registerPasswordConfirm"><h4>Confirm Password</h4></label>
                                <input type="password" id="registerPasswordConfirm">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary"  data-dismiss="modal"onclick='registerFunction();'>Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-primary" onclick="location.href='logout.php';">Logout</button>
            </li><!--
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>-->
        </ul>
    </div>
</nav>