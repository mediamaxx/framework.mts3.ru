<?php
$arResult = [
	'subtitle' =>  $args['subtitle'],
	'title' => [
		'state' => $args['title_state'],
		'text' => $args['title'],
	],
	'content' => apply_filters('the_content', $args['content']),
	'preview' => $args['preview'],
	'link' => $args['link'],
];

?>


<div class="section about">
	<div class="container">			
		<<?= $arResult['title']['state']; ?> class="section-title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>		
		<div class="about-block clearfix">						
			<div class="about__slider">	
			<?php foreach ($arResult['preview'] as $item): ?>	
				<?php if($item['_type'] == 'video'):
					$image = [
						'full' => wp_get_attachment_image_url($item['preview'], 'full'),
						'blur' => wp_get_attachment_image_url($item['preview'], 'blur'),
						'alt' => get_post_meta($item['preview'], '_wp_attachment_image_alt', TRUE), 
					];
					
					?>
				<a href="<?= $item['link'] ?>" class="about__multimedia about__multimedia--video" data-fancybox><img src="<?= $image['blur'] ?>" data-src="<?= $image['full'] ?>" class="lazyload" alt="<?= $image['alt'] ?>"><span class="play"><img src="<?= _assets(); ?>/img/play.svg" alt="Alt" class="svg"></span></a>
				<?php else:
					$image = [
						'full' => wp_get_attachment_image_url($item['preview'], 'full'),
						'blur' => wp_get_attachment_image_url($item['preview'], 'blur'),
						'alt' => get_post_meta($item['preview'], '_wp_attachment_image_alt', TRUE), 
					];
						?>
				<a href="<?= $image['full'] ?>" class="about__multimedia"><img src="<?= $image['blur'] ?>" class="lazyload" data-src="<?= $image['full'] ?>" alt="<?= $image['alt'] ?>"></a>
				<?php endif; ?>
			<?php endforeach; ?>
			</div>
			<div class="about__text">
				<div class="about__title"><?= $arResult['subtitle'] ?></div>	
				<div class="format-text">
					<?= $arResult['content'] ?>
				</div>
				<?php if($arResult['link']): ?><a href="<?= $arResult['link'] ?>" class="about__more">Подробнее</a><?php endif; ?>
			</div>						
		</div>	
	</div>	
</div>					

			















