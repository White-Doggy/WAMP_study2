<html>
<title>고객 명단</title>
<body>
<?php
    
    $conn = mysql_connect('localhost','root','asadaf19') or die("MySQL 서버 연결 에러");
    mysql_select_db('bank',$conn);
    $result = mysql_query("select * from customer",$conn);  
    
    echo "<fieldset>";
    echo "<legend><H3> 고객명단 </H3></legend>";
    
    $rows = mysql_num_rows($result);   

    echo "<table border=2 bgcolor=white>\n";
    echo "<tr>\n";
    echo "<td>고객번호</td><td>이름</td><td>주소</td><td>직업</td><td>나이</td>\n";
    echo "</tr>\n"; 
    
    $i = 0;
    while ( $i < $rows ) {
        echo "<tr>\n";
        echo "\t<td>" . mysql_result($result, $i, cusNum) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, cusName) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, address) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, job) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, age) . "</td>\n";
        echo "</tr>\n";
        $i++;
    }
    
    echo "</table>\n";
    echo "</fieldset>";

    $result = mysql_query("select * from account",$conn);   
    
    echo "<fieldset>";
    echo "<legend><H3> 계좌목록 </H3></legend>";
    
    $rows = mysql_num_rows($result);   

    echo "<table border=2 bgcolor=white>\n";
    echo "<tr>\n";
    echo "<td>계좌번호</td><td>계좌유형</td><td>금액</td><td>고객번호</td>\n";
    echo "</tr>\n"; 
    
    $i = 0;
    while ( $i < $rows ) {
        echo "<tr>\n";
        echo "\t<td>" . mysql_result($result, $i, accountNum) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, type) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, money) . "</td>\n";
        echo "\t<td>" . mysql_result($result, $i, cusNum) . "</td>\n";
        echo "</tr>\n";
        $i++;
    }
    
    echo "</table>\n";
    echo "</fieldset>";
    
    mysql_free_result($result);
    mysql_close($conn);
?>
</body>
</html>
