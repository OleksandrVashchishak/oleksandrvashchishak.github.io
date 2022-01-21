<footer>
    <div class="wrap-footer">
        <div class="flex-footer">
            <div class="logo-left">
                <img src="<?= get_field('footer_logo', get_option( 'page_on_front' ))['url'] ?>">
            </div>
            <div class="links">
                <?php $footer_content = get_field('footer_content', get_option( 'page_on_front' ));
                foreach ($footer_content as $item){?>
                <div class="item">
                    <?= $item['content'] ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>
<script>
    var ajaxurl = '<?= site_url() ?>/wp-admin/admin-ajax.php';
    var TEMPLATE_DIRECTORY_URI = '<?php echo get_template_directory_uri(); ?>';
</script>

<?php
//    send_mail( 1804, 816 );
?>

<?php wp_footer(); ?>
</body>
</html>
