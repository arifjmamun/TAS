<?php
    sleep(1);
    @session_start();
    date_default_timezone_set('Asia/Dhaka');
    include_once 'connection.php';


    if(isset($_POST['action']) && isset($_POST['clicked'])){
        $clicked = $_POST['clicked'];
        $action = $_POST['action'];
        if($clicked && $action =="signOut"){
            unset($_SESSION['userFullName']);
            unset($_SESSION['loginStatus']);
            unset($_SESSION['userExist']);
            unset($_SESSION['userID']);
            $response = true;
            echo $response;
        }
    }

    if(isset($_POST['years']) && isset($_POST['action']) && $_POST['action'] == "getMonths"){
        $years = $_POST['years'];
        $userID = $_SESSION['userID'];
        $months = array();
        $tableData = array();

        $cmd = mysqli_query($con, "SELECT DISTINCT months FROM attendanceinfo WHERE userID='$userID' AND years='$years' ORDER BY months DESC");
        while($monthSingle = mysqli_fetch_array($cmd)){
            $months[] = $monthSingle['months'];
        }

        $cmd = mysqli_query($con, "SELECT status, entryTime, leaveTime, days FROM attendanceinfo WHERE userID='$userID' AND years='$years' ORDER BY dates DESC, months DESC, years DESC");
        while($tableDataSingle = mysqli_fetch_row($cmd)){
            $tableData[] = $tableDataSingle;
        }
        $resp = array('ack' => true, 'content' => $months, 'tableData' => $tableData);
        echo json_encode($resp);

    }

    if (isset($_POST['years']) && isset($_POST['months']) && isset($_POST['action']) && $_POST['action'] == "getTableData"){
        $years = $_POST['years'];
        $userID = $_SESSION['userID'];
        $months = $_POST['months'];
        $tableData = array();
        $cmd = mysqli_query($con, "SELECT status, entryTime, leaveTime, days FROM attendanceinfo WHERE userID='$userID' AND years='$years' AND months='$months' ORDER BY dates DESC");
        while($tableDataSingle = mysqli_fetch_row($cmd)){
            $tableData[] = $tableDataSingle;
        }
        $res = array('ack' => true, 'tableData' => $tableData);
        echo json_encode($res);
    }

    if(isset($_POST['userID']) && isset($_POST['securityQuestion']) && isset($_POST['securityAnswer']) && $_POST['action']=="getRecoveryMode"){
        $securityQuestion = mysqli_real_escape_string($con, $_POST['securityQuestion']);
        $securityAnswer = mysqli_real_escape_string($con, $_POST['securityAnswer']);
        $userID = $_POST['userID'];
        $html = "";
        $count = mysqli_query($con, "SELECT COUNT(userID) FROM teacherinfo WHERE userID='$userID' AND securityQuestion='$securityQuestion' AND securityAnswer='$securityAnswer'")->fetch_row();
        if($count[0] == 1){
            $html = '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4>Change Password</h4></div><div class="modal-body"><div class="row"><div class="col-md-offset-2 col-md-8"><div class="form-group" id="newPasswd"><label for="newPasswd">New Password<span class="glyphicon glyphicon-asterisk required"></span></label><span class="pull-right" id="passHelper"><strong></strong></span><input type="password" class="form-control" name="newPasswd" placeholder="New Password"></div></div></div><div class="row"><div class="col-md-offset-2 col-md-8"><div class="form-group" id="confirmPasswd"><label for="confirmPasswd">Confirm New Password<span class="glyphicon glyphicon-asterisk required"></span></label><input type="password" class="form-control" name="confirmPasswd" placeholder="Confirm Password"></div></div></div></div><div class="modal-footer"><span id="loader" data-loader="circle-scale" style="margin-right: 50px; display: none;"></span><button class="btn btn-primary" type="button" id="changeSubmit">Submit</button><button class="btn btn-default" type="button" data-dismiss="modal">Close</button></div></div></div>';
            $resp = array('ack'=>true, 'content'=>$html, 'userID'=>$userID);
            echo json_encode($resp);
        }
        else{
            $resp = array('ack'=>false, 'content'=>$html, 'userID'=>$userID);
            echo json_encode($resp);
        }
    }

    if(isset($_POST['userID']) && isset($_POST['newPasswd']) && $_POST['action']=="setNewPassword"){
        $userID = mysqli_real_escape_string($con, $_POST['userID']);
        $newPasswd = mysqli_real_escape_string($con, $_POST['newPasswd']);
        $cmd = mysqli_query($con, "UPDATE teacherinfo SET passwd='$newPasswd' WHERE userID='$userID'");
        if($cmd == 1){
            $resp = array('ack'=>true, 'msg'=>"Password Changed Successfully!");
            echo json_encode($resp);
        }
        else{
            $resp = array('ack'=>false, 'msg'=>"A Problem occured, Try again!");
            echo json_encode($resp);
        }
    }
?>