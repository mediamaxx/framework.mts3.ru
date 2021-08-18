<?php
/*
Theme Name: Multisite Framework
Text Domain: mt_framework
Version: 0.1
Requires at least: 5.6.1
Requires PHP: 7.2
Description: Our starter pack for create themes
Author: ismarxovich@gmail.com
Author URI: https://postmeta.com/

*/

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------

	0. 	Подключаем ресурсы
	1. 	Убираем в Yoast Seo разметку поиска
	2.  Переподключаем стандартный jQuery в footer
    3.  Подключаем CSS и JS mt-фреймворка
	4. 	Подключаем CSS и JS конкретного проекта
	5. 	Menu Modal
	6. 	Search Modal
	7. 	Page Templates
		a. 	Template: Cover Template
		c. 	Template: Full Width
	8.  Post: Archive
	9.  Post: Single
	10. Blocks
	11. Entry Content
	12. Comments
	13. Site Pagination
	14. Error 404
	15. Widgets
	16. Site Footer
    17. Media Queries
    

    правило: между функционалом - 4 перевода строки.
----------------------------------------------------------------------------- */


/* -------------------------------------------------------------------------- */
/*	0. Подключаем ресурсы PHP
/* -------------------------------------------------------------------------- */



require get_template_directory() . '/framework/tgm/plugin-installer.php'; 

include('include/woocommerce.php');

include('framework/init.php');

include('include/menu.php');

include('include/assets.php');

include('include/thumbnails.php');

include('include/buttons.php');
































