<?php
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	session_start();
	switch ($request_uri[0]) {
	// confirm email start
		case '/mailConf':
			require('logic/email.php');
			break;
	// confirm email end

	// home
		case '/':
			unset($_SESSION['alert']);
			if (isset($_SESSION['role'])) {
				if ($_SESSION['role'] == "CST") {
					require('view/cstHome.php');
				}
				else if ($_SESSION['role'] == "ADM"){
					require('view/admHome.php');
				}
			}
			else{
				require('view/cstHome.php');
			}
			break;
	// home end

	// customer view start
		case '/sepa2/store':
			require('logic/productLogic.php');
			break;

		case '/edit':
			require('view/editProfile.php');
			break;

		case '/sepa2/footer':
			require('view/layouts/footer.php');
			break;

		case '/cart':
			require('view/cart.php');
			break;

		case '/profile':
			require('view/profile.php');
			break;

		case '/review':
			require('view/comment.php');
			break;
	// customer view start

	// authentication start
		case '/register':
			require('view/register.php');
			break;
			
		case '/login':
			require('view/login.php');
			break;
	// authentication end

	// God Logic start
		case '/productAdmin':
			require('logic/productAdmin.php');
			break;
		case '/addProduct':
			require('view/addProduct.php');
			break;
	// God Logic end

	// logic customer start
		case '/auth':
			require('logic/authenticated.php');
			break;

		case '/product':
			require('logic/productLogic.php');
			break;

		case '/email':
			require('logic/email.php');
			break;

		case '/logout':
			require('logic/logout.php');
			break;

		case '/commentLogic':
			require('logic/commentLogic.php');
			break;
	// logic customer end
			
		default:
			echo "Error";
			break;
	}
?>