<?php 
//Template Name: Контакты



$arResult = [
    'title' => [
        'state' => carbon_get_the_post_meta('title_state'), 
        'text'  => carbon_get_the_post_meta('title'),
    ],
	
    'address' => carbon_get_the_post_meta('address'),
	'hours' => carbon_get_the_post_meta('hours'),
	'phones' => carbon_get_the_post_meta('phones'),
	'mail' => carbon_get_the_post_meta('mail'),
	'social' => carbon_get_the_post_meta('list_social'),
	'coord_1' => carbon_get_the_post_meta('coord_1'),
	'coord_2' => carbon_get_the_post_meta('coord_2'),
	'image' =>[
		'full' => wp_get_attachment_image_url( carbon_get_the_post_meta('image'), 'full'),
		'blur' => wp_get_attachment_image_url( carbon_get_the_post_meta('image'), 'blur'),
		'alt' => get_post_meta( carbon_get_the_post_meta('image'), '_wp_attachment_image_alt', TRUE), 
	],
	'map_image' =>[
		'full' => wp_get_attachment_image_url( carbon_get_the_post_meta('map_image'), 'full'),
		'blur' => wp_get_attachment_image_url( carbon_get_the_post_meta('map_image'), 'blur'),
		'alt' => get_post_meta( carbon_get_the_post_meta('map_image'), '_wp_attachment_image_alt', TRUE), 
	],
	'map_text' => carbon_get_the_post_meta('map_text'),
];

get_header(); ?>

<main class="main">	
		
		<?php 
			do_action( 'woocommerce_before_main_content' );
		?>

		<div class="contacts-section">			

			<div class="container">		

				<<?= $arResult['title']['state']; ?> class="section-title" style="display: block;">
					<?php if($arResult['title']['text'] != ''): echo $arResult['title']['text']; else: the_title(); endif; ?>
				</<?= $arResult['title']['state']; ?>>

					<div class="contacts-block">												

						<div class="contacts">	

							<div class="address-block">
								<span class="circle-icon"><img src="<?= _assets(); ?>/img/location-icon.svg" alt="Alt"></span>
								<div class="address">
									<div class="address__location">
										<?= $arResult['address']; ?>
									</div>
									<div class="address__time">
										<?= $arResult['hours']; ?>
									</div>
								</div>
							</div>		
							<?php if($arResult['phones']): ?>
							<div class="phone-block">
								<span class="circle-icon"><img src="<?= _assets(); ?>/img/phone-icon.svg" alt="Alt"></span>
								<div class="phone__tels">
								<?php foreach ($arResult['phones'] as $item): 
									
									$link = preg_replace( array( '/\s/', '/\(/', '/\)/', '/-/' ), '', $item['phone'] );
									
									 if( $link[0] != '+' ) {
                                        $link[0] = '7';
                                        $link = '+'.$link;
                                    }
                            
                            ?>
									<a href="tel:<?= $link; ?>"><?= $item['phone']; ?></a>
																					
									<?php endforeach; ?>
								</div>
							</div>		
							<?php endif; ?>
							<div class="web-block">
								<span class="circle-icon"><img src="<?= _assets(); ?>/img/globe.svg" alt="Alt"></span>
								<div class="web-block__info">
								    <?php if($arResult['mail']): ?>
									<a href="mailto:<?= $arResult['mail']; ?>"><?= $arResult['mail']; ?></a>
									<?php endif; ?>
									<?php if($arResult['social']): ?>
									<div class="social">	
									<?php foreach ($arResult['social'] as $item):
											$image = wp_get_attachment_image_url($item['icon_social'], 'full');
											$alt = get_post_meta($item['icon_social'], '_wp_attachment_image_alt', TRUE);
											$link = $item['link_social'];
										?>
										<a href="<?= $link ?>" target="_blank" class="social__link"><img src="<?= $image ?>" alt="<?= $alt ?>" class="svg"></a>									
										<?php endforeach; ?>	
									</div>
									<?php endif; ?>
								</div>
							</div>	

							<a href="<?= $arResult['image']['full']; ?>" class="contacts__photo"><img  class="lazyload" data-src="<?= $arResult['image']['full']; ?>" src="<?= $arResult['image']['blur']; ?>" alt="<?= $arResult['image']['alt']; ?>"></a>

						</div>
					

					<div class="map" id="map"></div>	
						<script>											
						setTimeout(function(){
							var elem = document.createElement('script');
							elem.type = 'text/javascript';
							elem.src = 'https://api-maps.yandex.ru/2.1/?load=package.standard&lang=ru-RU&onload=getYaMap';
							document.getElementsByTagName('body')[0].appendChild(elem);
						}, 500);

						function getYaMap(){
							ymaps.ready(init);
							var myMap,
							myPlacemark;
							var	html  = '<div class="map-popup"><img src="<?= $arResult['map_image']['full']; ?>" alt="Alt"><span> <?= $arResult['map_text']; ?></span></div>';
							function init(){
								myMap = new ymaps.Map("map", {
									center: [<?= $arResult['coord_1']; ?>, <?= $arResult['coord_2']; ?>],								
									zoom: 17,
									controls: ['zoomControl', 'geolocationControl']
								});
								myPlacemark = new ymaps.Placemark([<?= $arResult['coord_1']; ?>, <?= $arResult['coord_2']; ?>], {
									balloonContent: html
								},{
									iconLayout: 'default#image',
									iconImageHref: '<?= _assets(); ?>/img/map-marker.svg',
									iconImageSize: [62, 62],
									iconImageOffset: [-36, -36],
									hideIconOnBalloonOpen: false
								});							
								myMap.geoObjects.add(myPlacemark);	
								myMap.options.set({balloonPanelMaxMapArea:'0'});																		
								myMap.behaviors.disable('scrollZoom');	
								if ($(window).innerWidth() < 1024) {
									myMap.behaviors.disable('drag');
								};	
							}
						}
					</script>

				</div>	
			</div>		
		</div>					

</main>					

<?php get_footer(); ?>		