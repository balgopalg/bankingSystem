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
            $sqlb="SELECT * FROM branch WHERE id='$branchId';";
            $result=mysqli_query($conn,$sqlb);
            $row=mysqli_fetch_array($result);
            $branchName=$row['name'];
        ?>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
                <li id="welcome" style="cursor:pointer;"> Branch : <?php echo $branchName?>(<?php echo $branchId?>)</li>
                <li id="welcome" style="cursor:pointer;">WELCOME MANAGER👋 <?php echo $userId ?></li>
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
                    <li>User status</li>
                </a>
                <a href="loan_manager.php">
                    <li>Loan Management</li>
                </a>
                <a href="feedbackShow.php">
                    <li style="background:#009879; color:white;">Feedbacks</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div align="center" class="boxing">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Subject</th>
                            <th>Feedback</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql="SELECT * FROM feedback WHERE branchId='$branchId' ORDER BY id desc";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        $username=$row['username'];
                        echo "
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['subject']."</td>
                        <td style='overflow-x:auto; max-width:400px'>".$row['feedback']."</td>
                        <td>
                        <form method='post'>
                            <input type='hidden' name='username' value='".$username."'>
                            <button name='delete' class='cancel' id='delete' class='cancel'>delete</button>
                            <button name='reply' class='cancel' id='reply' class='cancel'>reply</button>
                            </form></td>
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
    <?php
        if(isset($_POST['delete'])){
            $username=$_POST['username'];
            $sql="DELETE FROM `feedback` WHERE `feedback`.`username` = '$username';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('This message is deleted');</script>";

            }
        }
        if(isset($_POST['reply'])){
            $username=$_POST['username'];
            echo $username;
            $sql="SELECT * FROM useraccounts WHERE uname='$username'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $accno = $row['accountno'];
            echo $accno;
            // session_start();
            $_SESSION['accno'] = $accno;
            header("location: reply.php");
        }
    ?>

</body>

</html>