<?php if(session_destroy()){echo "сессия успешно разрушена";} 
var_dump($_SESSION);?>
<a href="main.php"><button>Вернуться на главную.</button></a>