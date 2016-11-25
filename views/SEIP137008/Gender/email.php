<?php
session_start();

################################# Update Information Here ##########################
$yourGmailAddress = "XXXXXX@gmail.com"; #<<<<<<<<<<<<<< Set Your Email Address
$gmailPassword = "XXXXXXXX";   #<<<<<<<<<<<<<< Set Your Gmail Password
####################################################################################


include_once('../../../vendor/autoload.php');
require '../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

use App\BookTitle\BookTitle;
use App\Utility\Utility;
use App\Message\Message;
$bookTitle = new BookTitle();

if(isset($_REQUEST['list'])) {
    $list = 1;
    $recordSet = $bookTitle->index();

}
else {
    $list= 0;
    $bookTitle->setData($_REQUEST);
    $singleItem = $bookTitle->view("obj");
}

?>



<!DOCTYPE html>

<head>
    <title>Email This To A Friend</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../resource/bootstrap/js/jquery.min.js"></script>
</head>

<body >


<div class="container">
    <h2>Email This To A Friend</h2>
    <form  role="form" method="post" action="email.php<?php if(isset($_REQUEST['id'])) echo "?id=".$_REQUEST['id']; else echo "?list=1";?>">
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text"  name="name"  class="form-control" id="name" placeholder="Enter name of the recipient ">
            <label for="Email">Email Address:</label>
            <input type="text"  name="email"  class="form-control" id="email" placeholder="Enter recipient email address here..."">

            <label for="Subject">Subject:</label>
            <input type="text"  name="subject"  class="form-control" id="subject" value="<?php if($list){echo "List of books recommendation";} else {echo "A single book recommendation";} ?>">
            <label for="body">Body:</label>
            <textarea  disabled="disabled" contenteditable="false" rows="8" cols="160"  name="body" >
<?php
if($list){

    $trs="";
    $sl=0;

    printf("\tSerial\t\t\t\tID\t\t\t\tBook Title\t\t\t\tAuthor Name\n");

    foreach($recordSet as $row) {

        $id = $row["id"];
        $book_title = $row['book_title'];
        $author_name = $row['author_name'];

        $sl++;
        printf("\t\t%d\t\t\t\t%d\t\t\t\t%s\t\t\t\t%s\n",$sl,$id,$book_title,$author_name);


    }


}
else
{
    printf("I'm recommending You: [Book ID:%s, Book Title:%s, Author Name:%s]",$singleItem->id,$singleItem->book_title,$singleItem->author_name);

}
?>
            </textarea>

        </div>

        <input class="btn-lg btn-primary" type="submit" value="Send Email">

    </form>


    <?php
    if(isset($_REQUEST['email'])&&isset($_REQUEST['subject'])) {
        date_default_timezone_set('Etc/UTC');

        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587; //587
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls'; //tls
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = $yourGmailAddress;
        //Password to use for SMTP authentication
        $mail->Password = $gmailPassword;
        //Set who the message is to be sent from
        $mail->setFrom($yourGmailAddress, 'BITM PHP - 22');
        //Set an alternative reply-to address
        $mail->addReplyTo($yourGmailAddress, 'BITM PHP - 22');
        //Set who the message is to be sent to
        $mail->addAddress($_REQUEST['email'], $_REQUEST['name']);
        //Set the subject line
        $mail->Subject = $_REQUEST['subject'];
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';






        $recordSet = $bookTitle->index();

        $trs="";
        $sl=0;
        foreach ($recordSet as $row) {

            $id =  $row["id"];
            $book_title = $row['book_title'];
            $author_name = $row['author_name'];

            $sl++;
            $trs .= "<tr>";
            $trs .= "<td width='150'> $sl</td>";
            $trs .= "<td width='150'> $id </td>";
            $trs .= "<td width='300'> $book_title </td>";
            $trs .= "<td width='300'> $author_name </td>";

            $trs .= "</tr>";
        }


        $html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left'>ID</th>
                    <th align='left'>Book Title</th>
                    <th align='left'>Author_Name</th>

                </tr>
                </thead>
             <tbody>

                  $trs

                </tbody>
            </table>

BITM;
        ;




        if($list)  $mail->Body = $html;
        else   $mail->Body = "I'm recommending You [Book ID:". $singleItem->id.",  Book Title:".$singleItem->book_title."]";
        //Attach an image file,
        //$mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            Message::message("
    <div class=\"alert alert-success\">
    <strong>Success!</strong> Email has been sent successfully.
</div>");
            //Utility::redirect("index.php");


            ?>
            <script type="text/javascript">
                window.location.href = 'index.php';
            </script>
            <?php


        }

    }


    ?>







</div>
</body>


</html>