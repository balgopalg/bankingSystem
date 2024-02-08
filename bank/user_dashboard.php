<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?php 
    session_start(); 
    $uname=$_SESSION['userId'];
     echo $uname; ?></h1>
</body>
</html>