<?php 
	include_once 'php/header.php';
	include_once 'php/navigationBefore.php';
?>
<!-- Registration Panel -->
<div class="row">
	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Teacher's Registration Panel</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<form method="post" name="regForm" id="regForm" action="php/signUpProcess.php" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" id="fullName">
										<label for="fullName">Full Name<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="text" class="form-control" name="fullName" placeholder="Full Name" title="Name Cannot be empty.&#013;Whitespace & Digit Not Allowed">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="emailAddress">
										<label for="emailAddress">Email Address<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="email" class="form-control" name="emailAddress" placeholder="Email Address">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group"  id="passwd">
										<label for="passwd">Password<span class="glyphicon glyphicon-asterisk required"></span></label>
										<span class="pull-right" id="passHelper"><strong></strong></span>
										<input type="password" class="form-control" name="passwd" placeholder="Password" title="1 Uppercase Letter&#013;1 Lowercase Letter&#013;1 Digit and&#013;Min-char: 8 & Max-char: 12 Needed">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group" id="confirmPasswd">
										<label for="confirmPasswd">Confirm Passwords<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="password" class="form-control" name="confirmPasswd" placeholder="Confirm Password">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group" id="designation">
										<label for="designation">Designation<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="text" class="form-control" name="designation" placeholder="Designation" title="Whitespace & Digit Not Allowed">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group"  id="departments">
										<label for="departments">Departments<span class="glyphicon glyphicon-asterisk required"></span></label>
										<select name="departments" class="form-control">
											<option value="">Select One</option>
											<option value="cse">CSE</option>
											<option value="bba">BBA</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group" id="gender">
										<label for="gender">Gender<span class="glyphicon glyphicon-asterisk required"></span></label>
										<select name="gender" class="form-control">
											<option value="">Select One</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group" id="religion">
										<label for="religion">Religion<span class="glyphicon glyphicon-asterisk required"></span></label>
										<select name="religion" class="form-control">
											<option value="">Select One</option>
											<option value="islam">Islam</option>
											<option value="hindu">Hinduism</option>
											<option value="crist">Cristian</option>
											<option value="buddi">Buddism</option>
											<option value="other">Other</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group" id="phoneNumber">
										<label for="phoneNumber">Phone Number<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number">
									</div>
								</div>

								<div class="col-md-6">
                                    <label for="identityNumber">NID/Passposrt/Birth ID<span class="glyphicon glyphicon-asterisk required"></span></label>
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                                            <ul class="dropdown-menu" id="identityOption">
                                                <li class="active"><a href="javascript:void(0)">National ID</a></li>
                                                <li><a href="javascript:void(0)">Passport No.</a></li>
                                                <li><a href="javascript:void(0)">Birth Reg. No.</a></li>
                                                <li><a href="javascript:void(0)">Driving Licencse</a></li>
                                            </ul>
                                        </div><!-- /btn-group -->
                                        <div class="form-group" id="identityNumber">
                                            <input type="text" class="form-control" name="identityNumber" placeholder="NID/Passposrt/Birth ID">
                                        </div>
                                    </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group" id="securityQuestions">
										<label for="securityQuestions">Select A Security Question<span class="glyphicon glyphicon-asterisk required"></span></label>
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

								<div class="col-md-6">
									<div class="form-group" id="securityAnswers">
										<label for="securityAnswers">Answer<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="password" class="form-control" name="securityAnswers" placeholder="Security Answer">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="browseImage">Browse Profile Image<span class="glyphicon glyphicon-asterisk required"></span></label>
										<input type="file" id="browseImage" name="browseImage">
									</div>
								</div>

								<div class="col-md-6">
									<label for="image">Selected Image</label><br>
                                    <div >
                                        <img src="" alt="450px X 570px Image Size"  id="profileImage" width="100px" height="127px">
                                    </div>
								</div>
								<p><span class="glyphicon glyphicon-asterisk" style="color: red; font-size: 10px"></span> - Reperesent the field is required.</p>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" name="agreeTerms" id="agreeTerms"> I am agree with <a href="#">Terms</a> & <a href="#">Condition.</a>
								</label>
							</div>

                            <button type="submit" name="signUp" id="signUp" class="btn btn-default">Sign Up</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include_once 'php/footer.php';?>