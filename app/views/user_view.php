<html>
<head>
</head>
<body>
<?php
if($users){
echo "<ul>";
foreach ($users as $user) {
    foreach($user as $k=>$v)
      echo ($k != "id")? "<li>$k: $v</li>" : '';
    echo "<a href='user/".$user["id"]."'><button>edit</button></a>";
    echo "<a href='delete/".$user["id"]."'><button>delete</button></a>";
    echo "<hr>";
}
echo "</ul>";
}
?>
<form method="post" action ="add">
<lable>email:</lable>
<input type="text" name="email">
<br>
<br>
<lable>password:</lable>   
<input type="password" name="password">
<br>
<br>
<lable>rule:</lable>   
<input type="text" name="rule">
<br>
<br>
<button type="submit">addUser</button>
</form>
</form>
<a href="logout"><button>logout</button></a>
</body>
</html>