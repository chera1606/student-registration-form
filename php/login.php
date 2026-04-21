<?php
session_start();
require_once __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../login.html");
    exit;
}

function clean_input(string $value): string
{
    return trim($value);
}

$username = clean_input($_POST["username"] ?? "");
$password = clean_input($_POST["password"] ?? "");

$errorMessage = "Invalid username or password.";

if ($username !== "" && $password !== "") {
    $stmt = $conn->prepare("SELECT username, password_hash FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user && password_verify($password, $user["password_hash"])) {
        $_SESSION["is_logged_in"] = true;
        $_SESSION["username"] = $user["username"];
        header("Location: ../index.html");
        exit;
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Failed</title>
    <link rel="stylesheet" href="../css/styles.css" />
  </head>
  <body>
    <div class="container">
      <div class="form-card auth-card">
        <h1>Login Failed</h1>
        <p class="status-text error-text"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES, "UTF-8"); ?></p>
        <div class="button-group auth-buttons">
          <a class="btn register" href="../login.html">Try Again</a>
        </div>
      </div>
    </div>
  </body>
</html>
