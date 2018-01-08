
var storage = sessionStorage;

function doFirst(){
	
	if(storage['addItemList'] == null){
		storage['addItemList'] = ''; //storage.setItem('addItemList','');
	}

	//幫每個add cart建事件聆聽功能
	var list = document.querySelectorAll('.addButton');

	for(var i=0; i<list.length; i++){

		list[i].addEventListener('click', function(){

			var teddyInfo = document.querySelector('#' + this.id + ' input').value;
			addItem(this.id,teddyInfo);

		});

	}
}



function addItem(itemId,itemValue){

	var image = document.createElement('img');
	image.src = '../img/' + itemValue.split('|')[1];
	image.id = 'imageSelect';

	var title = document.createElement('span');
	title.innerText = itemValue.split('|')[0];

	var price = document.createElement('span');
	price.innerText = parseInt(itemValue.split('|')[2]);

	var newItem = document.getElementById('newItem');

	//存入storage
	if(storage[itemId]){
		alert('商品已在購物車裡囉！');
	}else{
		storage['addItemList'] += itemId + ', ';
		storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
	}

	//計算購買數量和小計
	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0,itemString.length-2).split(', ');
	// console.log(items); //["A1001","A1002"]

	var subtotal = 0;
	for(var key in items){ //use items[key]
		var itemInfo = storage.getItem(items[key]);
		var itemPrice = parseInt(itemInfo.split('|')[2]);

		subtotal += itemPrice;

	}

	document.getElementById('itemCount').innerText = items.length;
	document.getElementById('subtotal').innerText = subtotal;
}

window.addEventListener('load', doFirst);





