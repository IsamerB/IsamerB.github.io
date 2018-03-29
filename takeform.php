<html>
<head>
<title>Thanks For Contacting Us</title>
</head>
<body>
<?php

  $recipient = 'isamerclimbs@gmail.com';
  $email = $_POST['email'];
  $realName = $_POST['realname'];
  $body = $_POST['body'];

  $messages = array();

if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "That is not a valid email address.";
}

if (!preg_match("/^[\w\ \+\-\'\"]+$/", $realName)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}

$body = $_POST['body'];

if (preg_match('/^\s*$/', $body)) {
$messages[] = "Your message was blank. Did you mean to say " .
"something?";
}
  if (count($messages)) {

    foreach ($messages as $message) {
      echo("<p>$message</p>\n");
    }
    echo("<p>Click the back button and correct the problems. " .
      "Then click Send Your Message again.</p>");
  } else {

mail($recipient,
      $body,
      "From: $realName <$email>\r\n" .
      "Reply-To: $realName <$email>\r\n");
    echo("<p>Your message has been sent. Thank you!</p>\n");
  }
?>
</body>
</html>
