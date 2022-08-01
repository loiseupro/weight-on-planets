<?php
require_once 'planetWeightClass.php';

/* Test */
$planet = new planetWeight(175);
echo $planet->calculateAll();
