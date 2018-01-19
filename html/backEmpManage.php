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
    <link rel="stylesheet" href="../css/backEmpManage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>員工帳號管理</title>
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
                <button id="newEmp" class="defaultBtn">新增員工帳號</button>
                <form action="../php/backEmpManageQuery.php" method="post">
                    <table id="empTable">
                        <input type="hidden" name="cmd" value="add">
                        <tr class="newEmpTR newEmpTROff" id="abc">
                            <th>員工帳號</th>
                            <th>員工密碼</th>
                            <th>員工職位</th>
                            <th>確認新增</th>
                        </tr>
                        <tr class="newEmpTR newEmpTROff">
                            <td>
                                <input type="text" id="empIdNew" name="empId" required>
                            </td>
                            <td>
                                <input type="password" name="empPsw" id="empPswNew" pattern="[A-z]{1-10}" required>
                            </td>
                            <td>
                                <select name="empOffice" id="EmpOfficeNew" required>
                                    <option value="Supper Admin">Supper Admin</option>
                                    <option value="Sales">Sales</option>
                                    <option value="RD">RD</option>
                                </select>
                            </td>
                            <td>
                                <input id="ensureBtn" type="submit" value="確認新增">
                                <input type="reset" value="清除內容">
                            </td>
                        </tr>
                </form>
                    <tr id="empRow">
                        <th>員工帳號</th>
                        <th>員工密碼</th>
                        <th>員工職位</th>
                        <th>員工帳號管理</th>
                    </tr>
                    <!-- emp data star -->
                    <!-- <tr>
                            <td>
                                <input type='text' id='empId1' value='$dataRow -> EMP_ID'>
                            </td>
                            <td>
                                <input type='password' name='empPsw' id='empPsw1' value='******'>
                            </td>
                            <td>
                                <select name='EmpOffice' id='EmpOffice1'>
                                    <option value=''>Supper Admin</option>
                                    <option value=''>Sales</option>
                                    <option value=''>RD</option>
                                </select>
                            </td>
                            <td>
                                <input type='button' value='異動'>
                            </td>
                        </tr> -->
                    <!-- emp data end -->
                    </table>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('load', function () {
            const newEmp = document.getElementById('newEmp');
            newEmp.addEventListener('click', function newEmp() {
                const newEmp = document.getElementById('newEmp')
                const tr = document.getElementsByClassName('newEmpTR')
                if (tr[0].className.match('newEmpTROff') && tr[1].className.match('newEmpTROff')) {
                    tr[0].className =
                        tr[0].className.replace
                            ('newEmpTROff', 'newEmpTROn')
                    tr[1].className =
                        tr[1].className.replace
                            ('newEmpTROff', 'newEmpTROn')
                    newEmp.innerText = '取消新增員工'
                } else {
                    tr[0].className =
                        tr[0].className.replace
                            ('newEmpTROn', 'newEmpTROff')
                    tr[1].className =
                        tr[1].className.replace
                            ('newEmpTROn', 'newEmpTROff')
                    newEmp.innerText = '新增員工帳號'
                }
            });
        });
        window.addEventListener('load',()=>{

            function edit(){
                this.removeEventListener('click',edit);
                let parent = this.parentNode;
                let editBtn = document.createElement('input');
                let deleteBtn = document.createElement('input');

                Object.assign(editBtn,{type:'button',value:'編輯'});
                Object.assign(deleteBtn,{type:'button',value:'刪除'});

                editBtn.addEventListener('click',ajaxUpdate);
                deleteBtn.addEventListener('click',ajaxDelete);

                this.remove();
                
                parent.appendChild(editBtn);
                parent.appendChild(deleteBtn);

            }

            function ajaxUpdate(){
                let tempId = '';
                let tempPsw = '';
                let tempOffice = '';

                function editDone(){
                    this.removeEventListener('click',editDone);
                    let tr = this.parentNode.parentNode;
                    let empIdTd = tr.childNodes[0];
                    let empId = empIdTd.firstChild;
                    let empIdText = empId.value;
                    let empPswTd = tr.childNodes[1];
                    let empPsw = empPswTd.firstChild;
                    let empPswText = empPsw.value;
                    let empOfficeTd = tr.childNodes[2]
                    let empOffice = empOfficeTd.firstChild;
                    let empOfficeText = empOffice.value;
                    let admin = tr.childNodes[3];
                    let empNo = tr.dataset.No;
                    empId.remove();
                    empIdTd.textContent = empIdText;

                    empPsw.remove();
                    empPswTd.textContent = '******';

                    empOffice.remove();
                    empOfficeTd.textContent = empOfficeText;

                    admin.remove();
                    admin = document.createElement('td');
                    let changeBtn = document.createElement('input');
                    Object.assign(changeBtn,{type:'button',value:'異動'});
                    changeBtn.addEventListener('click',edit);
                    admin.appendChild(changeBtn);
                    tr.appendChild(admin);

                    ajax(()=>{alert('資料更新成功');},`cmd=update&empId=${empIdText}&empPsw=${empPswText}&empOffice=${empOfficeText}&empNo=${empNo}`);
                }
                function editCancel(){
                    this.removeEventListener('click',editCancel);
                    let tr = this.parentNode.parentNode;
                    let empIdTd = tr.childNodes[0];
                    let empPswTd = tr.childNodes[1];
                    let empOfficeTd = tr.childNodes[2];
                    let adminTd = tr.childNodes[3];

                    empIdTd.firstChild.remove();
                    empIdTd.textContent = tempId;
                    empPswTd.firstChild.remove();
                    empPswTd.textContent = tempPsw;
                    empOfficeTd.firstChild.remove();
                    empOfficeTd.textContent = tempOffice;

                    adminTd.remove();

                    adminTd = document.createElement('td');
                    let changeBtn = document.createElement('input');
                    Object.assign(changeBtn,{type:'button',value:'異動'});
                    adminTd.appendChild(changeBtn);
                    tr.appendChild(adminTd);

                    changeBtn.addEventListener('click',edit);
                }

                this.removeEventListener('click',ajaxUpdate);
                let tr = this.parentNode.parentNode;
                let empId = tr.childNodes[0];
                let empIdText = tr.childNodes[0].textContent;
                tempId = empIdText;
                let empPsw = tr.childNodes[1];
                let empPswText = tr.childNodes[1].textContent;
                tempPsw = empPswText;
                let empOffice = tr.childNodes[2];
                tempOffice = tr.childNodes[2].textContent;
                let op1 = document.createElement('option');
                let op1Text = document.createTextNode('Supper Admin');
                let op2 = document.createElement('option');
                let op2Text = document.createTextNode('Sales');
                let op3 = document.createElement('option');
                let op3Text = document.createTextNode('RD');
                let admin = tr.childNodes[3];

                empId.remove();
                let empIdTd = document.createElement('td');
                empId = document.createElement('input');
                Object.assign(empId,{value:empIdText});
                empIdTd.appendChild(empId);
                tr.appendChild(empIdTd);

                empPsw.remove();
                let empPswTd = document.createElement('td');
                empPsw = document.createElement('input');
                Object.assign(empPsw,{type:'password',value:empPswText});
                empPswTd.appendChild(empPsw);
                tr.appendChild(empPswTd);

                empOffice.remove();
                let empOfficeTd = document.createElement('td');
                empOffice = document.createElement('select');
                op1.appendChild(op1Text);
                op2.appendChild(op2Text);
                op3.appendChild(op3Text);
                Object.assign(op1,{value:'Supper Admin'});
                Object.assign(op2,{value:'Sales'});
                Object.assign(op3,{value:'RD'});
                empOffice.appendChild(op1);
                empOffice.appendChild(op2);
                empOffice.appendChild(op3);
                empOfficeTd.appendChild(empOffice);
                tr.appendChild(empOfficeTd);

                admin.remove();
                admin = document.createElement('td');
                let sureBtn = document.createElement('input');
                let cancelBtn = document.createElement('input');
                Object.assign(sureBtn,{type:'button',value:'完成'});
                Object.assign(cancelBtn,{type:'button',value:'取消'});
                sureBtn.addEventListener('click',editDone);
                cancelBtn.addEventListener('click',editCancel);
                admin.appendChild(sureBtn);
                admin.appendChild(cancelBtn);
                tr.appendChild(admin);
                // ajax('../php/backEmpManageUpdate.php',dataUpdate,command);
            }

            function ajaxDelete(){
                if(confirm('確認刪除?')){

                    let tr = this.parentNode.parentNode;
                    let empNo = tr.dataset.No;

                    tr.remove();
                    ajax(null,`cmd=delete&empNo=${empNo}`);
                }else{
                    let adminTd = this.parentNode;
                    let tr = adminTd.parentNode;
                    adminTd.remove();
                    adminTd = document.createElement('td');
                    let changeBtn = document.createElement('input');
                    Object.assign(changeBtn,{type:'button',value:'異動'});
                    changeBtn.addEventListener('click',edit);
                    adminTd.appendChild(changeBtn);
                    tr.appendChild(adminTd);
                }
            }

            function query(){
                let empData = JSON.parse(this.responseText);
                let empTable = document.getElementById('empTable');
                let empRow = document.getElementById('empRow');
                let fragment = document.createDocumentFragment();
                for (const key in empData) {
                    
                    let emp = empData[key];

                    for (const name in emp) {
                        
                        if(name !== 'No'){
                            let tr = document.createElement('tr');
                            let empId = document.createElement('td');
                            let empIdText = document.createTextNode(name);
                            let empPaw = document.createElement('td');
                            let empPswText = document.createTextNode('******');
                            let empOffice = document.createElement('td');
                            let empOfficeText = document.createTextNode(emp[name]);
                            let change = document.createElement('td');
                            let changeBtn = document.createElement('input');
                            
                            Object.assign(changeBtn,{type:'button',value:'異動'});

                            changeBtn.addEventListener('click',edit);

                            change.appendChild(changeBtn);
                            empOffice.appendChild(empOfficeText);
                            empPaw.appendChild(empPswText);
                            empId.appendChild(empIdText);

                            tr.appendChild(empId);
                            tr.appendChild(empPaw);
                            tr.appendChild(empOffice);
                            tr.appendChild(change);
                            fragment.appendChild(tr);
                        }else if(name === 'No'){
                            fragment.lastChild.dataset.No = emp[name];
                        }
                    }
                    empTable.appendChild(fragment);
                }
            }

            function ajax(callback,dataInfo){
                let xhr = new XMLHttpRequest();
                xhr.open('post','../php/backEmpManageQuery.php');
                xhr.onload = callback;
                xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                xhr.send(dataInfo);
            }
            ajax(query,"cmd=query");
        });
    </script>
</body>

</html>