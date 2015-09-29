<?php
/**
 * SMOF Admin
 *
 * @package     WordPress
 * @subpackage  SMOF
 * @since       1.4.0
 * @author      Syamil MJ
 */


/**
 * Head Hook
 *
 * @since 1.0.0
 */
function of_head() { do_action( 'of_head' ); }

/**
 * Add default options upon activation else DB does not exist
 *
 * @since 1.0.0
 */
function of_option_setup()
{
	global $of_options, $options_machine;
	$options_machine = new Options_Machine($of_options);

	if (!of_get_options())
	{
		of_save_options($options_machine->Defaults);
	}
}

/**
 * Change activation message
 *
 * @since 1.0.0
 */
function optionsframework_admin_message() {

	//Tweaked the message on theme activate
	?>
	<script type="text/javascript">
	jQuery(function(){

		var message = '<p>This theme comes with an <a href="<?php echo admin_url('admin.php?page=optionsframework'); ?>">options panel</a> to configure settings. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
		jQuery('.themes-php #message2').html(message);

	});
	</script>
	<?php

}

/**
 * Get header classes
 *
 * @since 1.0.0
 */
function of_get_header_classes_array()
{
	global $of_options;

	foreach ($of_options as $value)
	{
		if ($value['type'] == 'heading')
			$hooks[] = str_replace(' ','',strtolower($value['name']));
	}

	return $hooks;
}

/**
 * Get options from the database and process them with the load filter hook.
 *
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @return array
 */
function of_get_options( $key = OPTIONS ) {
	$data = get_option( $key );
	$data = apply_filters( 'of_options_after_load', $data );
	return $data;
}

/**
 * Save options to the database after processing them
 *
 * @param $data Options array to save
 * @author Jonah Dahlquist
 * @since 1.4.0
 * @uses update_option()
 * @return void
 */
function of_save_options( $data, $key = OPTIONS ) {
	$data = apply_filters( 'of_options_before_save', $data );
	update_option( $key, $data );
}

/**
 * Migrate options names and values for the latest theme version
 *
 * @param {Array} $options Array of options that will be modified
 * @param {String} $old_verstion Version to migrate from
 *
 * (!) Note: this function doesn't store the migrated options, but just modifies the given array
 *
 * @return void
 */
function of_migrate_options( &$options, $old_version ) {
	/**
	 * v.1.11: blog options were extended and specified for different pages, so we need to inherit the previous user settings
	 */
	if ( version_compare( $old_version, '1.12', '<' ) ) {
		if ( isset( $options['use_excerpt'] ) ) {
			$options['blog_excerpt'] = $options['use_excerpt'];
			$options['archive_excerpt'] = $options['use_excerpt'];
			$options['search_excerpt'] = $options['use_excerpt'];
			unset( $options['use_excerpt'] );
		}
		if ( isset( $options['post_meta_date'] ) ) {
			$options['blog_meta_date'] = $options['post_meta_date'];
			$options['archive_meta_date'] = $options['post_meta_date'];
			$options['search_meta_date'] = $options['post_meta_date'];
		}
		if ( isset( $options['post_meta_author'] ) ) {
			$options['blog_meta_author'] = $options['post_meta_author'];
			$options['archive_meta_author'] = $options['post_meta_author'];
			$options['search_meta_author'] = $options['post_meta_author'];
		}
		if ( isset( $options['post_meta_categories'] ) ) {
			$options['blog_meta_categories'] = $options['post_meta_categories'];
			$options['archive_meta_categories'] = $options['post_meta_categories'];
			$options['search_meta_categories'] = $options['post_meta_categories'];
		}
		if ( isset( $options['post_meta_comments'] ) ) {
			$options['blog_meta_comments'] = $options['post_meta_comments'];
			$options['archive_meta_comments'] = $options['post_meta_comments'];
			$options['search_meta_comments'] = $options['post_meta_comments'];
		}
		if ( isset( $options['post_meta_tags'] ) ) {
			$options['blog_meta_tags'] = $options['post_meta_tags'];
			$options['archive_meta_tags'] = $options['post_meta_tags'];
			$options['search_meta_tags'] = $options['post_meta_tags'];
		}
		if ( isset( $options['post_read_more'] ) ) {
			$options['blog_read_more'] = $options['post_read_more'];
			$options['archive_read_more'] = $options['post_read_more'];
			$options['search_read_more'] = $options['post_read_more'];
			unset( $options['post_read_more'] );
		}
	}
}



/**
 * For use in themes
 *
 * @since forever
 */


$data = of_get_options();
$smof_data = of_get_options();
