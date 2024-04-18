<?php

namespace HeimrichHannot\NavigationPlus;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimrichHannotNavigationPlus extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

}