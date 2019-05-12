<html>
<title>Show People in Table</title>
<body>
<?php
    $conn = mysql_connect('localhost','root','asadaf19'); // db 연결
    mysql_select_db('bank',$conn); // db연결
    
    $from = $_POST["fromNum"];
    $to = $_POST["toNum"];
    $money = $_POST["money"];
    // 이전 html에서 post 형태로 넘겨받은 값들을 다시 변수에 할당시켜야 사용가능

    $result1 = mysql_query("select * from account where accountNum='$from'",$conn); 
    $result2 = mysql_query("select * from account where accountNum='$to'",$conn);
    //테이블 중 위에서 넘겨받은 고객번호와 같은 행의 데이터만으로 할당된 테이블
    
    echo "<fieldset>";
    echo "<legend><H3> 결과 </H3></legend>";

    if( mysql_result($result1, 0, money)<$money){
        echo "잘못된 금액을 입력 하셨습니다.<br>다시 진행해 주세요.";
    }   
    elseif ($to!=mysql_result($result2, 0, accountNum)) {
        echo "잘못된 계좌번호를 입력 하셨습니다.<br>다시 진행해 주세요.";
    }
    else {
        mysql_query("UPDATE account SET money=money-$money where accountNum=$from");        
        mysql_query("UPDATE account SET money=money+$money where accountNum=$to");      

        $result1 = mysql_query("select * from account where accountNum='$from'",$conn); 
        $result2 = mysql_query("select * from account where accountNum='$to'",$conn);
                
        echo "<h3>".$money."원을 송금하였습니다.</h3><br>";
        echo "보내신분 계좌번호와 잔액 : ".mysql_result($result1, 0, accountNum)." / ".mysql_result($result1, 0, money)."원";
        echo "<br>";
        echo "받으신분 계좌번호와 잔액 : ".mysql_result($result2, 0, accountNum)." / ".mysql_result($result2, 0, money)."원";

    }

    echo "</fieldset>";

    mysql_free_result($result1);
    mysql_free_result($result2);
    mysql_close($conn); // 연결해제
?>

</body>
</html>
