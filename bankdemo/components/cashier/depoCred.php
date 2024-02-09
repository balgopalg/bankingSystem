<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .table {
        padding: 2rem;
        align-content: center;
    }

    .column {
        justify-content: center;
        align-items: center;
        scale: 0.8;
        transform:translateY(60px);
    }

    .depoCred {
        display: flex;
        justify-content: space-between;
        width: 70%;
        transform: translateX(55px);
        margin: 20px;

    }

    .deposite , .withdraw{
        scale:0.8;
    }

    .hero{
        transform:translateX(-26px);
        height:60vh;
    }
    </style>
</head>
<?php
            session_start();
            require "db.php";
            $userId=$_SESSION['userId'];
            $sql="SELECT * FROM staffs WHERE sname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $name=$row['sname'];
            $branch=$row['branch'];
            $role=$row['role'];
            $balance=$row['balance'];
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
                <li id="welcome" style="cursor:pointer;">WELCOME Cashier(<?php echo $branch?>)👋 <?php echo $userId ?>
                </li>
                <a href="/bankdemo/logout.php">
                    <li id="logout">Logout</li>
                </a>
            </ul>
        </div>
    </nav>
    <main>
        <div class="dashboard">
            <ul class="elem">
                <a href="approve.php">
                    <li>Approve Applications</li>
                </a>
                <a href="cashier_dashboard.php">
                    <li >Search User</li>
                </a>
                <a href="message.php">
                    <li>Message Penal</li>
                </a>
                <a href="depoCred.php">
                    <li style="background:#009879; color:white;">Deposite/Credit</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div class="column">
                <div class="row">
                    <div>
                        Emp name : <br> <?php echo strtoupper($name) ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Role: <br> <?php echo strtoupper($role) ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Balance: <br> <?php echo $balance ?>
                    </div>
                </div>
            </div>
            <div class="depoCred">
                <div class="deposite">
                    <form class="form table" action="" method="post">
                        <h3>Deposite in account</h3>
                        <input type="number" name="accno" placeholder="Enter account no" required>
                        <input type="text" name="name" placeholder="Enter account name" required>
                        <input type="number" name="damount" id="damount" placeholder="deposite Amount" required>
                        <button name="deposite">Submit</button>
                    </form>
                </div>
                <div class="withdraw">
                    <form class="form table" action="" method="post">
                        <h3>Withdraw from account</h3>
                        <input type="number" name="accno" placeholder="Enter account no" required>
                        <input type="text" name="name" placeholder="Enter account name" required>
                        <input type="number" name="wamount" id="wamount" placeholder="withdrawal Amount" required> 
                        <button name="withdraw">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if(isset($_POST['deposite'])){
            $accno=$_POST['accno'];
            $accname=$_POST['name'];
            $damount=$_POST['damount'];
            $sql="SELECT * FROM useraccounts WHERE accountno='$accno'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $raccount=$row['uname'];
            $balance=$row['balance'];
            if($raccount==$accname){
                $new_balance=$balance + $damount;
                $sqlw="UPDATE useraccounts SET balance='$new_balance' WHERE accountno='$accno'";
                mysqli_query($conn,$sqlw);
                $sqln="INSERT INTO `notice` (`uname`, `accno`,`action`, `notice`) VALUES ('$accname','$accno','deposite','$damount is deposited in your account new balance is : $new_balance');";
                mysqli_query($conn,$sqln);
                echo "<script>alert('$damount is deposited in $accno')</script>";
            }else{
                echo "account name doesn't match";
            }
            $sql2="SELECT * FROM staffs WHERE sname='$userId'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $cbalance=$row2['balance'];
            $new_cbalance=$cbalance-$damount;
            $sqlcw="UPDATE staffs SET balance='$new_cbalance' WHERE sname='$userId'";
            mysqli_query($conn,$sqlcw);
        }

        if(isset($_POST['withdraw'])){
            $accno=$_POST['accno'];
            $accname=$_POST['name'];
            $wamount=$_POST['wamount'];
            $sql="SELECT * FROM useraccounts WHERE accountno='$accno'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $raccount=$row['uname'];
            $balance=$row['balance'];
            if($raccount==$accname){
                $new_balance=$balance - $wamount;
                $sqlw="UPDATE useraccounts SET balance='$new_balance' WHERE accountno='$accno'";
                mysqli_query($conn,$sqlw);
                $sqln="INSERT INTO `notice` (`uname`, `accno`,`action`, `notice`) VALUES ('$accname','$accno','withdraw','$wamount is withdrawn from your account and remaining balance is $new_balance');";
                mysqli_query($conn,$sqln);
                echo "<script>alert('$wamount is withdrawn from $accno')</script>";
            }else{
                echo "account name doesn't match";
            }
            $sql2="SELECT * FROM staffs WHERE sname='$userId'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $cbalance=$row2['balance'];
            $new_cbalance=$cbalance+$wamount;
            $sqlcw="UPDATE staffs SET balance='$new_cbalance' WHERE sname='$userId'";
            mysqli_query($conn,$sqlcw);
        }
        ?>
</body>

</html>