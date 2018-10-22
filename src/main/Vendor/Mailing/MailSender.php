<?php 

namespace Vendor\Mailing;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'Lib/Exception.php';
    require 'Lib/PHPMailer.php';
    require 'Lib/SMTP.php';
    require 'Mail.php';

    class MailSender
    {

        public static function SendMail($sFrom , $sTo , $sSubject , $sBody)
        {

        }

    //     var $m_sLogin;  //< The login of the mail sender (from)
    //     var $m_sPassword;   //< The password of the mail sender (from)

    //     //
    //     var $m_oMailer;

    //     //Enable debug
    //     var $m_bVerbose = false;

    //     public function __construct($sLogin , $sPassword , $bVerbose = false)
    //     {
    //         $this->m_sLogin = $sLogin;
    //         $this->m_sPassword = $sPassword;
    //         $this->m_bVerbose = $bVerbose;

    //         //Constructs the mailer object
    //         $this->m_oMailer = new PHPMailer();
    //         $this->configureSMTP();
    //     }

    //     private function configureSMTP()
    //     {
    //         if ($this->m_bVerbose)
    //         {
    //             $this->m_oMailer->SMTPDebug = 4;            //< Enable verbose
    //         }
    //         $this->m_oMailer->isSMTP();                 //< Use SMTP
    //         $this->m_oMailer->Host = "smtps.univ-fcomte.fr";  //< Specify the SMTP
    //         $this->m_oMailer->SMTPAuth = true;          //< Enable the authentication of SMTP
    //         $this->m_oMailer->Username = $this->m_sLogin;     //< Login
    //         $this->m_oMailer->Password = $this->m_sPassword;  //< Password
    //         $this->m_oMailer->SMTPSecure = 'ssl';       //< ssl encyption is neede for gmail
    //         $this->m_oMailer->Port = 465;               //< Gmail port       
    //     }

    //     public function sendMail($oMail)
    //     {
    //         //Configure last infos of the mail
    //         // $this->m_oMailer->setFrom($this->m_sLogin , "Crsoissant Show Mailing System");
    //         $this->m_oMailer->setFrom("yannis.beaux@edu.univ-fcomte.fr" , "Croissant Show Mailing System");

    //         foreach ($oMail->getRecipients() as $recipient)
    //         {
    //             $this->m_oMailer->addAddress($recipient);
    //         }
            
    //         $this->m_oMailer->Subject   = $oMail->getSubject();
    //         $this->m_oMailer->Body      = $oMail->getBody();
    //         $this->m_oMailer->AltBody   = $oMail->getBody();    //TOFIX: Alternative body {
            
    //         if (!$this->m_oMailer->send())
    //         {
    //             echo "<p>Erreur d'envoi du mail : <strong style='color:red;'>[" . $this->m_oMailer->ErrorInfo . "]</strong></p>";
    //             return false;
    //         }

    //         return true;
    //     }

    }
?>