<?php
header("HTTP/1.0 404 Not Found");
?>
<html>
<head>
    <title>404 Error - Page Not Found</title>
    <style>
        *{
            padding:0;
            margin:0;
            font-family:"Poppins",sans-serif;
        }
        body{
            display:flex;
            flex-direction:column;
            background-color:rgb(32, 32, 55);
            color:white;
            justify-content:center;
            align-items:center;
            height:100vh;
            gap:30px;
        }
        .container{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            gap:15px;
        }
        p{
            color:wheat;
        }
        img{
            height:100px;
        }
    </style>
</head>
<body>
    <div>
        <img src="images/exclamation.png" alt="">
    </div>
    <div class="container">
        <h1>404 Error - Page Not Found</h1>
        <p>The page you are looking for does not exist.</p>
    </div>
</body>
</html>
