<form method="post" action = "/mvc/update">
<lable>email:</lable>
<input type="text" name="email" value="<?=$user[0]["email"]?>">
<br>
<br>
<lable>password:</lable>   
<input type="password" name="password" value="<?=$user[0]["password"]?>">
<br>
<br>
<lable>rule:</lable>   
<input type="text" name="rule" value="<?=$user[0]["rule"]?>">
<br>
<br>
<input type="hidden" name="id" value="<?=$user[0]["id"]?>">
<button type="submit">UpdateUser</button>
</form>
</form>
</body>
</html>