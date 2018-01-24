window.addEventListener('load', function () {
    let donateBtn = document.getElementById('donate');
    donateBtn.addEventListener('click', function createTable() {
        let i, tr, td, textNode, input;				// 宣告變數
        let table = document.createElement("table");	// 創建table標籤
        let form = document.getElementById("donateArea")
        document.getElementById("donateArea").appendChild(table)


        // 第一行
        tr = document.createElement("tr");
        table.appendChild(tr);
        td = document.createElement("td");
        td2 = document.createElement("td");
        tr.appendChild(td);
        tr.appendChild(td2);
        textNode = document.createTextNode("姓名:");
        input = document.createElement("input");
        td.appendChild(textNode);
        td2.appendChild(input);

        td2.setAttribute("colspan", "2");
        input.setAttribute("placeholder", "請輸入您的大名");
        input.setAttribute("name", "donateName");

        // 第二行
        tr2 = document.createElement("tr");
        table.appendChild(tr2);
        td3 = document.createElement("td");
        td4 = document.createElement("td");
        tr2.appendChild(td3);
        tr2.appendChild(td4);
        textNode = document.createTextNode("助養金額:");
        input = document.createElement("input");
        td3.appendChild(textNode);
        td4.appendChild(input);

        td4.setAttribute("colspan", "2");
        input.setAttribute("placeholder", "請輸入您的助養金額");
        input.setAttribute("name", "donatePrice");
        input.setAttribute("pattern", "[0-9]{10}");

        // 第三行
        tr3 = document.createElement("tr");
        table.appendChild(tr3);
        td5 = document.createElement("td");
        td6 = document.createElement("td");
        td7 = document.createElement("td");
        tr3.appendChild(td5);
        tr3.appendChild(td6);
        tr3.appendChild(td7);
        textNode = document.createTextNode("信用卡卡號:");
        input = document.createElement("input");
        input2 = document.createElement("input");
        td5.appendChild(textNode);
        td6.appendChild(input);
        td7.appendChild(input2);

        input.setAttribute("placeholder", "ex: 1234-5678-9876-5433");
        input.setAttribute("pattern", "[0-9]{4}[-][0-9]{4}[-][0-9]{4}[-][0-9]{4}");        
        input2.setAttribute("placeholder", "請輸入安全碼");
        input2.setAttribute("pattern", "[0-9]{3}");        



        // 第四行
        input = document.createElement("input");
        form.appendChild(input);

        input.setAttribute("type", "submit");
        input.setAttribute("value", "確認助養");
        input.className = "defaultBtn";

        donateBtn.disabled = true;						// 停用助養btn
    })
});