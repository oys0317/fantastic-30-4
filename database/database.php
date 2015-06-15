<script type="text/javascript">
function resetDatabase(){
	<?php
		// Name of the file
		$filename = 'petcare.sql';
		// MySQL host
		$mysql_host = 'localhost';
		// MySQL username
		$mysql_username = 'root';
		// MySQL password
		$mysql_password = '';
		// Database name
		$mysql_database = 'fantastic304';

		// Connect to MySQL server
		mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
		// Select database
		mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

		// Temporary variable, used to store current query
		$templine = '';
		// Read in entire file
		$lines = file($filename);
		// Loop through each line
		foreach ($lines as $line)
		{
			// Skip it if it's a comment
			if (substr($line, 0, 2) == '--' || $line == '')
			    continue;

			// Add this line to the current segment
			$templine .= $line;
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';')
			{
			    // Perform the query
			    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			    // Reset temp variable to empty
			    $templine = '';
			}
		}
		 echo  'alert("Tables imported successfully!")';
	?>

}
	(function () {
	    var timeLeft = 5,
	        cinterval;

	    var timeDec = function (){
	        timeLeft--;
	        document.getElementById('countdown').innerHTML = timeLeft;
	        if(timeLeft === 0){
	            clearInterval(cinterval);
	        }
	    };

	    cinterval = setInterval(timeDec, 1000);
	})();
</script>

<?php
	if(isset($_COOKIE['userID'])){
		if ($_COOKIE['userID'] == 'admin') {
			echo '<input type="button" name="resetDatabase" value="Reset Database" onclick="resetDatabase()" />';
		} 
		else {
			echo 'This page can access administor you will be redirect to home in <span id="countdown">5</span> seconds';
			setcookie('userID', $_POST["userid"], time() + 3600);
			header('refresh: 5; url=../index.php');
		die();
		}
	}	else {
		echo 'This page can access administor you will be redirect to home in <span id="countdown">5</span> seconds';
		
		header('refresh: 5; url=../index.php');

		die();
	}

	
?>
