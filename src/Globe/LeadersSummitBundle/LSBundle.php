<?php

namespace Globe\LeadersSummitBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LSBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
