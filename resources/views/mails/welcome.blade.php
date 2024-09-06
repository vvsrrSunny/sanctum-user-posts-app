<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Juicebox!</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Welcome!</h1>
        </div>
        <div class="content">
            <h2>Hello, {{ $user->name }}!</h2>
            <p>Thank you for registering with us. We are thrilled to have you on board and can't wait for you to explore all the features we have to offer.</p>
            <p>If you have any questions, feel free to reach out to our support team at support@juicebox.com.</p>
        </div>
        <div class="footer">
            <p>Best regards,</p>
            <p>Juicebox Team</p>
        </div>
    </div>
</body>
</html>
