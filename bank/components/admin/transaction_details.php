<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .hero{
            flex-direction:column;
            font-weight:600;
            justify-content:center;
        }
        .column{

        }
        .row{
            width:150px;
        }
        .row1{
            display:flex;
            width:100%;
            justify-content:space-between;
        }
        .row2{
            display:flex;
            width:100%;
            justify-content:space-between;
        }
    </style>
</head>

<body>
    <?php
    require "db.php";
    $loanTrans="SELECT SUM(amount) as loanamount FROM loanapp WHERE status='Senctioned';";
    $userBalances="SELECT SUM(balance) as usersbalance FROM useraccounts;";
    $userTransactions="SELECT SUM(amount) as transamount FROM transactions;";
    $loanDue="SELECT SUM(loandue) as loandue FROM useraccounts";

    $result1=mysqli_query($conn,$loanTrans);
    $result2=mysqli_query($conn,$userBalances);
    $result3=mysqli_query($conn,$userTransactions);
    $result4=mysqli_query($conn,$loanDue);

    $row1=mysqli_fetch_array($result1);
    $row2=mysqli_fetch_array($result2);
    $row3=mysqli_fetch_array($result3);
    $row4=mysqli_fetch_array($result4);
    
    $loanamount=$row1['loanamount'];
    $usersbalance=$row2['usersbalance'];
    $transamount=$row3['transamount'];
    $loandue=$row4['loandue'];

    $recoveredLoan=$loanamount-$loandue;
    ?>
    <nav>
        <div class="logo">
            <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
                <li id="welcome" style="cursor:pointer;">WELCOME ADMIN👋
                    <a href="/bank/logout.php">
                <li id="logout">Logout</li>
                </a>
            </ul>
        </div>

    </nav>
    <main>
            <div class="dashboard">
            <ul class="elem">
                <a href="admin_dashboard.php">
                    <li >Users</li>
                </a>
                <a href="transaction_details.php">
                    <li style="background:#009879; color:white;">Transactions</li>
                </a>
                <a href="user_modify.php">
                    <li>Modify Users</li>
                </a>
            </ul>
        </div>
        <div class="hero">
        <h4>Transactions Summary</h4><br>
            <div class="column">
                <div class="row1">
                <div class="row">
                    <div>
                        Loan distributed:
                    </div>
                    <div>
                        <?php echo $loanamount?> 
                    </div>
                </div>
                <div class="row">
                    <div>
                        Loan recoverd:
                    </div>
                    <div>
                        <?php echo $recoveredLoan ?>
                    </div>
                </div>
                
                <div class="row">
                    <div>
                        Loan dues:
                    </div>
                    <div>
                        <?php echo $loandue ?>
                    </div>
                </div>
                </div>
                <div class="row2">
                    <div class="row">
                    <div>
                        Total transactions done:
                    </div>
                    <div>
                        <?php echo $transamount ?>
                    </div>
                    </div>
                    <div class="row">
                    <div>
                        Total customers balance:
                    </div>
                    <div>
                        <?php echo $usersbalance ?>
                    </div>
                    </div>
                </div>
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