<?php
/** Template Name: CustomPage */
get_header();
?>

<div class="full-width">
    <h4><?php the_title(); ?></h4>
    <?php
        $args = [
            'post_type' => ['jobs', 'post'],
            'posts_per_page' => 10
        ];
//        $way1 = new WP_Query($args);
//
//    foreach ($way1->posts as $item) {
//        echo $item->post_content;
//        echo "<br>";
//        the_excerpt();
//        }

    $posts = query_posts($args);
    ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="full-width">
    <h4><?php the_title(); ?></h4>
    <div>
        <?php the_excerpt(); ?>
    </div>
    <div>
        <?php if ($post->post_type == 'jobs') : ?>
        <h6>Departments</h6>
            <?php
                print_r(wp_get_post_terms($post->ID, 'department'));
            ?>
        <?php endif; ?>
    </div>
</div>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
    </div>
<?php
wp_reset_query();
wp_reset_postdata();
?>
<div>PDF:
<?php the_field('pdf'); ?>
</div>
<?php

get_footer();
