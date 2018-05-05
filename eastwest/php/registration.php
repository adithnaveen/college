<html>

<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
    <title>Registration</title>
</head>
<style>
    .login-panel {
        margin-top: 30px;
    }
</style>

<body>
<?php include("navbar.php"); ?> 
    <div class="container">
        <!-- container class is used to centered  the body of the browser with some decent width-->
        <div class="row">
            <!-- row class is used for grid system in Bootstrap-->
            <div class="col-md-4 col-md-offset-4">
                <!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="registration.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="name" type="text" autofocus>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password">
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control" name="dob" type="date">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="State" name="state" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="City" name="city" type="text">
                                </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register">

                            </fieldset>
                        </form>
                        <center>
                            <b>Already Registered ?</b>
                            </br>
                            <a href="login.php">Login here</a>
                        </center>
                        <!--for centered text-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php

include("db_conection.php");//make connection here

if(isset($_POST['register']))
{
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.
    $user_pass=$_POST['pass'];//same
    $user_email=$_POST['email'];//same
    $dob=$_POST['dob'];//same
    $state=$_POST['state'];//same
    $city=$_POST['city'];//same


    if($user_name=='')
    {
        //javascript use for input checking
        echo"<script>alert('Please enter the name')</script>";
        exit();
    }

    if($user_email=='')
    {
        echo"<script>alert('Please enter the email')</script>";
        exit();
    }

    if($user_pass=='')
    {
        echo"<script>alert('Please enter the password')</script>";
        exit();
    }

    if($dob=='')
    {
        echo"<script>alert('Please select DOB')</script>";
        exit();
    }
    
    if($state=='')
    {
        echo"<script>alert('Please enter the state')</script>";
        exit();
    }
    
    if($city=='')
    {
        echo"<script>alert('Please enter the City')</script>";
        exit();
    }



    //here query check weather if user already registered so can't register again.
    $check_email_query="select * from users WHERE user_email='$user_email'";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
        echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";
        exit();
    }

    //insert the user into the database.
    $insert_user="insert into users (user_name,user_pass,user_email,dob,state,city) VALUE ('$user_name','$user_pass','$user_email','$dob','$state','$city')";
    if(mysqli_query($dbcon,$insert_user))
    {
        echo"<script>window.open('welcome.php','_self')</script>";
    }

}

?>