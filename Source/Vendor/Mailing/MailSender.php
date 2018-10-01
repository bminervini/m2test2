
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Lib/Exception.php';
require 'Lib/PHPMailer.php';
require 'Lib/SMTP.php';
namespace MailSystem {


    class MailSender
    {

        var $m_sMailSender = "m2test2.croissant.show@gmail.com";

        function __construct()
        {
        }

        function getSenderMail()
        {
            return $this->m_sSenderMail;
        }

        function sendMail($sDestination)
        {
            
        }


        private function configureSMTP()
        {
            
        }
    }

    $ms = new MailSender();


    $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'm2test2.croissant.show@gmail.com';                 // SMTP username
        $mail->Password = 'pas2pitiepourlescroissants!';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('yannis.beaux@croissant.com', 'Mailer');
        $mail->addAddress('frizzy.rastay@gmail.com', 'Joe User');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';

    echo "<html>";
    echo "<head>";
    echo "</head>";
    echo "<body>";
    echo "" . get_include_path();
    // echo "Mail : " . $ms->getSenderMail();
    // echo "Encoi : " . $ms->sendMail("frizzy.rastay@gmail.com");
    echo "</body>";
    echo "</html>";

}
?>