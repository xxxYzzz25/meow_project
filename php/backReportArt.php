<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql = "select count(1) from article_report where audit_status = 0";    // 計算資料筆數
	$total = $pdo->query($sql);
	$rownum = $total->fetchcolumn();                            // 總共欄位數
	$perPage = 10;                                               // 每頁顯示筆數
	$totalpage = ceil($rownum / $perPage);                      // 計算總頁數
	$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
	// 若無當前頁數則進入第一頁 若有則進入該頁
	$start = ($pageNo - 1) * $perPage;   
	// 設定每頁呈現內容
    $sql = "
        select r.article_report_no, r.article_report_narrative, a.article_title, m.mem_name, h.half_name, a.mem_no, a.half_no
        from ((article_report r left join article a on r.article_no = a.article_no ) left join member m on m.mem_no = a.mem_no) left join halfway_member h on h.half_no = a.half_no
        where r.audit_status = 0
        order by ARTICLE_REPORT_NO desc
        limit $start, $perPage";
    $report = $pdo->query($sql);
    $reportRow = $report->fetchAll(PDO::FETCH_ASSOC);
?>
    <table>
        <tr>
            <th>被檢舉文章</th>
            <th>被檢舉人名稱</th>
            <th>檢舉內容</th>
            <th>停權/駁回</th>
        </tr>
<?php
    if ($rownum == 0) {
        echo "<center>查無檢舉資料</center>";
    } else {
        foreach ($reportRow as $report_Row) {
?>
        <tr>
            <td><a href='#'><?php echo $report_Row['article_title']; ?></a></td>
            <td><?php echo isset($report_Row['mem_name'])?$report_Row['mem_name']:$report_Row['half_name']; ?></td>
            <td><textarea name="" id="" cols="30" rows="2" readonly="readonly"><?php echo $report_Row['article_report_narrative']; ?></textarea></td>
            <td>
                <form action="../php/backBan.php" id="reportForm">
                    <input type="hidden" name="part" value="article_report">
                    <input type="hidden" name="reportVal" id="report" value="1">
                    <input type="hidden" name="banVal" id="ban" value="1">
                    <input type="hidden" name="artNo" value='<?php echo $report_Row['article_report_no']; ?>'>
                    <input type="hidden" name="<?php echo isset($report_Row['mem_no'])?'memNo':'halfNo'; ?>" value="<?php echo isset($report_Row['mem_no'])?$report_Row['mem_no']:$report_Row['half_no']; ?>">
                </form>
                <i class="fa fa-circle-o" aria-hidden="true" id="ensureBtn"></i>
                <i class="fa fa-times cancel" id="cancelBtn"></i>
            </td>
        </tr>
<?php
        }
    }
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