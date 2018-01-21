<?php
try {
    require_once("../php/connectBD103G2.php");

    $sql = "select * from product where PRODUCT_NO = :no";
    $product = $pdo->prepare( $sql );
    $product->bindValue(":no", $_REQUEST["PRODUCT_NO"]);
    $product->execute();
    while($productRow = $product->fetchObject()){
?>  
    <button class="defaultBtn" id="back">返回上一頁</button>
    <h4>修改商品資料</h4>
    <form action="../php/backProductUpdateToDb.php" method="post">
        <input type="hidden" name="no" value="<?php echo $productRow->PRODUCT_NO;?>">
        <table>
            <tr>
                <th>商品名稱</th>
                <td>
                    <input type="text" value="<?php echo $productRow->PRODUCT_NAME;?>">
                </td>
            </tr>
            <tr>
                <th>商品分類</th>
                <td>
                    <select name="part">
                        <option>請選擇</option>
                        <option value="1">喵喵肚子餓</option>
                        <option value="2">喵喵待在家</option>
                        <option value="3">精選喵草</option>
                        <option value="4">喵喵愛玩耍</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>商品價錢</th>
                <td>
                    $<input type="text" value="<?php echo $productRow->PRODUCT_PRICE;?>">
                </td>
            </tr>
            <tr>
                <th>商品規格</th>
                <td>
                    重量<input type="text" value="<?php echo $productRow->PRODUCT_WEIGHT;?>"><br>
                    產地<input type="text" value="<?php echo $productRow->PRODUCT_LOC;?>"><br>
                    成分<input type="text" value="<?php echo $productRow->PRODUCT_COMPONENT;?>"><br>
                    尺寸<input type="text" value="<?php echo $productRow->PRODUCT_SIZE;?>">
                </td>
            </tr>
            <tr>
                <th>商品敘述</th>
                <td>
                    <textarea name="" id="" cols="40" rows="10" value="<?php echo $productRow->PRODUCT_NARRATIVE;?>"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" id="ensureBtn" class="defaultBtn">確認新增</button>
                    <button type="reset" class="defaultBtn">清除內容</button>
                </td>
            </tr>
        </table>
    </form>
<?php
    }//while
} catch (PDOException $e) {
    echo "錯誤行號 : ", $e->getLine(), "<br>";
    echo "錯誤訊息 : ", $e->getMessage(), "<br>"; 
}
?>