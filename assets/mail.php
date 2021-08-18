<?php

$to1 = "maxseem84@mail.ru";	
$to2 = "maksim.p.gorbenko@gmail.com";	
$admin_email = "maxseem84@maxseemtemplate.s-host.net";
$user_email = $_POST['E-mail'];

$subject = "Заявка с сайта МОЙДОМ42.РФ";

$c = true;
foreach ( $_POST as $key => $value ) {	
	if ($key == 'Телефон'){
		$value = '<a href="tel:'.$value.'">'.$value.'</a>';
	 } 		
	 $key = str_replace('_', ' ', $key);
	$message .= "
	" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
	<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
	<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
</tr>
";
}

$message = "<table style='width: 100%;'>$message</table>";

$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: МОЙДОМ42.РФ <".$admin_email.">\r\n";
$headers .= "Reply-To: ".$user_email."\r\n";

mail($to1, $subject, $message, $headers);
mail($to2, $subject, $message, $headers);


?>