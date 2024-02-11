<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback review</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .row {
        font-size: 14px;
        padding: 4px;
    }

    .hero {
        overflow-x: hidden;
        overflow-y: auto;
    }

    .styled thead {
        position: sticky;
        top: 0;
    }

    .cancel {
        background: rgb(15, 15, 40);
        color: white;
        font-weight: 600;
        text-align: center;
        border: 1px solid rgb(15, 15, 40);
        cursor: pointer;
    }

    .cancel:hover {
        background: red;
        color: white;
    }

    .boxing{
        height:400px;
        width:80vw;
    }
    .notice {
        scale: 0.9;
        top: 50;
        bottom: 50;
        height: 400px;
        width:50vw;
    }
    input:last-child {
        background: #000;
        padding: 6px;
    }
    input{
        margin-top:30px;
    }
    textarea{
        background:rgb(15, 15, 40);
        color:white;
        font-size:1rem;
    }
    #submit{
        font-weight:600;
    }
    #submit:hover{
        background:yellowgreen;
        cursor:pointer;
        color:black;
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
            $sql="SELECT * FROM staffs WHERE sname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $branchId=$row['branch'];
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
                <li id="welcome" style="cursor:pointer;">WELCOME Manager(<?php echo $branchId?>)👋 <?php echo $userId ?></li>
                <a href="/bank/logout.php">
                    <li id="logout">Logout</li>
                </a>
            </ul>
        </div>

    </nav>
    <main>
        <div class="dashboard">
            <ul class="elem">
                <a href="manager_dashboard.php">
                    <li>Add User</li>
                </a>
                <a href="loan_manager.php">
                    <li>Loan Management</li>
                </a>
                <a href="userStatus.php">
                    <li>Users status</li>
                </a>
                <a href="feedbackShow.php">
                    <li style="background:#009879; color:white;">Feedbacks</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <form class="form notice" action="" method="post">
                <div>
                    <h3>Send Your reply</h3>
                </div><br>
                <?php
                $accno=$_SESSION['accno'];

                echo "
                <input type='number' name='accno' value='".$accno."' hidden>";
                ?>
                <label for="notice">Enter you message below:</label>
                <textarea name="notice" id="notice" cols="30" rows="10"></textarea>
                <input id="submit" name="submit" type="submit" value="SEND" onclick="submitted()">
            </form>
        </div>
    </main>
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>
    <?php
       if(isset($_POST['submit'])){
        
        $accno=$_POST['accno'];
        $notice=$_POST['notice'];
        $sql="INSERT INTO `notice` (`accno`, `notice`) VALUES ('$accno','$notice');";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Reply sent');</script>";
        }
     }
    ?>
</body>

</html>