<?php
// Establish database connection here

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
    $token = $_GET["token"];

    // Check if the token exists in the database
    $stmt = $conn->prepare("SELECT email FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        // Token is valid; Allow the user to reset their password
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Reset Password</title>
        </head>
        <body>
            <h2>Reset Your Password</h2>
            <form action="update_password.php" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>">
                <label>New Password:</label>
                <input type="password" name="password" required><br><br>
                <input type="submit" value="Reset Password">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Invalid or expired token. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
