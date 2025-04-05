<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Form</title>
</head>
<body>
    <form action="/test/submit" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>