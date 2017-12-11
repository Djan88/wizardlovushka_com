<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if(is_category(2)) { ?>
            <?php
            // The Query
            $querySeminar = new WP_Query( array(
                'category_name' => 'seminary',
                'posts_per_page' => '2',
                'order' => 'ASC',
                'orderby' => 'meta_value',
                'meta_key' => 'seminar_start',
                'meta_query' => array(
                    array(
                        'key' => 'seminar_start',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                        'type' => 'DATE'
                    )
                )
            ));
            while ($querySeminar->have_posts()) : $querySeminar->the_post();
                get_template_part( 'template-parts/post/seminar', get_post_format() );
            endwhile;
            wp_reset_postdata();
            ?>
            <?php if (  $querySeminar->max_num_pages > 1 ) : ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var true_posts = '<?php echo serialize($querySeminar->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $querySeminar->max_num_pages; ?>';
                </script>
                <div id="true_loadmore">Загрузить ещё</div>
            <?php endif; ?>
        <?php } else { ?>
            <?php
            if ( have_posts() ) : ?>
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/post/content', get_post_format() );

                endwhile;

                the_posts_pagination( array(
                    'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
                    'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
                ) );

            else :

                get_template_part( 'template-parts/post/content', 'none' );

            endif; ?>
        <?php }  ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
