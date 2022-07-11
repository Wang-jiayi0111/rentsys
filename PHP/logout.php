<?php
session_start();
session_destroy();
header('Location: ../web/首页.html');
?>