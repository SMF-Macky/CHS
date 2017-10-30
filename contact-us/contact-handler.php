<?php

$myemail  = "customerservice@smfreelancing.com";

$fullname  = check_input($_POST['fullname'], "Enter your name");
$phonenumber  = check_input($_POST['phonenumber'], "Enter your phone number");
$emailaddress  = check_input($_POST['emailaddress'], "Enter your email address");
$buyorsell  = check_input($_POST['buyorsell'], "Make a selection")
$comments  = check_input($_POST['comments'], "Write your comments");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $emailaddress))
{
    show_error("E-mail address not valid");
}

/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $fullname
Phone: $phonenumber
E-mail: $emailaddress
Buying or Selling?: $buyorsell
Comments: $comments

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: contact-thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet"type="text/Css"href="/css/contact-error.css">
			<link rel="icon"href="/img/favicon.ico">
		</head>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
