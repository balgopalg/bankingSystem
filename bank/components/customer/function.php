<?php
function makeTransaction($sendname,$accno,$amount,$recvname,$recvacc){
    $conn=mysqli_connect('localhost','root','','bank');


    $date=date('Y/m/d');
    $sql="INSERT INTO `transactions` (`sender`, `sendacc`, `amount`, `receiver`, `recvacc`, `date`) VALUES ('$sendname','$accno','$amount','$recvname','$recvacc','$date')";
    
    mysqli_query($conn,$sql);

    $sqlSend="SELECT * FROM useraccounts WHERE accountno='$accno'";
    
    $result=mysqli_query($conn,$sqlSend);
    $row=mysqli_fetch_array($result);
    $newSendBal=$row['balance'] - $amount;
    $sql3="UPDATE `useraccounts` SET `balance` = '$newSendBal' WHERE `useraccounts`.`accountno` = '$accno';";
    mysqli_query($conn,$sql3);

    $sqlRecv="SELECT * FROM useraccounts WHERE accountno='$recvacc'";
    $result1=mysqli_query($conn,$sqlRecv);
    $row1=mysqli_fetch_array($result1);
    $newRecvBal=$row1['balance'] + $amount;
    $sql4="UPDATE `useraccounts` SET `balance` = '$newRecvBal' WHERE `useraccounts`.`accountno` = '$recvacc';";
    mysqli_query($conn,$sql4);

    $sql5="INSERT INTO `cd`(`accno`, `description`, `credit`, `debit`, `balance`) VALUES ('$accno','transfer','-','$amount','$newSendBal');";
    $sql6="INSERT INTO `cd`(`accno`, `description`, `credit`, `debit`, `balance`) VALUES ('$recvacc','transfer','$amount','-','$newRecvBal');";

    mysqli_query($conn,$sql5);
    mysqli_query($conn,$sql6);

    $sql7="INSERT INTO `notice`(`uname`, `accno`,`action`, `notice`) VALUES ('$sendname','$accno','debit','Your account is debited with $amount rupees');";
    $sql8="INSERT INTO `notice`(`uname`, `accno`,`action`, `notice`) VALUES ('$recvname','$recvacc','credit','Your account is credited with $amount rupees');";

    mysqli_query($conn,$sql7);
    mysqli_query($conn,$sql8);
}
?>