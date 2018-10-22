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
            return mail($sTo , $sSubject , $sBody,
                            "From: " . $sFrom 
                        .   "Reply-To: m2test2.croissant.show@gmail.com"
            );
        }
        
    }
?>