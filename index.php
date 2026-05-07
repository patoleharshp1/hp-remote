<?php
$filename = "main.py";
$status = "";

// Save the code when the button is pressed
if (isset($_POST['save_code'])) {
    $code = $_POST['code_content'];
    if (file_put_contents($filename, $code)) {
        $status = "✓ SYNCED TO CLOUD";
    } else {
        $status = "X UPLOAD FAILED";
    }
}

// Read current code for the editor
$current_code = file_exists($filename) ? file_get_contents($filename) : "print('HP OS Ready')";
?>

<!DOCTYPE html>
<html>
<head>
    <title>HP OS | Cloud IDE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { background: #000; color: #0f0; font-family: 'Courier New', monospace; text-align: center; margin: 20px; }
        h2 { text-shadow: 0 0 10px #0f0; }
        textarea { width: 95%; height: 350px; background: #111; color: #0f0; border: 2px solid #0f0; padding: 10px; font-size: 16px; border-radius: 5px; outline: none; }
        .btn { background: #0f0; color: #000; padding: 15px 30px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; margin-top: 15px; width: 100%; font-size: 18px; }
        .status { margin-top: 15px; color: #fff; font-weight: bold; font-size: 14px; }
        .link-box { background: #222; padding: 10px; margin-top: 20px; border-radius: 5px; font-size: 12px; color: #aaa; }
    </style>
</head>
<body>
    <h2>HARSH 7 | CLOUD IDE</h2>
    <form method="POST">
        <textarea name="code_content"><?php echo htmlspecialchars($current_code); ?></textarea>
        <button type="submit" name="save_code" class="btn">PUSH TO HP OS</button>
    </form>
    <div class="status"><?php echo $status; ?></div>

    <div class="link-box">
        ESP32 Bridge Link:<br>
        <span style="color: #0f0;">yourwebsite.com/hp_os/get_code.php</span>
    </div>
</body>
</html>
