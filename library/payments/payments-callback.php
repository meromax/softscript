<?php

require_once('../config.php');
require_once('payment.class.php');

$pay_settings = Settings::getSettingsByKey('payments');
$PS = CPayment::getAllPayments();
foreach ($PS as $PSmethod) {
    $class_name = get_class($PSmethod);
    if (!empty($pay_settings[$class_name]['active']) and $PSmethod->isCallback()) {
        $PSmethod->process();
        break;
    }
}