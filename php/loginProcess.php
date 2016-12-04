<?php
    @session_start();
    date_default_timezone_set('Asia/Dhaka');
    include_once 'connection.php';
    $_SESSION["loginStatus"] = false;
    $_SESSION["userExist"] = false;
    $userName = TestInputData($_POST["userName"]);
    $passwd = TestInputData($_POST["passwd"]);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST["signIn"])){
            $userName = mysqli_real_escape_string($con, $userName);
            $passwd = mysqli_real_escape_string($con, $passwd);
            $data = mysqli_fetch_assoc(mysqli_query($con,"select userID, passwd, fullName from `teacherinfo` where userID='$userName' and passwd='$passwd'"));

            $DBuserName = $data['userID'];
            $DBpasswd = $data['passwd'];
            $DBfullName = $data['fullName'];
            if(strcasecmp($userName,$DBuserName)==0 && strcasecmp($passwd, $DBpasswd)==0){
                $_SESSION["loginStatus"] = true;
                $_SESSION["userExist"] = true;
                $_SESSION["userFullName"] = $DBfullName;
                $_SESSION["userID"] = $userName;
                SaveLoginStatus($con, $userName);
                header('Location: ../teacherDashboard.php');
            }
            else{
                $_SESSION["loginStatus"] = false;
                $_SESSION["userExist"] = false;
                header('Location: ../login.php');
            }
            $con->close();
        }
    }

// Checking Input & Avoiding Threat through this function
    function TestInputData($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
// Saving Teacher Entry time and Leaving time
    function SaveLoginStatus($con, $userName){
        
        $entryLocalTime = localtime(time(),true);
        $entryServer = $entryLocalTime['tm_hour'] * 60 + $entryLocalTime['tm_min'];
        $leaveLocalTime = localtime(time(),true);
        $leaveServer = $leaveLocalTime['tm_hour'] * 60 + $leaveLocalTime['tm_min'];
        $entryStartTime = 7 * 60 + 45;
        $leaveEndTime = 17 * 60 + 45;
        if(date('l') != "Friday" && $entryServer>=$entryStartTime && $leaveServer<=$leaveEndTime){
            $toDay = date('Y-m-d');
            $loginDataStatus = mysqli_query($con, "SELECT COUNT(userID) FROM attendanceinfo WHERE userID='$userName' AND dates='$toDay'")->fetch_row();
            if($loginDataStatus[0]=="0"){
                $entryStatus = "";
                $entryTime = date('Y-m-d H:i:s');
                $entryDates = date('Y-m-d');
                $entryYears = date('Y');
                $entryMonths = date('F');
                $entryDays = date('l');
                $entryMax = 8 * 60 + 0;
                $entryMin = 7 * 60 + 45;

                if($entryServer<=$entryMax && $entryServer>=$entryMin){
                    $entryStatus = "Present";
                    $_SESSION['entryStatus'] = true;
                }
                else{
                    $entryStatus = "Late";
                    $_SESSION['entryStatus'] = false;
                }
                // echo $entryStatus;
                mysqli_query($con, "INSERT INTO attendanceinfo(userID,status,entryTime,dates,years,months,days) VALUES ('{$userName}','{$entryStatus}','{$entryTime}','{$entryDates}','{$entryYears}','{$entryMonths}','{$entryDays}')");
            }
            else{
                $leaveTime = date('Y-m-d H:i:s');
                $leaveMax = 17 * 60 + 45;
                $leaveMin = 17 * 60 + 0;
                if($leaveServer<=$leaveMax && $leaveServer>=$leaveMin){
                    mysqli_query($con, "UPDATE attendanceinfo SET leaveTime='$leaveTime' WHERE userID='$userName'");
                }
            }
        }

    }
?>


