<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package StudioPress\Genesis
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

namespace WPS\WP\Plugins\Team;

?>
<p>
	<?php
	$genesis_archive = '<a href="' . esc_url( get_post_type_archive_link( $this->post_type->name ) ) . '">';
	/* translators: Open and close post type archive link, post type name. */
	printf( esc_html__( 'View the %1$s%3$s archive%2$s.', WPS_PARTNERS_DOMAIN ), $genesis_archive, '</a>', esc_html( $this->post_type->name ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Already escaped.
	?>
</p>

<table class="form-table">
<tbody>

	<tr valign="top">
		<th scope="row"><label for="<?php $this->field_id( 'headline' ); ?>"><b><?php esc_html_e( 'Archive Headline', WPS_PARTNERS_DOMAIN ); ?></b></label></th>
		<td>
			<p><input class="large-text" type="text" name="<?php $this->field_name( 'headline' ); ?>" id="<?php $this->field_id( 'headline' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'headline' ) ); ?>" /></p>
			<p class="description">
				<?php
				if ( genesis_a11y( 'headings' ) ) {
					esc_html_e( 'Your child theme uses accessible headings. If you leave this blank, the default accessible heading will be used.', WPS_PARTNERS_DOMAIN );
				} else {
					esc_html_e( 'Leave empty if you do not want to display a headline.', WPS_PARTNERS_DOMAIN );
				}
				?>
			</p>
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><label for="<?php $this->field_id( 'intro_text' ); ?>"><b><?php esc_html_e( 'Archive Intro Text', WPS_PARTNERS_DOMAIN ); ?></b></label></th>
		<td>
			<?php
			wp_editor(
				$this->get_field_value( 'intro_text' ),
				$this->settings_field . '-intro-text',
				array(
					'textarea_name' => $this->get_field_name( 'intro_text' ),
				)
			);
			?>
			<p class="description"><?php esc_html_e( 'Leave empty if you do not want to display any intro text.', WPS_PARTNERS_DOMAIN ); ?></p>
		</td>
	</tr>

	<tr valign="top">
		<th scope="row"><label for="<?php $this->field_id( 'headline_image' ); ?>"><b><?php esc_html_e( 'Archive Headline Image', WPS_PARTNERS_DOMAIN ); ?></b></label></th>
		<td>
			<input type="hidden" name="<?php $this->field_name( 'headline_image' ); ?>" id="<?php $this->field_id( 'headline_image' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'headline_image' ) ); ?>" />
			<input type="hidden" name="<?php $this->field_name( 'headline_image_id' ); ?>" id="<?php $this->field_id( 'headline_image_id' ); ?>" value="<?php echo esc_attr( $this->get_field_value( 'headline_image_id' ) ); ?>" />
            <button class="button setting-upload"><?php _e('Select/Upload', WPS_PARTNERS_DOMAIN ) ?></button>
            <div class="preview">
                <?php
                if ( $this->get_field_value( 'headline_image_id' ) ) {
                    echo wp_get_attachment_image( $this->get_field_value( 'headline_image_id' ) );
                } else {
                    echo '<img style="display:none;" class="attachment-thumbnail size-thumbnail" alt="" width="150" height="150">';
                }
                ?>
            </div>
			<p class="description">
				<?php
					esc_html_e( 'Optional. Upload an image', WPS_PARTNERS_DOMAIN );
				?>
			</p>
		</td>
	</tr>

    <tr valign="top">
        <th scope="row"><label for="<?php $this->field_id( 'archive_image_size' ); ?>"><b><?php esc_html_e( 'Archive Image Size', WPS_PARTNERS_DOMAIN ); ?></b></label></th>
        <td>
            <p>
                <select id="<?php echo esc_attr( $this->get_field_id( 'archive_image_size' ) ); ?>" class="genesis-image-size-selector" name="<?php echo esc_attr( $this->get_field_name( 'archive_image_size' ) ); ?>">
					<?php
					printf( '<option value="" %s>%s</option>', selected( '', $this->get_field_value( 'archive_image_size' ), false ), __( 'None', WPS_PRESS_RELEASES_DOMAIN ) );
					$sizes = genesis_get_image_sizes();
					foreach ( (array) $sizes as $name => $size ) {
						printf( '<option value="%s" %s>%s (%sx%s)</option>', esc_attr( $name ), selected( $name, $this->get_field_value( 'archive_image_size' ), false ), esc_html( $name ), esc_html( $size['width'] ), esc_html( $size['height'] ) );
					}
					?>
                </select>
            </p>
            <p class="description">
				<?php
				esc_html_e( 'If empty, archive will use the default global featured image size.', WPS_PARTNERS_DOMAIN );
				?>
            </p>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row"><label for="<?php $this->field_id( 'archive_image_alignment' ); ?>"><b><?php esc_html_e( 'Archive Image Alignment', WPS_PARTNERS_DOMAIN ); ?></b></label></th>
        <td>
            <p>
                <select id="<?php echo esc_attr( $this->get_field_id( 'archive_image_alignment' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'archive_image_alignment' ) ); ?>">
                    <option value="alignnone">- <?php esc_html_e( 'None', WPS_PARTNERS_DOMAIN ); ?> -</option>
                    <option value="alignleft" <?php selected( 'alignleft', $this->get_field_value( 'archive_image_alignment' ) ); ?>><?php esc_html_e( 'Left', WPS_PARTNERS_DOMAIN ); ?></option>
                    <option value="alignright" <?php selected( 'alignright', $this->get_field_value( 'archive_image_alignment' ) ); ?>><?php esc_html_e( 'Right', WPS_PARTNERS_DOMAIN ); ?></option>
                    <option value="aligncenter" <?php selected( 'aligncenter', $this->get_field_value( 'archive_image_alignment' ) ); ?>><?php esc_html_e( 'Center', WPS_PARTNERS_DOMAIN ); ?></option>
                </select>
            </p>
            <p class="description">
				<?php
				esc_html_e( 'If empty, archive will use the default global featured image size.', WPS_PARTNERS_DOMAIN );
				?>
            </p>
        </td>
    </tr>

</tbody>
</table>

<script>
    (function($) {
        $(document).ready(function($){

            var customUploader,
                $clickElem = $(".setting-upload"),
                $targetImage = $('.wrap input[name="<?php $this->field_name( 'headline_image' ) ?>"]'),
                $previewDiv = $(".preview"),
                $targetImageID = $('.wrap input[name="<?php $this->field_name( 'headline_image_id' ) ?>"]');

            $clickElem.click(function(e) {
                e.preventDefault();
                //If the uploader object has already been created, reopen the dialog
                if (customUploader) {
                    customUploader.open();
                    return;
                }
                //Extend the wp.media object
                customUploader = wp.media.frames.file_frame = wp.media({
                    title: "<?php _e( 'Choose Image', WPS_PARTNERS_DOMAIN ); ?>",
                    button: {
                        text: "<?php _e( 'Choose Image', WPS_PARTNERS_DOMAIN ); ?>"
                    },
                    multiple: false
                });
                //When a file is selected, grab the URL and set it as the text field's value
                customUploader.on('select', function() {
                    debugger;
                    var attachment = customUploader.state().get('selection').first().toJSON();

                    $targetImage.val(attachment.url);
                    $targetImageID.val(attachment.id);

                    $previewDiv.find("img").remove();
                    $previewDiv.html('<img src="'+attachment.sizes.thumbnail.url+'" height="' + attachment.sizes.thumbnail.height + '" width="' + attachment.sizes.thumbnail.width + '">')

                });
                //Open the uploader dialog
                customUploader.open();
            });
        });
    })(jQuery);
</script>