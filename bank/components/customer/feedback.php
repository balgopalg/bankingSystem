<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .feedback{
            scale:0.9;
            transform:translate(-50px,-30px);
        }
    </style>
</head>
        <?php
            session_start();
            $userId=$_SESSION['userId'];
            if($_SESSION["loggedin"] == false){
                header('location:/bank/index.php');
            }
        ?>
<body>
    <nav>
        <div class="logo">
        <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
            <li id="welcome">WELCOME 👋 <?php echo $userId ?></li>
            <a href="show_notice.php"><li>Notice</li></a>
            <a href="/bank/logout.php"><li id="logout">Logout</li></a>
            </ul>
        </div>
    </nav>
    <main>
    <div class="dashboard">
            <ul class="elem">
                <a href="profile.php"><li>Profile</li></a>
                <a href="customer_dashboard.php"><li>Account Summary</li></a>
                <a href="fund_transfer.php"><li>Fund Transfer</li></a>
                <a href="loan_apply.php"><li>Apply For Loan</li></a>
                <a href="payment_history.php"><li>Payment History</li></a>
                <a href="feedback.php"><li style="background:#009879; color:white;">FeedBack</li></a>
            </ul>
        </div>
        <div class="hero">
            <form class="form feedback" action="" method="post">
                   <div><h3>Send us you feedback</h3></div>
                   <label for="subject">Subject:</label>
                   <input type="text" name="subject" id="subject">
                   <label for="feedback">Enter you message below:</label>
                   <textarea name="feedback" id="feedback" cols="30" rows="10"></textarea>
                   <input id="submit" name="submit" type="submit" value="SEND" onclick="submitted()">
            </form>
        </div>
    </main>
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>
    <script>
        function submitted(){
            alert("Your feedback has been sent !! 🙂");
        }
    </script>
    <?php

    if(isset($_POST['submit'])){
        require "db.php";
        $userId=$_SESSION['userId'];  
        $sqls="SELECT * FROM useraccounts WHERE uname='$userId'";
        $result=mysqli_query($conn,$sqls);
        $row=mysqli_fetch_array($result);
        $branchId=$row['branch'];
        $subject=$_POST['subject'];
        $feedback=$_POST['feedback'];
        $sql="INSERT INTO `feedback`(`username`, `subject`, `feedback` ,`branchId`) VALUES ('$userId','$subject','$feedback','$branchId');";
        mysqli_query($conn,$sql);
    }
    ?>
</body>
</html>