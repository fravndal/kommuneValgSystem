
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor\autoload.php';

require_once '../include_login/DBController.php';
require 'include/MailConfig.php';


class Mail {
    function sendMail($receiverEmail, $receiverName, $subject, $body) {
        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Set the SMTP port number - 587 for authenticated TLS
        $mail->Port = PORT;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = MAIL_USERNAME;

        //Password to use for SMTP authentication
        $mail->Password = MAIL_PASSWORD;

        // use $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the hostname of the mail server
        $mail->Host = MAIL_HOST;

        $mail->Mailer = MAILER;

        //Set who the message is to be sent from
        $mail->setFrom(SERDER_EMAIL, SENDER_NAME);

        //Set an alternative reply-to address
        $mail->addReplyTo(SERDER_EMAIL, SENDER_NAME);

        //Set who the message is to be sent to
        $mail->addAddress($receiverEmail, $receiverName);

        //Set the subject line
        $mail->Subject = $subject;

        //Replace the plain text body with one created manually
        /*$mail->Body = $body;*/
        //Attach an image file
        /*$mail->addAttachment('images/phpmailer_mini.png');*/

        $mail->MsgHTML($body);
        $mail->IsHTML(true);

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($mail)) {
            #    echo "Message saved!";
            #}
        }
    }

    function findUserByEmail($email) {
        $pdo = new DBController();
        $query = "SELECT epost FROM brukere WHERE epost = :email LIMIT 1";
        $param_value_array = array(':email' => $email);
        $result = $pdo->runQuery($query, $param_value_array);
        return $result;
    }

}

