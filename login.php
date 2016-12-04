<?php
@session_start();
date_default_timezone_set('Asia/Dhaka');
?>

<?php
include_once 'php/header.php';
include_once 'php/navigationBefore.php';
?>

<?php
if (isset($_SESSION["createdUserID"]) && !empty($_SESSION["createdUserID"])) {
    echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Registration Successfully Completed!    Your User ID:   ' . $_SESSION["createdUserID"] . '<br></strong>Keep the ID for the future use!</div>';
    unset($_SESSION["createdUserID"]);
}
?>
<?php
if (isset($_SESSION["userExist"]) && isset($_SESSION["loginStatus"])) {
    if (!$_SESSION["userExist"]) {
        unset($_SESSION["userExist"]);
        echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>User ID & Password are not matched!</div>';

    }
}

?>

<!-- Login Panel -->
<div class="row" id="panel">
    <div class="col-md-offset-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Teachers Attendance Login</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <!-- User Input & Authentication -->
                        <form method="post" action="php/loginProcess.php" id="loginForm" name="loginForm">
                            <div class="form-group">
                                <input type="text" class="form-control" id="userName" name="userName"
                                       placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="passwd" name="passwd"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for=""><a href="#" data-toggle="modal" data-target="#passwordRecovery">Forget your password?</a></label>
                                <button type="submit" class="btn btn-primary pull-right" id="signIn" name="signIn">Sign
                                    In
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Bootstrap Modal-->
<div class="modal fade" id="passwordRecovery" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Confirm Password Recovery</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group" id="userID">
                            <label for="userID">Enter Your User ID<span class="glyphicon glyphicon-asterisk required"></span></label>
                            <input type="text" class="form-control" name="userID" placeholder="User ID">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group" id="securityQuestions">
                            <label for="securityQuestions">Select Correct Security Question<span class="glyphicon glyphicon-asterisk required"></span></label>
                            <select name="securityQuestions" class="form-control">
                                <option value="">Select One</option>
                                <option value="1">What was your childhood nickname?</option>
                                <option value="2">What is the name of your favorite childhood friend?</option>
                                <option value="3">What is your high school's principle's name?</option>
                                <option value="4">What is your favorite color?</option>
                                <option value="5">What is your hobby?</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="form-group" id="securityAnswers">
                            <label for="securityAnswers">Enter Correct Answer<span class="glyphicon glyphicon-asterisk required"></span></label>
                            <input type="password" class="form-control" name="securityAnswers" placeholder="Security Answer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <span id="loader" data-loader="circle-scale" style="margin-right: 50px; display: none;"></span>
                <button class="btn btn-primary" type="button" id="recoverySubmit">Submit</button>
                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePassword" role="dialog" aria-labelledby="myModalLabel">

</div>
<?php include_once 'php/footer.php'; ?>
		