<?php

/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

do_action( 'bbp_template_before_forums_loop' ); ?>

<table id="forums-list-<?php bbp_forum_id(); ?>" class="table table-striped bbp-forums">
	<thead class="bbp-header">

		<tr class="forum-titles">
			<th class="bbp-forum-info"><?php esc_html_e( 'Forum', 'bbpress' ); ?></th>
			<th class="bbp-forum-topic-count"><?php esc_html_e( 'Topics', 'bbpress' ); ?></th>
			<th class="bbp-forum-reply-count"><?php bbp_show_lead_topic()
				? esc_html_e( 'Replies', 'bbpress' )
				: esc_html_e( 'Posts',   'bbpress' );
			?></th>
			<th class="bbp-forum-freshness"><?php esc_html_e( 'Last Post', 'bbpress' ); ?></th>
		</tr>

	</thead><!-- .bbp-header -->

	<tbody class="bbp-body">

		<?php while ( bbp_forums() ) : bbp_the_forum(); ?>

			<?php bbp_get_template_part( 'loop', 'single-forum' ); ?>

		<?php endwhile; ?>

	</tbody><!-- .bbp-body -->
</table>

<?php do_action( 'bbp_template_after_forums_loop' );
