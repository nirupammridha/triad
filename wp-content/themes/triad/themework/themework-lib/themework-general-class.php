<?php

class General {

	/**
	*@param array $mailData | [to,sub, body]
	*@param array $attachments | []
	*/
	public function sendMail($mailData, $attachments = [])
	{  
		list($to, $sub, $body) = $mailData;
		$headers = ['Content-Type: text/html; charset=UTF-8','From: Triad <no-reply@triadindiacastings.com>','Cc: admin <mridha.26@gmail.com>'];
 		wp_mail($to, $sub, $body, $headers, $attachments);
	}
}