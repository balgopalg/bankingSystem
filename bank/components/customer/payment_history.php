<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statement</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .row{
            font-size:14px;
            padding:4px;
        }
        .hero{
            overflow-x:hidden;
            overflow-y:auto;
        }
        .styled thead{
            position:sticky;
            top:0;
        }
    </style>
</head>
        <?php
            require "db.php";
            session_start();
            $userId=$_SESSION['userId'];
            if($_SESSION["loggedin"] == false){
                header('location:/bank/index.php');
            }
            $sql="SELECT * FROM useraccounts WHERE uname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
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
                <a href="fund_transfer.php"><li>Fund Transfer</li></a>
                <a href="loan_apply.php"><li>Apply For Loan</li></a>
                <a href="payment_history.php"><li style="background:#009879; color:white;">Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero">
            <div  align="center" class="recent-transactions">
                <table class="styled">
                    <thead>
                        <tr>
                        <th>Account No</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                        <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql="SELECT * FROM cd WHERE accno='$accno'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        echo "
                        <tr>
                        <td>".$row['accno']."</td>
                        <td>".$row['description']."</td>
                        <td>".$row['debit']."</td>
                        <td>".$row['credit']."</td>
                        <td>".$row['balance']."</td>
                        <td>".$row['date']."</td>
                        </tr>
                        ";
                        } 
                    }else{
                        echo "<script>document.getElementsByClassName('hero')[0].innerHTML='No data found 🥲'</script>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>
</body>
</html>