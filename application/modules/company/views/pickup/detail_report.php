<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-size:15px; line-height: 20px; font-weight: 400; font-family: Arial; margin: 30px auto;">

	<table class="" cellpadding="0" cellspacing="0" border="0" style="width: 100%;">
		
		<tr>
			<td align="center" style="font-size:16px; font-weight: 600;"> <?=$this->username?></td>
		</tr>
	
		<tr>
			<td align="center"> <br/><span style="font-size:22px; font-weight: 600;"><?=$this->lang->line('label_pickup_details').' '.$this->lang->line('label_reports')?> A</span></td>
		</tr>

		<tr>
			<td align="right" style="font-size:16px; font-weight: 600;"> <?=date('M-d-y')?>---<?=date('H:i:s')?></td>
		</tr>

		

		
	</table>
    <br><br>
	<?php
	
	foreach($result as $value) {
		++$v;

		?>

	<div style="border:1px solid; border-collapse: collapse;">
		<br/>
		<b><?=$this->lang->line('label_pickup_details')?>:</b>ID:<?=$value->id?>,<?=$value->fname?>,<?=$value->lname?>,
		<?=$value->address_line1?>,<?=$value->apartment?>,<?=$value->city?>,<?=$value->state?>,<?=$value->zipcode?>,<?=$value->telephone_number?>
		,<?=$value->cellphone_number?>
		<br/><br/>
		<b><?=$this->lang->line('label_shipto_details')?>:</b><?php
		echo !empty($value->shipto_fname)?$value->shipto_fname.',':'';
		echo !empty($value->shipto_lname)?$value->shipto_lname.',':'';
		echo !empty($value->shipto_address_line1)?$value->shipto_address_line1.',':'';
		echo !empty($value->shipto_address_line2)?$value->shipto_address_line2.',':'';
		echo !empty($value->shipto_address_line3)?$value->shipto_address_line3.',':'';
		echo !empty($value->shipto_sector)?$value->shipto_sector.',':'';
		echo !empty($value->shipto_province)?$value->shipto_province.',':'';
		echo $value->shipto_telephone_number;
		echo $v;
		
		?><br><br>
	</div>
	<br/>

	<?php
if($v == 4){
	$v = 5;
	echo '<br/><br/>';
}
if($v%5==0 && $v != 5){
	echo '<br/><br/>';
}


} ?>




	
	
	

</body>
</html>
