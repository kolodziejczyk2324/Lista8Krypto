<?php
	require_once("recaptcha-1.0.0/php/recaptchalib.php");
	
	function checkReCaptcha($reCaptchaPost){
		$response = null;
		$secret = "6Le_5w4UAAAAADcIetzueTTcNnQF9Jc64ZIL8pum";
		if ($reCaptchaPost) {
			$reCaptcha = new ReCaptcha($secret);
			$response = $reCaptcha->verifyResponse(
				$_SERVER["REMOTE_ADDR"],
				$_POST["g-recaptcha-response"]
			);
		}
		if (!($response != null && $response->success)){
			header("location: http://" . $_SERVER['HTTP_HOST'] . "/Krypto/index.php");
			exit;
		}
	}
?>