<?php
include('smtp/PHPMailerAutoload.php');

	$message='<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>Enquiry</title><style>table{border-collapse: collapse;}th,td{border: 1px solid;padding:10px;}</style></head><body><h5>Hi Team ,<br><br>Below are the details</h5><table width="399" style="font-family: Calibri,sans-serif;font-size: 13px;"><tr><td style="background: white;font-weight: 100;">Name:</td></td><td> '.$_POST["name"].'</td></tr><tr><td style="background: white;font-weight: 100;">Designation: </td><td> '.$_POST["designation"].'</td></tr><tr><td  style="background: white;font-weight: 100;">Company Name: </td><td> '.$_POST["company_name"].'</td></tr><tr><td  style="background: white;font-weight: 100;">City:</td></td><td> '.$_POST["city"].'</td></tr><tr><td style="background: white;font-weight: 100;">phone_number:</td></td><td> '.$_POST["phone"].'</td></tr><tr><td style="background: white;font-weight: 100;">Email Address:</td></td><td> '.$_POST["email_address"].'</td></tr><tr><td style="background: white;font-weight: 100;">Best Time:</td></td><td> '.$_POST["best_time"].'</td></tr><tr><td style="background: white;font-weight: 100;">No. Of Employee:</td></td><td> '.$_POST["employee"].'</td></tr><tr><td style="background: white;font-weight: 100;">';



	if(isset($_POST['email_address'])) 
	{
		$mail = new PHPMailer(); 
		$mail->IsSMTP(); 
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'tls'; 
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; 
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		//$mail->SMTPDebug = 2; 
		$mail->Username = "ynavneetpersonal@gmail.com";
		$mail->Password = "dtxtxkpjqucubeks";
		$mail->SetFrom("ynavneetpersonal@gmail.com");
		$mail->Subject = 'New Lead from 27001';
		$mail->Body =$message;
		$mail->AddAddress('abpal545@gmail.com');
		$mail->AddAddress('sushmita.gupta@edas.tech');
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
		if(!$mail->Send()){
			echo $mail->ErrorInfo;
			echo '<script>alert("Something went wrong");</script>';
			//echo'<script>window.location.href="index.php";</script>';
		}else{

			
			echo '<script>alert("Thank You. We Will get Back To You Soon!!");</script>';
			echo'<script>window.location.href="index.html";</script>';
		}
	}



?>