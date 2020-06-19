<?php

   $nome_empresa              = get_field('nome_empresa');
   $url                       = get_field('url');
   $imagem                    = get_field('imagem');
   $porcentagem_de_desconto   = get_field('porcentagem_de_desconto');
   $logo                      = get_field('logo');
   $descricao                 = get_field('resumo');
   $link = parse_url($url, PHP_URL_HOST);
   
?>

<div class="box_beneficio">
   <img class="imagem_beneficio" src="<?php echo $imagem ?>" alt="" width="299" height="160" />
   <span class="desconto_beneficio"><?php echo $porcentagem_de_desconto ?>% OFF</span>
   <img class="logo_beneficio" src="<?php echo $logo ?>" alt="" width="80" height="80" />
   <div class="descricao_beneficio">
         <a href="<?php echo $url ?>" target="_blank" class="link_beneficio"><?php echo $link ?></a>
         <div class="descricao_beneficio_texto"><?php echo $descricao ?></div>
   </div>
</div>