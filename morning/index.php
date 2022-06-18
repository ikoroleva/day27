<?php
require_once 'Computer.php';

$my_computer = new Computer;

$my_computer->model = "Lenovo ideapad";
$my_computer->operating_system = "Windows";
$my_computer->is_portable = true;
$my_computer->status = "on";

//$my_computer->switchedOff();

$my_computer->toggleSwitch();
$my_computer->toggleSwitch();

var_dump($my_computer);

$nr_of_computers = 0;

Computer::$nr_of_computers++;
var_dump(Computer::$nr_of_computers);

var_dump(Computer::getNrOfComputers());

var_dump(Computer::class);

?>

<h1>My computer</h1>
<table>
    <tr><th>Model:</th><td><?=$my_computer->model?></td></tr>
    <tr><th>OS:</th><td><?=$my_computer->operating_system?></td></tr>
    <tr><th>Portable:</th><td><?=$my_computer->is_portable ? 'yes': 'no'?></td></tr>
    <tr><th>Status:</th><td>switched <?=$my_computer->status?></td></tr>
</table>

