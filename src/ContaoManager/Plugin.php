<?php

namespace HeimrichHannot\NavigationPlus\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use HeimrichHannot\NavigationPlus\HeimrichHannotNavigationPlus;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(HeimrichHannotNavigationPlus::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}