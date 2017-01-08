<?php

	require_once 'facebook-php-sdk-master/src/facebook.php';
	
	function checkFacebook(){
		$config = array();
		$config['appId'] = '729595287197655'; // tu wpisz ID twojej aplikacji
		$config['secret'] = 'e9161d60fea55260f8e6335756162590'; // tu wpisz secret twojej aplikacji
		 
		$fb = new Facebook($config);
		
		if ($fb->getUser()) { // sprawdza czy zalogowany
			$user = $fb->api('me');
			$_SESSION['login'] = $user['name'];
			header("location: http://" . $_SERVER['HTTP_HOST'] ."/Krypto/UserMainPage.php");
		}
		else {
				$params = array(
					'scope' => 'email',
					'redirect_uri' => 'http://przelewykrypto.pl/Krypto/index.php'
				);
				echo '<a href="' . $fb->getLoginUrl($params) . '">Zaloguj się przez Facebook</a><img src="fb-image.png"/>';
		}
	}
	
	function logoutFacebook(){
		$config = array();
		$config['appId'] = '729595287197655'; // tu wpisz ID twojej aplikacji
		$config['secret'] = 'e9161d60fea55260f8e6335756162590'; // tu wpisz secret twojej aplikacji
		 
		$fb = new Facebook($config);
		
		if ($fb->getUser()) { // sprawdza czy zalogowany
			$fb->destroySession();
		}
	}
		
?>