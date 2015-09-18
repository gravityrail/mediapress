<?php
// Exit if the file is accessed directly over web
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}
/**
 * @package mediapress
 * 
 * Single Gallery template
 * If you need specific template for various types, you can copy this file and create new files with name like
 * This comes as the fallback template in our template hierarchy
 * Before loading this file, MediaPress will search for 
 * single-{type}-{status}.php
 * single-{type}.php
 * and then fallback to
 * single.php
 * Where type=photo|video|audio|any active type
 *		 status =public|private|friendsonly|groupsonly|any registered status
 *  	
 * 
 * Please create your template if you need specific templates for photo, video etc
 * 
 * 
 *	
 * Fallback single Gallery View
 */
?>
<?php 

$gallery = mpp_get_current_gallery();
$type = $gallery->type;

?>
<?php if( mpp_have_media() ): ?>

    <?php if( mpp_user_can_list_media( mpp_get_current_gallery_id() ) ): ?>

		<?php do_action ( 'mpp_before_single_gallery' ); ?>

		<div class='mpp-g mpp-item-list mpp-media-list mpp-<?php echo $type;?>-list mpp-single-gallery-media-list mpp-single-gallery-<?php echo $type;?>-list'>
			
			<?php mpp_load_gallery_view( $gallery );?>
			<?php //mpp_get_template_part( 'buddypress/members/gallery/content-single',  $type ); ?>
			
		</div>

		<?php do_action ( 'mpp_after_single_gallery' ); ?>

		<?php mpp_media_pagination(); ?>

		<?php do_action ( 'mpp_after_single_gallery_pagination' ); ?>	

		<?php mpp_locate_template( array( 'sitewide/gallery/activity.php' ), true ); ?>

		<?php do_action ( 'mpp_after_single_gallery_activity' ); ?>

    <?php else: ?>

            <div class="mpp-notice mpp-gallery-prohibited">

                <p><?php printf( __( 'The privacy policy does not allow you to view this.', 'mediapress' ) ); ?></p>
                
            </div>

    <?php endif; ?>
        
<?php else: ?>
	<?php //we should seriously think about adding create gallery button here ?>
    <div class="mpp-notice mpp-no-gallery-notice">
        <p> <?php _ex( 'Nothing to see here!', 'No media Message', 'mediapress' ); ?></p> 
    </div>

<?php endif; ?>