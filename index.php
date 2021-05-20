<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botman</title>
    <style>
        .desktop-closed-message-avatar {
            background-color: red !important;
        }
    </style>
</head>

<body style="display: flex; justify-content: center; align-items: center;">
    <h1>Welcome to Home page</h1>
    <script>
        var botmanWidget = {
            frameEndpoint: '/chat.html',
            introMessage: 'Hello, I am a Chatbot',
            chatServer: 'chat.php',
            title: 'Chatbot',
            mainColor: '#456765',
            bubbleBackground: '#ff76f4',
            aboutText: '',
            bubbleAvatarUrl: ''
        }
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</body>

</html>