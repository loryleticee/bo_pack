<?php
	////////////////////////////////////////////////////////////////////////////////////////
	///
	///   ENVOI MAIL À UTILISATEUR 
	///
	////////////////////////////////////////////////////////////////////////////////////////
	$to = 'a.franceschini@agencesurf.com';

	// Sujet
	$subject = 'Votre rendez-vous a été refusé';

	// Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

	// En-têtes additionnels
	$headers .= 'From: Incyte France <noreply@evenements-incyte.com>' . "\r\n";

	// on charge l'email standard
	$stream  = fopen("email/refus.html","r");
	$message = stream_get_contents($stream);
	fclose($stream);

	$message = str_replace('{***name***}', "Antoine Franceschini", $message);

	// Envoi
	mail($to, $subject, $message, $headers);
?>