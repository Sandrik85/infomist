<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>
<div class="left-wrapp">
    <div id="secondary2" class="widget-area sidebar hiden_sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <span class="fa fa-align-justify"></span>
            <span class="fa fa-times"></span>
            <div id="own_ads" class="before_slider_sidebar" role="complementary">
                <?php dynamic_sidebar( 'sidebar-7' ); ?>
            </div>
            <?php
            $home_sl_query = new WP_Query();
            $home_sl_query ->query('cat=16'.'&showposts=3');
            ?>
            <?php if ($home_sl_query->have_posts()) : ?>
                <?php $id_count = 0; ?>
                <div class="main-flexslider-container">
                    <div class="main-sl-flexslider">
                        <ul class="slides">
                            <?php while ($home_sl_query->have_posts()) : $home_sl_query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="flexslider-controls">
                        <ol class="flex-control-nav">
                            <?php while ($home_sl_query->have_posts()) : $home_sl_query->the_post(); ?>
                                <li data-id="<?php echo $id_count; ?>">
                                    <h2 class="slider-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<!--                                    <p>--><?php //the_field('home_sl_descr'); ?><!--</p>-->
                                </li>
                                <?php $id_count++; ?>
                            <?php endwhile; ?>
                        </ol>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <div id="own_ads" class="under_slider_sidebar" role="complementary">
                <?php dynamic_sidebar( 'sidebar-8' ); ?>
            </div>

            <div class="top-news-wrapp event-info">
                <h2><a href="<?php echo get_home_url().'/events' ?>">Навігатор подій</a></h2>
                <?php
                $title = sprintf(
                    __( '%1$s %2$s', 'tribe-events-calendar' ),
                    $events_label_plural,
                    date_i18n( tribe_get_option( 'monthAndYearFormat', 'F Y' ), strtotime( tribe_get_month_view_date() ) )
                );?>
                <h5 class="today"><?php echo $title ?></h5>
                <?php tribe_show_month(); ?>
                <p class="even-hov"><span>Твій путівник міськими подіями</span>
            </div>
            <?php dynamic_sidebar( 'sidebar-11' ); ?>
            <div class="top-news-wrapp my-top">
                <?php $link=get_permalink(32); ?>
                <h2><a href="<?php echo $link ?>">Топ-новини</a></h2>
                <?php
                $wp_query = null;
                $wp_query = new WP_Query();
                $wp_query->query('cat=5'.'&showposts=5');
                ?>
                <ul class="top-news">
                    <?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>
                        <li class="single-top-news">
                            <div class="thumb"><a href="<?php the_permalink()?>"><?php $post_id = get_the_ID(); echo get_the_post_thumbnail($post_id, 'top-news-thumbnail'); ?></a></div>
                            <div class="time-post">
                                <?php the_time('d.m.Y  |  G:i'); ?>
                            </div>
                            <h3><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                        </li>
                    <?php endwhile; // End of the loop. ?>
                </ul>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->


</div>
<div id="secondary" class="widget-area sidebar" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
    <div class="top-news-wrapp hidden_event">
        <h2><a href="<?php echo get_home_url().'/events' ?>">Навігатор подій</a></h2>
        <?php
        $title = sprintf(
            __( '%1$s %2$s', 'tribe-events-calendar' ),
            $events_label_plural,
            date_i18n( tribe_get_option( 'monthAndYearFormat', 'F Y' ), strtotime( tribe_get_month_view_date() ) )
        );?>
        <h5 class="today"><?php echo $title ?></h5>
        <?php tribe_show_month(); ?>
        <?php  ?>
    </div>
    <style>
        #own_ads img {
            height: auto!important;
        }
	#widget_sp_image-4 {
	    margin: -5px 0 5px;
	}
    </style>
<?php get_footer(); ?>
