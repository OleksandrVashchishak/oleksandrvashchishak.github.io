<?php
 get_header();
/*
 Template Name: Our Blog
 */
?>
    
    <script>
jQuery(function($){
 $('#post-date-filter').submit(function(){
  var filter = $('#post-date-filter');
  $.ajax({
   url:filter.attr('action'),
   data:filter.serialize(), 
   type:filter.attr('method'), 
   beforeSend:function(xhr){ filter.find('button'); },
   success:function(data){ filter.find('button'); $('#filtering-results').html(data); }
  });
  return false;
 });
});
</script> 

<style>
.our-blog-bg {
  background: url(<?php the_field('our-blog-bg-bunner'); ?>);
  background-position: center;
}
</style>


<main class="main-cloud">
    <div class="banner-bg our-blog-bg">
      <div class="banner-container banner-container-mobile-blog">
        <div class="container_block">
        <nav class="banner-nav banner-nav-blog-new"> <a href="<?php echo get_home_url(); ?>" class="banner-nav__home cloud__nav-home"> Home &nbsp; / &nbsp;</a> <a href="#" class="banner-nav__this-page cloud__nav banner-nav__this-blog" > Our Blog</a></nav>
        <h3 class="banner-title">Our Blog</h3>
      </div>
      </div>
    </div>

    
        <section class="news our-blog-post">
          <div class="news-container">
    <section class="sort__block">
  
      <div class="sort__container-mobile">
            <h3 class="sort__tags-title">TAGS</h3>
            <div class="sort__by-teg-req" ></div>
          </div>
    <div class="sort__tags-block" >
      <div class="sort__tags-block-category-container" id="sort-category-blog-father">
      <?php
$parent_id = 15;
$sub_cats = get_categories( array(
	'child_of' => $parent_id,
	'hide_empty' => 0
) );
if( $sub_cats ){
	foreach( $sub_cats as $cat ){
    echo '<p class="sort__tags-block-category-item js-item">'. $cat->name .'</p>';

		$myposts = get_posts( array(
			'numberposts' => -1,
			'category'    => $cat->cat_ID,
			'orderby'     => 'post_date',
			'order'       => 'DESC',
		) );
		global $post;
	}
	wp_reset_postdata(); 
}
?>

      </div>
      <div class="sort__tags-container">
        <button class="sort__tags-clear" id="sortTagClear">Clear All</button>
        <div id="sonBlockCategory">
        </div>
      </div>
    </div>
    </section>
  
    <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="post-date-filter">
  <div class="sort sort__container-by">
  <input type="text" id='inputForUrlBlog' name="sa" class='sort__search-hidden'>
  <select  name="date" id="our-news-search-select" placeholder-text="Sort by"  class="select-blog">
    <option value="DESC"class="select-dropdown__list-item">New first</option>
    <option value="ASC" class="select-dropdown__list-item">Old at first</option>
  </select>
  <input type="text" class="sort__search" id="searchInput" name="s" placeholder="What are you looking for?" value="">
  <input type="text" class="sort__search-hidden" name="cat"  value="-10,-11,-14,-1,-13,-24">
  <input type="submit" class="sort__button"  value="" id='paginationBtn'>
  <div class="sort__close-search" id="clearSearch"></div>
  </div>

  <div class="mobile-search-blog">
    <input type="text" name='s' class="sort__search mobile-search" id="searchInputMedia" placeholder="What are you looking for?" value="">
    <input type="submit" class="sort__button mobile-search" id='paginationBtnMobile'  value="">
    
    <div class="sort__close-search mobile-search" id="clearSearch"></div>
  </div>
  <input type="hidden" name="action" value="customfilter">
  </form>



  <div id="filtering-results"></div> 
  <div class="news__pagination">
  <div class="paginator" onclick="getPagination(event)"></div>
