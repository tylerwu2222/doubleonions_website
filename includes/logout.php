<?php
session_start();

if(isset($_SESSION['prev-pg'])){
    $prevPg = strval($_SESSION['prev-pg']);
}
session_unset();
session_destroy();

header("Location: ..$prevPg");
exit();
?>