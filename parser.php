<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><boby>
<?php
if (!$_REQUEST[url]) {
?>
<form method="post">
	<input type="text" name="url" style="width: 300px;" placeholder="Ссылка на запись">
	<br>
	
	<input type="checkbox" name="like" value="true">like
	<br>
	
	<input type="checkbox" name="share" value="true">share
	<br>
	
	<input type="checkbox" name="comment" value="true">comment
	<br>
	
	<br>
	
	<input type="submit">
</form>

<?php

} else {
include("inc.php");

//header("content-type: text/plain; charset=utf-8");

/*

	$_REQUEST[url] 		- ссылка на страницу, например, http://vk.com/udalenka?w=wall-27712639_971
	
	$_REQUEST[like] 		- true or false, показать id пользователей, которым понравилась запись
	
	$_REQUEST[share] 		- true or false, показать id пользователей, которые поделились записью
	
	$_REQUEST[comment] 	- true or false, показать id пользователей, которые прокоментировали запись запись

*/

$vkc=new vk;

list($url,$wid)=explode("wall-",$_REQUEST[url]);
list($n,$pub)=explode("vk.com/",$url);
$vkc->wall=$wid;
$vkc->pub=$pub;

if ($_REQUEST[like]) $vkc->like=true;
if ($_REQUEST[share]) $vkc->share=true;
if ($_REQUEST[comment]) $vkc->comment=true;

$vkc->init();

$result=$vkc->output();

if ($_REQUEST[like]) foreach($result[like] as $id) echo $id."<br>";
else echo "none\r\n";
echo "<br><br>";

if ($_REQUEST[share]) foreach($result[share] as $id) echo $id."<br>";
else echo "none\r\n";
echo "<br><br>";

if ($_REQUEST[comment]) foreach($result[comment] as $id) echo $id."<br>";
else echo "none";
}
echo "<br><br><hr><a href=http://adne.info>adne.info - блог вебмастеров</a>";
?>
