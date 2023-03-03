<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h4>Contact Form Submission</h4>
    <p>Name: {{ $name }}</p>
    <p>Email: {{ $email }}</p>
    <p>Message:
        {{ html_entity_decode($messages) }}
    </p>
</body>
</html>
