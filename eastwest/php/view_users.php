<?php
session_start();

if(!$_SESSION['admin_name']) 
{

    header("Location: admin_login.php"); 
}

?>


    <!DOCTYPE html>
    <html lang="en">

    <head lang="en">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist/css/bootstrap.min.css">
        <!--css file link in bootstrap folder-->
        <title>View Users</title>
    </head>
    <style>
        .login-panel {
            margin-top: 30px;
        }

        .table {
            margin-top: 20px;

        }
    </style>

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
                                <?php echo $_SESSION['admin_name']; ?> </a>
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
                <div class="col-md-12">

                    <h1 align="center">All the Users</h1>


                    <div class="table-responsive">
                        <!--this is used for responsive display in mobile and other devices-->


                        <table class="table table-bordered table-hover table-striped">
                            <thead>

                                <tr>

                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>User Pass</th>
                                    <th>User E-mail</th>
                                    <th>Delete User</th>
                                </tr>
                            </thead>

                            <?php
                                include("db_conection.php");
                                $view_users_query="select * from users";//select query for viewing users.
                                $run=mysqli_query($dbcon,$view_users_query);//here run the sql query.

                                while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
                                {
                                    $user_id=$row['id'];
                                    $user_name=$row['user_name'];
                                    $user_pass=$row['user_pass'];
                                    $user_email=$row['user_email'];

                            ?>

                                <tr>
                                    <!--here showing results in the table -->
                                    <td>
                                        <?php echo $user_id;  ?>
                                    </td>
                                    <td>
                                        <?php echo $user_name;  ?>
                                    </td>
                                    <td>
                                        <?php echo $user_pass;  ?>
                                    </td>
                                    <td>
                                        <?php echo $user_email;  ?>
                                    </td>
                                    <td>
                                        <a href="delete.php?del=<?php echo $user_id ?>">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>
                                    <!--btn btn-danger is a bootstrap button to show danger-->
                                </tr>

                                <?php } ?>

                        </table>
                    </div>

                </div>
            </div>

    </body>

    </html>