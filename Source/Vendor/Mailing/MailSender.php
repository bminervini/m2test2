<?php 

namespace Mailing;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'Lib/Exception.php';
    require 'Lib/PHPMailer.php';
    require 'Lib/SMTP.php';
    require 'Mail.php';
    

    class MailSender
    {

        var $m_sLogin;  //< The login of the mail sender (from)
        var $m_sPassword;   //< The password of the mail sender (from)

        //
        var $m_oMailer;

        public function __construct($sLogin , $sPassword)
        {
            $this->m_sLogin = $sLogin;
            $this->m_sPassword = $sPassword;

            //Constructs the mailer object
            echo $this->m_sLogin;
            echo $this->m_sPassword;
            $this->m_oMailer = new PHPMailer();
            $this->configureSMTP();
        }

        private function configureSMTP()
        {
            $this->m_oMailer->SMTPDebug = 2;            //< Enable verbose
            $this->m_oMailer->isSMTP();                 //< Use SMTP
            $this->m_oMailer->Host = "smtp.gmail.com";  //< Specify the SMTP
            $this->m_oMailer->SMTPAuth = true;          //< Enable the authentication of SMTP
            $this->m_oMailer->Username = $this->m_sLogin;     //< Login
            $this->m_oMailer->Password = $this->m_sPassword;  //< Password
            $this->m_oMailer->SMTPSecure = 'ssl';       //< ssl encyption is neede for gmail
            $this->m_oMailer->Port = 465;               //< Gmail port       
        }

        public function sendMail($oMail)
        {
            //Configure last infos of the mail
            $this->m_oMailer->setFrom($oMail->getSender() , "Croissant Show Mailing System");
            $this->m_oMailer->addAddress($oMail->getRecipient());
            $this->m_oMailer->Subject   = $oMail->getSubject();
            $this->m_oMailer->Body      = $oMail->getBody();
            $this->m_oMailer->AltBody   = $oMail->getBody();    //TOFIX: Alternative body
            echo $this->m_oMailer->send();
        }

    }

    $ms = new MailSender("m2test2.croissant.show@gmail.com" , "pas2pitiepourlescroissants!");
    $ms->sendMail(new Mail("m2test2.croissant.show@gmail.com" , "yannis.beaux@gmail.com" , "Bonjour Arthur ! " , "Bonjour Arthur ! \r\n Je suis un mail envoye automatiquement depuis l'application \"Croissant Show\" ! \r\n Il est fort possible que tu recoives une grande quantite de mail car je peux en envoyer un a chaque appui sur F5\r\n Etant donne que ce mail est envoye depuis du code PHP \r\n Des gros bisous <3 \r\n Ton admirateur secret."));
    echo "oklm";

    // $mail = new PHPMailer(true);
    //     //Server settings
    //     $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    //     $mail->isSMTP();                                      // Set mailer to use SMTP
    //     $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    //     $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //     $mail->Username = 'm2test2.croissant.show@gmail.com';                 // SMTP username
    //     $mail->Password = 'pas2pitiepourlescroissants!';                           // SMTP password
    //     $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    //     $mail->Port = 465;                                    // TCP port to connect to

    //     //Recipients
    //     $mail->setFrom('yannis.beaux@croissant.com', 'Mailer');
    //     $mail->addAddress('frizzy.rastay@gmail.com', 'Joe User');     // Add a recipient
    //     // $mail->addAddress('ellen@example.com');               // Name is optional
    //     // $mail->addReplyTo('info@example.com', 'Information');
    //     // $mail->addCC('cc@example.com');
    //     // $mail->addBCC('bcc@example.com');

    //     //Attachments
    //     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //     //Content
    //     $mail->isHTML(true);                                  // Set email format to HTML
    //     $mail->Subject = 'Here is the subject';
    //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //     $mail->send();
    //     echo 'Message has been sent';

    // echo "<html>";
    // echo "<head>";
    // echo "</head>";
    // echo "<body>";
    // echo "" . get_include_path();
    // // echo "Mail : " . $ms->getSenderMail();
    // // echo "Encoi : " . $ms->sendMail("frizzy.rastay@gmail.com");
    // echo "</body>";
    // echo "</html>";
?>