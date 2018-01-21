<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql = "select count(*) from orderlist";    // 計算資料筆數
	$total = $pdo->query($sql);
	$rownum = $total->fetchcolumn();                            // 總共欄位數
	$perPage = 10;                                               // 每頁顯示筆數
	$totalpage = ceil($rownum / $perPage);                      // 計算總頁數
	$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
	// 若無當前頁數則進入第一頁 若有則進入該頁
	$start = ($pageNo - 1) * $perPage;   
	// 設定每頁呈現內容
    $sql = "select ARTICLE_REPORT_NO,ARTICLE_REPORT_TIME
            from article_report
            order by ARTICLE_REPORT_NO desc limit $start, $perPage";
    $reportno = $pdo->prepare($sql);
    $reportno->execute();

    $sql = "select m.MEM_ID ID
            from article_report a,member m
            where a.MEM_NO = m.MEM_NO";
    $reportid = $pdo->prepare($sql);
	$reportid->execute();
	$reportidRow = $reportid->fetchObject();
    $ID = $reportidRow->ID;

    if ($reportno->rowCount() == 0) {
        echo "<center>查無檢舉資料</center>";
    } else {
?>
                <table>
                    <tr>
                        <th>案件編號</th>
                        <th>檢舉人帳號</th>
                        <th>被檢舉人帳號</th>
                        <th>檢舉時間</th>
                        <th>審核領養案件</th>
                    </tr>
<?php
        while ($reportnoRow = $reportno->fetchObject()) {
?>
                    <tr>
                        <td><?php echo $reportnoRow->ARTICLE_REPORT_NO; ?></td>
                        <td><?php echo $ID; ?></td>
                        <td></td>
                        <td><?php echo $reportnoRow->ARTICLE_REPORT_TIME; ?></td>
                        <td>
                            <i class="fa fa-circle-o" aria-hidden="true" id="ensureBtn"></i>
                            <i class="fa fa-times cancel"></i>
                        </td>
                    </tr>
<?php
        }
    } //if...else
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>";
}
?>
                </table>
        <div class="page">
            <?php
                for ($i = 1; $i <= $totalpage; $i++) {
                    echo "<a href='?pageNo=$i' class='pageNo defaultBtn'>" . $i . "</a>";
                }
            ?>
        </div>