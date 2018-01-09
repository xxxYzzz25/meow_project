
var storage = sessionStorage;

function doFirst(){

	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0,itemString.length-2).split(', ');

	newSection = document.createElement('section');
	newTable = document.createElement('table');

	//每購買一個品項，就呼叫函數createCartList新增一個tr
	subtotal = 0;
	for(var key in items){
		var itemInfo = storage.getItem(items[key]);
		createCartList(items[key],itemInfo);

		var itemPrice = parseInt(itemInfo.split('|')[2]);
		subtotal += itemPrice;
	}

	document.getElementById('subtotal').innerText = subtotal;

	//最後將table放進section，再將section放進cartList
	newSection.appendChild(newTable);
	document.getElementById('cartList').appendChild(newSection);
}

function createCartList(itemKey,itemValue){
	var itemTitle = itemValue.split('|')[0];
	var itemImage = '../img/' + itemValue.split('|')[1];
	var itemPrice = parseInt(itemValue.split('|')[2]);

	//建立每個品項的清單區域 -- tr
	var trItemList = document.createElement('tr');
	trItemList.className = 'item';

	newTable.appendChild(trItemList);

	//商品圖片 -- 第一個td
	var tdImage = document.createElement('td');
	tdImage.style.width = '200px';

	var image = document.createElement('img');
	console.log(itemImage);
	image.src = itemImage;
	image.width = '80';

	tdImage.appendChild(image);
	trItemList.appendChild(tdImage);

	//商品名稱 -- 第二個td
	var tdTitle = document.createElement('td');
	tdTitle.style.width = '300px';
	tdTitle.id = itemKey;

	var pTitle = document.createElement('p');
	pTitle.innerText = itemTitle;

	tdTitle.appendChild(pTitle);


	trItemList.appendChild(tdTitle);

	//單價 -- 第三個td
	var tdPrice = document.createElement('td');
	tdPrice.style.width = '100px';
	tdPrice.innerText = itemPrice;

	trItemList.appendChild(tdPrice);

	//數量 -- 第四個td
	var tdItemCount = document.createElement('td');
	tdItemCount.style.width = '100px';
	
	var itemCount = document.createElement('input');
	itemCount.type = 'number';
	itemCount.min = 0;
	itemCount.value = 1;
	itemCount.id = 'count';
	// itemCount.id.style.width = 10;
	itemCount.addEventListener('input', changeItemCount);

	tdItemCount.appendChild(itemCount);
	trItemList.appendChild(tdItemCount);

	//x -- 第五個td
	var tdDelete = document.createElement('td');
	tdDelete.style.width = '50px';

	var delButton = document.createElement('button');
	delButton.innerText = 'x';
	delButton.addEventListener('click',deleteItem);

	tdDelete.appendChild(delButton);
	trItemList.appendChild(tdDelete);

}

function deleteItem(){

	var itemId = this.parentNode.parentNode;
	

	//刪除該筆資料之前，先將金額扣除
	var itemValue = storage.getItem(itemId);
	subtotal -= parseInt(itemValue.split('|')[2]);

	// document.getElementById('subtotal').innerText = subtotal;

	// //清除storage的資料
	// storage.removeItem(itemId);
	// storage['addItemList'] = storage['addItemList'].replace(itemId+', ','');
	
	// //再將該筆tr刪除
	// this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
}

function changeItemCount(){

}

window.addEventListener('load', doFirst, false);













