

var storage = localStorage;

function doFirst(){

	//幫每個add cart建事件聆聽功能

	
			var list = document.getElementsByClassName('cartBtn');
			//console.log(list.length);
			for(let i=0; i<list.length; i++){
				//console.log(list[i].id);	
				list[i].addEventListener('click', function(e){
					//console.log(this);
					let info = this.childNodes[1].value;
					//console.log(this.id);
					let self = e.target.id;
					addItem(this.parentNode.id,info,self);
    				// localStorage.setItem('item',inputValue);
					if(i ==1){
						document.location.href='Cat_ShoppingStore_cart.php';
					}
				});



			} 
	
	if(storage['addItemList'] == null){
		storage['addItemList'] = ''; //storage.setItem('addItemList','');
	}
	
}




function addItem(itemId,itemValue,self){
	//存入storage
	if(storage[itemId]){
		if(self == 'byNow'){
			storage['addItemList'] += itemId + ', ';
			storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
		}else{
			alert('商品已在購物車裡囉！');
		}
	}else{
		storage['addItemList'] += itemId + ', ';
		storage[itemId] = itemValue; //storage.setItem(itemId,itemValue);
	}
	
	itemValue = itemValue.substr(0,itemValue.lastIndexOf('|'));
	var inputValue = parseInt(document.querySelector('.qty').value);
	itemValue +="|"+inputValue;
	storage[itemId] = itemValue;

}


window.addEventListener('load', doFirst);





