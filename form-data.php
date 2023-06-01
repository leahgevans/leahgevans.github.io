<?php
// // Only process POST reqeusts.
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get the form fields and remove whitespace.
//     $name = strip_tags(trim($_POST["name"]));
//             $name = str_replace(array("\r","\n"),array(" "," "),$name);
//     $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
//     $message = trim($_POST["message"]);

//     // Check that data was sent to the mailer.
//     if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         // Set a 400 (bad request) response code and exit.
//         http_response_code(400);
//         echo "Oops! There was a problem with your submission. Please complete the form and try again.";
//         exit;
//     }

//     // Set the recipient email address.
//     // FIXME: Update this to your desired email address.
//     $recipient = "leah28evans@gmail.com";

//     // Set the email subject.
//     $subject = "New contact from $name";

//     // Build the email content.
//     $email_content = "Name: $name\n";
//     $email_content .= "Email: $email\n\n";
//     $email_content .= "Message:\n$message\n";

//     // Build the email headers.
//     $email_headers = "From: $name <$email>";

//     // Send the email.
//     if (mail($recipient, $subject, $email_content, $email_headers)) {
//         // Set a 200 (okay) response code.
//         http_response_code(200);
//         echo "Thank You! Your message has been sent.";
//     } else {
//         // Set a 500 (internal server error) response code.
//         http_response_code(500);
//         echo "Oops! Something went wrong and we couldn't send your message.";
//     }

// } else {
//     // Not a POST request, set a 403 (forbidden) response code.
//     http_response_code(403);
//     echo "There was a problem with your submission, please try again.";
// }
echo "Test- Thank you for submitting your message!";
$errors = '';
$myemail = 'leah28evans@gmail.com';
// if(empty($_POST['name'])  ||
//    empty($_POST['email']) ||
//    empty($_POST['message']))
// {
//     $errors .= "\n Error: all fields are required";
// }
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
// if (!preg_match(
// "/ ^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
// $email_address))
// {
//     $errors .= "\n Error: Invalid email address";
// }
if( empty($errors))
{
    $to = 'leah28evans@gmail.com';
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
        " Here are the details:\n Name: $name \n ".
        "Email: $email_address\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location: contact-form-thank-you.html');
}

?>