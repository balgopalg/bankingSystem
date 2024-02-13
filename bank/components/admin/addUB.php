<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.8);
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .wrapper .title h1 {
        color: #c5ecfd;
        text-align: center;
        margin-bottom: 25px;
    }

    .contact-form {
        display: flex;
        padding:25px;
        height:250px;
    }

    .input-fields {
        display: flex;
        flex-direction: column;
        margin-right: 4%;
    }

    .input-fields .input,
    .msg textarea {
        margin: 10px 0;
        background: transparent;
        border: 0px;
        border-bottom: 2px solid #c5ecfd;
        padding: 10px;
        color: #c5ecfd;
        width: 100%;
    }

    .msg textarea {
        height: 130px;
    }

    .btn {
        margin-top: 1rem;
        cursor: pointer;
        font-weight: 700;
    }

    .msg .btn:hover {

        background-color: greenyellow;
        color: black;

    }
    .cancel{
        background:rgb(15, 15, 40);
        color:white;
        font-weight:600;
        text-align:center;
        border:1px solid rgb(15, 15, 40);
        cursor: pointer;
    }
    .cancel:hover{
        background:red;
        color:white;
    }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
    </nav>
    <form method="post">
        <div class="wrapper">
        <div>
            <a href="/bank/components/admin/admin_dashboard.php"><input class="cancel" type="button" value="Back"></a>
        </div>
        <?php
        if(isset($_POST['addbranch'])){
        echo '
            <div class="title">
            </div>
            <div class="contact-form">
                <div class="input-fields">
                    <form method="post" action="addUB.php">
                    <input type="text" name="bid" class="input" placeholder="Branch Id">
                    <input type="text" name="bname" class="input" placeholder="Branch Name">
                    <input type="text" name="bcode" class="input" placeholder="Branch Code">
                    <input name="bsubmit" style="padding:6px;  background:yellowgreen; color:black; font-weight:600;" type="submit">
                    <a href="/bank/index.php"><input class="cancel" value="Cancel" style="text-align:center;"></a>
                    </form>
                </div>
            </div> ';
        }
        if(isset($_POST['adduser'])){
            echo '
                <div class="title">
                </div>
                <div class="contact-form">
                    <div class="input-fields">
                        <form method="post" action="">
                        <input type="text" name="name" class="input" placeholder="Staff Name" required>
                        <input type="text" name="pass" class="input" placeholder="Password" required>
                        <input type="text" name="bcode" class="input" placeholder="Branch Code" required>
                        <select class="select" style="padding:6px;" name="role" required>
                        <option style="padding:6px;" value="manager">Manager</option>
                        <option style="padding:6px;" value="employee">employee</option></select>
                        <input name="usubmit" style="padding:6px;  background:yellowgreen; color:black; font-weight:600" type="submit">
                        <a href="/bank/index.php"><input class="cancel" value="Cancel" style="text-align:center;"></a>
                        </form>
                    </div>
                </div> ';
            }
            if(isset($_POST['addmoney'])){
                echo '
                    <div class="title">
                    </div>
                    <div class="contact-form">
                        <div class="input-fields">
                            <form method="post" action="">
                            <input type="text" name="id" class="input" placeholder="Staff id" required>
                            <input type="text" name="name" class="input" placeholder="Staff Name" required>
                            <input type="number" name="amount" class="input" placeholder="Enter amount" required> 
                            <input name="msubmit" style="padding:6px;  background:yellowgreen; color:black; font-weight:600" type="submit">
                            <a href="/bank/index.php"><input class="cancel" value="Cancel" style="text-align:center;"></a>
                            </form>
                        </div>
                    </div> ';
                }
        ?>
        </div>
    </form>
    <?php
    require "db.php";
    if(isset($_POST['bsubmit'])){
        $bid=$_POST['bid'];
        $bname=$_POST['bname'];
        $bcode=$_POST['bcode'];
        $sql="INSERT INTO `branch`(`id`, `name`, `code`) VALUES ('$bid','$bname','$bcode');";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('branch :". $bid ." is inserted to database')</script>";
        }
    }
    if(isset($_POST['usubmit'])){
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $bcode=$_POST['bcode'];
        $role=$_POST['role'];
        $sql="INSERT INTO `staffs`(`sname`, `password`, `branch`, `role`) VALUES ('$name','$pass','$bcode','$role')";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('user :". $name ." is created ')
            </script>";
        }
    }
    if(isset($_POST['msubmit'])){
        $staffId=$_POST['id'];
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $sql="SELECT * FROM staffs WHERE sname='$name' AND id='$staffId';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            $balance=$row['balance'];
            $new_balance=$balance + $amount;
            $updateBal="UPDATE staffs SET balance= '$new_balance' WHERE sname='$name' or id='$staffId';";
            if(mysqli_query($conn,$updateBal)){
                echo "<script>alert('Money updated');</script>";
            }
        }else{
            echo "<script>alert('account info not match !');</script>";
        }
    }
    ?>
</body>

</html>