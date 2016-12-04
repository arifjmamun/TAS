<!-- Page Footer -->
	<div id="push"></div>
</div>
		<div id="footer">
			<div class="container" id="footerBody">
				<h5 id="footerText">All rights are reserved by MIST | 2016</h5>
			</div>
		</div>
				
		<script type="text/javascript" src="js/jquery-2.2.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
        <?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == "registration"){
            echo '<script type="text/javascript" src="js/signupValidation.js"></script>';}
        ?>
        <script type="text/javascript" src="js/loginValidation.js"></script>
		<script type="text/javascript" src="js/dashboard.js"></script>
		<?php if(basename($_SERVER["SCRIPT_FILENAME"], '.php') == "rough"){
			echo '<script type="text/javascript" src="js/rough.js"></script>';}
		?>
	</body>
</html>