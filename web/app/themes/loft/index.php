<?php
get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="full-width">
    <h4><?php the_title(); ?></h4>
    <div>
        <?php the_excerpt(); ?>
    </div>
    <div>
        <a href="<?php the_permalink(); ?>">
            Read more
        </a>
    </div>
</div>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php
get_footer();
