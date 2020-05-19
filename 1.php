<?php 


// define ('NORWICH', TRUE);
require_once ('config.php');
require_once ('db_connect.php');


?>

<html>
<head>
<style type="text/css">
   h1 { 
    font-size: 120%; 
    font-family: Verdana, Arial, Helvetica, sans-serif; 
    color: white;
   }
  </style>

<!-- проверка заполнения формы -->
<script>
function splash()
{
	if (document.myForm.username.value  =='')
		{
			alert ("Заполните имя пользователя!");
			return false;	
		}
		
	if (document.myForm.msg.value  =='')
		{
			alert ("Заполните текст сообщения!");
			return false;	
		}
	
	return true;   
}
</script>


</head>
<body background="mainbg.png">

<div align='center' style="font-size: 120%; font-family: monospace; color: black">
<h1 >Можно мне написать, если кому неймётся</h1>
	
<!-- блок отображения сообщений-->
	
<?php
	$query = "SELECT COUNT(*) FROM gb";
        $res = mysql_query($query) or die(mysql_error());
        $temp = mysql_fetch_array($res);
        $count = $temp[0];

	echo "Записей"; echo "<br>"; 
	echo $count;
		
?>


<br>
<h3>Добавить сообщение</h3>
<!-- форма отправки сообщения -->


<!-- код формы -->
<form name="myForm" action="action.php" method="post" onSubmit="return splash();" >
<input type="hidden" name="action" value="add">
<table border="0" style="color: white">
	<tr>
		<td width="60">
			Ваше имя:
		</td>
		<td>
			<input name="username" style="width: 300px;">
		</td>
	</tr>
	<tr>
		<td width="60" valign="top">
			Сообщение:
		</td>
		<td>
			<textarea name="msg" style="width: 300px;"></textarea>
		</td>
	</tr>		
	<tr>
		<td width="60">
			&nbsp;
		</td>
		<td>
			<input type="submit" value="Отправить сообщение">
		</td>
	</tr>
</table>
</form>
</div>
</body>
</html>

