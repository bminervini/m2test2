<?php

    require_once('../src/main/Vendor/Mailing/MailSender.php');

    
    $ms = new \Vendor\Mailing\MailSender("ybeaux" , "0912kranck!" , true);
    
    $mail = new \Vendor\Mailing\Mail();
    $mail->setSubject("Je suis un petit mail, ma foi fort sympathique");
    $mail->addRecipient("yannis.beaux@edu.univ-fcomte.fr");
    $mail->setBody("J'ai un joli petit lot de noix de coco, qui s'enchainent comme des numéros");
    
    $ms->sendMail($mail);
    echo "J'apprecie les fruits au sirop !";

    // -> https://www.facebook.com/lab2i/posts/une-bonne-nouvel-les-protocoles-imap-et-smtp-sont-désormais-ouvert-pour-les-mail/223453884480377/

?>