<?php

//IF WINDOWS
//MAKE PING WITH HOSTNAME
exec("ping -n 1 -w 1 " . $hostnameToUpdate, $output, $result);
// CHECK RESULT
if ($result == 0) {
    echo "<img src='/hello/img/leds/led_on.png' width='16' height='16' title='ON'>";
    $date = date('d/m/Y');
    $day = date('d');
    $query0 = "UPDATE macs SET date = '$date', status = '$day' WHERE hostname='$hostnameToUpdate'";
    $result0 = mysqli_query($connection, $query0);
} else {
    //MAKE PING WITH HOSTNAME
    exec("ping -n 1 -w 1 " . $ipToUpdate, $output, $result);
    // CHECK RESULT
    if ($result == 0) {
        echo "<td class='table-header'> <img src='/hello/img/leds/led_on.png' width='16' height='16' title='ON'> </td>";
        $date = date('d/m/Y');
        $day = date('d');
        $query0 = "UPDATE macs SET date = '$date', status = '$day' WHERE hostname='$hostnameToUpdate'";
        $result0 = mysqli_query($connection, $query0);
    } else {
        echo "<td class='table-header'> <img src='/hello/img/leds/led_off.png' width='16' height='16' title='OFF'> </td>";
    }

} 