<?php
	$arResult = [
		'image' => [
			'full' => wp_get_attachment_image_url($args['image'], 'full'),
			'blur' => wp_get_attachment_image_url($args['image'], 'blur'),
			'alt' => get_post_meta($args['image'], '_wp_attachment_image_alt', TRUE), 
		],
		'subtitle' =>  $args['subtitle'],
		'title' => [
			'state' => $args['title_state'],
			'text' => $args['title'],
		],
		'content' => apply_filters('the_content', $args['content'])
	];
	
	?>





<div class="section cta">
					<div class="container">

	<div class="cta-block lazyload" style="background-image: url('<?= $arResult['image']['blur']; ?>');" data-src="<?= $arResult['image']['full']; ?>">

		<div class="cta__info">

			<div class="section-suptitle"><?= $arResult['subtitle'] ?></div>
			<<?= $arResult['title']['state']; ?> class="section-title"><?= $arResult['title']['text']; ?></<?= $arResult['title']['state']; ?>>
			<div class="cta__text format-text">
				<?= $arResult['content']; ?>
				</div>
				<div class="cta__form">

					<?php echo do_shortcode('[contact-form-7 id="6" title="Contact form 1" html_class="form"]'); ?>

					<script>
						
						document.querySelector('.cta__form  .check-wrapper .wpcf7-list-item > label').classList.add('custom-checkbox');
						document.querySelector('.cta__form  .check-wrapper .custom-checkbox').insertBefore(document.createElement('span'), document.querySelector('.cta__form .check-wrapper .wpcf7-list-item .custom-checkbox .wpcf7-list-item-label'));
						document.querySelector('.cta__form  .check-wrapper .wpcf7-list-item > label > input').classList.add('input-check');

					</script>


				</div>
			</div>
		</div>


		</div>

</div>