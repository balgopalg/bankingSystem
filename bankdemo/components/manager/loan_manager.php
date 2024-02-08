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
                <li id="welcome">WELCOME MANAGER👋 <?php echo $userId ?></li>
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
                <a href="manager_dashboard.php">
                    <li>Add User</li>
                </a>
                <a href="loan_manager.php">
                    <li style="background:#009879; color:white;">Loan Management</li>
                </a>
                <a href="feedbackShow.php">
                    <li>Users status</li>
                </a>
                <a href="feedbackShow.php">
                    <li>Feedbacks</li>
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
                            <th>Amount</th>
                            <th>Reason</th>
                            <th colspan="2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        $sql="SELECT * FROM loanapp WHERE status='INPROCESS';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
        $accno=$row['accno'];
        $name=$row['name'];
        $amount=$row['amount'];
        $reason=$row['reason'];
        $status=$row['status'];
        echo '
                        <tr>
                            <td>'.$accno. '</td>
                            <td>'.$name. '</td>
                            <td>'.$amount. '</td>
                            <td>'.$reason. '</td>
                            <td>'.$status. '</td>
                            <td><form method="post"><button name="approve" id="approve">approve</button><br>
                            <button name="reject" id="reject">reject</button>
                            <input type="hidden" name="accno" value="'.$accno.'"></form></td>';
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
            $ret="SELECT * FROM useraccounts WHERE accountno='$accno';";
            $result=mysqli_query($conn,$ret);
            $row=mysqli_fetch_array($result);
            $loanAmount=$row['loanamt'] + $amount;
            $loanDue=$row['loandue'] + $amount;
            $sql="UPDATE `useraccounts` SET `loanamt`='$loanAmount' ,`loandue`='$loanDue' WHERE accountno='$accno';";
            mysqli_query($conn,$sql);
            $sql1="UPDATE `loanapp` SET `status`='Senctioned' WHERE accno='$accno';";
            
            $sql8="INSERT INTO `notice` (`uname`, `accno`,`action`, `notice`) VALUES ('$name','$accno','loanSenction','your $amount rupees loan is senctioned');";
            mysqli_query($conn,$sql8);
            if(mysqli_query($conn,$sql1)){
                echo "<script>alert('Loan is senctioned to this account')</script>";
            }
        }   
        if(isset($_POST['reject'])){
            $sql1="UPDATE `loanapp` SET `status`='Rejected' WHERE accno='$accno';";
            if(mysqli_query($conn,$sql)){
                if(mysqli_query($conn,$sql1)){
                    echo "<script>alert('Loan is rejected')</script>";
                }
            }
        }
    ?>
</body>

</html>


