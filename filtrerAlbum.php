<?php
if (!isset ($_POST ["idChanteur"])) die("idChanteur absent");
$_SESSION ["filtreIdChanteur"]=$_POST ["idChanteur"];
header("location: index.php?action=albums");
?>