<?php

use TECWEB\MYAPI\Products as Products;
require_once __DIR__ . '/myapi/Products.php';

$prodObj = new Products('root', 'samd2704', 'marketzone');
$prodObj->edit($_POST);
echo $prodObj->getData();

?>