<?php
    @session_start();
    date_default_timezone_set('Asia/Dhaka');
    $nameFlag = $emailFlag = $passFlag = $confirmFlag = $designationFlag = $phoneFlag = $securityQuestionFlag = false;
    $identityFlag = $departmentsFlag = $genderFlag = $religionFlag = $imageFlag = $agreeFlag = $securityAnswerFlag = false;

    $fullName = TestInputData($_POST['fullName']);
    $emailAddress = TestInputData($_POST['emailAddress']);
    $passwd = TestInputData($_POST['passwd']);
    $confirmPasswd = TestInputData($_POST['confirmPasswd']);
    $designation = TestInputData($_POST['designation']);
    $departments = TestInputData($_POST['departments']);
    $gender = TestInputData($_POST['gender']);
    $religion = TestInputData($_POST['religion']);
    $phoneNumber = TestInputData($_POST['phoneNumber']);
    $identityNumber = TestInputData($_POST['identityNumber']);
    $identityType = "";
    $securityQuestion = TestInputData($_POST['securityQuestions']);
    $securityAnswer = TestInputData($_POST['securityAnswers']);
    $imageFile = $_FILES["browseImage"];
    $extension = "";
    $agreeTerms = isset($_POST['agreeTerms']);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['signUp'])){

            if(!empty($fullName)){
                $namePattern = "/^[a-zA-Z. '-]{3,40}$/";
                if(preg_match($namePattern, $fullName)){
                    $nameFlag = true;
                }
            }

            if(!empty($emailAddress)){
                $emailPattern = "/^[+a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,9}$/";
                if(preg_match($emailPattern, $emailAddress)){
                    $emailFlag = true;
                }
            }

            if(!empty($passwd)){
                $passPattern1 = "/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/";
                $passPattern2 = "/^.*(?=.*[a-z])(?=.*\d)[\s\S]{8,12}$/";
                $passPattern3 = "/^.*(?=.*[A-Z])(?=.*\d)[\s\S]{8,12}$/";
                if(preg_match($passPattern1, $passwd) || preg_match($passPattern2, $passwd) || preg_match($passPattern3, $passwd)){
                    $passFlag = true;
                }
            }

            if(!empty($confirmPasswd)){
                if($confirmPasswd == $passwd){
                    $confirmFlag = true;
                }
            }

            if(!empty($designation)){
                $designationPattern = "/^[a-zA-z\. \-'_]{3,15}$/";
                if(preg_match($designationPattern, $designation)){
                    $designationFlag = true;
                }
            }

            if(!empty($departments)){
                $departmentsFlag = true;
            }

            if(!empty($gender)){
                $genderFlag = true;
            }

            if(!empty($religion)){
                $religionFlag = true;
            }

            if(!empty($phoneNumber)){
                $phonePattern = "/^[0-9\+]{11,14}$/";
                if(preg_match($phonePattern, $phoneNumber)){
                    $phoneFlag = true;
                }
            }

            if(!empty($identityNumber)){
                $identity = explode("@",$identityNumber);
                $identityType = $identity[0];
                $identityNumber = $identity[1];
                $identityPattern = "/^[A-Z0-9]{10,30}$/";
                if(preg_match($identityPattern, $identityNumber)){
                    $identityFlag = true;
                }
            }

            if(!empty($securityQuestion)){
                if($securityQuestion != ""){
                    $securityQuestionFlag = true;
                }
            }

            if(!empty($securityAnswer)){
                if($securityAnswer != ""){
                    $securityAnswerFlag = true;
                }
            }

            if(!empty($imageFile["name"])){
                $allowed = array('jpg','jpeg','png');
                $notAllowed="";
                $path_parts = pathinfo($imageFile["name"]);
                $extension = $path_parts['extension'];
                if(in_array($extension, $allowed)){
                    $imageInfo = getimagesize($imageFile["tmp_name"]);
                    $imageFileSize = filesize($imageFile["tmp_name"])/1024;
                    if($imageInfo[0]==450 && $imageInfo[1]==570 && ($imageFileSize>0 && $imageFileSize<201)){
                        $imageFlag = true;
                    }else{
                        $imageFlag = false;
                    }
                }
                else{
                    $notAllowed = $extension;
                    $imageFlag = false;
                }
            }

            if($agreeTerms){
                $agreeFlag = true;
            }
            SignUp();
        }
    }

