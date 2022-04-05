<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scaffold_S_Bootstrap
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area card mb-3">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="card-header">
			<h2 class="comments-title">
				<?php
				$scaffold_s_bootstrap_comment_count = get_comments_number();
				if ( '1' === $scaffold_s_bootstrap_comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'scaffold-s-bootstrap' ),
						'<span>' . wp_kses_post( get_the_title() ) . '</span>'
					);
				} else {
					printf( 
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $scaffold_s_bootstrap_comment_count, 'comments title', 'scaffold-s-bootstrap' ) ),
						number_format_i18n( $scaffold_s_bootstrap_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'<span>' . wp_kses_post( get_the_title() ) . '</span>'
					);
				}
				?>
			</h2><!-- .comments-title -->
		</div><!--/card-header-->

		<div class="card-body">
			<?php the_comments_navigation(); ?>

			<ol class="comment-list">
				<?php
				wp_list_comments(
					array(
						'style'      => 'ol',
						'short_ping' => true,
					)
				);
				?>
			</ol><!-- .comment-list -->

			<?php
			the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'scaffold-s-bootstrap' ); ?></p>
				<?php
			endif;
			?>
		</div><!--/card-body-->
		<?php
	endif; // Check for have_comments().

	?>
	<div class="card-body">
	<?php
	comment_form();
	?>
	</div><!--/card-body-->

</div><!-- #comments -->
