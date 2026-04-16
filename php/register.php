<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.html");
    exit;
}

$firstName = $_POST["firstName"] ?? "";
$lastName = $_POST["lastName"] ?? "";
$department = $_POST["department"] ?? "";
$gender = $_POST["gender"] ?? "";
$hobbies = $_POST["hobbies"] ?? [];
$others = $_POST["others"] ?? "";

$hobbiesList = $hobbies ? implode(", ", $hobbies) : "None";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Submitted</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f0f2f5;
      }

      .result-card {
        max-width: 520px;
        margin: 60px auto;
        padding: 28px;
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
      }

      h1 {
        margin-top: 0;
        color: #243447;
      }

      p {
        margin: 12px 0;
      }

      a {
        color: #0b6bcb;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="result-card">
      <h1>Registration Submitted</h1>
      <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
      <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
      <p><strong>Department:</strong> <?php echo $department; ?></p>
      <p><strong>Gender:</strong> <?php echo $gender; ?></p>
      <p><strong>Hobbies:</strong> <?php echo $hobbiesList; ?></p>
      <p><strong>Other Notes:</strong> <?php echo $others; ?></p>
      <p><a href="../index.html">Back to form</a></p>
    </div>
  </body>
</html>
