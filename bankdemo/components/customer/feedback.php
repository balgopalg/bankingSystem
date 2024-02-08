<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
        <?php
            session_start();
            $userId=$_SESSION['userId'];
        ?>
<body>
    <nav>
        <div class="logo">
        <a href="#"><img src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
            <li id="welcome">WELCOME 👋 <?php echo $userId ?></li>
            <a href="show_notice.php"><li>Notice</li></a>
            <a href=""><li>Contact</li></a>
            <a href="/bankdemo/logout.php"><li id="logout">Logout</li></a>
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
    <footer> 
        <p>&copy; 2024 Railway Management System</p>
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
        $subject=$_POST['subject'];
        $feedback=$_POST['feedback'];
        $sql="INSERT INTO `feedback`(`username`, `subject`, `feedback`) VALUES ('$userId','$subject','$feedback');";
        mysqli_query($conn,$sql);
    }
    ?>
</body>
</html>