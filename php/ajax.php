<?
$A = ($_GET["color"]);
$B = ($_GET["location"]);
$C = ($_GET["gender"]);
$obj = explode(",", "$A");
$colorAdv = "and (cat_color like '%";
$colorAdv .= implode("%' or cat_color like '%", $obj);
$colorAdv .= "%')";
echo $colorAdv;
?>