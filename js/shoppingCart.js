


function doFirst() {
	
	var storage = localStorage;
	if(storage.getItem('discount')){
		storage.removeItem('discount');
	}

	
	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0, itemString.length - 2).split(', ');
	
	newSection = document.createElement('section');
	newTable = document.createElement('div');
	Object.assign(newTable,{id: 'prodList'});
	//每購買一個品項，就呼叫函數createCartList新增一個tr
	subtotal = 0;
	console.log(items);
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
		Object.assign(itemCount,{min:'1'});
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
		let itemTr = this.parentNode.parentNode.parentNode.childNodes;
		let total = 0;
		for (let i = 0; i < itemTr.length; i++) {
			var cost = parseInt(itemTr[i].childNodes[2].textContent); //價錢
			var amount = parseInt(itemTr[i].childNodes[3].firstChild.value); //數量

			total += cost * amount;
		}

		document.getElementById('subtotal').textContent = total;

	}

	

	function deleteItem() {
		
		var qty = parseInt(this.parentNode.parentNode.childNodes[3].childNodes[0].value);
		var itemId = this.parentNode.parentNode.childNodes[1].getAttribute('class');
		let price = this.parentNode.parentNode.childNodes[2].dataset.price;
		//刪除該筆資料之前，先將金額扣除
		let totalBox = document.getElementById('subtotal');
		let subtotal = totalBox.textContent;
		
		subtotal -= (qty * price);

		totalBox.textContent = subtotal;
		//清除storage的資料
		storage.removeItem(itemId);
		storage['addItemList'] = storage['addItemList'].replace(itemId + ', ', '');

		//再將該筆tr刪除
		this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
	}


	let select = document.getElementById('selectDiscount')
	if(select){
		select.addEventListener('change', function(){
			let total =0;
			for (var key in items) {
				let itemInfo = storage.getItem(items[key]);
				total+= parseInt( itemInfo.split('|')[2] ) * parseInt( itemInfo.split('|')[3] );
			}
			let subtotal = document.getElementById('subtotal');
			if(this.value == 'false'){
				subtotal.textContent=total
			}else{
				subtotal.textContent= total - 50;
			}
			
		})
	}

	let checkout = document.getElementById('checkout');
	if(document.getElementById('selectDiscount')){
		let selectDiscount = document.getElementById('selectDiscount');
		selectDiscount.addEventListener('change',(e)=>{
			let discount = e.target.value;
			localStorage.setItem('discount',discount);
		});
	}

	checkout.addEventListener('click',(e)=>{
		
		if(localStorage.getItem('memNo') || localStorage.getItem('halfNo')){

			let prodNos = document.querySelectorAll('#prodList .itemHead');

			for (const i of prodNos) {
				let prodNo = i.childNodes[1].className;
				let qty = i.childNodes[3].firstChild.value;
				if(localStorage.getItem(prodNo)){
					let prodDetail = localStorage.getItem(prodNo).split('|');
					prodDetail.pop();
					prodDetail.push(qty);
					prodDetail = prodDetail.join('|');
					localStorage.setItem(prodNo,prodDetail);
				}
			}

		}else{
			e.preventDefault();
			alert('請先登入會員');
			showLogin();
		}
	});
	
	
			
}



window.addEventListener('load', doFirst, false);













