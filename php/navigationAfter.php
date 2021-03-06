<?php
    @session_start();
    if(isset($_SESSION["userFullName"])){
        $fullName = $_SESSION["userFullName"];
    }
?>
<!-- Navigation Bar -->
<div class="row">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">MIST</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li id="viewProfile"><a href="viewProfile.php">View Profile</a></li>
                    <li id="attendStatus"><a href="attendStatus.php">Attendance Status</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi! <?php echo $fullName;?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="profile"><a href="javascript:void(0)">Edit Profile</a></li>
                            <li id="signOut"><a href="javascript:void(0)">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>