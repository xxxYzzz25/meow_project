<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/backMemManage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>會員帳號管理</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="backMemManage.php" title="會員帳號管理">會員帳號管理</a>
                </li>
                <li>
                    <a href="backEmpManage.html" title="員工帳號管理">員工帳號管理</a>
                </li>
                <li>
                    <a href="backHalfWay.html" title="中途之家審核">中途之家審核</a>
                </li>
                <li>
                    <a href="backReport.html" title="檢舉審核">檢舉審核</a>
                </li>
                <li>
                    <a href="backOrderlist.html" title="訂單管理">訂單管理</a>
                </li>
                <li>
                    <a href="backAdobtRecord.html" title="領養紀錄查詢">領養紀錄查詢</a>
                </li>
                <li>
                    <a href="backSaleRecord.html" title="銷售紀錄查詢">銷售紀錄查詢</a>
                </li>
                <li>
                    <a href="backProduct.html" title="寵物商品上下架">寵物商品上下架</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="right">
        <div class="container container1">
            <div class="bigImg">
                <img src="../images/back/catAdoptRecord.jpg" alt="">
            </div>
            <div class="empManage">
                <table>
                    <tr>
                        <th>會員帳號</th>
                        <th>停權狀態</th>
                        <th>取消停權</th>
                    </tr>
    <?php
        require_once("../php/connectBD103G2.php");

        $sql = "select count(1) from member where `MEM_BAN` = 1";	// 計算資料筆數
        $total = $pdo->query($sql);
        $rownum = $total->fetchcolumn(); 		                    // 總共欄位數
        $perPage = 2;                                               // 每頁顯示筆數
        $totalpage = ceil($rownum / $perPage);	                    // 計算總頁數
        $pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
                                                                    // 若無當前頁數則進入第一頁 若有則進入該頁
        $start = ($pageNo - 1)* $perPage;		                    // 計算起始頁數
        $sql="select * from member where `MEM_BAN` = 1 limit $start, $perPage";
                                                                    // 設定每頁呈現內容
        $member = $pdo -> query( $sql );
        $memRow = $member->fetchAll(PDO::FETCH_ASSOC);
        if ($rownum == 0) {
            echo "<tr><td colspan='3'>'太好了, 這裡沒有被停權的帳號！'</td></tr>";
        }else{
            try {
                foreach( $memRow as $i => $mem_Row ){
    ?>
                    <form action="../php/MEM_BAN_Update.php" method="get">
                        <tr>
                            <td>
                                <input type="text" name="memId" readonly="readonly" value="<?php echo $mem_Row['MEM_ID'] ?>">
                            </td>
                            <td>停權中</td>
                            <td>
                                <input type="submit">
                            </td>
                        </tr>
                    </form>
    <?php
            }
            } catch (PDOException $e) {
                echo "錯誤原因 : " , $e->getMessage() , "<br>";
                echo "錯誤行號 : " , $e->getLine() , "<br>";
            }
        
    ?>
                    <tr>
                        <td colspan="3">
                            <a href="?pageNo=1">第一頁</a>
                            <?php
                                for($i=1;$i<=$totalpage;$i++){
                                    echo '<a href="?pageNo='.$i.'"class="defaultBtn">'.$i.'</a> ';
                                }
                                $i = $i-1;
                                echo '<a href="?pageNo='.$i.'">最後一頁</a> ';
        }
                            ?>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>