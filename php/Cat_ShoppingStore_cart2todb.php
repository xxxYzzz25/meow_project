<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>ShoppingCart2todb</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>



<?php

    echo "
    <script>
        var storage = localStorage;
        var itemString = storage.getItem('addItemList');
        var items = itemString.substr(0,itemString.length-2).split(', ');
        var itemInfo = storage.getItem(items[key])
        console.log(itemInfo)
    </script>" ;

?>

  


</body>

</html>