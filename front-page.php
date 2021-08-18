<?php
//Template Name: Главная страница
get_header();

$arParams = carbon_get_the_post_meta( 'front_page' );
?>

<main class="main is-index">

    
    <?php
       foreach($arParams as $arItem):

           get_template_part('template-parts/'.$arItem['_type'], NULL, $arItem);

       endforeach;
    ?>


              

               

                
                


 

                            



			
<!-- 
				<div class="section seo">
					<div class="container">
						<div class="section-title">СЕО</div>
						<div class="seo__text format-text">
							<p>Как принято считать, стремящиеся вытеснить традиционное производство, нанотехнологии, инициированные исключительно синтетически, в равной степени предоставлены сами себе. Имеется спорная точка зрения, гласящая примерно следующее: многие известные личности и по сей день остаются уделом либералов, которые жаждут быть своевременно верифицированы. Идейные соображения высшего порядка, а также постоянный количественный рост и сфера нашей активности требует определения и уточнения новых предложений.</p>
						</div>
					</div>
				</div> -->



</main>

<!-- <main class="main">
<div class="not-found">
    <div class="container">	
        <div class="not-found-block">		
            <img src="<?= _assets(); ?>/img/404.png" alt="404">											
            <div class="not-found__title">Страница не найдена <br>или удалена</div>
            <a href="/" class="not-found__back">Вернуться на главную страницу</a>
        </div>								
    </div>
</div>

</main> -->


<script>
var clHeight = document.documentElement.clientHeight
  , clWidth = document.documentElement.clientWidth;



hideAll();


console.log('1');


function hideAll() {
    hideHeader();
    hideSections();
    hideCategories();
    hidePopularProducts();
    // hideInfoFonts();
    // hideInfoColors();
    // hideInfoScreen();
    // hideInfoLogos();
    // hideInfoMainLogo();
    // hideInfoInnerPages();
    // hideInfoMobile();
}
setTimeout(showHeader, 500);
window.onscroll = function showAll() {
    showSections();
    showCategories();
    showPopularProducts();
    // showInfoTask();
    // showInfoFonts();
    // showInfoColors();
    // showInfoScreen();
    // showInfoLogos();
    // showInfoMainLogo();
    // showInfoInnerPages();
    // showInfoMobile();
}

function showHeader() {
    document.querySelector('.hero__info').style['transition'] = '0.4s';
    document.querySelector('.hero__info').style['opacity'] = '1';
    document.querySelector('.hero__info').style['transform'] = 'translateX(0)';
    // document.querySelector('.hero-slide .container').style['opacity'] = '1';
    //document.querySelector('.hero-slide .container').style['transform'] = 'translateX(0)';
    // document.querySelector('body > .mainKDshina > div.header > div  div.title__bottom').style['opacity'] = '1';
    // document.querySelector('body > .mainKDshina > div.header > div  div.title__bottom').style['transform'] = 'translateX(0)';
}
function hideHeader() {    
    document.querySelector('.hero__info').style['opacity'] = '0';
    document.querySelector('.hero__info').style['transform'] = 'translateX(-20%)';
    // document.querySelector('.hero-slide .container').style['opacity'] = '0';
    //document.querySelector('.hero-slide .container').style['transform'] = 'translateX(20%)';
    // document.querySelector('body > .mainKDshina > div.header > div  div.title__bottom').style['opacity'] = '0';
    // document.querySelector('body > .mainKDshina > div.header > div  div.title__bottom').style['transform'] = 'translateX(-20%)';
}
function getOffsetY(elem) {
    var top = 0;
    while (elem) {
        top = top + parseFloat(elem.offsetTop);
        elem = elem.offsetParent;
    }
    return (Math.round(top));
}


function getCoordsTop(elem) {
    var box = elem.getBoundingClientRect();
    return (box.top + pageYOffset);
}
function getCoordsMiddle(elem) {
    var box = elem.getBoundingClientRect();
    return (box.top + pageYOffset + (elem.clientHeight / 2));
}
function getCoordsBottom(elem) {
    var box = elem.getBoundingClientRect();
    return (box.bottom + pageYOffset);
}
function hideSections() {
    var elem = document.querySelector('.section.sections');
    elem.style['opacity'] = '0';
    elem.style['transform'] = 'translateY(10%)';
}
function showSections() {
    var elem = document.querySelector('.section.sections');
    var a = getCoordsTop(elem);
    if (window.pageYOffset + clHeight * .6 > a) {
        elem.style['transition'] = '1s';
        elem.style['opacity'] = '1';
        elem.style['transform'] = 'translateY(0)';
    }
}


function hideCategories() {
    var elem = document.querySelector('.section.categories');
    elem.style['opacity'] = '0';
    elem.style['transform'] = 'translateY(10%)';
}
function showCategories() {
    var elem = document.querySelector('.section.categories');
    var a = getCoordsTop(elem);
    if (window.pageYOffset + clHeight * .6 > a) {
        elem.style['transition'] = '1s';
        elem.style['opacity'] = '1';
        elem.style['transform'] = 'translateY(0)';
    }
}



function hidePopularProducts() {
    var elem = document.querySelector('.section.popular-products');
    elem.style['opacity'] = '0';
    elem.style['transform'] = 'translateY(10%)';
}
function showPopularProducts() {
    var elem = document.querySelector('.section.popular-products');
    var a = getCoordsTop(elem);
    if (window.pageYOffset + clHeight * .6 > a) {
        elem.style['transition'] = '1s';
        elem.style['opacity'] = '1';
        elem.style['transform'] = 'translateY(0)';
    }
}

</script>

<?php

get_footer();

?>