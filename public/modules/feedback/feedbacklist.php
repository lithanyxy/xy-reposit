<?php
// example code
session_start();
require_once '../../includes/autoload.php';

use classes\business\FeedbackManager;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>
<br/>
<form action="feedbacklist.php" method="post">
    Email: <input type="text" name="email">
    <input type="submit" name="search" value="submit">
</form>
<?php
if(isset($_POST["search"])) {
    ?>
    <link ref="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/>Search Results<br/><br/>
    <table class="pure-table pure-table-bordered" width="800">
        <tr>
            <thead>
                <th><b>Feedback ID</b></th>
                <th><b>First Name</b></th>
                <th><b>Last Name</b></th>
                <th><b>Email</b></th>
                <th><b>Comments</b></th>
            </thead>
        </tr>
    </table>
    
<?php
    $FM=new FeedbackManager();
    $feedbacks=$FM->getFeedbackByEmail($_POST["email"]);
    foreach($feedbacks as $feedback)
    {
        if($feedback != NULL) {
            ?>
            <tr>
                <td><?=$feedback->id?></td>
                <td><?=$feedback->firstName?></td>
                <td><?=$feedback->lastName?></td>
                <td><?=$feedback->email?></td>
                <td><?=$feedback->comments?></td>
            </tr>
            <?php
        }
    }
    ?> </table><br/><br/>
	<?php
}
?>
<?php
include '../../includes/footer.php';
?>