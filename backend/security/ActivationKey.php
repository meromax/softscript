<?php

class ActivationKey
{
    
    public function generate()
    {
        $from = (float) microtime();
        return md5($from);
    }
    
}