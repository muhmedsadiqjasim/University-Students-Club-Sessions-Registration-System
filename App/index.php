<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <link rel="stylesheet" href="stylez.css">
</head>
<body>
    <h2>Available Events</h2>
    <?php
    $q = $conn->query("
    SELECT se.session_id, se.session_title, se.location, c.club_name
    FROM Session se
    JOIN Club c ON se.club_id = c.club_id
    WHERE se.session_date >= CURDATE()
");
    while ($row = $q->fetch_assoc()):
    ?>
        <div class="event">
            <p><?php echo $row['session_title']; ?></p>
            <p><?php echo $row['club_name']; ?></p>
            <p><?php echo $row['location']; ?></p>
            <a href="register.php?session_id=<?php echo $row['session_id']; ?>">Join</a>
        </div>
    <?php endwhile; ?>
</body>
</html>
