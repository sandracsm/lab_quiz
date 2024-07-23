<?php
// Sanitize input function
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validate username function
function validate_username($username)
{
    return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
}

// Validate password function
function validate_password($password)
{
    return strlen($password) >= 6;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    // Validate inputs
    if (!validate_username($username)) {
        die("Invalid username. Must be alphanumeric and 3-20 characters long.");
    }

    if (!validate_password($password)) {
        die("Invalid password. Must be at least 6 characters long.");
    }

    // Mock database connection (Replace this with actual database logic)
    $mockDatabase = [
        "validUser" => "validPassword123"
    ];

    // Check credentials
    if (array_key_exists($username, $mockDatabase) && $mockDatabase[$username] == $password) {
        echo json_encode([
            "status" => "success",
            "message" => "Login successful!"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Invalid username or password."
        ]);
    }
}