<?php
  /**
   * The template for displaying product content within loops
   *
   * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
   *
   * HOWEVER, on occasion WooCommerce will need to update template files and you
   * (the theme developer) will need to copy the new files to your theme to
   * maintain compatibility. We try to do this as little as possible, but it does
   * happen. When this occurs the version of the template file will be bumped and
   * the readme will list any important changes.
   *
   * @see     https://docs.woothemes.com/document/template-structure/
   * @author  WooThemes
   * @package WooCommerce/Templates
   * @version 2.6.1
   */

  if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
  }



  global $product;
  $short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);
  $weight = $product->get_weight();

  // Ensure visibility
  if (empty($product) || ! $product->is_visible()) {
    return;
  }
  $product_id = $product->get_id();

  $product_labels = carbon_get_the_post_meta( 'product_labels' );

  $is_popular = get_post_meta( get_the_ID(), 'is_popular_good' , true);


  $anons         = carbon_get_the_post_meta( 'anons' );

 
?>

<?php
if(!isset($args['hide'])) {
    $args['hide'] = false;
}
?>



<div itemscope itemtype="http://schema.org/Product" aria-label="<?php the_title(); ?>" data-href="<?php the_permalink(); ?>" class="product <?php if( $args['hide'] == true ) echo 'product--hidden'; ?> ">	
	<meta itemprop="name" content="<?php the_title(); ?>">
	<link itemprop="url" href="<?php the_permalink(); ?>">
	<meta itemprop="description" content="<?php the_title(); ?>">
    <div class="product__tags">
        <?php if($product->get_sale_price()): ?>
        <div class="product__tag">Скидка</div>
        <?php endif; ?>
        <!-- <div class="product__tag product__tag--hit">Хит</div>
        <div class="product__tag product__tag--new">Новинка</div>
        <div class="product__tag product__tag--out">Нет в наличии</div> -->
    </div>							
    <a href="<?php the_permalink(); ?>" class="product__photo">    
        <?= woocommerce_get_product_thumbnail( 'full' ); ?>       
    </a>
    <div class="product__title"><?php the_title(); ?></div>


    


    <?php if($product->get_regular_price()): ?>
    <div class="product__price"  itemprop="offers" itemscope itemtype="http://schema.org/Offer">
        <meta itemprop="price" content="<?= $product->get_price();?>">
        <meta itemprop="priceCurrency" content="RUB">
        <span class="product__price-title">Цена</span>
        <?php if($product->get_sale_price()): ?>
        <span class="product__old-price"><?= $product->get_regular_price(); ?> руб.</span>
        <span class="product__new-price"><?= $product->get_sale_price(); ?> руб.</span>
        <?php else: ?>
        <span class="product__new-price"><?= $product->get_regular_price(); ?> руб.</span>
        <?php  endif; ?>
        <?// do_action('woocommerce_after_shop_loop_item_title'); ?>
    </div>
    <?php endif; ?>

    <div class="product__hide">


        <div class="product__chars-groups">
            <?php if($product->get_length() || $product->get_width()): ?>
            <div class="product__chars-group">
                <div class="product__chars-title">Размеры</div>
                <div class="product__chars">
                    <?php if($product->get_length()): ?>
                    <div class="product__char">
                        <span class="product__char-prop">длина</span>
                        <span class="product__char-val"><?= $product->get_length(); ?> см</span>
                    </div>
                    <?php endif; ?>
                    <?php if($product->get_width()): ?>
                    <div class="product__char">
                        <span class="product__char-prop">ширина</span>
                        <span class="product__char-val"><?= $product->get_width(); ?> см</span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if($product->get_attribute( 'czvet' ) || $product->get_attribute( 'material' )): ?>
            <div class="product__chars-group">
                <div class="product__chars-title">Внешний вид</div>
                <div class="product__chars">
                    <?php if($product->get_attribute( 'czvet' )): ?>
                    <div class="product__char">
                        <span class="product__char-prop">цвет</span>
                        <span class="product__char-val"><?=  $product->get_attribute( 'czvet' ); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if($product->get_attribute( 'material' )): ?>
                    <div class="product__char">
                        <span class="product__char-prop">материал</span>
                        <span class="product__char-val"><?=  $product->get_attribute( 'material' ); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

            <div class="product__btns">
                <button data-href="#callback" class="btn">Заказать</button>
                <a href="<?php the_permalink(); ?>" class="product__link"><img src="<?= _assets() ?>/img/up.svg" alt="Alt" class="svg"></a>
            </div>
    
    </div>								
</div>




