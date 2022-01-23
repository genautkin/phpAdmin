<?php include './headerAndFooter/header.php' ?>
<?php require 'loginLogic/register.php' ?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fName" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lName" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="rPassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <?php  session_start(); ?>
                                <div class="invalid-feedback" style="display:<?php echo (isset($_SESSION['userAlreadyExists'])) ? 'block':'none';?>"><?php echo $_SESSION['userAlreadyExists'] ?></div>
                                <?php unset($_SESSION['userAlreadyExists']); ?>
                                <button type="submit" name="registerSubmit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <!-- <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file"  accept="image/*" name="image" class="custom-file-input" id="inputGroupFile04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose avatar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="submitAvatar">Upload</button>
                                        </div>
                                    </div>
                                </form> -->
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>

</html>