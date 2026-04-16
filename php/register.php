<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.html");
    exit;
}

function clean_input(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, "UTF-8");
}

$allowedDepartments = ["Computer Science", "Engineering", "Business", "Arts"];
$allowedGenders = ["Male", "Female", "Other"];
$allowedHobbies = ["Reading", "Sports", "Music", "Travel"];

$firstName = clean_input($_POST["firstName"] ?? "");
$lastName = clean_input($_POST["lastName"] ?? "");
$department = $_POST["department"] ?? "";
$gender = $_POST["gender"] ?? "";
$others = clean_input($_POST["others"] ?? "");

$submittedHobbies = $_POST["hobbies"] ?? [];
$validHobbies = array_values(array_intersect($allowedHobbies, $submittedHobbies));
$hobbiesList = $validHobbies ? implode(", ", $validHobbies) : "None";

$errors = [];

if ($firstName === "") {
    $errors[] = "First name is required.";
}

if ($lastName === "") {
    $errors[] = "Last name is required.";
}

if (!in_array($department, $allowedDepartments, true)) {
    $errors[] = "Please select a valid department.";
    $department = "Not selected";
} else {
    $department = clean_input($department);
}

if (!in_array($gender, $allowedGenders, true)) {
    $errors[] = "Please select a gender.";
    $gender = "Not selected";
} else {
    $gender = clean_input($gender);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Result</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f0f2f5;
      }

      .result-card {
        max-width: 560px;
        margin: 60px auto;
        padding: 28px;
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
      }

      h1 {
        margin: 0 0 16px;
        color: #243447;
      }

      p,
      li {
        color: #334155;
      }

      .status {
        padding: 12px 14px;
        border-radius: 10px;
        margin-bottom: 18px;
      }

      .status.success {
        background: #e9f7ef;
        color: #1f6f43;
      }

      .status.error {
        background: #fdecec;
        color: #a53b3b;
      }

      ul {
        padding-left: 20px;
      }

      a {
        color: #0b6bcb;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="result-card">
      <?php if ($errors): ?>
        <h1>Registration Could Not Be Submitted</h1>
        <div class="status error">
          Please fix the following issues and try again.
        </div>
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <h1>Registration Submitted</h1>
        <div class="status success">
          Student registration was submitted successfully.
        </div>
        <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
        <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
        <p><strong>Department:</strong> <?php echo $department; ?></p>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        <p><strong>Hobbies:</strong> <?php echo $hobbiesList; ?></p>
        <p><strong>Other Notes:</strong> <?php echo $others !== "" ? $others : "None"; ?></p>
      <?php endif; ?>

      <p><a href="../index.html">Back to form</a></p>
    </div>
  </body>
</html>
