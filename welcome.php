<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            .error { color: #d32f2f; margin: 20px 0; }
            .success { color: #388e3c; margin: 20px 0; }
        </style>
    </head>
    <body>
        <?php
            $errors = [];
            $name = $email = $message = "";

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Validate name
                if (empty($_POST["name"])) {
                    $errors[] = "Name is required.";
                } else {
                    $name = trim($_POST["name"]);
                    if (strlen($name) < 2 || strlen($name) > 100) {
                        $errors[] = "Name must be between 2 and 100 characters.";
                    }
                }

                // Validate email
                if (empty($_POST["email"])) {
                    $errors[] = "Email is required.";
                } else {
                    $email = trim($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Invalid email format.";
                    }
                }

                // Validate message
                if (empty($_POST["message"])) {
                    $errors[] = "Message is required.";
                } else {
                    $message = trim($_POST["message"]);
                    if (strlen($message) < 5 || strlen($message) > 1000) {
                        $errors[] = "Message must be between 5 and 1000 characters.";
                    }
                }

                // Display results
                if (empty($errors)) {
                    echo "<div class='success'>";
                    echo "<h2>Thank you for your message!</h2>";
                    echo "<p><strong>Welcome</strong> " . htmlspecialchars($name, ENT_QUOTES, "UTF-8") . "</p>";
                    echo "<p><strong>Your email address is:</strong> " . htmlspecialchars($email, ENT_QUOTES, "UTF-8") . "</p>";
                    echo "<p><strong>Your message:</strong><br>" . nl2br(htmlspecialchars($message, ENT_QUOTES, "UTF-8")) . "</p>";
                    echo "<p><a href='index.html'>← Back to Portfolio</a></p>";
                    echo "</div>";
                } else {
                    echo "<div class='error'>";
                    echo "<h2>Please fix the following errors:</h2>";
                    echo "<ul>";
                    foreach ($errors as $error) {
                        echo "<li>" . htmlspecialchars($error, ENT_QUOTES, "UTF-8") . "</li>";
                    }
                    echo "</ul>";
                    echo "<p><a href='index.html'>← Back to Portfolio</a></p>";
                    echo "</div>";
                }
            }
        ?>
    </body>
</html>