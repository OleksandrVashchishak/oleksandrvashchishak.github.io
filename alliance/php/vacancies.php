<?php
 get_header();
/*
 Template Name: Vacancies
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
<body>
    <main>
    <section class="vacancies">
      <div class="vacancies__container">
        <nav class="banner-nav">
          <a href="<?php echo get_home_url(); ?>" class="banner-nav__home naw-white-bg__home"> Home &nbsp; / &nbsp;</a>
          <a href="#" class="banner-nav__this-page naw-white-bg__page"> <?php the_title() ?></a>
        </nav>
        <div class="vacancies__title">
        <?php the_title() ?>
        </div>

  


   
        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="post-date-filter">
        <div class="vacancies__sort-container">
            <div class="sort__by-container sort__by-container-position">
              <div class="sort__by-category sort__by-category-position sbc-first-child" > Position </div>
               <ul class="sort__category-ul sort__category-ul-position" id="positionOption">
               <?php
$parent_id = 13;
$sub_cats = get_categories( array(
	'child_of' => $parent_id,
	'hide_empty' => 0
) );
if( $sub_cats ){
	foreach( $sub_cats as $cat ){
		echo '  <li class="sort__category"><label > <input class="sort__category-checkbox sort__category-checkbox-pos" type="checkbox"  name="val" value="val">'. $cat->name .'</label></li>';
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
               </ul>
              <p class=""><input type="button" class="button-test-position button-test" id="positionSortBtn" value="Select All"> </p>
              </div>
              <div class="sort__by-container sort__by-container-level">
                <div class="sort__by-category sort__by-category-level" > Levels </div>
                 <ul class="sort__category-ul sort__category-ul-level" id="levelOption">
                 <?php
$parent_id = 23;
$sub_cats = get_categories( array(
	'child_of' => $parent_id,
	'hide_empty' => 0
) );
if( $sub_cats ){
	foreach( $sub_cats as $cat ){
		echo '<li class="sort__category"><label > <input class="sort__category-checkbox sort__category-checkbox-lev" type="checkbox"  name="val" value="val">'. $cat->name .'</label></li>';
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
                </ul>
                <p class=""><input type="button" class="button-test-level button-test" id="levelSortBtn" value="Select All"> </p>
               
                </div>
                <div class="sort__by-container sort__by-container-tag">
                  <div class="sort__by-category sort__by-category-tag" > Tags </div>
                   <ul class="sort__category-ul sort__category-ul-tag" id="tagOption">
                   <?php
$parent_id = 24;
$sub_cats = get_categories( array(
	'child_of' => $parent_id,
	'hide_empty' => 0
) );
if( $sub_cats ){
	foreach( $sub_cats as $cat ){
		echo ' <li class="sort__category"><label> <input class="sort__category-checkbox sort__category-checkbox-tag" type="checkbox" name="val" value="val">'. $cat->name .'</label></li>';
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
                   
                  </ul>
                  <p class=""><input type="button" class="button-test-tag button-test" id="tagSortBtn" value="Select All"> </p>
                  </div>
                  <input type="text" class="sort__search sort__search-vacancies" name="s" id="searchInput" placeholder="What are you looking for?" value="" />

   <input type="text" id='inputForUrlVac' name="sa">
  <input type="text" class="sort__search-hidden" name="cat"  value="-10,-15,-18,-1,-11">
  <input type="submit" class="sort__button sort__button-vacancies" value="" id='paginationBtn' />
  <div class="sort__close-search vacancies__sort__close-search" id="clearSearch"></div>
  </div>
  <div class="mobile-search-blog">
            <input type="text" class="sort__search mobile-search sort__search-vacancies-mobile" id="searchInputMedia" name='s' placeholder="What are you looking for?" value="">
            <input type="submit" class="sort__button mobile-search sort__button-vacancies-mobile" id='paginationBtnMobile' value="">
          </div>
  <input type="hidden" name="action" value="customfilter">
  </form>



      <div class="sort__tags-container vacancies__sort__tags-container">
          <button class="sort__tags-clear" id="sortTagClearVac">Clear All</button>
         <div id="selectedOptionsVac"></div>
        </div>

        <div class="vacancies__result" id="vacanciesResultBlock">
          <p class="vacancies__result-text">Result: &nbsp; </p>
          <p class="vacancies__result-inner"> <span id="resultInnerVac">12</span> vacancies</p>
        </div>

        <div id="filtering-results"></div> 
        <div class="news__pagination">
  <div class="paginator" onclick="getPagination(event)"></div>
</div>
        <div class="vacancies__items no-ajax">


          <?php
                        $args = array(
                            'post_type'         => 'post',
                            'publish'           => true,
                            'posts_per_page'    => 6,
                            'paged'          => $paged,       
                            'category_name' => 'position,level,work-tags'                                    
                        );
                        $the_query = new WP_Query( $args );
                        if ( $the_query->have_posts() ) { ?>
                       
                              <?php while( $the_query->have_posts() ){
                              $the_query->the_post();?> 
                               
          <div class="vacancies__item">
          <div class="vacancies__item-container">
          <a href="<?php the_permalink(); ?>"> <h4 class="vacancies__item-title">
          <?php the_title(); ?>
              </h4></a>
              <div class="vacancies__item-line"></div>
              <div class="vacancies__item-data-container">
                <p class="vacancies__item-spec">
                <?php the_field('news-read'); ?>
                <p class="vacancies__item-data">
                <?php the_time('F jS, Y') ?>
                </p>
      </div>
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
    </section>

    <section class="vacancies vacancies__bg-bot">
   
      <div class="vacancies__container">


        <div class="vacancies__join-all">
       <div class="vacancies__left-part">
       <h3 class="vacancies__join-title"><?php the_field('vacancies_join-title'); ?></h3>
       <p class="vacancies__subtitle"><?php the_field('vacancies_subtitle'); ?>
      </p>
      <p class="vacancies__join-contact"><?php the_field('vacancies_join-contact'); ?></p>
    </div>
    <div class="vacancies__right-part">
      <h4 class="vacancies__pseude-title"><?php the_field('vacancies_pseude-title'); ?>
        </h4>

        <div class="vacancies__ul">
          <div class="vacancies__list"><?php the_field('vacancies_list1'); ?></div>
          <div class="vacancies__list"><?php the_field('vacancies_list2'); ?></div>
          <div class="vacancies__list"><?php the_field('vacancies_list3'); ?></div>
          <div class="vacancies__list"><?php the_field('vacancies_list4'); ?></div>
        </div>
    </div>
     </div>




      </div>
      <div class="preloader-bg" id="preloaderMain">
        <div class="preloader-main">
        <div class="loader-item style4" >
        <div class="cube1"></div>
        <div class="cube2"></div>
        </div>  
        </div>
        </div>
    </section>
  </main>

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
let sortTagClearVac = document.querySelector("#sortTagClearVac");
      sortTagClearVac.style.display = 'none';

let vacanciesResultBlock = document.querySelector("#vacanciesResultBlock");
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
  let  resultInnerVac = document.querySelector("#resultInnerVac");
noAjax.style.display = 'none';
noAjaxPag.style.display = 'none';
  let pages = document.querySelector(".page");
  vacanciesResultBlock.style.position = 'relative';
  vacanciesResultBlock.style.transform = 'scale(1)'
  resultInnerVac.innerHTML = pages.childNodes.length
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