<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .notice {
        scale: 0.9;
        top: 50;
        bottom: 50;
        height: 400px;
    }

    input:last-child {
        background: #000;
        padding: 6px;
    }
    </style>
</head>
<?php
            session_start();
            $userId=$_SESSION['userId'];
            require "db.php";  
            $sqlr="SELECT * FROM staffs WHERE sname='$userId'";
            $resultr=mysqli_query($conn,$sqlr);
            $rowr=mysqli_fetch_array($resultr);
            $branchId=$rowr['branch'];
        ?>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img
                    src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow"
                    alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
                <li id="welcome" style="cursor:pointer;">WELCOME Cashier(<?php echo $branchId?>)👋 <?php echo $userId ?>
                </li>
                <a href="/bankdemo/logout.php">
                    <li id="logout">Logout</li>
                </a>
            </ul>
        </div>
    </nav>
    <main>
        <div class="dashboard">
            <ul class="elem">
                <a href="approve.php">
                    <li>Approve Applications</li>
                </a>
                <a href="cashier_dashboard.php">
                    <li>Search User</li>
                </a>
                <a href="message.php">
                    <li style="background:#009879; color:white;">Message Penal</li>
                </a>
                <a href="depoCred.php">
                    <li>Deposite/Credit</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <form class="form notice" action="" method="post">
                <div>
                    <h3>Send Notice</h3>
                </div>
                <label for="accno">Account No:</label>
                <input type="number" name="accno" id="accno">
                <label for="notice">Enter you message below:</label>
                <textarea name="notice" id="notice" cols="30" rows="10"></textarea>
                <input id="submit" name="submit" type="submit" value="SEND" onclick="submitted()">
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Railway Management System</p>
    </footer>
    <script>
    function submitted() {
        alert("Your have sent a notice !! 🙂");
    }
    </script>
    <?php

    if(isset($_POST['submit'])){
        
        $accno=$_POST['accno'];
        $notice=$_POST['notice'];
        $sql="INSERT INTO `notice` (`accno`, `notice`) VALUES ('$accno','$notice');";
        mysqli_query($conn,$sql);
    }
    ?>
</body>

</html>