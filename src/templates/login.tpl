<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    {if isset($error_message)}
        <p style="color: red;">{$error_message}</p>
    {/if}
    {if isset($success_message)}
        <p style="color: green;">{$success_message}</p>
    {/if}
    <form method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
