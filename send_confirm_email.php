<?php
require_once("includes/all.class.functions.php");
session_start();
$all_email_data = $_SESSION['send_email_data'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
$professionsextra = wb_mm_remove_data_profession_extra($all_email_data[0]['professionsextra']);
$emailSubject = 'Neue Bewerbung';


/*******************************************************/
$sender_name = $all_email_data[0]['firstname'] . ' ' . $all_email_data[0]['surname'];
$receiverName = 'Focke & Co. (GmbH & Co. KG)';
$borderColor = 'border:1px solid #ccc; padding: 10px;';


//weitere Empfänger können als zusätzlich Zeile hinzugefügt werden
$receivers[] = "mamunuzzaman@whitebox.de";
//$receivers[] = "daniela.haefker@whitebox.de";


$mail_html = '<table cellpadding="0" cellspacing="0" width="100%"  style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;" >
                        <tr><td align="center" style="padding:0;"> &nbsp; </td></tr>
                        <tr><td align="center">
                        <table cellpadding="0" cellspacing="0" style="width:70%;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;" >
                        <tr><th style="padding:10px; border-bottom: 1px solid #ccc; background-color: #F8F9F9; ">Berufsbezeichnung</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['job_title']
    .'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Qualifikation</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['professions'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Zusatzqualifikation</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$professionsextra.'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Berufserfahrung</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['berufserfahrung'].'</td></tr>   
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Kenntnisse</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['kenntnisse'].'</td></tr> 
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Arbeitsbeginn</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['starten'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Kompetenzen</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['kompetenzen'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Vorname</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['firstname'].'</td></tr> 
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Nachname</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['surname'].'</td></tr> 
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">E-Mail</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['youremail'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Telefon</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['yourtelephone'].'</td></tr>
                        <tr><th style="padding:10px;border-bottom: 1px solid #ccc; background-color: #F8F9F9;">Nachricht</th></tr>
                        <tr><td style="padding:10px;border-bottom: 1px solid #ccc;">'.$all_email_data[0]['yourmessage'].'</td></tr> 
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
                        
                        </table></div>';



$email_signature = '<br/><br/>'.$emailSubject.'<br/>';
$subject 	 	= $emailSubject; // Mailbetreff kann angepasst werden
$text			= $mail_html;


// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
$header = 'Participant: '. $all_email_data[0]['firstname'] . '&nbsp;' . $all_email_data[0]['surname'] . '&nbsp; '
    .$all_email_data[0]['youremail']; // angezeigte Absenderadresse


foreach ($receivers as $receiver) {
    $result = mail($receiver, $subject, $text, implode("\r\n", $headers), '-f personal@focke.de -F "Neue Bewerbung"');
}

if(!$result) {
    echo "0";
} else {
    echo "1";
}


/********************************************************/
