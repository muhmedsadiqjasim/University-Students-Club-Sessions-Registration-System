<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Join Event</title>
    <link rel="stylesheet" href="stylez.css">
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $department = $_POST["department"];
    $session_id = $_POST["session_id"];

    $stmt = $conn->prepare("INSERT INTO Student (name, email, department) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $department);
    $stmt->execute();
    $student_id = $conn->insert_id;

    $stmt2 = $conn->prepare("INSERT INTO Registration (student_id, session_id, registration_date) VALUES (?, ?, CURDATE())");
    $stmt2->bind_param("ii", $student_id, $session_id);
    $stmt2->execute();

    echo "<h2>You joined the event successfully!</h2>";
} else {
    $session_id = $_GET['session_id'] ?? 1;
?>
    <h2>Join Event</h2>
    <form method="post">
        <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
        <input type="text" name="name" placeholder="Your name" required><br><br>
        <input type="email" name="email" placeholder="Your email" required><br><br>
        <select name="department" required>
            <option value="">Select Department</option>
            <option value="Information Engineering">Information Engineering</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Arts">Arts</option>
        </select><br><br>
        <button type="submit">Join Now</button>
    </form>
<?php } ?>
</body>
</html>
