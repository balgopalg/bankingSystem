<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
</head>
<?php
            require "db.php";
            session_start();
            $userId=$_SESSION['userId'];
            
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
                <li id="welcome">WELCOME CASHIER👋 <?php echo $userId ?></li>
                <a href="">
                    <li>Notice</li>
                </a>
                <a href="">
                    <li>Contact</li>
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
                <a href="approve.php">
                    <li style="background:#009879; color:white;">Approve Applications</li>
                </a>
                <a href="cashier_dashboard.php">
                    <li >Search User</li>
                </a>
                <a href="message.php">
                    <li>Message Penal</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div class="result">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Account No</th>
                            <th>CRN no</th>
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
        $sql="SELECT * FROM useraccounts WHERE status='INACTIVE';";
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
    <footer>
        <p>&copy; 2024 Railway Management System</p>
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
            }
        }   
        if(isset($_POST['reject'])){
            $uname=$_POST['uname'];
            $sqlreject="DELETE FROM useraccounts WHERE `useraccounts`.`uname` = '$uname';";
            if(mysqli_query($conn,$sqlreject)){
                echo "<script>alert('you rejected this account');</script>";
            }
        }
    ?>
</body>

</html>


