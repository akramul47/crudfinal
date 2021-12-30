<?php

$approot = $_SERVER['DOCUMENT_ROOT']. "/crud/";

include_once($approot. "vendor/autoload.php");

use Bitm\Banner;

$_banner = new Banner();

$banner = $_banner->update();