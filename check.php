 <?php
$host = "ec2-54-159-112-44.compute-1.amazonaws.com";
$user = "rzwvxxskoctdnh";
$password = "9346e5015a2341c9db383bb627d97b0834fd37c32d8cf72e6c9e2746f0e3c718";
$dbname = "d43rnucd8ao291";
$port = "5432";

try{
 // Set DSN data source name
  $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";



  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
  $passwrd=$_POST["pswd"];
	$name= $_POST["uname"];
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if(empty($name))
		{
				echo '<script type="text/JavaScript"> 
			   alert("Username cannot be empty"); 
			    </script>' ;
		}
		else if(empty($passwrd))
		{
			echo '<script type="text/JavaScript"> 
			   alert("Password cannot be empty"); 
			    </script>'; 
		}
		else
		{
				  $sql = "SELECT * FROM users where username= :uname and password= :pswd";
				  $stmt = $pdo->prepare($sql);
				  $stmt->bindParam(':uname', $name,PDO::PARAM_STR);
				  $stmt->bindParam(':pswd', $passwrd,PDO::PARAM_STR);
				  $name= $_POST["uname"];
				  $passwrd=$_POST["pswd"];
				  $stmt->execute();
				  $rowCount = $stmt->rowCount();
				 
				  if($rowCount!=0)
				  {
				    echo '<script type="text/JavaScript"> 
				   alert("User Already Exists"); 
				    </script>';
				   }
				  else
				  {
				    $sql1="INSERT into users values(?,?)";
				    $stmt = $pdo->prepare($sql1);
				    $stmt->bindParam(1, $name);
				    $stmt->bindParam(2,$passwrd);
				    $name= $_POST["uname"];
				    $passwrd=$_POST["pswd"];
				    $stmt->execute();
				     echo '<div class="col-5">
				    new user registered</div>';
				  }
		}
 	}

  ?> 