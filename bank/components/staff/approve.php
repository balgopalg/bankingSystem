<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .result{
            height:400px;
        }
        .styled thead{
            position:sticky;
            top:0;
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
                    <li style="background:#009879; color:white;">Approve Applications</li>
                </a>
                <a href="employee_dashboard.php">
                    <li>Search User</li>
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
            <div class="result">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Account No</th>
                            <th>Name</th>
                            <th>Mobno</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Account type</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        $sql="SELECT * FROM useraccounts WHERE status='NEW';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
        $uname=$row['uname'];
        $name=$row['name'];
        $mobno=$row["mobno"];
        $email=$row['email'];
        $acctype=$row['acctype'];
        $source=$row['source'];
        $status=$row['status'];
        echo '
                        <tr>
                            <td>N/a</td>
                            <td>'.$name. '</td>
                            <td>'.$mobno. '</td>
                            <td>'.$email. '</td>
                            <td>N/a</td>
                            <td>'.$acctype. '</td>
                            <td>'.$source. '</td>
                            <td>'.$status. '</td>
                            <td><form method="post"><button name="approve" id="approve">approve</button><br>
                            <button name="reject" id="reject">reject</button>
                            <input type="hidden" name="uname" value="'.$uname.'"></form></td>';
        }
    }else{
        echo "<script>
        document.getElementsByClassName('hero')[0].innerHTML='No New Applications !! 😔 ';
        </script>";
    }
    ?>
                        </tr>
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
        if(isset($_POST['approve'])){
            $sql="SELECT * FROM staffs WHERE sname='$userId';";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $branchId=$row['branch'];
            $crn=generateRandomNumber(5);
            $accountno=generateRandomNumber(6);
            $date=date('Y/m/d');
            $uname=$_POST['uname'];
            $sqlapprove="UPDATE `useraccounts` SET `crn` = '$crn', `accountno` = '$accountno',`date`='$date',`branch`='$branchId',`balance`='0', `status` = 'ACTIVE' WHERE `useraccounts`.`uname` = '$uname';";
            if(mysqli_query($conn,$sqlapprove)){
                echo "<script>alert('you approved this account')</script>";
                header("location: approve.php");
            }
        }   
        if(isset($_POST['reject'])){
            $uname=$_POST['uname'];
            $sqlreject="DELETE FROM useraccounts WHERE `useraccounts`.`uname` = '$uname';";
            if(mysqli_query($conn,$sqlreject)){
                echo "<script>alert('you rejected this account');</script>";
                header("location: approve.php");
            }
        }
    ?>
</body>

</html>