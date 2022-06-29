<?php
include "phpqrcode/qrlib.php";
$location='images/'.rand().'png';
$str=rand();
$result = md5($str);
?>

<div>
	<?php
	QRcode::png($result,$location);
	?>

	<center>
		<img src="<?php echo $location; ?>">
	</center>
</div> 