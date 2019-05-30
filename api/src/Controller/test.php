<?php


namespace App\Controller;


use Symfony\Component\Intl\Intl;

class test
{
    public function test(){
        Intl::getRegionBundle()->getCountryName('');
    }
}
