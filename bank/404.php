<?php
header("HTTP/1.0 404 Not Found");
?>
<html>
<head>
    <title>Account not present</title>
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
        nav{
            display:flex;
            flex-direction:column;
            top:0;
            gap:20px;
            align-item:center;
            justify-content:center;
            
        }
        .back{
            padding:5px 10px 5px 10px;
            background:red;
            color:white;
            font-weight: 600;
            border-radius:16px;
            cursor:pointer;
            &:hover{
                background:black;
                color:red;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div style="display:flex; justify-content:center;">
            <a href="index.php"><button class="back">Back</button></a>
        </div>
        <div class="logo">
            <h3>Bank of Bhadrak</h3>
        </div>
    </nav>
    <div>
        <img src="images/exclamation.png" alt="">
    </div>
    <div class="container">
        <h1>Error - Invalid Credentials </h1>
        <p>No Account Found on our database</p>
    </div>
</body>
</html>
