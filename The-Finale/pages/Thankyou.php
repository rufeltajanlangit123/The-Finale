<?php 
session_start();

// Get the borrow datetime from URL
if (isset($_GET['borrowDateTime'])) {
    $borrowDateTime = $_GET['borrowDateTime']; // format: YYYY-MM-DDTHH:MM
    $borrowTimestamp = strtotime($borrowDateTime);
    
    // Calculate return deadline: +16 days
    $deadlineTimestamp = strtotime('+16 days', $borrowTimestamp);

    // Format nicely
    $borrowDateTimeFormatted = date('Y-m-d H:i', $borrowTimestamp);
    $deadlineFormatted = date('Y-m-d H:i', $deadlineTimestamp);
} else {
    $borrowDateTimeFormatted = null;
    $deadlineFormatted = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Thank You</title>
    <link rel="stylesheet" href="../assets/Thankyou.css" />
</head>
<body>
<div class="Thankyou">
    <h1><span style="color: green;">✔</span> Submission Success</h1>
    <p>Thank you for borrowing our books. Enjoy reading and gain knowledge!</p>

    <?php if ($borrowDateTimeFormatted && $deadlineFormatted): ?>
        <p><strong>Date & Time Borrowed:</strong> <?php echo htmlspecialchars($borrowDateTimeFormatted); ?></p>
        <p><strong>Return Deadline:</strong> <?php echo htmlspecialchars($deadlineFormatted); ?></p>
    <?php else: ?>
        <p></p>
    <?php endif; ?>

    <?php if (isset($_SESSION['user'])): ?>
        <p>Borrowed by: <?php echo htmlspecialchars($_SESSION['user']); ?></p>
    <?php endif; ?>
</div>
</body>
</html>
