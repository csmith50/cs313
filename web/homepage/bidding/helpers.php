<?php 
function get_db() {
	$db = NULL;

	try {

		$dbUrl = getenv('DATABASE_URL');
		if (!isset($dbUrl) || empty($dbUrl)) {
			echo "error getting database url";
		}
		else {

			$dbopts = parse_url($dbUrl);
			$dbHost = $dbopts["host"];
			$dbPort = $dbopts["port"];
			$dbUser = $dbopts["user"];
			$dbPassword = $dbopts["pass"];
			$dbName = ltrim($dbopts["path"],'/');

			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //enabling debugging	
		}
	}

	catch (PDOException $e) {
		echo "Error connecting to the database: $e";
		die();
	}

	return $db;
}

function makeQuery($table, $db, $condition = NULL) {
	switch($table) {
		case "finances":
			$statement = $db->prepare("SELECT card1, card2, card3, paypal FROM finances WHERE id = $condition");
			$statement->execute();
			return $statement;
			break;
		case "itemsList":
			if ($condition != NULL) {
				$statement = $db->prepare("SELECT id, name, currentBid, description, currentBidUser, photoName, 
				condition, owner, datePosted FROM itemsList WHERE $condition");
			}
			else {
				$statement = $db->prepare("SELECT id, name, currentBid, description, currentBidUser, photoName, 
				condition, owner, datePosted FROM itemsList");	
			}

			$statement->execute();
			return $statement;
			break;
		case "user":
			//we should never return the whole list of users; only return one user as specified in condition
			$statement = $db->prepare("SELECT id, username, description, paymentInfoID FROM public.user WHERE id = $condition");
			$statement->execute();
			return $statement;
			break;
		default:
			echo "Error: invalid table";
			break;
	}
}

function login($username, $password, $db) {
	$statement = $db->prepare("SELECT id, password FROM public.user WHERE username = \"$username\"");
	$statement->execute();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	if (!empty($row) && isset($row)) 
		if ($password == $row['password'])
			return $row['id'];	

	return 0;
}

?>