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

    select{
        height:50px;
    }
    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img
                    src="https://media.licdn.com/dms/image/D4D0BAQH3yDpggvrleQ/company-logo_200_200/0/1687778014361?e=2147483647&v=beta&t=zvfzlAMBSEZcBi_ybuqdjO2ZERRgKBLOiTXbchBupow"
                    alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
    </nav>
    <form method="post">
        <div class="wrapper">
        <div>
            <a href="/bankdemo/components/manager/manager_dashboard.php"><input type="button" value="Back"></a>
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
                    <input name="bsubmit" type="submit" class="btn">
                    <a href="/bankdemo/index.php"><input class="cancel" value="Cancel" style="text-align:center;"></a>
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
                        <input type="text" name="name" class="input" placeholder="Staff Name">
                        <input type="text" name="pass" class="input" placeholder="Password">
                        <input type="text" name="bcode" class="input" placeholder="Branch Code">
                        <select name="role">
                        <option value="manager">Manager</option>
                        <option value="cashier">Cashier</option></select>
                        <input name="usubmit" type="submit" class="btn">
                        <a href="/bankdemo/index.php"><input class="cancel" value="Cancel" style="text-align:center;"></a>
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
            echo "<script>alert('user :". $name ." is created ')</script>";
        }
    }
    ?>
</body>

</html>