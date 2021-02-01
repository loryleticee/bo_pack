<?php

require "email/inc/invite.php";

$invite = new Invite();
$invite
	->setSubject("Rendez-vous Incyte - Congrès SFH 2020")
	->setDescription("Nous vous attendons sur notre stand.")
	->setStart(new DateTime('2020-09-10 01:00PM EDT'))
	->setEnd(new DateTime('2020-09-10 02:00PM EDT'))
	->setLocation("Palais des congrès, Paris")
	->setOrganizer("antoine.franceschini@gmail.com", "Nom du membre de l'équipe Incyte")
	->addAttendee("a.franceschini@agencesurf.com", "Nom du médecin")
	->generate() // generate the invite
	->save(); // save it to a file

// as you may notice this is a static method
// it is indipendent of the object.
$download_link = Invite::getSavedPath();


	////////////////////////////////////////////////////////////////////////////////////////
	///
	///   ENVOI MAIL À UTILISATEUR 
	///
	////////////////////////////////////////////////////////////////////////////////////////
	$to = 'a.franceschini@agencesurf.com';
	$file = $download_link;

	// Sender 
	$from = 'noreply@evenements-incyte.com'; 
	$fromName = 'Incyte France'; 

	// Email subject 
	$subject = 'Votre rendez-vous a été accepté';  

	 // on charge l'email standard
	$stream  = fopen("email/accept.html","r");
	$htmlContent = stream_get_contents($stream);
	fclose($stream);

	$htmlContent = str_replace('{***name***}', "Antoine Franceschini", $htmlContent);

	// Header for sender info 
	$headers = "From: $fromName"." <".$from.">"; 

	// Boundary  
	$semi_rand = md5(time());  
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  

	// Headers for attachment  
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

	// Multipart boundary  
	$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
	"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  

	// Preparing attachment 
	if(!empty($file) > 0){ 
		if(is_file($file)){ 
			$message .= "--{$mime_boundary}\n"; 
			$fp =    @fopen($file,"rb"); 
			$data =  @fread($fp,filesize($file)); 

			@fclose($fp); 
			$data = chunk_split(base64_encode($data)); 
			$message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
			"Content-Description: ".basename($file)."\n" . 
			"Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
			"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
		} 
	} 
	$message .= "--{$mime_boundary}--"; 
	$returnpath = "-f" . $from; 

	// Send email 
	$mail = @mail($to, $subject, $message, $headers, $returnpath);  

	// Email sending status 
	echo $mail?"Email Sent Successfully!":"Email sending failed."; 
 
?>