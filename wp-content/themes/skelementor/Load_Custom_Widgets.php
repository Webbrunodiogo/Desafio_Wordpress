<?php

namespace WPC;

class Load_Custom_Widgets 
{
    private static $_instance = null;

    public static function instance()
    {
        if (! is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct()
    {
        
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
    }

    private function include_widgets_files()
    {
        require_once(_DIR_ . '/widgets/beneficios.php');
    }

    public function register_widgets()
    {
        $this->include_widgets_files();

        \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\Beneficios());
    }
}


Load_Custom_Widgets::instance();
