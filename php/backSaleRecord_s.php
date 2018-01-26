
<?php
	try{
        require_once('./connectBD103G2.php');

        $order = $_POST["order"];
        $qty = $_POST["qty"];

        if(isset($_POST["pages"])){
			$sql = "select count(*) count
					from ORDERLIST o
					join MEMBER m
					on o.MEM_NO = m.MEM_NO";

			$data = $pdo -> prepare($sql);
			$data -> execute();
			$dataRow = $data -> fetchObject();
			echo $dataRow -> count;
        }else{
        
			if($order == '1'){
				$sql = "select o.ORDER_NO orderNo,m.MEM_ID memId,o.ORDER_TIME orderTime,o.ORDER_STATUS orderStatus  
						from ORDERLIST o
						join MEMBER m
						on o.MEM_NO = m.MEM_NO
						group by o.ORDER_NO
						order by o.ORDER_TIME
						limit $qty,10";
			}else if($order == '2'){
				$sql = "select o.ORDER_NO orderNo,m.MEM_ID memId,o.ORDER_TIME orderTime,o.ORDER_STATUS orderStatus  
						from ORDERLIST o
						join MEMBER m
						on o.MEM_NO = m.MEM_NO
						group by o.ORDER_NO
						order by o.ORDER_TIME desc
						limit $qty,10";
			}
			$data = $pdo -> query($sql);
			$status = $dataRow -> orderStatus;
			if($status == '0'){
				$status = '未出貨';
			}else{
				$status = '已出貨';
			}
			$jsonData = array();
			while ($dataRow = $data -> fetchObject()) {
					array_push($jsonData,array('訂單編號' => $dataRow -> orderNo, '購買人帳號' => $dataRow -> memId, '購買時間' => $dataRow -> orderTime, '出貨狀態' => $status));
		}
		$jsonData = json_encode($jsonData);
		echo $jsonData;
        }
    }catch(PDOException $e){
		echo $e -> getMessage();
		echo $e -> getLine();
	}
?>