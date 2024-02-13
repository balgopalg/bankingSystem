<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Transfer</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .table{
            padding:2rem;
            align-content:center;
        }
    </style>
</head>
        <?php
            session_start();
            require "db.php";
            require "function.php";
            $userId=$_SESSION['userId'];
            if($_SESSION["loggedin"] == false){
                header('location:/bank/index.php');
            }
            $sql="SELECT * FROM useraccounts WHERE uname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $name=$row['name'];
            $accno=$row['accountno'];
            $crn=$row['crn'];
            $balance=$row['balance'];
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
                <a href="fund_transfer.php"><li style="background:#009879; color:white;">Fund Transfer</li></a>
                <a href="loan_apply.php"><li>Apply For Loan</li></a>
                <a href="payment_history.php"><li>Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero">
            <form class="form table" action="fund_transfer.php" method="post">
                <h3>Fund Transfer with ease</h3>
                <input type="number" name="raccount" id="recvacc" placeholder="receiver account no">
                <input type="text" name="rname" placeholder="receivers name">
                <input type="number" name="tamount" placeholder="enter amount">
                <button name="approve">Submit</button> Available balance: <?php echo $balance ?>
            </form>
        </div>
    </main>
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>
    <?php
        if(isset($_POST['approve'])){
            $raccount=$_POST['raccount'];
            $rname=$_POST['rname'];
            $tamount=$_POST['tamount'];
            
            if($tamount>$balance){
                echo "<script>alert('Insufficient balance');</script>";
            }
            else{
                makeTransaction($userId,$accno,$tamount,$rname,$raccount);
                echo "<script>alert('Your transaction successful');</script>";
            }
        }
    ?>
</body>
</html>