<?php

get_header();

?>

<main class="main">				

<div class="not-found">
    <div class="container">	
        <div class="not-found-block">		
            <img src="<?= _assets(); ?>/img/404.png" alt="404">											
            <div class="not-found__title">Страница не найдена <br>или удалена</div>
            <a href="/" class="not-found__back">Вернуться на главную страницу</a>
        </div>								
    </div>
</div>

</main>


<?php

get_footer();

?>