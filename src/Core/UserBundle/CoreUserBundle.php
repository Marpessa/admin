<?php

namespace Core\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CoreUserBundle extends Bundle
{
	/**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
?>