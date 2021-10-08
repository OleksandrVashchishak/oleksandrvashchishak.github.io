<?php include_once "./header.php"; ?>

<div class="flex-c text-block-top">
    <div class="container row-x1">
        <h1> <?php echo _('FREEBIES, COMPETITIONS, GREAT DEALS IN FRANCE') ?> </h1>
        <p> <?php echo _('Do you love Freebies and Competitions? Find the best freebies and free competitions to enter online. Win prizes, holidays, and cash daily. Join The Golden Offer’s biggest computing community, and enter your first competition today!') ?> </p>
    </div>
</div>

<div class="flex-c" id="content-wrapper">
    <div class="container row-x1 flex-sb" style="transform: none;">
        <main id="main-wrapper">
            <div class="theiaStickySidebar">
                <div class="main section">
                    <div class="widget Blog index-blog flex-col">
                        <div class="blog-posts index-post-wrap grid1-items">
                            <?php generation_posts_index($mysqli, $domainLocale); ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <aside id="sidebar-wrapper">
            <div class="theiaStickySidebar">
                <div class="sidebar pbt-section section" id="sidebar" name="Sidebar">
                    <div class="widget HTML MailChimp">

                        <div class="widget-content">
                            <h3 class="mailchimp-title"> <?php echo _('Newsletter signup') ?> </h3>
                            <p class="mailchimp-text excerpt"><?php echo _('Be the first to hear about the new Freebies, Competitions, and Great Deals. Sign up for our newsletter today! Your data is safe & secure! We won’t sell or misuses your personal information in any way.') ?></p>
                            <div class="mailchimp-form">
                                <?php get_form_subscribe($mysqli); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</div>



<?php include_once "./footer.php"; ?>