// Checking & Avoiding Threat through this function
    function TestInputData($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

// Saving Image to File Directory
    function SaveImage($imageFile, $imageFileName){
        $newPath = '../teacherImages/'.$imageFileName;
        if(move_uploaded_file($imageFile['tmp_name'],$newPath)){
            return true;
        }
        else
            return false;
    }

// Create User ID
    function CreateUserID($con, $departments, $designation){
        $rowCount = mysqli_query($con, "SELECT COUNT(userID) FROM teacherinfo")->fetch_row();
        $result = $rowCount[0]+1;
        $userID = strtolower($departments.mb_substr($designation,0,3)).$result;
        return $userID;
    }

// Saving Data to Databse
    function SignUp(){
        define("DB_HOST", "localhost");
        define("DB_USER", "root");
        define("DB_PASS", "");
        define("DB_NAME", "tasdb");

        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $securityQuestions = array("","What was your childhood nickname?", "What is the name of your favorite childhood friend?", "What is your high school's principle's name?", "What is your favorite color?","What is your hobby?");
        global $nameFlag, $emailFlag, $passFlag, $confirmFlag, $designationFlag, $phoneFlag, $identityFlag, $departmentsFlag, $genderFlag, $religionFlag, $imageFlag, $agreeFlag, $securityQuestionFlag, $securityAnswerFlag;
        global $fullName, $emailAddress, $passwd, $designation, $departments, $gender, $religion, $phoneNumber, $identityNumber, $identityType, $imageFile, $extension, $securityQuestion, $securityAnswer;
        if($nameFlag && $emailFlag && $passFlag && $confirmFlag && $designationFlag && $phoneFlag && $identityFlag && $departmentsFlag && $genderFlag && $religionFlag && $imageFlag && $agreeFlag && $securityQuestionFlag && $securityAnswerFlag){
            // Prevent Sql Injection from Hacker
            if ($con) {
                $fullName = mysqli_real_escape_string($con,$fullName );
                $emailAddress = mysqli_real_escape_string($con,$emailAddress );
                $passwd = mysqli_real_escape_string($con,$passwd );
                $designation = mysqli_real_escape_string($con,$designation );
                $departments = mysqli_real_escape_string($con,$departments );
                $gender = mysqli_real_escape_string($con,$gender );
                $religion = mysqli_real_escape_string($con,$religion );
                $phoneNumber = mysqli_real_escape_string($con,$phoneNumber );
                $identityNumber = mysqli_real_escape_string($con,$identityNumber );
                $identityType = mysqli_real_escape_string($con,$identityType );
                $securityQues = mysqli_real_escape_string($con, $securityQuestions[$securityQuestion]);
                $securityAnswer = mysqli_real_escape_string($con, $securityAnswer);
                $imageFileName = $departments.'_'.strtolower($fullName).'_'.mt_rand(100,199).'.'.$extension;
                $userCreationTime = date('Y-m-d H:i:s');
                $userID = CreateUserID($con, $departments, $designation);
                $saveStaus = mysqli_query($con, "INSERT INTO teacherinfo(userID, passwd, email, phoneNumber, fullName, gender, religion, identityType, identityNumber, designation, departments, securityQuestion, securityAnswer,  imageName, userCreationTime)VALUES ('{$userID}','{$passwd}','{$emailAddress}','{$phoneNumber}','{$fullName}','{$gender}','{$religion}','{$identityType}','{$identityNumber}','{$designation}','{$departments}','{$securityQues}','{$securityAnswer}','{$imageFileName}','{$userCreationTime}')");
                SaveImage($imageFile, $imageFileName);
                $con->close();
                if($saveStaus){
                    $_SESSION["createdUserID"] =$userID;
                    header('Location: ../login.php');
                }
            }
            else{
                echo "Server Connecting Problem! Try Again!";
            }
        }
        else{
            echo "Invalid Data Submitted!";
            header('Location: ../registration.php');
        }
    }
?>