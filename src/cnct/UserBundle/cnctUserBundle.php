<?php

namespace cnct\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class cnctUserBundle extends Bundle
{
	public function getParent()
    {
        return 'FOSUserBundle';
    }
}