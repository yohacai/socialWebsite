<?php
require_once 'getUserId.php';
$db->db_link();
echo getUserId::getId('yoha@me.com');
?>