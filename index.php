<?php

require "categories/ElectronicItem.php";
require "categories/Extra.php";
require "Shop.php";
require "products/Television.php";
require "products/Console.php";
require "products/Gamepad.php";
require "products/Microwave.php";
require "products/Controller.php";

use Shop\Products\Console;
use Shop\Products\Controller;
use Shop\Products\Gamepad;
use Shop\Products\Microwave;
use Shop\Products\Television;
use Shop\Shop;

// List of electronic items
$playStation = new Console("PlayStation 4", "Playstation 4 with no accessories", 230);
$samsungTv = new Television("Samsung LCD TV 42 in", "Samsung LCD TV 42 inches, full HD, wall mount and smart gestures.", 699);
$vintageTv = new Television("Old 70's vintage CTR TV", "Old TV from the 50's in perfect working conditions.", 150);
$microwave = new Microwave("Mini microwave oven 400W", "Very practical and economic microwave oven.", 130);

// List of extras
$wiredGamepad = new Gamepad('PS4 Wired Gamepad', 'PS4 black plastic gamepad dual shock', 19.99, true);
$wirelessGamepad = new Gamepad('PS4 Wireless Gamepad', 'PS4 black plastic bluetooth gamepad dual shock', 49.99, false);
$remoteController = new Controller('TV remote control', "Standard plastic TV remote control", 15.99, false);

// Add the extras
$playStation->addExtra($wiredGamepad, 2);
$playStation->addExtra($wirelessGamepad, 2);
$samsungTv->addExtra($remoteController, 2);
$vintageTv->addExtra($remoteController);

// Shop
$shoppingCart = new Shop();
$shoppingCart->addItem($playStation);
$shoppingCart->addItem($samsungTv);
$shoppingCart->addItem($vintageTv);
$shoppingCart->addItem($microwave);

$shoppingCart->checkout();



