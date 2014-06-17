<?php

function YearSelect()
{
    $years = array_reverse(range(1930, 2000));
    return $years;
}

function DaySelect()
{
    $days = array_reverse(range(01, 31));
    $days_proc = array();
    foreach($days as $day)
    {
        if($day <= 9) $day = '0' . $day;
        $days_proc[] = $day;
        
    }
    return $days_proc;
}

function MonthSelect()
{
    $months = array(
                    '01' => 'January',
                    '02' => 'February',
                    '03' => 'March',
                    '04' => 'April',
                    '05' => 'May',
                    '06' => 'June',
                    '07' => 'July',
                    '08' => 'August',
                    '09' => 'September',
                    '10' => 'October',
                    '11' => 'November',
                    '12' => 'December'
                     );
    
    $months = array_reverse($months);
    return $months;
}