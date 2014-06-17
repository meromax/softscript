<?php

function timeDiffInWords ($time)
{
    $time = strtotime(date("Y-m-d H:i:s")) - strtotime($time);
    
    $years = ($time / (1 * 60 * 60 * 24 * 30 * 12));
    $months = ($time / (1 * 60 * 60 * 24 * 30));
    $days = ($time / (1 * 60 * 60 * 24));
    $time = $time % (1 * 60 * 60 * 24);
    $hours = ($time / (1 * 60 * 60));
    $time = $time % (1 * 60 * 60);
    $minutes = ($time / (1 * 60));
    $time = $time % (1 * 60);
    $seconds = $time;
    
    $timeRtrn = array();
    
    if (floor($years) == 1)
        array_push($timeRtrn, '1 year'); else if (floor($years) > 1) {
        array_push($timeRtrn, floor($years) . ' years');
    }
    
    if (floor($months) == 1)
        array_push($timeRtrn, '1 month'); else if (floor($months) > 1) {
        array_push($timeRtrn, floor($months) - ((floor($years) > 0) ? floor($years) * 12 : 0) . ' months');
    }
    
    if (floor($days) == 1)
        array_push($timeRtrn, '1 day'); else if ($days > 1)
        array_push($timeRtrn, floor($days) - ((floor($months) > 0) ? floor($months) * 30 : 0) . ' days');
    
    if ($hours == 1)
        array_push($timeRtrn, '1 hr'); else if ($hours > 1)
        array_push($timeRtrn, floor($hours) . ' hr');
    
    if ($minutes == 1)
        array_push($timeRtrn, '1 min'); else if ($minutes > 1)
        array_push($timeRtrn, floor($minutes) . ' min');
    
    if ($seconds == 1)
        array_push($timeRtrn, '1 sec'); else if ($seconds > 1)
        array_push($timeRtrn, floor($seconds) . ' sec');
    
    return $timeRtrn[0] . ' ' . $timeRtrn[1];
    //return join(' ', $timeRtrn);

}