<?php
// Establish database connection here

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["token"]) && isset($_POST["password"])) {
    $token = $_POST["token"];
    $password = $_POST["password"];

    // Check if the token exists in the database and is still valid
    $stmt = $conn->prepare("SELECT email FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        // Token is valid; Update the user's password
        $email = $result->fetch_assoc()['email'];
        
        // Hash the new password (you might use a more secure hashing method)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password and clear the reset token
        $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        $stmt->execute();
        $stmt->close();

        echo "Password updated successfully. You can now <a href='login.php'>login</a> with your new password.";
    } else {
        echo "Invalid or expired token. Password update failed.";
    }
} else {
    echo "Invalid request.";
}
?>
