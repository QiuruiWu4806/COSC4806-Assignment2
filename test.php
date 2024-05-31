<?php

require_once ('user.php');

$user = new User();
$userlist = $user->get_all_users();

echo "<pre>";
print_r ($userlist);

?>