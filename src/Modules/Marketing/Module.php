<?php

namespace App\Modules\Marketing;

class Module extends \Sintattica\Atk\Core\Module
{
    static $module = 'marketing';

    public function register()
    {
        $this->registerNode('produtos', Produtos::class, ['admin', 'add', 'edit', 'delete', 'impersonate']);
        $this->registerNode('imagens', Imagens::class, ['admin', 'add', 'edit', 'delete', 'impersonate']);
    }

    public function boot()
    {
        $this->addMenuItem('marketing');
        $this->addNodeToMenu('produtos', 'produtos', 'admin', 'marketing');
        $this->addNodeToMenu('imagens', 'imagens', 'admin', 'marketing');
    }
}
