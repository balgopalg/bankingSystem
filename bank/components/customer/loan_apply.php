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
        .column{
            justify-content:center;
            align-items:center;
        }
        .loan{
            display:flex;
            justify-content:space-between;
            width:70%;
            transform:translateX(60px);
            margin:20px;
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
            $due=$row['loandue'];
            $loanamount=$row['loanamt'];
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
                <a href="loan_apply.php"><li  style="background:#009879; color:white;">Apply For Loan</li></a>
                <a href="payment_history.php"><li>Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero">
            <div class="column">
                <div class="row">
                    <div>
                        Loan amount: <?php echo $loanamount ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Amount Due: <?php echo $due ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Account Balance: <?php echo $balance ?>
                    </div>
                </div>
            </div>
            <div class="loan">
                <div class="applyForLoan">
                <form class="form table" action="" method="post">
                    <h3>Apply For Loan</h3>
                    <?php echo '
                    <input type="number" name="accno" value="'. $accno.'"hidden>
                    <input type="text" name="name" value="'. $userId .'"hidden>';?>
                    <input type="number" name="lamount" id="lamount" placeholder="Enter Loan Amount">
                    <input type="text" name="reason" placeholder="Reason">
                    <button name="apply">Submit</button>
                </form>
                </div>
                <div class="payDue">
                <form class="form table" action="" method="post">
                <h3>Pay Your Dues</h3>
                <input type="number" name="accno" value="<?php $accno ?>" hidden>
                <input type="numbere" name="dueamount" id="dueamount" placeholder="<?php echo $due?>" disabled>
                <input type="number" name="amount" placeholder="wish to pay">
                <button name="pay">Paynow</button>
            </form>
                </div>
            </div>
        </div>

        <?php
        if(isset($_POST['apply'])){
            $accno=$_POST['accno'];
            $name=$_POST['name'];
            $reason=$_POST['reason'];
            $lamount=$_POST['lamount'];
            $sql="INSERT INTO `loanapp`(`accno`,`name`,`amount`, `reason`) VALUES ('$accno','$name','$lamount','$reason');";
            if(mysqli_query($conn,$sql)){
            echo "<script>alert('Your loan application is in process');</script>";
            }
        }
        if(isset($_POST['pay'])){
            $amount=$_POST['amount'];
            $loanDue=$due-$amount;
            if($loanDue==0){
                $sql="UPDATE `useraccounts` SET `loanAmt`='0',`loandue`='$loanDue' WHERE accountno='$accno';";
                if(mysqli_query($conn,$sql)){
                    echo "<script>alert('you paid your all dues');</script>";
                }
            }
            $sql="UPDATE `useraccounts` SET `loandue`='$loanDue' WHERE accountno='$accno';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('you paid ".$amount." and ".$loanDue." is remaining');</script>";
            }
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