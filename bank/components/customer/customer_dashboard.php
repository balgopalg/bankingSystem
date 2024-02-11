<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .column{
            justify-content:center;
            align-items:center;
        }
        .hero{
            scale:0.85;
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
            $loanDue=$row['loandue'];
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
                <a href="customer_dashboard.php"><li  style="background:#009879; color:white;">Account Summary</li></a>
                <a href="fund_transfer.php"><li>Fund Transfer</li></a>
                <a href="loan_apply.php"><li>Apply For Loan</li></a>
                <a href="payment_history.php"><li>Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero">
            <h4>Account Summary</h4><br>
            <div class="column">
                <div class="row">
                    <div>
                        CRN no:
                    </div>
                    <div>
                        <?php echo $crn ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Account no:
                    </div>
                    <div>
                        <?php echo $accno ?>
                    </div>
                </div>
                
                <div class="row">
                    <div>
                        Balance:
                    </div>
                    <div>
                        <?php echo $balance ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Loan Due:
                    </div>
                    <div>
                        <?php echo $loanDue ?>
                    </div>
                </div>
            </div>
            <div  align="center" class="recent-transactions" id="recent-transactions">
                <h4>Last 5 transactions</h4>
                <table class="styled">
                    <thead>
                        <tr>
                        <th>Account No</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql="SELECT * FROM cd WHERE accno='$accno' ORDER BY cd.id desc LIMIT 0,5 ";
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
                        </tr>
                        ";
                        } 
                    }else{
                        echo "<script>document.getElementById('recent-transactions').innerHTML='🙂'</script>";
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