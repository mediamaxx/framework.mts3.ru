

<?php 
//Template Name: Новостной шаблон
get_header(); ?>





    <main class="main">	

    <?php 
        do_action( 'woocommerce_before_main_content' );
    ?>

					<!-- <div class="breadcrumbs-block">
						<div class="container">
                            <?php


                                if ( function_exists('yoast_breadcrumb') ) {
                                    yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
                                } 
                            ?>
						</div>
					</div>		 -->

					<div class="news-section">

					<div class="container">
						<h1 class="section-title"><?php single_cat_title(); ?></h1>	
						<div class="page-info format-text">
                        <?= category_description() ; ?>						</div>					

						<div class="news-grid">
                        <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); ?>


							<a href="<?php the_permalink(); ?>" class="new">
								<span class="new__photo"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Alt"></span>
								<span class="new__title"><?php the_title(); ?></span>
								<span class="new__date"><?php echo get_the_date(); ?></span>
								<span class="new__text format-text">
                                <?php the_excerpt(); ?>								
                            </span>		
								<span class="new__more">Читать далее</span>						
							</a>
                            <?php endwhile; else:  ?>   
                        <div class="container">
                            <div class="format-text">
                                <p>
                                    К сожалению, данная страница находится в стадии заполнения.
                                </p>              
                            </div>
                        </div>
                     <?php endif; ?>

							
						</div>	

					

					</div>

				</div>		

				<!-- <div class="section seo">
					<div class="container">
						<div class="seo__text format-text">
							<p>Как принято считать, стремящиеся вытеснить традиционное производство, нанотехнологии, инициированные исключительно синтетически, в равной степени предоставлены сами себе. Имеется спорная точка зрения, гласящая примерно следующее: многие известные личности и по сей день остаются уделом либералов, которые жаждут быть своевременно верифицированы. Идейные соображения высшего порядка, а также постоянный количественный рост и сфера нашей активности требует определения и уточнения новых предложений.</p>
						</div>
					</div>
				</div>					 -->
                <br>

                

			</main>	

<?php get_footer(); ?>

