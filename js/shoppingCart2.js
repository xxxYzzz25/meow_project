
var storage = localStorage;

function doFirst(){

	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0,itemString.length-2).split(', ');

	newSection = document.createElement('section');
	newTable = document.createElement('div');
	Object.assign(newTable,{id: 'prodList'});
	//每購買一個品項，就呼叫函數createCartList新增一個tr
	subtotal = 0;
	for(var key in items){
		var itemInfo = storage.getItem(items[key]);
		createCartList(items[key],itemInfo);

		// var itemPrice = parseInt(itemInfo.split('|')[2]);
		// subtotal += itemPrice;
	}

	document.getElementById('subtotal').innerText = subtotal;

	//最後將table放進section，再將section放進cartList
	newSection.appendChild(newTable);
	document.getElementById('cartList').appendChild(newSection);
}

function createCartList(itemKey,itemValue){
	var itemTitle = itemValue.split('|')[0];
	var itemImage = itemValue.split('|')[1];
	var itemPrice = parseInt(itemValue.split('|')[2]);
	var amount = parseInt(itemValue.split('|')[3]);

	//建立每個品項的清單區域 -- tr
	var trItemList = document.createElement('tr');
	trItemList.className = 'itemHead';

	newTable.appendChild(trItemList);

	//商品圖片 -- 第一個td
	var tdImage = document.createElement('td');
	tdImage.style.width = '20%';
	tdImage.valign = 'middle';

	var image = document.createElement('img');
	// console.log(itemImage);
	image.src = itemImage;
	image.width = '80';

	tdImage.appendChild(image);
	trItemList.appendChild(tdImage);

	//商品名稱 -- 第二個td
	var tdTitle = document.createElement('td');
	tdTitle.style.width = '35%';
	tdTitle.className = itemKey;
	tdTitle.valign = 'center';

	var pTitle = document.createElement('p');
	pTitle.innerText = itemTitle;

	tdTitle.appendChild(pTitle);


	trItemList.appendChild(tdTitle);

	//單價 -- 第三個td
	var tdPrice = document.createElement('td');
	tdPrice.style.width = '15%';
	tdPrice.setAttribute('data-price', itemPrice);
	tdPrice.innerText = itemPrice;

	trItemList.appendChild(tdPrice);

	//數量 -- 第四個td
	var tdItemCount = document.createElement('td');
	tdItemCount.style.width = '15%';

	var itemCount = document.createElement('input');
	itemCount.type = 'number';
	itemCount.min = 0;
	itemCount.value = amount;
	itemCount.className = 'count';
	// itemCount.id.style.width = '10';
	itemCount.addEventListener('input', changeItemCount);

	tdItemCount.appendChild(itemCount);
	trItemList.appendChild(tdItemCount);

	//total
	itemPrice *= amount;
	subtotal += itemPrice;

}



function changeItemCount(){
	let qty = this.value;
	let table = this.parentNode.parentNode.parentNode;
	let trs = table.childNodes;
	let tr = this.parentNode.parentNode;
	let td = tr.childNodes[2];
	let subTotal = 0;
	td.textContent = (qty * td.getAttribute('data-price'));
	for (const value of trs) {
		let num = parseInt(value.childNodes[2].textContent);
		subTotal += num;
	}
	document.getElementById('subtotal').textContent = subTotal;
}

window.addEventListener('load', doFirst, false);













