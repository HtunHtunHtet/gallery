<?php
declare(strict_types=1);
ob_start();
include('init.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <?php
            /*$users  = $database->query("Select * From Users")->fetch_all(MYSQLI_ASSOC);
            foreach($users as $user) {
               echo $user['username'];
            }*/

        $users = User::findAllUsers();

        foreach ($users as $user) {
            echo $user['username'].'<br/>';
        }

        ?>
    </div>

</div>
