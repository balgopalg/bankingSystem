<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.8);
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .wrapper .title h1 {
        color: #c5ecfd;
        text-align: center;
        margin-bottom: 25px;
    }

    .contact-form {
        display: flex;
        padding:25px;
        height:250px;
    }

    .input-fields {
        display: flex;
        flex-direction: column;
        margin-right: 4%;
    }

    .input-fields .input,
    .msg textarea {
        margin: 10px 0;
        background: transparent;
        border: 0px;
        border-bottom: 2px solid #c5ecfd;
        padding: 10px;
        color: #c5ecfd;
        width: 100%;
    }

    .msg textarea {
        height: 130px;
    }

    .btn {
        margin-top: 1rem;
        cursor: pointer;
        font-weight: 700;
    }

    .msg .btn:hover {

        background-color: greenyellow;
        color: black;

    }
    .cancel{
        background:rgb(15, 15, 40);
        color:white;
        font-weight:600;
        text-align:center;
        border:2px solid rgb(43, 40, 40);
        cursor: pointer;
    }
    .cancel:hover{
        background:red;
        color:white;
    }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img
                    src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow"
                    alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
    </nav>
    <form method="post">
        <div class="wrapper">
            <div class="title">
                <h1>Contact Us</h1>
            </div>
            <div class="contact-form">
                <div class="input-fields">
                    <input type="text" name="name" class="input" placeholder="Name">
                    <input type="email" name="email" class="input" placeholder="Email Address">
                    <input type="number" name="mobno" class="input" placeholder="Phone">
                    <input type="text" name="sub" class="input" placeholder="Subject">
                </div>
                <div class="msg">
                    <textarea name="msg" placeholder="Message"></textarea>
                    <a href="/bank/index.php"><input class="cancel" value="Cancel" style="text-align:center;"></a>
                    <input name="submit" type="submit" class="btn">
                </div>
            </div>
        </div>
    </form>
    <?php

    require "db.php";
    if(isset($_POST['submit'])){

        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobno=$_POST['mobno'];
        $sub=$_POST['sub'];
        $msg=$_POST['msg'];

        $sql="INSERT INTO `contactus`(`name`, `email`, `mobno`, `subject`, `message`) VALUES ('$name','$email','$mobno','$sub','$msg');";

        if(mysqli_query($conn,$sql)){
            echo "<script>
            document.getElementsByClassName('wrapper')[0].innerHTML='Your message has been sent to Manager 🙂';
            </script>";
        }
    }

    ?>
</body>

</html>