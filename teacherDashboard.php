<?php
    @session_start();
    date_default_timezone_set('Asia/Dhaka');
    include 'php/connection.php';
    $name = $designation = $departments = $phoneNumber = $emailAddress = "";
    $userID = $_SESSION['userID'];
    if(isset($_SESSION['loginStatus'])){
        if($_SESSION['loginStatus']){
            unset($_SESSION['userExist']);
            header('Location: viewProfile.php');
        }
        else{
            header('Location: login.php');
        }
    }
    else{
        header('Location: login.php');
    }
?>
<?php
    include_once 'php/header.php';
    include_once 'php/navigationAfter.php';
?>

<?php
    include_once 'php/footer.php';
?>