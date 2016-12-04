<?php
@session_start();
date_default_timezone_set('Asia/Dhaka');
include 'php/connection.php';
$name = $designation = $departments = $phoneNumber = $emailAddress = $imageName = "";
if(isset($_SESSION['userID'])){
    if(!empty($_SESSION['userID'])){
        $userID = $_SESSION['userID'];
        $dataTable = mysqli_fetch_assoc(mysqli_query($con, "SELECT fullName, designation, departments, phoneNumber, email, imageName FROM teacherinfo WHERE userID='$userID'"));
        $name = $dataTable['fullName'];
        $designation = $dataTable['designation'];
        $departments = strtoupper($dataTable['departments']);
        $phoneNumber = $dataTable['phoneNumber'];
        $emailAddress = $dataTable['email'];
        $imageName = $dataTable['imageName'];
    }
    //var_dump($_SESSION['entryStatus']);
}
else{
    header('Location: login.php');
}
?>

<?php
    include_once 'php/header.php';
    include_once 'php/navigationAfter.php';
?>
<div class="row" id="viewProfileContent">
    <div class="col-md-offset-1 col-md-10">
        <?php
            if(isset($_SESSION['entryStatus']) && $_SESSION['entryStatus'] == true){
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>You Arrived at right time!</strong> To know details <a href="attendStatus.php">click here</a></div>';
            }
            if(isset($_SESSION['entryStatus']) && $_SESSION['entryStatus'] == false){
                echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>You Are late!</strong> To know details <a href="attendStatus.php">click here</a></div>';
            }
        unset($_SESSION['entryStatus']);
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">Basic Profile Info</div>
            <div class="panel-body">
                <div class="col-md-offset-2 col-md-2">
                    <img class="img-responsive img-thumbnail" src="teacherImages/<?php echo $imageName;?>" alt="Profile Image">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h4>Full Name: <?php echo $name;?></h4>
                    </div>
                    <div class="row">
                        <h4>Designation: <?php echo $designation;?></h4>
                    </div>
                    <div class="row">
                        <h4>Departments: <?php echo $departments;?></h4>
                    </div>
                    <div class="row">
                        <h4>Phone Number: <?php echo $phoneNumber;?></h4>
                    </div>
                    <div class="row">
                        <h4>Email Address: <?php echo $emailAddress;?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once'php/footer.php';?>