<?php

/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_replies_loop' ); ?>

<table id="topic-<?php bbp_topic_id(); ?>-replies" class="table forums bbp-replies">

	<thead class="bbp-header">
		<tr>
			<th class="bbp-reply-author"><?php esc_html_e( 'Author',  'bbpress' ); ?></th><!-- .bbp-reply-author -->
			<th class="bbp-reply-content"><?php bbp_show_lead_topic()
				? esc_html_e( 'Replies', 'bbpress' )
				: esc_html_e( 'Posts',   'bbpress' );
			?></th><!-- .bbp-reply-content -->
		</tr>
	</thead><!-- .bbp-header -->

	<tbody class="bbp-body">

		<?php if ( bbp_thread_replies() ) : ?>

			<?php bbp_list_replies(); ?>

		<?php else : ?>

			<?php while ( bbp_replies() ) : bbp_the_reply(); ?>

				<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</tbody><!-- .bbp-body -->

	<tfoot class="bbp-footer">
		<tr>
			<td>
				<div class="bbp-reply-author"><?php esc_html_e( 'Author',  'bbpress' ); ?></div>
			</td>
		<td>
		</td>
		<td class="bbp-reply-content"><?php bbp_show_lead_topic()
				? esc_html_e( 'Replies', 'bbpress' )
				: esc_html_e( 'Posts',   'bbpress' );
			?></td><!-- .bbp-reply-content -->
		</tr>
	</tfoot><!-- .bbp-footer -->
</table><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' );
