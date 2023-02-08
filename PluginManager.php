<?php

namespace Plugin\management;

use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PluginManager extends AbstractPluginManager
{

	// インストール時
    public function install(array $meta, ContainerInterface $container)
    {
    }

	// 有効化時
    public function enable(array $meta, ContainerInterface $container)
    {

    }

    /**
     * アンイストール時
     */
    public function uninstall(array $meta, ContainerInterface $container)
    {
    }


}
