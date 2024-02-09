<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        .active{
            display: none;
        }
    </style>
    <?php
            session_start();
            $userId=$_SESSION['userId'];
            require "db.php";
            $sqlr="SELECT * FROM staffs WHERE sname='$userId'";
            $resultr=mysqli_query($conn,$sqlr);
            $rowr=mysqli_fetch_array($resultr);
            $branchId=$rowr['branch'];
    ?>

    <script>
        function showInputForm(inputType) {
            var accnoInput = document.getElementById("accno");
            var accnameInput = document.getElementById("accname");

            if (inputType === "username") {
                accnoInput.classList.add("active");
                accnameInput.classList.remove("active");
            } else if (inputType === "accountno") {
                accnoInput.classList.remove("active");
                accnameInput.classList.add("active");
            }
        }
    </script>
</head>
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
            <li id="welcome" style="cursor:pointer;">WELCOME Cashier(<?php echo $branchId?>)👋 <?php echo $userId ?></li>
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
                <a href="approve.php">
                    <li>Approve Applications</li>
                </a>
                <a href="cashier_dashboard.php">
                    <li style="background:#009879; color:white;">Search User</li>
                </a>
                <a href="message.php">
                    <li>Message Penal</li>
                </a>
            </ul>
        </div>
        <div class="hero">
        <div>
            <form class="search input-form" action="" method="post">
                <div>
                    Search by .. <button onclick="showInputForm('username')"> username </button>or<button onclick="showInputForm('accountno')"> accountno </button>
                </div>
                <br>
                <input type="number" name="accno" id="accno" placeholder="Enter account number" class="active">
                <input type="text" name="accname" id="accname" placeholder="Enter username">
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <div class="error">
            </div>
            <?php
        
        if(isset($_POST['submit'])){
        $accno=$_POST['accno'];
        $sql="SELECT * FROM useraccounts WHERE accountno='$accno';";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        
            echo '<div class="result">
                <table class="styled">
                    <thead>
                        <tr>
                            <th>Account No</th>
                            <th>CRN no</th>
                            <th>Name</th>
                            <th>Mobno</th>
                            <th>Email</th>
                            <th>Branch</th>
                            <th>Account type</th>
                            <th>Balance</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$row["accountno"] . '</td>
                            <td>'.$row["crn"].'</td>
                            <td>'.$row["name"]. '</td>
                            <td>'.$row["mobno"]. '</td>
                            <td>'.$row["email"]. '</td>
                            <td>'.$row["branch"]. '</td>
                            <td>'.$row["acctype"]. '</td>
                            <td>'.$row["balance"]. '</td>
                            <td>'.$row["status"]. '</td>
                        </tr>
                    </tbody>
                </table>
            </div> ';
            }else{
                echo "<script>
                document.getElementsByClassName('error')[0].innerHTML='Invalid Account Number!! 🤨 ';
                </script>";
            }
        }
    ?>

    </div>
        <!-- Rest of the code -->
    </main>
    <footer>
        <!-- Footer code here -->
    </footer>
</body>
</html>
