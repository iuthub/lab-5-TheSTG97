<?php 
$name=$_POST['name'];
$department=$_POST['department'];
$credit_card=$_POST['credit_card'];
$card_type=$_POST['card_type'];
$mystr = $name.';'.$department.';'.$credit_card.';'.$card_type."\r\n";
 ?>
<!DOCTYPE 
	html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Sucker</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php 
			$r_name = $_REQUEST['name'];
			$r_name = str_replace(" ", "", $r_name);
			if(!($r_name && $_REQUEST['department'] &&$_REQUEST['card_type'] &&$_REQUEST['credit_card'])):?>
		<h1>Sorry!</h1>
		<p>You didn't fill out the form completely <a href="buyagrade.html">Try Again!</a></p>	
		<?php else: ?>
		<?php 
			file_put_contents("suckers.txt", $mystr, FILE_APPEND);
			?>
		<h1>Thanks, sucker!</h1>
		<p>Your information has been confirmed!</p>
		<dl>
			<dt>Name</dt>
			<dd>
				<?=$name?>
			</dd>
			
			<dt>Section</dt>
			<dd>
				<?=$department?>
			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<?=$credit_card?> 	
				<?=$card_type?>
			</dd>
			<hr />
			Here are all the suckers who have submitted here:
			<?php 
				$input = file_get_contents("suckers.txt");
				$input = str_replace(';', ' ', $input);
				echo "<pre>$input</pre>";
			 ?>
		</dl>
	<?php endif; ?>
	</body>
</html>