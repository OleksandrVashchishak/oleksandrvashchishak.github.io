  <div class="blog__container">
    <?php
    $args = array(
      'paged' => $paged,
      'post_status' => 'publish'
    );

    $mypost_Query = new WP_Query($args);
    if ($mypost_Query->have_posts()) { ?>

      <?php while ($mypost_Query->have_posts()) {
        $mypost_Query->the_post();
        get_template_part('/template-parts/content/content');
      }
      wp_reset_postdata(); ?>
    <?php } ?>
  </div>

  <script>
    var this_page = 1;
  </script>

  <div class="btn-loadmore" title="Load more" data-param-posts='<?php echo serialize($mypost_Query->query_vars); ?>' data-max-pages='<?php echo $mypost_Query->max_num_pages; ?>' data-tpl='doveryayut'>
    <span class="fas fa-redo"></span> Load more
  </div>

  <?php
  function load_posts()
  {
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged'] = $_POST['page'] + 1;

    $mypost_Query = new WP_Query($args);
    if ($mypost_Query->have_posts()) {

      while ($mypost_Query->have_posts()) {
        $mypost_Query->the_post();

        get_template_part('/template-parts/content/content');
      }
      wp_reset_postdata();
    }
    die;
  }
  add_action('wp_ajax_loadmore', 'load_posts');
  add_action('wp_ajax_nopriv_loadmore', 'load_posts');
  ?>

  <script>
    jQuery(function($) {
      $('.btn-loadmore').on('click', function() {
        let _this = $(this);
        _this.html('<span class="fas fa-redo fa-spin"></span> Load...');

        let data = {
          'action': 'loadmore',
          'query': _this.attr('data-param-posts'),
          'page': this_page,
          'tpl': _this.attr('data-tpl')
        }

        $.ajax({
          url: '/wp-admin/admin-ajax.php',
          data: data,
          type: 'POST',
          success: function(data) {
            console.log(this_page);
            console.log(data);
            if (data) {
              _this.html('<span class="fas fa-redo"></span> Load more');
              document.querySelector('.blog__container').innerHTML += data;
              this_page++;
              if (this_page == _this.attr('data-max-pages')) {
                _this.remove();
              }
            } else {
              _this.remove();
            }
          }
        });
      });
    });
  </script>