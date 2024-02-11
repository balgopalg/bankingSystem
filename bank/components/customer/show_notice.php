<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .column {
        justify-content: center;
        align-items: center;
    }

    .elem {
        transform: translateY(-10px);
    }

    .notice-board {
        display: flex;
        width: 70vw;
        height: 70vh;
        overflow: hidden;
        flex-direction: column;
        gap: 2px;
        transform:translateX(-100px);
        overflow-y:auto;
    }
    .credit {
        border-bottom:2px solid yellowgreen;
        border-left:2px solid yellowgreen;
    }

    .other::before,.debit::before,.credit::before {
        content: "@ ";
    }
    .debit,.credit,.other{
        padding:10px;
        margin-top:15px;
        border-radius: 15px;
    }
    .debit {
        border-bottom:2px solid red;
        border-left: 2px solid red;
    }
    .other{
        border-left:2px solid blue;
        border-bottom:2px solid blue;
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
        ?>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img
                    src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow"
                    alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
                <li id="welcome">WELCOME 👋 <?php echo $userId ?></li>
                <a href="show_notice.php">
                    <li>Notice</li>
                </a>
                <a href="/bank/logout.php">
                    <li id="logout">Logout</li>
                </a>
            </ul>
        </div>
    </nav>
    <main>
        <div class="dashboard">
            <ul class="elem">
                <a href="customer_dashboard.php">
                    <li style="background:#009879; color:white;">Dashboard</li>
                </a>
            </ul>
        </div>
        <div class="notice-board">
            <?php
            $sql="SELECT * FROM notice WHERE accno='$accno' ORDER BY id desc";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)){
            $action=$row['action'];
            $notice=$row['notice'];
            if($action=='credit' || $action=='deposite'){
                echo "<div class='credit'>".$notice."</div>";
            }
            if($action=='debit' || $action=='withdraw'){
                echo "<div class='debit'>".$notice."</div>";
            }
            if($action=='loanSenction'){
                echo "<div class='other'>".$notice."</div>";
            }
            if($action==''){
                echo "<div class='other'>".$notice."</div>";
            }
        }
    ?>
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