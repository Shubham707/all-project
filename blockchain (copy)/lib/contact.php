<?php

if($_REQUEST['submit']=='SEND')
{
	message();
	exit();
}


function message()
{
	       $R=$_REQUEST;
	       include'../PHPMailer/PHPMailerAutoload.php';
            include'../PHPMailer/class.smtp.php';
            $message = '<html><body>';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>User Name:</strong> </td><td>".$R['username']. "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" 
            .$R['email']. "</td></tr>";
            $message .= "<tr style='background: #eee;'><td><strong>Subject:</strong> </td><td>" 
            .$R['subject']."</td></tr>";
            $message .= "<tr><td><strong>Mobile:</strong> </td><td>'".$R['mobile']."</td></tr>";
            $message .= "<tr><td><strong>Mobile:</strong> </td><td>'".$R['message']."</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $to="info@blockon.tech ";
            $subject="Message Block Chain";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: noreply@YourCompany.com' . "\r\n";
            @mail($to,$subject,$message,$headers);
            ob_start();
	      header("Location:../contactus.php?msg=Message Send Successfully!");
}
?>