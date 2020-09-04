<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_topics_loop' ); ?>

<table id="bbp-forum-<?php bbp_forum_id(); ?>" class="table bbp-topics">
	<thead class="bbp-header">
		<tr class="forum-titles d-none d-custom-table-row">
			<th class="bbp-topic-title"><?php esc_html_e( 'Topic', 'bbpress' ); ?></th>
			<th class="bbp-topic-voice-count"><?php esc_html_e( 'Voices', 'bbpress' ); ?></th>
			<th class="bbp-topic-reply-count"><?php bbp_show_lead_topic()
				? esc_html_e( 'Replies', 'bbpress' )
				: esc_html_e( 'Posts',   'bbpress' );
			?></th>
			<th class="bbp-topic-freshness"><?php esc_html_e( 'Last Post', 'bbpress' ); ?></th>
		</tr>
	</thead>

	<tbody class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>

	</tbody>

	<tfoot class="bbp-footer">
		<tr>
			<td colspan="<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</td>
		<tr><!-- .tr -->
	</tfoot>
</table><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' );
