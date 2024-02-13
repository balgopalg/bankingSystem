<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .hero{
            flex-direction:column;
            font-weight:600;
            justify-content:center;
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

<body>
    <?php
    require "db.php";
    $staffs="SELECT COUNT(*) as staffcount FROM staffs;";
    $managers="SELECT COUNT(*) as managercount FROM staffs WHERE role='manager';";
    $employee="SELECT COUNT(*) as employeecount FROM  staffs WHERE role='employee';";
    $customer="SELECT COUNT(*)  as customercount FROM useraccounts; ";
    $result1=mysqli_query($conn,$staffs);
    $result2=mysqli_query($conn,$managers);
    $result3=mysqli_query($conn,$employee);
    $result4=mysqli_query($conn,$customer);

    $row1=mysqli_fetch_array($result1);
    $row2=mysqli_fetch_array($result2);
    $row3=mysqli_fetch_array($result3);
    $row4=mysqli_fetch_array($result4);
    
    $staffcount=$row1['staffcount'];
    $managercount=$row2['managercount'];
    $employeecount=$row3['employeecount'];
    $customercount=$row4['customercount'];
    
    ?>
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
                    <li  style="background:#009879; color:white;">Users</li>
                </a>
                <a href="transaction_details.php">
                    <li>Transactions</li>
                </a>
                <a href="user_modify.php">
                    <li>Modify Users</li>
                </a>
            </ul>
        </div>
        <div class="hero">
            <h4>Users summary</h4><br>
            <div class="column">
                <div class="row">
                    <div>
                        Total Staffs:
                    </div>
                    <div>
                        <?php echo $staffcount?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Total Managers
                    </div>
                    <div>
                        <?php echo $managercount ?>
                    </div>
                </div>
                
                <div class="row">
                    <div>
                        Total employees:
                    </div>
                    <div>
                        <?php echo $employeecount ?>
                    </div>
                </div>
                <div class="row">
                    <div>
                        Total customers:
                    </div>
                    <div>
                        <?php echo $customercount ?>
                    </div>
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
</body>

</html>