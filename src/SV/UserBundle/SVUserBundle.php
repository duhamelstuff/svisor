<?php

namespace SV\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SVUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
