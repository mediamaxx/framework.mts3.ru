

<?php

$arResult = [
    'subtitle' => $args['subtitle'], 
    'title' => [
        'state' => $args['title_state'],
        'text' => $args['title'],
    ],
   
    'links' => $args['links']
];

?>



















<div class="section popular-products">
					<div class="container">
                    <?php if($arResult['subtitle']): ?>
        <div class="section-suptitle"><?= $arResult['subtitle'] ?></div>
        <?php endif; ?>
            <<?= $arResult['title']['state']; ?> class="section-title" style="display: block;">
                <?= $arResult['title']['text']; ?>
            </<?= $arResult['title']['state']; ?>>
						<div class="products">



                        <?php 

$current = get_the_ID();

//var_dump('<pre>', $arResult['links']);
$array_posts = [];
foreach($arResult['links'] as $item) {
    array_push($array_posts, $item['id']);
}

$products = new WP_Query( array(
'post_type'      => array('product'),
'post_status'    => 'publish',
'posts_per_page' => -1,
'post__in' => $array_posts
// 'meta_query'     => array( array(
// 	'key' => '_visibility',
// 	'value' => array('catalog', 'visible'),
// 	'compare' => 'IN',
// ) ),
// 'tax_query'      => array( array(
// 	'taxonomy'        => 'pa_color',
// 	'field'           => 'slug',
// 	'terms'           =>  array('blue', 'red', 'green'),
// 	'operator'        => 'IN',
// ) )
) );

?>



<?php 

$counter = 0;

while($products->have_posts()): $products->the_post(); ?>


<?php 
$counter++;

if($counter > 8) {
    $view['hide'] = true;
} else {
    $view['hide'] = false;
}

do_action( 'woocommerce_shop_loop' );
set_query_var( 'is_product_cat', true );
get_template_part( 'template-parts/grid', 'products', $view );
set_query_var( 'is_product_cat', false );



?>

<?php  endwhile; wp_reset_postdata(); ?>





							

						</div>

                        <?php if($counter > 8): ?>

						<a href="javascript:void(0);" class="btn btn--bdr popular-products__btn">Загрузить еще</a>

                        <?php endif; ?>

					</div>
				</div>	


                <script>

                if(document.querySelector(" .popular-products  .popular-products__btn")) {
                    let buttonMore = document.querySelector(" .popular-products  .popular-products__btn");
                    

                    buttonMore.addEventListener('click', (e) => {

                        if(document.querySelector(" .popular-products  .product--hidden")) {
                            let productHidden = document.querySelectorAll(" .popular-products  .product.product--hidden");

                            for (let i = 0; i < 8; i++) {
                            

                                if(productHidden.length > 8) {
                                    productHidden[i].classList.remove('product--hidden');
                                } else {
                                    productHidden[i].classList.remove('product--hidden');
                                    e.target.style.display = 'none';
                                }

                                


                                
                            }


                        } else {
                            e.target.style.display = 'none';
                        }
                        




                    });
                }
                
                
                
                
                </script>


