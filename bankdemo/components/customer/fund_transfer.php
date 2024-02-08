<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
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
        <a href="#"><img src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
            <li id="welcome">WELCOME 👋 <?php echo $userId ?></li>
            <a href="show_notice.php"><li>Notice</li></a>
            <a href="/bankdemo/logout.php"><li id="logout">Logout</li></a>
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
    <footer> 
        <p>&copy; 2024 Railway Management System</p>
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