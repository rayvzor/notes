<?php
require("header.php");
require("frontend_header.php");
echo "Вы зашли как: " . $account->name . " <a href='logout.php'>Выход</a>";
echo "
<h1>Ваши заметки:</h1>
";
require("footer.php");
?>