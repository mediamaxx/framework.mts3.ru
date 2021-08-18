<?php

get_header();

$arParams = carbon_get_the_post_meta( 'front_page' );
?>


<main class="main">	

<?php 
        do_action( 'woocommerce_before_main_content' );
    ?>		

<div class="content">

    <div class="container">
        <div class="format-text">	
            <h1><?php the_title(); ?></h1>	

            <?php
            
            if(have_posts()) {
                the_post();

                if(get_the_content() != '') {
                    the_content();
                } else {
                    echo '<br>  <br>  <br>К сожалению, данная страница находится на стадии заполнения <br>  <br>  <br>';
                }

                
            } else {
                
            }
            
             ?>				
                                        
        </div>
    </div>

</div>	

</main>		

<?php

get_footer();

?>