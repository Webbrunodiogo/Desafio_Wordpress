<?php

namespace WPC\Widgets;


use Elementor\Widget_Base;
use Elementor\Controls_Mananger;

if (!defined('ABSPATH')) exit;

class beneficios extends Widget_Base{

    $this->_get_initial_config();

    public function get_name() 
    {
        return 'beneficios';
    }

    public function get_title() 
    {
        return 'Beneficios';
    }

    public function get_icon() 
    { 
        return 'fa fa-clipboard';
    }

    public function get_categories() 
    {
        return ['general'];
    }

    protected function _register_controls() {

            $this->start_controls_section(
                'section_content',
                [
                    'label' => 'Settings',
                ]
            );

            $this->add_control(
                'url',
                [
                    'label' => 'URL da Empresa',
                    'type' => Elementor\Controls_Manager::TEXT,
                    'placeholder' => 'Digite a URL da Empresa',
                ]
            );
            $this->add_control(
                'desconto',
                [
                    'label' => 'Desconto',
                    'type' => Elementor\Controls_Manager::TEXT,
                    'placeholder' => 'Insira o Desconto',
                ]
            );
           $this->add_control(
                'resumo',
                [
                    'label' => 'Resumo',
                    'type' => Elementor\Controls_Manager::TEXTAREA,
                    'placeholder' => 'Digite o Resumo',
                ]
            );
            $this->add_control(
                'logo',
                [
                    'label' => 'Logo da Empresa',
                    'type' => Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'imagem',
                [
                    'label' => 'imagem',
                    'type' => Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->end_controls_section();

    }
    protected function _content_template() 
    {

        echo '<h2>I work in JS</h2>';
    }
    

    protected function render($instance = [])
    {
        global $_query;
        
        $paginas = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $categorias = getUserCategories();
        
        if (!empty($format) && $format === "beneficios") { 
            $categorias = array();
        }
        
        $post_query = array(          
            'post_author'  > 1,      
            'post_type'    => 'beneficios',                 
            'post_status'  => 'publish',
        );
?>
<div class="BoxBeneficio">
<?php

$_query = new \WP_Query($post_query); 
$hierarchy = getActiveUserHierarchy();

if (!empty($hierarchy && have_posts())) :
    while ( $wp_query->have_posts() ): 
        $wp_query->the_post();
        get_template_part('loops/beneficios');
    endwhile;
endif;

?>
</div>

<style>
* {
    padding: 0;
    margin: 0;
    font-family: 'verdana'; 
}

body {
    background:#f7f7f7;
}

.BoxBeneficio {
    display: flex;
    max-width: 900px;
    width: 100%;
}

.BoxBeneficio .BoxBeneficio__box {
    display: flex;
    flex-direction: column;
    max-width: 200px;
    width: 100%;
    height: auto;
    position: relative;
    background: #fff;
    text-decoration: none;
    border: 1px solid #e7e7e7;
    align-self: stretch;
}

.BoxBeneficio__img {
    max-width: 200px;
    width: 100%;
    height: 160px;
}

.BoxBeneficio_logo {
    width: 80px;
    height: 80px;
    z-index: 1;
    background: #fff;
    border-radius: 50px;
    border: solid 1px #e7e7e7;
    position: absolute;
    top: 118px;
    right: 25px;  
}

</style>

<?php
    //wp_reset_query();
    }
} // end class

Plugin::instance()->widgets_manager->register_widget_type(new beneficios);
?>