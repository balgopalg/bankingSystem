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
            require "db.php";
            $sql="SELECT * FROM useraccounts WHERE uname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $name=$row['name'];
            $email=$row['email'];
            $mobno=$row['mobno'];
            $aadhaarno=$row['aadhaarno'];
            $panno=$row['panno'];
            $acctype=$row['acctype'];
            $branch=$row['branch'];
            $source=$row['source'];
            $doj=$row['date'];
            $crn=$row['crn'];
            $city=$row['city'];
            $address=$row['address'];
            $status=$row['status'];
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
                <a href="profile.php"><li style="background:#009879; color:white;">Profile</li></a>
                <a href="customer_dashboard.php"><li  >Account Summary</li></a>
                <a href="fund_transfer.php"><li>Fund Transfer</li></a>
                <a href="loan_apply.php"><li>Apply For Loan</li></a>
                <a href="payment_history.php"><li>Payment History</li></a>
                <a href="feedback.php"><li>FeedBack</li></a>
            </ul>
        </div>
        <div class="hero1">
            <div class="details">
                <div class="data"><div>CRN:</div><div> <?php echo $crn ?></div></div>
                <div class="data">Name: <?php echo $name ?></div>
                <div class="data">Email: <?php echo $email ?></div>
                <div class="data">Mobno: <?php echo $mobno ?></div>
                <div class="data">Aadhaar no: <?php echo $aadhaarno ?></div>
                <div class="data">PAN no: <?php echo $panno ?></div>
                <div class="data">Account type: <?php echo $acctype ?></div>
                <div class="data">Designation: <?php echo $source ?></div>
                <div class="data">Branch: <?php echo $branch ?></div>
                <div class="data">Data of Opening: <?php echo $doj ?></div>
                <div class="data">City: <?php echo $city ?></div>
                <div class="data">Address:<?php echo $address ?></div>
            </div>
            <div class="profile-pic">
                <img src="https://previews.123rf.com/images/urfandadashov/urfandadashov1809/urfandadashov180902667/109317646-profile-pic-vector-icon-isolated-on-transparent-background-profile-pic-logo-concept.jpg" alt="">
                <div class="data">
                    Account Status: <?php echo $status?>
                </div>
            </div>
        </div>
    </main>
    <footer> 
        <p>&copy; 2024 Railway Management System</p>
    </footer>
</body>
</html>