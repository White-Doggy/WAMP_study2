<html>
<title>Show People in Table</title>
<body>
<?php

    $conn = mysql_connect('localhost','root','asadaf19'); // db 연결
    mysql_select_db('bank',$conn); // db연결
    
    $cus = $_POST["cusNum"];
    // 이전 html에서 post 형태로 넘겨받은 값들을 다시 변수에 할당시켜야 사용가능

    $result = mysql_query("select * from account where cusNum='$cus'",$conn);   
    //테이블 중 위에서 넘겨받은 고객번호와 같은 행의 데이터만으로 할당된 테이블

    echo "<h1>송금선택</h1>";
    echo "<fieldset>";
    echo "<legend><H3> 해당 고객번호 계좌 목록 ( id : $cus ) </H3></legend>";

    echo "<table border=2 bgcolor=white>\n";
    echo "<tr>\n";
    echo "<td>계좌번호</td><td>계좌유형</td><td>금액</td><td>고객번호</td>\n";
    echo "</tr>\n"; 

    echo '<form name="PHP" method=post action="calculation.php">';
    echo "<b>출금할 계좌를 선택해 주세요.</b><br>";
    while ( $row = mysql_fetch_array($result) ) {
        echo "<tr>\n";
        echo "\t<td><input type='radio' name='fromNum' value='".$row[accountNum]."'>" .$row[accountNum]. "</td>\n";
        echo "\t<td>" .$row[type]."</td>\n";
        echo "\t<td>" .$row[money]."</td>\n";
        echo "\t<td>" .$row[cusNum]."</td>\n";
        echo "</tr>\n";
        $i++;
    }
    echo "</table>\n";
    echo "</fieldset>";

    mysql_free_result($result);
    mysql_close($conn); // 연결해제

    echo "<fieldset>";
    echo '<br><b>송금할 금액을 입력 하세요.</b><br>';  
    echo '송금 금액 : <input type=text name="money"><br><br>';
    
    echo '<b>입금할 계좌번호를 입력 하세요.</b><br>';    
    echo '상대 계좌번호 : <input type=text name="toNum"><br><br>';
    
    echo '<input type=submit value="확인">';
    echo '<input type=reset value="취소">';
    echo '</form>';
    echo "</fieldset>";
?>

</body>
</html>
