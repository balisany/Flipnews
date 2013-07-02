<noscript>
<div align="center"><a href="index.php">Gå tilbake</a></div><!-- If javascript is disabled -->
</noscript>

<?php
	$id = $_POST['bar'];
	//code that would run here for whatever
	
	// 1. without json 
	   echo "hello this is one";
	
	// 2. by json ,Then here is where I want to send a value back to the success of the ajax below
	echo json_encode(array('returned_val' => 'yoho'));

?>