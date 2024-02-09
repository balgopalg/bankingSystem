<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .hero{
            flex-direction:row;
            font-weight:600;
            justify-content:space-around;
        }
        .btn{
            font-weight:700;
            cursor: pointer;
        }
        .btn:hover{
            background-color: red;
            color: black;
        }
        .boxing{
            height:400px;
            overflow-x:hidden;
            overflow-y:auto;
        }
        
        .styled thead tr{
            position:sticky;
            top:0;
        }
        .cancel{
        background:lightblue;
        color:black;
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
                <li id="welcome" style="cursor:pointer;">WELCOME Manager(<?php echo $branchId?>)👋 <?php echo $userId ?></li>
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
                    <li style="background:#009879; color:white;">Add User</li>
                </a>
                <a href="loan_manager.php">
                    <li>Loan Management</li>
                </a>
                <a href="userStatus.php">
                    <li>Users status</li>
                </a>
                <a href="feedbackShow.php">
                    <li>Feedbacks</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div align="center" class="boxing">
            <form method="post" action="addUB.php">
                <button name="adduser"> Add User </button>
            </form>   
            <table class="styled">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Branch</th>
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
                    <button name="addbranch" > Add Branch </button>
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
        <!-- <div class="updates">
            <form method="post" action="addUB.php">
                <button name="adduser"> Add User </button>
                <button name="addbranch" > Add Branch </button>
            </form>    
        </div> -->
    </div>
    </main>
    <footer>
        <p>&copy; 2024 Railway Management System</p>
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