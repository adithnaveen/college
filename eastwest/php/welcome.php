<?php
include("db_conection.php");//make connection here
session_start();

$email=$_SESSION['email'];

if(!$_SESSION['email']) 
{

    header("Location: login.php"); //redirect to login page to secure the welcome page without login access.
}

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>User Login & Registration System With PHP & MySQL</title>

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
    </head>

    <body>

        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logo</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <?php echo $_SESSION['email']; ?> </a>
                        </li>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <?php
                                
                                $update_users_query="select * from users where user_email='$email'";
                                
                                $run=mysqli_query($dbcon,$update_users_query);//here run the sql query.

                                while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                                {
                                   
                                    $user_name=$row['user_name'];
                                    $dob=$row['dob'];
                                    $state=$row['state'];
                                    $city=$row['city'];
                               
                            ?>

                        <div class="login-panel panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Update Details</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" action="welcome.php">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Username" name="name" type="text" value="<?php echo $user_name ?>" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input class="form-control" name="dob" type="date" value="<?php echo $dob ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="State" name="state" type="text" value="<?php echo $state ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="City" name="city" type="text" value="<?php echo $city ?>">
                                        </div>


                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Update" name="update">

                                    </fieldset>
                                </form>

                            </div>
                        </div>
                        <?php } ?>
                </div>
            </div>
        </div>

    </body>

    </html>

    <?php



if(isset($_POST['update']))
{
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.
    $dob=$_POST['dob'];//same
    $state=$_POST['state'];//same
    $city=$_POST['city'];//same

    //Update the user into the database.
     $update_user="update users set user_name='$user_name', dob='$dob', state=' $state', city='$city' WHERE user_email='$email'";
    if(mysqli_query($dbcon,$update_user))
    {
        //javascript function to open in the same window
        echo "<script>window.open('welcome.php','_self')</script>";

    }

}

?>