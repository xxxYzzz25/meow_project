


function doFirst() {
	
	var storage = localStorage;



	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0, itemString.length - 2).split(', ');

	newSection = document.createElement('section');
	newTable = document.createElement('div');

	//每購買一個品項，就呼叫函數createCartList新增一個tr
	subtotal = 0;
	for (var key in items) {
		var itemInfo = storage.getItem(items[key]);
		createCartList(items[key], itemInfo);

		// var itemPrice = parseInt(itemInfo.split('|')[2]) * amount;
		// 
	}

	document.getElementById('subtotal').innerText = subtotal;

	//最後將table放進section，再將section放進cartList
	newSection.appendChild(newTable);
	document.getElementById('cartList').appendChild(newSection);



	function createCartList(itemKey, itemValue) {
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

		//x -- 第五個td
		var tdDelete = document.createElement('td');
		tdDelete.style.width = '15%';

		var delButton = document.createElement('button');
		delButton.innerText = 'x';
		delButton.className = 'delButton';
		delButton.addEventListener('click',deleteItem);

		tdDelete.appendChild(delButton);
		trItemList.appendChild(tdDelete);
		
		//total
		itemPrice *= amount;
		subtotal += itemPrice;

	}
	// document.getElementById('count').innerText = amount;

	

	function changeItemCount() {
		let inputValue = parseInt(this.value);
		console.log(inputValue);
		let itemTr = this.parentNode.parentNode.parentNode.childNodes;
		console.log(itemTr);
		let total = 0;
		
		for (let i = 0; i < itemTr.length; i++) {
			var cost = parseInt(itemTr[i].childNodes[2].textContent); //價錢
			console.log(cost);
			var amount = parseInt(itemTr[i].childNodes[3].firstChild.value); //數量
			console.log(amount);

			total += cost * amount;
		}

		console.log(total);
		document.getElementById('subtotal').textContent = total;

	}

	

	function deleteItem() {

		var inputValue = parseInt(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
		var itemId = this.parentNode.parentNode.childNodes[1].getAttribute('class');

		//刪除該筆資料之前，先將金額扣除
		var itemValue = storage.getItem(itemId);
		subtotal -= inputValue * parseInt(itemValue.split('|')[2]);

		if(isNaN(subtotal)){
			document.getElementById('subtotal').innerText = 0
		}else{
			document.getElementById('subtotal').innerText = subtotal;

		}
		console.log(inputValue)
		console.log(itemId)
		//清除storage的資料
		storage.removeItem(itemId);
		storage['addItemList'] = storage['addItemList'].replace(itemId + ', ', '');

		//再將該筆tr刪除
		this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
	}


	let select = document.getElementById('hi')
	select.addEventListener('change', function(){
		let total =0;
		for (var key in items) {
			let itemInfo = storage.getItem(items[key]);
			total+= parseInt( itemInfo.split('|')[2] ) * parseInt( itemInfo.split('|')[3] );
		}
		let subtotal = document.getElementById('subtotal');
		
		subtotal.textContent=total - parseInt(this.value);
		
	})



}



window.addEventListener('load', doFirst, false);













