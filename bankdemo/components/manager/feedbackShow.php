<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
    .row {
        font-size: 14px;
        padding: 4px;
    }

    .hero {
        overflow-x: hidden;
        overflow-y: auto;
    }

    .styled thead {
        position: sticky;
        top: 0;
    }

    .cancel {
        background: rgb(15, 15, 40);
        color: white;
        font-weight: 600;
        text-align: center;
        border: 1px solid rgb(15, 15, 40);
        cursor: pointer;
    }

    .cancel:hover {
        background: red;
        color: white;
    }

    .boxing{
        height:400px;
        width:80vw;
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
                    <li>Add User</li>
                </a>
                <a href="loan_manager.php">
                    <li>Loan Management</li>
                </a>
                <a href="userStatus.php">
                    <li>Users status</li>
                </a>
                <a href="feedbackShow.php">
                    <li style="background:#009879; color:white;">Feedbacks</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <div align="center" class="boxing">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Subject</th>
                            <th>Feedback</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sql="SELECT * FROM feedback ORDER BY id desc";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        $username=$row['username'];
                        echo "
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['subject']."</td>
                        <td style='overflow-x:auto; max-width:400px'>".$row['feedback']."</td>
                        <td>
                        <form method='post'>
                            <input type='hidden' name='username' value='".$username."'>
                            <button name='delete' class='cancel' id='delete' class='cancel'>delete</button>
                            </form></td>
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
    </main>
    <footer>
        <p>&copy; 2024 Railway Management System</p>
    </footer>
    <?php
        if(isset($_POST['delete'])){
            $username=$_POST['username'];
            $sql="DELETE FROM `feedback` WHERE `feedback`.`username` = '$username';";
            if(mysqli_query($conn,$sql)){
                echo "<script>alert('This message is deleted');</script>";

            }
        }
    ?>
</body>

</html>