<?php
$json = file_get_contents('php://input');
$abc =  json_decode($json);
echo $json."<br>";
echo "<br>";
print_r($abc);
$colorAdv = "and (cat_color like '%";
$colorAdv .= implode("%' or cat_color like '%", $abc->color);
$colorAdv .= "%')";
echo $colorAdv;
?>