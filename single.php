<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Scaffold_S_Bootstrap
 */

get_header();
?>

<div class="row">

	<main id="primary" class="site-main col-lg-8">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			/*
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 's-scaffold-bootstrap' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 's-scaffold-bootstrap' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			*/
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>

</div><!--/row-->

<?php
get_footer();
