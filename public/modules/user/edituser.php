<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();
?>

<?php
$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
//$deleteflag=false;

//var_dump($_SERVER);

if ($_SERVER['REQUEST_METHOD'] == "GET"){
	if(isset($_GET["userid"]))
	{
	  $UM=new UserManager();
	  $existuser=$UM->getUserById($_GET["userid"]);
	  //var_dump($existuser);
	}
} else if ($_SERVER['REQUEST_METHOD'] == "POST"){

	//if(isset($_REQUEST["submitted"])){
		$id = $_REQUEST["id"];
		$firstName=$_REQUEST["first_name"];
		$lastName=$_REQUEST["last_name"];
		//$email=$_REQUEST["email"];
    	$password=md5($_REQUEST["password"]);

    if($firstName!='' && $lastName!='' && $password!=''){
		
        $UM=new UserManager();
        
		$existuser=$UM->getUserById($id);

		
        $existuser->firstName=$firstName;
        $existuser->lastName=$lastName;
        $existuser->password=$password;

		    //var_dump($existuser);
			echo "Record successfully updated!";  
		$UM->saveUser($existuser);
  
		
    }else{
        $formerror="Please fill in the fields";
    }
//}
} else {
$existuser = new user();
}


if(isset($_POST["submitted"])){
  if(isset($_GET["id"])){
       $UM=new UserManager();
       $existuser=$UM->deleteAccount($_GET["id"]);
        $formerror="User deleted successfully.";
		$deleteflag=true;
	}
}else if(isset($_POST["cancelled"])){
	header("Location:../../home.php");
}else{
	if(isset($_GET["id"]))
	{
	  $UM=new UserManager();
	  $existuser=$UM->getUserById($_GET["userid"]);
	  $firstName=$existuser->firstName;
	  $lastName=$existuser->lastName;
	  $email=$existuser->email;
	  $password=$existuser->password;
	}
}
/*
include_once 'database-test.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tb_user set userid='" . $_POST['id'] . "', firstname='" . $_POST['first_name'] . "', lastname='" . $_POST['last_name'] . "', password='" . $_POST['password'] . "' ,email='" . $_POST['email'] . "' WHERE userid='" . $_POST['userid'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM tb_user WHERE id='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
var_dump($row);*/
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<!--
<div style="padding-bottom:5px;">
<a href="retrieve.php">Employee List</a>
</div>
-->
<!--
First Name: <br>
<input type="text" name="id" class="txtField" value="<?php echo $existuser->id; ?>">
<br>
-->

<!--Username: <br>-->
<input type="hidden" name="id" class="txtField" value="<?php echo $existuser->id; ?>">
<?php /*<input type="text" name="userid"  value="<?php echo $existuser->id; ?>">*/?>

<br>
First Name: <br>
<input type="text" name="first_name" class="txtField" value="<?php echo $existuser->firstName; ?>">
<br>
Last Name :<br>
<input type="text" name="last_name" class="txtField" value="<?php echo $existuser->lastName; ?>">

<br>
Password:<br>
<input type="text" name="password" class="txtField" value="">
<br>
Confirm Password:<br>
<input type="text" name="confirm_password" class="txtField" value="">

<br>
Email:<br>
<input type="text" name="email" class="txtField" value="<?php echo $existuser->email; ?>" readonly>
<br>
<input type="submit" name="submit" value="Submit" class="buttom">
 
</form>
</body>
</html>

<?php
include '../../includes/footer.php';
?>