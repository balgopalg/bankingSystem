<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
    <?php
            session_start();
            $userId=$_SESSION['userId'];
            if($_SESSION["loggedin"] == false){
                header('location:/bank/index.php');
            }
            require "db.php";
            $sqlr="SELECT * FROM staffs WHERE sname='$userId'";
            $resultr=mysqli_query($conn,$sqlr);
            $rowr=mysqli_fetch_array($resultr);
            $branchId=$rowr['branch'];
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
                <li id="welcome" style="cursor:pointer;">WELCOME EMPLOYEE👋 <?php echo $userId ?></li>
                <a href="/bank/logout.php">
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
                <a href="employee_dashboard.php">
                    <li style="background:#009879; color:white;">Search User</li>
                </a>
                <a href="message.php">
                    <li>Message Penal</li>
                </a>
                <a href="depoWithdraw.php">
                    <li>Deposite/Credit</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div>
                <form class="search input-form" action="" method="post">
                    <input type="number" name="accno" id="accno" placeholder="Enter account number">
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>
            <div class="error">
            </div>
            <?php
        if(isset($_POST['submit'])){
        $accno=$_POST['accno'];
        $sql="SELECT * FROM useraccounts WHERE accountno='$accno';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        
            echo '<div class="result">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Account No</th>
                            <th>Name</th>
                            <th>Mobno</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Account type</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$row["accountno"] . '</td>
                            <td>'.$row["name"]. '</td>
                            <td>'.$row["mobno"]. '</td>
                            <td>'.$row["email"]. '</td>
                            <td>'.$row["branch"]. '</td>
                            <td>'.$row["acctype"]. '</td>
                            <td>'.$row["balance"]. '</td>
                            <td>'.$row["status"]. '</td>
                            <form action="updateProfile.php" method="post">
                            <input type="hidden" name="accno" value="'.$row['accountno'].'">
                            <td><button class="btn" name="update">Update</button></td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div> ';
            }else{
                echo "<script>
                document.getElementsByClassName('error')[0].innerHTML='Invalid Account Number!! 🤨 ';
                </script>";
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