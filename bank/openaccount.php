<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>
    <link rel="stylesheet" href="./assets/style.css">
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
    <nav>
        <div class="logo">
        <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
        <h3>Bank of Bhadrak</h3>
        </div>
        <div>
            <a href="index.php"><button>Back</button></a>
        </div>
    </nav>
    <main>
        <div class="input-form table">
            <div align="center">
                <h2>Open Account</h2>
            </div>
            <form class="form-data form" action="" method="post">
                <input type="text" name="name" id="name" placeholder="Full Name" required>
                <input type="text" name="uname" id="uname" placeholder="Username" required>
                <input type="text" name="password" id="password" placeholder="Password" required>
                <input type="text" name="email" id="email" placeholder="Email" required>
                <input type="number" name="mobno" id="mobno" placeholder="Mobno" required>
                <input type="text" name="city" id="city" placeholder="City" required>
                <input type="text" name="address" id="address" placeholder="Address" required>
                <input type="text" name="income" id="income" placeholder="Designation" required>
                <select name="acctype" id="acctype">
                    <option value="savings">Savings</option>
                    <option value="current">Current</option>
                </select>
                <input type="number" name="aadhaar" id="aadhaar" placeholder="Aadhaar No" required>
                <input type="text" name="pan" id="pan" placeholder="PAN No" required>
                <button  type="submit" name="submit" onclick="submitted()">Submit</button>
            </form>
        </div>
    </main>
    <footer style="display:flex; justify-content:flex-end; gap:12px; transform:translateX(-26px);"> 
            <div>&copy; 2024 Bank of Bhadrak</div>
            <div><a href="/bank/privacy.php">. Privacy</a></div>
            <div><a href="/bank/terms.php">. Terms</a></div>
            <div><a href="/bank/bankDetails.php">. Bank Details</a></div>
    </footer>

    <script>
        function submitted(){
            alert("Application submitted for review !! You can login anytime for status");
        }
    </script>

    <?php
        require "db.php";

        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $uname=$_POST['uname'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $mobno=$_POST['mobno'];
            $city=$_POST['city'];
            $address=$_POST['address'];
            $income=$_POST['income'];
            $acctype=$_POST['acctype'];
            $aadhaar=$_POST['aadhaar'];
            $pan=$_POST['pan'];

            $sql= "INSERT INTO `useraccounts`(`uname`,`password`,`aadhaarno`,`panno`,`name`, `email`, `mobno`,`city`,`address`, `source`, `acctype`) VALUES ('$uname','$password','$aadhaar','$pan','$name','$email','$mobno','$city','$address','$income','$acctype');";

            if(mysqli_query($conn,$sql)){
                header("location: index.php");
            }
        }
    ?>
</body>
</html>