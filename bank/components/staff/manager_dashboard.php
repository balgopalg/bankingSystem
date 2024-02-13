<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status</title>
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
    .action{
        display:flex;
        flex-direction:column;
    }
    .styled{
        scale:0.9;
        transform:translateY(10px);
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
            $sql1="SELECT * FROM staffs WHERE sname='$userId'";
            $result=mysqli_query($conn,$sql1);
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
                    <li style="background:#009879; color:white;">User status</li>
                </a>
                <a href="loan_manager.php">
                    <li>Loan Management</li>
                </a>
                <a href="feedbackShow.php">
                    <li>Feedbacks</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div align="center" class="boxing">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Accno</th>
                            <th>Username</th>
                            <th>Mobile no</th>
                            <th>Balance</th>
                            <th>Loan amount</th>
                            <th>Loan Due</th>
                            <th>Status</th>
                            <th>Date Of Joining</th>
                            <th colspan="2" align="center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sql="SELECT * FROM useraccounts WHERE branch='$branchId'";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        echo "
                        <tr>
                        <td>".$row['accountno']."</td>
                        <td>".$row['uname']."</td>
                        <td>".$row['mobno']."</td>
                        <td>".$row['balance']."</td>
                        <td>".$row['loanamt']."</td>
                        <td>".$row['loandue']."</td>
                        <td>".$row['status']."</td>
                        <td>".$row['date']."</td>
                        <td>
                        <form method='post'>
                            <input type='hidden' name='username' value='".$row['uname']."'>
                            <button name='delete' class='cancel' id='delete' class='cancel'>delete</button>
                        <td class='action'>    
                            <button name='active' class='cancel' id='active' class='cancel'>Active</button>
                            <button name='inactive' class='cancel' id='inactive' class='cancel'>Inactive</button>
                        </td>    
                            </form></td>
                        </tr>
                        ";
                        } 
                    }else{
                        echo "<script>document.getElementsByClassName('hero')[0].innerHTML='No account found 🥲'</script>";
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
            echo $username;
            $sql="DELETE FROM `useraccounts` WHERE `uname` = '$username';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('This account is deleted');</script>";

            }
        }
        if(isset($_POST['active'])){
            $username=$_POST['username'];
            $sql="UPDATE `useraccounts` SET `status`='ACTIVE' WHERE `uname` = '$username';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('This account is now active');</script>";
            }
        }    
        if(isset($_POST['inactive'])){
            $username=$_POST['username'];
            $sql="UPDATE `useraccounts` SET `status`='INACTIVE' WHERE `uname` = '$username';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('This account is flaged inactive');</script>";
            }
        }    
    ?>
</body>
</html>