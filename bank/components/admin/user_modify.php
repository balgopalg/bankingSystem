<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .hero {
        flex-direction: row;
        font-weight: 600;
        justify-content: space-around;
    }

    .btn {
        font-weight: 700;
        cursor: pointer;
    }

    .btn:hover {
        background-color: red;
        color: black;
    }

    .boxing {
        height: 400px;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .styled thead tr {
        position: sticky;
        top: 0;
    }

    .cancel {
        background: lightblue;
        color: black;
        font-weight: 600;
        text-align: center;
        border: 1px solid rgb(15, 15, 40);
        cursor: pointer;
    }

    .cancel:hover {
        background: red;
        color: white;
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
            $sql="SELECT * FROM staffs WHERE sname='$userId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
        ?>

<body>
    <nav>
        <div class="logo">
            <a href="#"><img src="/bank/images/logo.jpg" alt=""></a>
            <h3>Bank of Bhadrak</h3>
        </div>
        <div class="icons">
            <ul>
                <li id="welcome" style="cursor:pointer;">WELCOME ADMIN👋
                    <a href="/bank/logout.php">
                <li id="logout">Logout</li>
                </a>
            </ul>
        </div>

    </nav>
    <main>
    <div class="dashboard">
            <ul class="elem">
                <a href="admin_dashboard.php">
                    <li >Users</li>
                </a>
                <a href="transaction_details.php">
                    <li>Transactions</li>
                </a>
                <a href="user_modify.php">
                    <li  style="background:#009879; color:white;">Modify Users</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div align="center" class="boxing">
                <form method="post" action="addUB.php">
                    <button name="adduser"> Add Staff </button>
                    <button name="addmoney"> Add money </button>
                </form>
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Branch</th>
                            <th>Balance</th>
                            <th colspan="2">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sql="SELECT * FROM staffs ";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        echo "
                        <tr><form method='post'>
                        <td>".$row['id']."</td>
                        <td>".$row['sname']."</td>
                        <td>".$row['branch']."</td>
                        <td>".$row['balance']."</td>
                        <td>".$row['role']."</td>
                        <input type='text' name='name' value='".$row['sname']."' hidden>
                        <td><button name='deleteuser' class='cancel'> Delete user</button></form></td>
                        </tr>
                        ";
                        } 
                    }else{
                        echo "<script>document.getElementsByClassName('hero')[0].innerHTML='No data found 🥲'</script>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div align="center" class="boxing">
                <form method="post" action="addUB.php">
                    <button name="addbranch"> Add Branch </button>
                </form>
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th colspan="2">Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sql="SELECT * FROM branch ";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        echo "
                        <tr><form method='post'>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['code']."</td>
                        <input type='number' name='branchId' value='".$row['id']."' hidden>
                        <td><button name='deletebranch' class='cancel'> Delete</button></form></td>
                        </tr>
                        ";
                        } 
                    }else{
                        echo "<script>document.getElementsByClassName('hero')[0].innerHTML='No data found 🥲'</script>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
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
        if(isset($_POST['deleteuser'])){
            $name=$_POST['name'];
            $sql="DELETE FROM `staffs` WHERE sname='$name';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('". $name ." is deleted from database')
                </script>";
                
            }
        }
        if(isset($_POST['deletebranch'])){
            $branchId=$_POST['branchId'];
            $sql="DELETE FROM `branch` WHERE id='$branchId';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('branch :". $branchId ." is deleted from database')</script>";
            }
        }
    ?>

</body>

</html>