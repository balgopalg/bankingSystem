<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
        <?php
            require "db.php";
            session_start();
            $userId=$_SESSION['userId'];
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
        <a href="#"><img src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
            <li id="welcome">WELCOME 👋 <?php echo $userId ?></li>
            <a href=""><li>Notice</li></a>
            <a href=""><li>Contact</li></a>
            <a href="/bankdemo/logout.php"><li id="logout">Logout</li></a>
            </ul>
        </div>

    </nav>
    <main>
        <div class="dashboard">
            <ul class="elem">
                <a href="profile.php"><li>Profile</li></a>
                <a href="customer_dashboard.php"><li  style="background:#009879; color:white;">Account Summary</li></a>
                <a href=""><li>Fund Transfer</li></a>
                <a href=""><li>Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero">
            <div class="column">
                <div class="row">
                    CRN no: <?php echo $crn; ?>
                </div>
                <div class="row">
                    Account no: <?php echo $accno; ?>
                </div>
                <div class="row">
                    Balance:<?php echo $balance; ?>
                </div>
                <div class="row">
                    Loan Amount:0;
                </div>
            </div>
            <div  align="center" class="recent-transactions">
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
                        <tr>
                            <td>6506246131</td>
                            <td>UPI</td>
                            <td>2000</td>
                            <td>0</td>
                            <td>2000</td>
                        </tr>
                        <tr>
                            <td>6206246131</td>
                            <td>UPI</td>
                            <td>0</td>
                            <td>3000</td>
                            <td>5000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer> 
        <p>&copy; 2024 Railway Management System</p>
    </footer>
</body>
</html>