<?php

$controleRe = new stdClass;
$controleRe->name = "Controle remoto";

$joyStick = new stdClass;
$joyStick->name = "Joystick";

$soportePared = new stdClass;
$soportePared->name = "Soporte Pared";

$currentExtras = array($controleRe, $joyStick, $soportePared);

function removeExtra(string $extraName, $currentExtras)
{
   foreach ($currentExtras as $extra) {
      $newExtras[] = $extra->name != $extraName ? $extra : '';
   }
   return $newExtras;
}

var_dump(removeExtra("Controle remoto", $currentExtras));
