<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
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
            if($_SESSION["loggedin"] == false){
                header('location:/bank/index.php');
            }
            require "db.php";  
            $sqlr="SELECT * FROM staffs WHERE sname='$userId'";
            $resultr=mysqli_query($conn,$sqlr);
            $rowr=mysqli_fetch_array($resultr);
            $branchId=$rowr['branch'];
            $sqlb="SELECT * FROM branch WHERE id='$branchId';";
            $result=mysqli_query($conn,$sqlb);
            $row=mysqli_fetch_array($result);
            $branchName=$row['name'];
        ?>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
             <ul>
                <li id="welcome" style="cursor:pointer;"> Branch : <?php echo $branchName?>(<?php echo $branchId?>)</li>
                <li id="welcome" style="cursor:pointer;">WELCOME EMPLOYEE👋 <?php echo $userId ?></li>
                <a href="/bank/logout.php">
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
                <a href="employee_dashboard.php">
                    <li>Search User</li>
                </a>
                <a href="message.php">
                    <li style="background:#009879; color:white;">Message Penal</li>
                </a>
                <a href="depoWithdraw.php">
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
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>
</body>

</html>