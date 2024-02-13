<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>
    <link rel="stylesheet" href="/bank/assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
        }
    </style>
</head>
<body>
    <?php
    $conn=mysqli_connect('localhost','root','','bank');
    if(isset($_POST['update'])){
        $accno=$_POST['accno'];
        $rdata="SELECT * FROM useraccounts WHERE accountno='$accno'";
        $result = mysqli_query($conn,$rdata);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_array($result);
            $name=$row['name'];
            $uname=$row['uname'];
            $password=$row['password'];
            $email=$row['email'];
            $mobno=$row['mobno'];
            $city=$row['city'];
            $address=$row['address'];
            $source=$row['source'];
            $aadhaar=$row['aadhaarno'];
            $pan=$row['panno'];
        }
    }
    ?>
    <nav>
        <div class="logo">
        <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div>
            <a href="/bank/components/staff/employee_dashboard.php"><button>Back</button></a>
        </div>
    </nav>
    <main>
        <div class="input-form table" id="tab">
            <div align="center">
                <h2>Update Account no . <?php echo $accno ?></h2>
            </div>
            <form class="form-data form" action="" method="post">
                <input type="hidden" name="accno" id="accno" value="<?php echo $accno?>">
                <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Name">
                <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>" placeholder="Username" >
                <input type="text" name="password" id="password" value="<?php echo $password; ?>" placeholder="Password">
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email">
                <input type="number" name="mobno" id="mobno" value="<?php echo $mobno; ?>" placeholder="Mobile no">
                <input type="text" name="city" id="city" value="<?php echo $city; ?>" placeholder="city">
                <input type="text" name="address" id="address" value="<?php echo $address; ?>" placeholder="Address">
                <input type="text" name="income" id="income" value="<?php echo $source; ?>" placeholder="Designation" >
                <input type="number" name="aadhaar" id="aadhaar" value="<?php echo $aadhaar; ?>" placeholder="Aadhaar no">
                <input type="text" name="pan" id="pan" value="<?php echo $pan; ?>" placeholder="Panno">
                <button  type="submit" name="submit">Submit</button>
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
        require "db.php";

        if(isset($_POST['submit'])){
            $accno=$_POST['accno'];
            $name=$_POST['name'];
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $mobno=$_POST['mobno'];
            $city=$_POST['city'];
            $address=$_POST['address'];
            $income=$_POST['income'];
            $aadhaar=$_POST['aadhaar'];
            $pan=$_POST['pan'];

            $sql="UPDATE `useraccounts` SET `uname`='$uname',`password`='$password',`aadhaarno`='$aadhaar',`panno`='$pan',`name`='$name',`email`='$email',`mobno`='$mobno',`address`='$address',`source`='$income' WHERE accountno='$accno';";

            if(mysqli_query($conn,$sql)){
                echo "<script>document.getElementById('tab').innerHTML='Profile Updated 🙂'</script>";
            }
        }
    ?>
</body>
</html>