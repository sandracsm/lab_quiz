<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <script>
        function sanitizeInput(value) {
            return value.replace(/[<>]/g, "");
        }

        function validateForm(event) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');

            username.value = sanitizeInput(username.value);
            password.value = sanitizeInput(password.value);

            const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
            const passwordRegex = /^.{6,}$/;

            if (!usernameRegex.test(username.value)) {
                alert("Invalid username. Must be alphanumeric and 3-20 characters long.");
                return false;
            }

            if (!passwordRegex.test(password.value)) {
                alert("Invalid password. Must be at least 6 characters long.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <form method="POST" action="process_form.php" onsubmit="return validateForm(event);">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>