<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<tr id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
	<td class="bbp-forum-info">

		<h5 class="d-custom-none"><?php esc_html_e( 'Forum', 'bbpress' ); ?></h5>

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</td>

	<td class="bbp-forum-topic-count">
		<h5 class="d-custom-none"><?php esc_html_e( 'Topics', 'bbpress' ); ?></h5>
		<?php bbp_forum_topic_count(); ?>
	</td>

	<td class="bbp-forum-reply-count">
		<h5 class="d-custom-none"><?php bbp_show_lead_topic()
					? esc_html_e( 'Replies', 'bbpress' )
					: esc_html_e( 'Posts',   'bbpress' );
				?></h5>
		<?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?>
	</td>

	<td class="bbp-forum-freshness">

		<h5 class="d-custom-none"><?php esc_html_e( 'Last Post', 'bbpress' ); ?></h5>

		<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

		<?php bbp_forum_freshness_link(); ?>

		<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_author' ); ?>

			<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 14 ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_author' ); ?>

		</p>
	</td>
</tr><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
