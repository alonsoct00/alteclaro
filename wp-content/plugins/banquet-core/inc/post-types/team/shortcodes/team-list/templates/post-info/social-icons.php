<?php
$social_links = get_post_meta( get_the_ID(), 'qodef_team_member_social_links', true );

if ( ! empty( $social_links ) ) {
	?>
	<div class="qodef-team-member-social-links">
		<?php foreach ( $social_links as $social ) {
			$social_text = $social['qodef_team_member_social_link_text'];
			$social_link      = $social['qodef_team_member_social_link'];
			$social_target    = ! empty( $social['qodef_team_member_social_link_target'] ) ? $social['qodef_team_member_social_link_target'] : '_blank';
			?>
			<a class="qodef-team-member-social-link" href="<?php echo esc_url( $social_link ); ?>" target="<?php echo esc_attr( $social_target ); ?>">
				<?php echo esc_html( $social_text ); ?>
			</a>
		<?php } ?>
	</div>
<?php }