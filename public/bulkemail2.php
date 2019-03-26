<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<h1>Send Bulk Email</h1>

<form name="myForm" method="post" class="pure-form pure-form-stacked" action="bulkemailproc2.php">
<table border='0' width="100%">
  <tr>    
    <td>Emails</td>
    <td><input type="text" name="email" value="<?=$email?>" required title="Cannot be empty field" size="30"></td>
	<td>
  </tr>
 
  <tr>    
    <td>Subject</td>
    <td><input type="text" name="subject" value="<?=$subject?>"  size="30"></td>
	<td>
  </tr>
  <tr>    
    <td>Message</td>
    <td><input type="text" name="message" value="<?=$message?>"  size="30" placeholder="Enter message"></td>
	<td>
  </tr>  
  <!-- To do : add recaptcha here  -->
  <tr>
    <td></td>
    <td><br><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary"></td>
    </td>
  </tr>
  <tr> <?php echo $formerror?></tr>
  
</table>
</form>
<?php
include 'includes/footer.php';
?>