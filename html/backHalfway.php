<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>中途之家審核</title>
    <link rel="stylesheet" href="../css/backHalfway.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<header>
    <nav>
        <ul>
            <li>
                <a href="backMemManage.php" title="會員帳號管理">會員帳號管理</a>
            </li>
            <li>
                <a href="backEmpManage.php" title="員工帳號管理">員工帳號管理</a>
            </li>
            <li>
                <a href="backHalfWay.php" title="中途之家審核">中途之家審核</a>
            </li>
            <li>
                <a href="backReport.php" title="檢舉審核">檢舉審核</a>
            </li>
            <li>
                <a href="backOrderlist.php" title="訂單管理">訂單管理</a>
            </li>
            <li>
                <a href="backAdobtRecord.php" title="領養紀錄查詢">領養紀錄查詢</a>
            </li>
            <li>
                <a href="backSaleRecord.php" title="銷售紀錄查詢">銷售紀錄查詢</a>
            </li>
            <li>
                <a href="backProduct.php" title="寵物商品上下架">寵物商品上下架</a>
            </li>
        </ul>
    </nav>
</header>
<div class="right">
    <div class="container container1">
        <div class="bigImg">
            <img src="../images/back/catAdoptRecord.jpg" alt="">
        </div>
        <div class="halfArea">
            <table>
                <tr>
                    <th>申請者帳號</th>
                    <th>申請之中途之家名稱</th>
                    <th>申請之中途之家地址</th>
                    <th>審核狀態</th>
                </tr>
                <?php
				require_once("../php/connectBD103G2.php");

				$sql = "select count(1) from halfway_member where half_audit_status = 0";    // 計算資料筆數
				$total = $pdo->query($sql);
				$rownum = $total->fetchcolumn();                            // 總共欄位數
				$perPage = 10;                                               // 每頁顯示筆數
				$totalpage = ceil($rownum / $perPage);                        // 計算總頁數
				$pageNo = isset($_REQUEST['pageNo']) === true ? $_REQUEST['pageNo'] : $pageNo = 1;
				// 若無當前頁數則進入第一頁 若有則進入該頁
				$start = ($pageNo - 1) * $perPage;                            // 計算起始頁數
				$sql2 = "select * from halfway_member where half_audit_status = 0 order by half_no desc limit $start, $perPage";
				// 設定每頁呈現內容
				$stmt = $pdo->query($sql2);
				$half = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if ($rownum == 0) {
                    echo "<tr><td colspan='4'>'目前尚無待審核的中途之家！'</td></tr>";
				}else{
                    try {
                        foreach ($half as $i => $halfRow) {
				?>
                            <form action="../php/backHalfAudit.php" method="get" class="halfForm">
                                <tr>
                                    <td>
                                        <input type="hidden" name="halfNo" value="<?echo $halfRow['HALF_NO']; ?>">
                                        <input type="text" name="halfId" readonly="readonly" value="<?php echo $halfRow['HALF_ID']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="halfName" readonly="readonly" value="<?php echo $halfRow['HALF_NAME']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="halfAdd" readonly="readonly" value="<?php echo $halfRow['HALF_ADDRESS']; ?>">
                                    </td>
                                    <td>
                                        <i class='fa fa-circle-o ensureBtn' aria-hidden='true' name='audit' value='1'></i>
                                        <i class='fa fa-times cancel cancelBtn' name='audit' value='1'></i>
                                    </td>
                                </tr>
                            </form>
						<?php
					    }
                    } catch (PDOException $e) {
                        echo "錯誤原因 : ", $e->getMessage(), "<br>";
                        echo "錯誤行號 : ", $e->getLine(), "<br>";
                    }
				?>
                <tr class="last"> 
                    <td colspan="4">
						<?php
						for ($i = 1; $i <= $totalpage; $i++) {
							echo '<a href="?pageNo=' . $i . '"class="defaultBtn">' . $i . '</a> ';
						}
						$i = $i - 1;
                }
						?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', ()=>{
        let ensureBtn = document.querySelectorAll('.ensureBtn')
        let cancelBtn = document.querySelectorAll('.cancelBtn')
        let form = document.querySelectorAll('.halfForm')
        let hidden = document.createElement("input")
        hidden.type = "hidden"
        hidden.value = "1"
        hidden.name = "audit"
        for (let i = 0; i < ensureBtn.length; i++) {
            ensureBtn[i].addEventListener('click', ()=>{
                form[i].appendChild(hidden)
                form[i].submit()
            })
        }
        for (let i = 0; i < ensureBtn.length; i++) {
            cancelBtn[i].addEventListener('click', ()=>{
                hidden.value = "2"
                form[i].appendChild(hidden)
                form[i].submit()
            })
        }
    })
</script>
</body>
</html>