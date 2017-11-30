<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDF Created</title>

<style type="text/css">

body {
 background-color: #fff;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

.h{
border-bottom: 1px solid #D0D0D0;
width: 800px;
margin: 0px auto;
padding: 0px 0px 0px;
}

.h .l1 img{margin-left:20px;width: 80px;}


.h .l2 h2{padding: 5px;margin: 0px;}
.h .l2 p{padding: 5px;margin: 0px;}
.h table{margin-left:80px;width: 400px;}

.c table{width: 600px;margin-top: 0px;}
.c h2{text-align: center;}
.c .l2 img{width: 160px;}

.s h2{text-align: center;}
.s table{width: 600px;margin-top: 20px;}
.s table thead{background-color: #cecece;color: #000;}
.s table thead tr{background-color: #cecece;color: #000;padding: 10px;}
.s table thead tr th{background-color: #cecece;color: #000;padding: 10px;border: 1px solid #000;}
.s table tbody tr{padding: 10px;}
.s table tbody tr td{padding: 10px;border: 1px solid #000;}

.cr h2{text-align: center;}
.cr table{width: 600px;margin-top: 20px;}
.cr table thead{background-color: #cecece;color: #000;}
.cr table thead tr{background-color: #cecece;color: #000;padding: 10px;}
.cr table thead tr th{background-color: #cecece;color: #000;padding: 10px;border: 1px solid #000;}
.cr table tbody tr{padding: 10px;}
.cr table tbody tr td{padding: 10px;border: 1px solid #000;}
.sig{margin-top: 50px;}
</style>
</head>
<body>

<div class="h">
	<table cellpadding="">
		<tr>
			<td class="l1"><img src="uploads/logo.png" width="80"></td>
			<td class="l2">
				<h2>School Name</h2>
				<p>Address: xxxxxxxxxxxxxxx</p>
				<p>Phone: 055555555555555</p>
			</td>
		</tr>
	</table>
	
	
</div>
<?php if($student_datas): ?>
<div class="c">
	<h2>Addmission Details</h2>
	<table cellpadding="20px" width="100%">
		<tr>
			<td class="l1">
				<p>Student ID: 1000<?php echo $student_datas[0]->student_id;?></p>
				<p>Name: <?php echo $student_datas[0]->student_name;?></p>
				<p>Email: <?php echo $student_datas[0]->student_email;?></p>
				<p>Mobile: <?php echo $student_datas[0]->student_mobile;?></p>
				<p>Address: <?php echo $student_datas[0]->student_address;?></p>
				<p>National ID: <?php echo $student_datas[0]->student_nid;?></p>
			</td>
			<td class="l2">
				<img src="uploads/students/<?php echo $student_datas[0]->student_photo;?>" width="200">
			</td>
		</tr>
	</table>
	

	
</div>
<?php endif; ?>
<?php if($student_datas): ?>
<div class="s">
	<h2>Selected Course</h2>
	<table width="100%" cellspacing="0px">
		<thead>
			<tr>
				<th>Course name</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($student_datas as $student_data): ?>
				<tr>
					<td><?php echo $student_data->course_name;?></td>
					<td><?php echo $student_data->course_price;?></td>
					
				</tr>
			<?php endforeach;?>
		</tbody>
		
	</table>
	
</div>
<?php endif; ?>
<?php if($payment_datas): ?>
<div class="cr">
	<h2>Payment Details</h2>
	<table width="100%" cellspacing="0px">
		<thead>
			<tr>
				<th>Date</th>
				<th>Amount</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($payment_datas as $payment_data): 
			$time = strtotime($payment_data->student_payment_date);
			$myFormatForView = date("d/m/Y", $time);
			?>
				<tr>
					<td><?php echo $myFormatForView;?></td>
					<td><?php echo $payment_data->student_payment_amount;?></td>
					
				</tr>
			<?php endforeach;?>
		</tbody>
		
	</table>
	
</div>
<?php endif; ?>


<div class="sig">
	---------------------------<br>
	signature of candidate
</div>

</body>
</html>