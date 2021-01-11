<?php
/**
 * Created by PhpStorm.
 * User: SAN
 * Date: 10/07/15
 * Time: 10:44 AM
 */


SESSION_START();

SESSION_UNSET();

SESSION_DESTROY();

header('Location: index.php?e=logout');
?>
