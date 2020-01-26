<?php

//IF LINUX
//MAKE PING WITH HOSTNAME
exec("ping -c 1" . $hostnameToUpdate, $output, $result);

// CHECK RESULT
if ($result == 0) {

echo "<td class='table-header'> <img src='img/leds/led_on.png' width='16' height='16' title='ON'> </td>";
$date = date('d/m/Y');
$day = date('d');
$query0 = "UPDATE macs SET date = '$date', status = '$day' WHERE hostname='$hostnameToUpdate'";
$result0 = mysqli_query($connection, $query0);

} else {

//MAKE PING WITH IP
exec("ping -c 1 " . $ipToUpdate, $output, $result);

if($result == 0) {
echo "<td class='table-header'> <img src='/hello/img/leds/led_on.png' width='16' height='16' title='ON'> </td>";

$date = date('d/m/Y');
$day = date('d');
$query0 = "UPDATE macs SET date = '$date', status = '$day' WHERE hostname='$hostnameToUpdate'";
$result0 = mysqli_query($connection, $query0);
} else {
echo "<td class='table-header'> <img src='/hello/img/leds/led_off.png' width='16' height='16' title='OFF'> </td>";
}
    
}