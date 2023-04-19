<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $feedback = $_POST['feedback'];

  // TODO: Send email with form data
  $to = 'dormanb@vcu.edu'; // Replace with your email address
  $subject = 'Feedback Submission';
  $message = "Name: $name\nEmail: $email\nFeedback: $feedback";
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  mail($to, $subject, $message, $headers);

  // Send success response to client-side
  http_response_code(200);
  echo json_encode(['message' => 'Feedback submitted successfully!']);
} else {
  // Send error response to client-side
  http_response_code(400);
  echo json_encode(['error' => 'Bad Request']);
}
?>
