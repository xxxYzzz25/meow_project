<?php
try {
    require_once "../php/connectBD103G2.php";

    $sql = "select count(1) from message_report where audit_status = 0";    // 計算資料筆數
	$total = $pdo->query($sql);
	$rownum = $total->fetchcolumn();                            // 總共欄位數
	$perPage = 10;                                               // 每頁顯示筆數
	$totalpage = ceil($rownum / $perPage);                      // 計算總頁數
	$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
	// 若無當前頁數則進入第一頁 若有則進入該頁
	$start = ($pageNo - 1) * $perPage;   
	// 設定每頁呈現內容
    $sql = "
        select r.message_report_no, r.message_report_narrative, m.mem_no, m.half_no, m.message_content, mem.mem_name, h.half_name
        from ((message_report r left join message m on r.message_no = m.message_no ) left join member mem on mem.mem_no = m.mem_no) left join halfway_member h on h.half_no = m.half_no
        where r.audit_status = 0
        order by message_REPORT_NO desc
        limit $start, $perPage";
    $report = $pdo->query($sql);
    $reportRow = $report->fetchAll(PDO::FETCH_ASSOC);
?>
    <table>
        <tr>
            <th>被檢舉留言</th>
            <th>被檢舉人名稱</th>
            <th>檢舉內容</th>
            <th>審核檢舉</th>
        </tr>
<?php
    if ($rownum == 0) {
        echo "<center>查無檢舉資料</center>";
    } else {
        foreach ($reportRow as $report_Row) {
?>
        <tr>
            <td><textarea name="" id="" cols="30" rows="2" readonly="readonly"><?php echo $report_Row['message_content']; ?></textarea></td>
            <td><?php echo isset($report_Row['mem_name'])?$report_Row['mem_name']:$report_Row['half_name']; ?></td>
            <td><textarea name="" id="" cols="30" rows="2" readonly="readonly"><?php echo $report_Row['message_report_narrative']; ?></textarea></td>
            <td>
                <form action="../php/backBan.php" id="reportForm" method="post">
                    <input type="hidden" name="part" value="message_report">
                    <input type="hidden" name="reportVal" id="report" value="1">
                    <input type="hidden" name="banVal" id="ban" value="1">
                    <input type="hidden" name="artNo" value='<?php echo $report_Row['message_report_no']; ?>'>
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