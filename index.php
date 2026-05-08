<?php
// This part handles the saving
if (isset($_POST['save_code'])) {
    $code = $_POST['code_content'];
    // We use @ to suppress errors and check if it worked
    if (file_put_contents("main.py", $code)) {
        $status = "✓ SYNCED TO CLOUD";
    } else {
        $status = "X ERROR: Permission Denied";
    }
}

// This part makes sure the screen isn't white when you first open it
$current_code = "";
if (file_exists("main.py")) {
    $current_code = file_get_contents("main.py");
} else {
    $current_code = "print('Welcome Harsh 7')"; // Default text
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>HP OS | Cloud IDE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #000; color: #0f0; font-family: monospace; text-align: center; }
        textarea { width: 90%; height: 300px; background: #111; color: #0f0; border: 1px solid #0f0; padding: 10px; }
        .btn { background: #0f0; color: #000; padding: 15px; border: none; cursor: pointer; width: 90%; margin-top: 10px; font-weight: bold; }
    </style>
</head>
<body>
    <h2>HP OS CLOUD</h2>
    <form method="POST">
        <textarea name="code_content"><?php echo htmlspecialchars($current_code); ?></textarea><br>
        <button type="submit" name="save_code" class="btn">PUSH TO HP OS</button>
    </form>
    <div style="margin-top:10px;"><?php echo isset($status) ? $status : "System Ready"; ?></div>
</body>
</html>
