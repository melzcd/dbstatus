<?php
function errorHandler($errno, $errstr, $error_file, $error_line) {
    # There is an error, display it
    //echo "<section id='error-handler'>$errno - $errstr in $error_file at line $error_line</section><br>";
	echo "<div class='alert alert-danger' role='alert'>$errno - $errstr in $error_file at line $error_line</div>";
	//echo "<div class='alert alert-danger' role='alert'>$errno - $errstr</div>";
}
// We must tell PHP to use the above error handler.
set_error_handler("errorHandler");
?> 