<?php
	$brief_info = get_post_meta( get_the_ID(), 'qodef_team_member_brief_info', true);

	if( ! empty($brief_info) ){
?>
	<p class="qodef-e-brief-info">
		<?php echo strip_tags( $brief_info ); ?>
	</p>
<?php } ?>
