<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer login</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
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
        <div class="table">
            <div align="center">
                <h2>Welcome!!</h2>
            </div>
            <form class="form" action="user_login.php" method="post">
                <input type="text" name="uname" id="uname" placeholder="Username">
                <input type="password" name="password" id="password" placeholder="Password"> 
                <button type="submit" name="submit">Submit</button>
            </form>
            <div class="open">
                <h5>don't have account??</h5>
                <a href="openaccount.php"><button>Open New</button></a>
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
    require "db.php";
    if(isset($_POST['submit'])){
    session_start();
    $uname=$_POST['uname'];
    $pass=$_POST['password'];
    if($uname=='' || $pass==''){
        header("location: user_login.php");
        exit();
    }
    $sql="SELECT * FROM useraccounts WHERE uname='$uname';";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $sname=$row['uname'];
        $spass=$row['password'];
        $status=$row['status'];
    }else{
        header("location: 404.php");
        exit();
    }
    if($uname==$sname && $pass==$spass && $status=='ACTIVE' || $status=='NEW'){
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["userId"] = $uname;  
        header("location: ./components/customer/customer_dashboard.php");
    }else{
        echo "<script>alert('Invalid login credentials or Inactive account');</script>";
    }
    }
    ?>
</body>
</html>