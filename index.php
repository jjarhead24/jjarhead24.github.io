<!DOCTYPE html>
<html>
  <head>
    <title>My Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section id="home" class="hero">
        <h1>Welcome to My Portfolio</h1>
        <p>Explore my work and get to know me.</p>
        <a href="#about" class="btn">Learn More</a>
      </section>
      <section id="about" class="about">
        <h2>About Me</h2>
        <p>Write a short bio about yourself here.</p>
      </section>
      <section id="projects" class="projects">
        <h2>Projects</h2>
        <a href="projects.html" class="btn">View Projects</a>
        <p>List your projects here.</p>
      </section>
      <section id="contact" class="contact">
        <h2>Contact Me</h2>
        <form action="sendmail.php" method="post">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>

          <label for="message">Message:</label>
          <textarea id="message" name="message" required></textarea>

          <input type="submit" value="Send">
            <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = strip_tags(trim($_POST["name"]));
  $name = str_replace(array("\r","\n"),array(" "," "),$name);
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = trim($_POST["message"]);

  // Set your email address where you want to receive emails
  $to = "jjarhead24@gmail.com";

  // Email subject
  $subject = "New Contact Form Submission from your portfolio website";

  // Email content
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Message:\n$message\n";

  // Email headers
  $headers = "From: $name <$email>";

  // Send the email
  if (mail($to, $subject, $email_content, $headers)) {
    http_response_code(200);
    echo "Thank You! Your message has been sent.";
  } else {
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message.";
  }
} else {
  http_response_code(403);
  echo "There was a problem with your submission, please try again.";
}
?>
        </form>
      </section>
    </main>
    <footer>
      <p>&copy; 2023 My Portfolio</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
