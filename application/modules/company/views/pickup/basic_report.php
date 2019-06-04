<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-size:15px; line-height: 20px; font-weight: 400; font-family: Arial; margin: 30px auto;">

       <div align = "center">
	     <h2><?=$this->lang->line('pickup_basic_report')?> A</span></h1>
	   </div>
	   <?=date('M-d-y H:i:s')?><div align = "center">
	
	<img align = 
	"left" src="<?php echo FCPATH.'assets/images/logo.jpg' ?>" alt="logo"  height="20px;"><h4 style = "display: inline;
    
    padding: 285px;"><?php echo $this->lang->line('label_driver');?>:_______________ &nbsp;<?php echo $this->lang->line('label_pickup_date'); ?>: <?=date('M-d-y')?>&nbsp;
	
	</h4>
	<h4 style = "display: inline;
    ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('label_assistant'); ?>:____________ &nbsp;<?php echo $this->lang->line('label_secretary') ?>:_____________________</h4>
	</div>
	
	
	<p ><?php echo $this->username;?></p>
	<table style="border:1px solid #800000; border-collapse: collapse; width: 100%; text-align: left; margin-top: 10px;     font-size: 12px;" cellpadding="4" cellspacing="0">
    <tr style="border:1px solid; border-collapse: collapse;">
		
		<th style="border-left: 1px solid #800000; border-right: #800000;width: 1px;">#</th>
        <th style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$this->lang->line('label_branch')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;"><?=$this->lang->line('label_full_name')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;"><?=$this->lang->line('label_address')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;"><?=$this->lang->line('label_city')?> </th>
        <th style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$this->lang->line('label_state')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$this->lang->line('label_zipcode')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;"><?=$this->lang->line('label_telephone')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;"><?=$this->lang->line('label_date')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$this->lang->line('label_time')?></th>
        <th style="border-left: 1px solid #800000; border-right: #800000;"><?=$this->lang->line('label_item')?></th>
        
    </tr>
	<?php foreach($result as $value) {
		++$i;
		?>
    <tr style="background-color:<?php echo $i%2==0?'#e0ebff;':''; ?>">
        
		<td  style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$i?></td>
		<td  style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$value->branch_id?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;">*&nbsp;<?=$value->fname.' '.$value->lname?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;"><?=$value->address_line1?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;"><?=$value->city?></td>
        <td  style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$value->state?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$value->zipcode?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;"><?=$value->telephone_number?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;"><?=$value->pickup_date?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;width: 1px;"><?=$value->pickup_time?></td>
    	<td  style="border-left: 1px solid #800000; border-right: #800000;"><?=$value->item_1?></td>
    	
    </tr>
	<?php } ?>
   
</table>
</body>
</html>
