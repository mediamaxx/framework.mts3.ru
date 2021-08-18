

<?php 
//Template Name: Новостной шаблон
get_header(); ?>





    <main class="main">	

    <?php 
        do_action( 'woocommerce_before_main_content' );
    ?>



				

                   

                        <div class="reviews-section">
                        

					<div class="container">
						<h1 class="section-title"><?php single_cat_title(); ?></h1>	
						<div class="page-info format-text">
                        <?= category_description() ; ?>						</div>					

                        <div class="reviews">
                        <?php if(have_posts()): ?>
                    <?php while(have_posts()): the_post(); ?>


              

							<div class="review clearfix">
                            <?php
                            $slider = carbon_get_the_post_meta('preview');
                            
                            if($slider): 
                            ?>
								<div class="review__slider">	

                                <?php foreach($slider as $item):


                                    $image = [
                                        'full' => wp_get_attachment_image_url($item['preview'], 'full'),
                                        'blur' => wp_get_attachment_image_url($item['preview'], 'blur'),
                                        'alt' => get_post_meta($item['preview'], '_wp_attachment_image_alt', TRUE), 
                                    ];
                                    
                                    if($item['_type'] == 'video'): 
                                    ?>
                                    
                                    <a href="<?= $item['link'] ?>" class="review__multimedia review__multimedia--video" data-fancybox>
                                        <img src="<?= $image['blur'] ?>" class="lazyload"  data-src="<?= $image['full'] ?>" alt="<?= $image['alt'] ?>">
                                        <span class="play"><img src="<?= _assets(); ?>/img/play.svg" alt="Alt" class="svg"></span>
                                    </a>

                                    <?php 

                                    else: ?>
                                    
                                    

									<a href="<?= $image['full'] ?>" class="review__multimedia">
                                         <img src="<?= $image['blur'] ?>" class="lazyload"  data-src="<?= $image['full'] ?>" alt="<?= $image['alt'] ?>">
                                    </a>


									

                                    <?php endif;  endforeach; ?>



								</div>

                                <?php 
                                endif;

                                ?>
								<div class="review__info">
									<div class="review__name"><?php the_title(); ?></div>								
									<div class="review__date"><?php echo get_the_date(); ?></div>
									<div class="review__text format-text">
                                            <?php the_content(); ?>
                                    </div>
								</div>
							</div>	
<!-- 
							<div class="review clearfix">				
								<div class="review__info">
									<div class="review__name">Иванов Константин</div>								
									<div class="review__date">21 Октября 2020</div>
									<div class="review__text format-text">
										<p>А также сторонники тоталитаризма в науке лишь добавляют фракционных разногласий и подвергнуты целой серии независимых исследований. Противоположная точка зрения подразумевает, что акционеры крупнейших компаний и по сей день остаются уделом либералов, которые жаждут быть подвергнуты целой серии независимых исследований. Значимость этих проблем настолько очевидна, что базовый вектор развития напрямую зависит от позиций, занимаемых участниками в отношении поставленных.</p>
									</div>
								</div>
							</div>	

							<div class="review clearfix">								
								<div class="review__info">
									<div class="review__name">Екатерина Николаевна</div>								
									<div class="review__date">21 Октября 2020</div>
									<div class="review__text format-text">
										<p>Задача организации, в особенности же граница обучения кадров обеспечивает актуальность поэтапного и последовательного развития общества. Сделанные на базе интернет-аналитики выводы призваны к ответу. Каждый из нас понимает очевидную вещь: перспективное планирование способствует подготовке и реализации укрепления моральных ценностей. Задача организации, в особенности же дальнейшее развитие различных форм деятельности выявляет срочную потребность распределения внутренних резервов и ресурсов. Некоторые особенности внутренней политики подвергнуты целой серии независимых исследований. В своём стремлении улучшить пользовательский.</p>
									</div>
								</div>
							</div>	

							<div class="review clearfix">
								<div class="review__slider">		
									<a href="img/review-pic-2.jpg" class="review__multimedia"><img src="img/review-pic-2.jpg" alt="Alt"></a>
								</div>
								<div class="review__info">
									<div class="review__name">Иванов Константин</div>								
									<div class="review__date">21 Октября 2020</div>
									<div class="review__text format-text">
										<p>Следует отметить, что семантический разбор внешних противодействий способствует подготовке и реализации распределения внутренних резервов и ресурсов! В частности, повышение уровня гражданского сознания однозначно фиксирует необходимость приоритизации разума над эмоциями. В своём стремлении улучшить пользовательский опыт мы упускаем, что явные признаки победы институционализации набирают популярность среди определенных слоев населения, а значит, должны быть ассоциативно распределены по отраслям. И нет сомнений, что сторонники тоталитаризма в науке и по сей день остаются уделом либералов, которые жаждут быть описаны максимально подробно. Равным образом, начало повседневной работы по формированию позиции не даёт нам иного выбора, кроме определения приоритизации разума над эмоциями.</p>
									</div>
								</div>
							</div>	 -->

						


						
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

                

              

					<div class="section add-review">
					<div class="container">

						<div class="add-review-block" style="background-image: url('<?= _assets(); ?>/img/add-review-bg.jpg');">

							<div class="add-review__info">
								
								<div class="section-title">Оставь отзыв о нашей работе</div>
								
								<div class="add-review__form">

                                        <?= do_shortcode('[contact-form-7 id="846" title="Форма отправки отзывов" html_class="form"]'); ?>

									</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script>                            
                    document.querySelector('.add-review  .check-wrapper .wpcf7-list-item > label').classList.add('custom-checkbox');
                    document.querySelector('.add-review  .check-wrapper .custom-checkbox').insertBefore(document.createElement('span'), document.querySelector('.add-review .check-wrapper .wpcf7-list-item .custom-checkbox .wpcf7-list-item-label'));
                    document.querySelector('.add-review  .check-wrapper .wpcf7-list-item > label > input').classList.add('input-check');

                    document.querySelector(".file-input-wrap .file-276").classList.add('file-upload');
                    document.querySelector('.file-input-wrap').appendChild(document.querySelector(".file-input-wrap .file-276"));

                    let label = document.createElement('label');
                    label.setAttribute('for','file'); 
                    label.classList.add('file-upload__btn');
                    label.textContent = 'Загрузить файл';
                    document.querySelector(".file-input-wrap .file-276").appendChild(label);
                </script>



             

			</main>	

<?php get_footer(); ?>

