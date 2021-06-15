<?php
    if (is_front_page() || is_page_template( 'contacts.php' ) || is_page_template( 'about-us.php' )) { ?>
        <body <?php body_class(); ?> >
   <?php } else { ?>
        <body <?php body_class('greybg'); ?> >
   <?php }
?>
