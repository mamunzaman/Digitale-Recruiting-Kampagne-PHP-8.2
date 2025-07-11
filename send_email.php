<?php
iconv_set_encoding("internal_encoding", "UTF-8");
iconv_set_encoding("output_encoding", "ISO-8859-1");
require_once("includes/all.class.functions.php");
mb_internal_encoding("UTF-8");
session_start();

$all_email_data1 = $_SESSION['applicant_data'];
$youremail1 = $all_email_data1['youremail'];
$token =  $all_email_data1['token'];
$all_email_data = wb_mm_orderData_beforeInsert($_SESSION['applicant_data']);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

$professionsextra = wb_mm_remove_data_profession_extra($all_email_data['professionsextra']);



$emailSubject = 'Bitte bestätigen Sie Ihre E-Mail-Adresse';
$emailSubject = mb_encode_mimeheader($emailSubject,'UTF-8','Q');


$receiverName = $all_email_data['firstname'] . ' ' . $all_email_data['surname'];
$sender_name = 'Focke & Co. (GmbH & Co. KG)';

$borderColor = 'border:1px solid #ccc; padding: 10px;';
$encrypted_email_address = base64_url_encode($youremail1);


//weitere Empfänger können als zusätzlich Zeile hinzugefügt werden
$receivers[] = $all_email_data['youremail'];
//$receivers[] = "daniela.haefker@whitebox.de";


$mail_html = '<table cellpadding="0" cellspacing="0" width="100%"  style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;" >
                        <tr><td align="center" style="padding:0;"><p style="text-align: center;"><img src="https://focke-join.whitebox-dev.de/assets/images/email/email.png" width="180" alt="" /> </p>
    <p style="text-align: center;">Sie erhalten diese E-Mail, weil Sie sich auf <a href="https://focke.com/campaign/join">www.focke.com/campaign/join</a>  beworben haben.</p>
    <h3 style="text-align: center;">Bitte bestätigen Sie Ihre E-Mail-Adresse<br/>zur Weiterleitung an FOCKE &amp; CO.</h3>
    <p style="text-align: center;">Sollten Sie sich nicht beworben haben, können Sie diese Mail ignorieren.</p>
    <p style="text-align: center; height: 30px; margin-top: 30px; margin-bottom: 20px;"><a href="https://focke-join.whitebox-dev.de/verify_confirmed_email.php?check_email='
    .$encrypted_email_address.'&make_active='
    .$token.'" style="padding: 10px; background: #84d1f1; color: #fff; line-height: 1.1em; text-decoration: none;">Klicken Sie hier zur E-Mail-Bestätigung!</a></p></td></tr>
                        <tr><td align="center">
                        <table cellpadding="0" cellspacing="0" style="width:70%;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;" >
                        <tr><th style="padding:10px; border-bottom: 1px solid #ccc; background-color: #F8F9F9; ">Berufsbezeichnung</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['jobtitle'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Qualifikation</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['professions'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Zusatzqualifikation</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$professionsextra.'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Berufserfahrung</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['berufserfahrung'].'</td></tr>   
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Kenntnisse</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['kenntnisse'].'</td></tr> 
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Arbeitsbeginn</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['starten'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Kompetenzen</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['kompetenzen'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Vorname</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['firstname'].'</td></tr> 
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Nachname</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['surname'].'</td></tr> 
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">E-Mail</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['youremail'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Telefon</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['yourtelephone'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Nachricht</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data['yourmessage'].'</td></tr>
                        <tr>
                        <td align="center">
                        <p style="color: #575F65; font-size: 12px; padding: 20px 10px; text-align: center;">Focke & Co.(GmbH & Co. KG) Verpackungsmaschinen | <a href="mailto:info@focke.com">info@focke.com</a> | Tel.: +49 (0) 4231 891-0, Fax: +49 (0) 4231 5061 |
Siemensstrasse 10, 27283 Verden/Aller, Germany<br/>
Rechtsform / Legal Form: Kommanditgesellschaft, Sitz / Registered Office: Verden/Aller, Germany | Amtsgericht / Court of
Registration: Walsrode HRA 120955, Ust.-IdNr.: DE116731020 | Geschäftsführung / Executive Board: Cord Schröder, Marco Selle, Irmin Steinkamp, Knut Stichling, Holger Witzmann</p>
                        </td>
                        </tr> 
                    </table>
                </td></tr>
                        
                        
                        </table>
                        </div>';

$email_signature = 'Whitebox';
$subject 	 	= $emailSubject; // Mailbetreff kann angepasst werden
$text			= $mail_html; //Text kann angepasst werden

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
$header[] = 'From: Focke ' .$all_email_data['youremail']; // angezeigte Absenderadresse

foreach ($receivers as $receiver) {
    $result = mail($receiver, $subject, $text, implode("\r\n", $headers), '-f personal@focke.de -F "FOCKE"');
}

if(!$result) {
    echo "Nachricht konnte nicht versandt werden.";
} else {
    echo '<h5 style="color: black;">Prüfen Sie bitte auch Ihren Spam-Ordner.</h5>';
}