</div>


  <div class="news__block-container no-ajax">
    <?php
                        $args = array(
                            'post_type'         => 'post',
                            'publish'           => true,
                            'posts_per_page'    => 6,
                            'paged'          => $paged,       
                            'category_name' => 'blog'                                    
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) { ?>
                       
                              <?php while( $the_query->have_posts() ){
                              $the_query->the_post();?> 
                               
                                     <div class="news__item ">
                                  
      <a class="qweqwe" href="<?php the_permalink(); ?>"> <?php echo get_the_post_thumbnail( get_the_ID(), 'post_827x620', array( 'class' => 'news__item-img', )); ?></a> 
      <div class="tag-in-container"><?php the_category() ?></div>
      <a href="<?php the_permalink(); ?>"> <p class="news__item-title"><?php the_title(); ?></p></a> 
      <div class="news__data-container">
        <div class="news__data"><?php the_time('F jS, Y') ?></div>
        <div class="news__read"><?php the_field('news-read'); ?></div>
      </div>
    </div>
  

                           <?php } wp_reset_postdata(); ?>
                      
                          
                      <?php } ?>
                      <?php the_posts_pagination(); ?>

  </div>

  <div class="news__pagination no-ajax-pag">
  <?php $big = 999999999;
				            $pages = paginate_links( array(
				                'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big )) ),
				                'format'  => '?paged=%#%',
				                'current' => max( 1, get_query_var('paged') ),
				                'total'   => $the_query->max_num_pages,
				                'prev_next'    => false,
				                'type'    => 'array',
				                'prev_text'    => '<',
				                'next_text'    => '>',
				            ) );
			            	if(is_array( $pages ) ) { ?>
							    <div data-aos="fade" class="news__pages main__pages pages pagination_news">
					  				<ul class="pages__list">
					  					<?php foreach ( $pages as $page ) {
			                                    echo "<li class='pages__item'>$page</li>";
			                                } wp_reset_query(); ?>
					  				</ul>
								</div>
							<?php } ?>
						</div>
  </div>

  </div>
  </section>
  <div class="preloader-for-posts">
<div class="preloader-main">
<div class="loader-item style4" >
<div class="cube1"></div>
<div class="cube2"></div>
</div>  
</div>
</div>

  <script>
let searchInputMedia = document.querySelector("#searchInputMedia");
let searchInput = document.querySelector("#searchInput");

if (window.matchMedia("(min-width: 600px)").matches) {
searchInputMedia.remove();
} else {
searchInput.remove();
}



let preloaderForPosts = document.querySelector(".preloader-for-posts");
preloaderForPosts.style.display = 'none'
let paginationBtn = document.querySelector("#paginationBtn");
let paginationBtnMobile = document.querySelector("#paginationBtnMobile");
let noAjax = document.querySelector(".no-ajax");
let noAjaxPag = document.querySelector(".no-ajax-pag");


paginationBtn.addEventListener('click', getTime)
function getTime(){
  preloaderForPosts.style.display = 'block'
  setTimeout( getPagination, 1000);
}
paginationBtnMobile.addEventListener('click', getTime)
function getTime(){
  preloaderForPosts.style.display = 'block'
  setTimeout( getPagination, 1000);
}

function getPagination(event){
  preloaderForPosts.style.display = 'none'
noAjax.style.display = 'none';
noAjaxPag.style.display = 'none';
  let pages = document.querySelector(".page");
    let count = pages.childNodes.length; 
let cnt = 6; 
let cnt_page = Math.ceil(count / cnt); 

let paginator = document.querySelector(".paginator");
let page = "";
for (let i = 0; i < cnt_page; i++) {
  page += "<span data-page=" + i * cnt + "  id=\"page" + (i + 1) + "\">" + (i + 1) + "</span>";
}
paginator.innerHTML = page;

let div_num = document.querySelectorAll(".num");
for (let i = 0; i < div_num.length; i++) {
  if (i < cnt) {
    div_num[i].style.display = "block";
  }
}

let main_page = document.getElementById("page1");
main_page.classList.add("paginator_active");


  let e = event || window.event;
  let target = e.target;
  let id = target.id;
  
  if (target.tagName.toLowerCase() != "span") return;
  
  let num_ = id.substr(4);
  let data_page = +target.dataset.page;
  main_page.classList.remove("paginator_active");
  main_page = document.getElementById(id);
  main_page.classList.add("paginator_active");

  let j = 0;
  for (let i = 0; i < div_num.length; i++) {
    let data_num = div_num[i].dataset.num;
    if (data_num <= data_page || data_num >= data_page)
      div_num[i].style.display = "none";

  }
  for (let i = data_page; i < div_num.length; i++) {
    if (j >= cnt) break;
    div_num[i].style.display = "block";
    j++;
  }
}


</script>



  <?php get_footer('dark'); ?>