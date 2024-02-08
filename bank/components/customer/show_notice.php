<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
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
    }
    .credit {
        background: greenyellow;
        color: black;
        padding:10px;
        margin:2px;
    }

    .credit::before {
        content: "👉";
    }

    .debit {
        background: red;
        color: white;
        padding:10px;
        margin:2px;
    }

    .debit::before {
        content: "👉";
    }

    .other {
        background: rgb(22, 29, 44);
        color: white;
        padding:10px;
        margin:2px;
    }

    .other::before {
        content: "👉";
    }

    </style>
</head>
<?php
            require "db.php";
            session_start();
            $userId=$_SESSION['userId'];
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
                <a href="/bankdemo/logout.php">
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
            if($action=='credit'){
                echo "<div class='credit'>".$notice."</div>";
            }else if($action=='debit'){
                echo "<div class='debit'>".$notice."</div>";
            }else{
                echo "<div class='other'".$notice."</div>";
            }
        }
    ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Railway Management System</p>
    </footer>

    
</body>

</html>