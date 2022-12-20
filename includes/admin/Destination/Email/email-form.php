<?php
/**
 * Destination dropboxs
 *
 * @package wpdbbkp
 */

$wpdbbkp_email_enabled	=	get_option( 'wp_db_backup_destination_Email',null );
$wpdbbkp_email_id		=	get_option( 'wp_db_backup_email_id',null );
$wpdbbkp_email_status		=	'<span class="dashicons dashicons-warning" style="color:orange;font-size: 30px;" title="Destination not setup"></span> ';
if($wpdbbkp_email_enabled==1 && !empty($wpdbbkp_email_id))
{
	$wpdbbkp_email_status='<span class="dashicons dashicons-yes-alt" style="color:green;font-size: 30px;" title="Destination enabled"></span>';
}
?>
<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseII">
								<h2>Email Notification <?php echo $wpdbbkp_email_status;?></h2>

							</a>
						</h4>
					</div>
					<div id="collapseII" class="panel-collapse collapse">
						<div class="panel-body">

							<?php
							echo '<form name="wp-email_form" method="post" action="" >';
							wp_nonce_field( 'wp-database-backup' );

							$wp_db_backup_email_id          = '';
							$wp_db_backup_email_id          = sanitize_email( get_option( 'wp_db_backup_email_id' ) );
							$wp_db_backup_email_attachment  = '';
							$wp_db_backup_email_attachment  = get_option( 'wp_db_backup_email_attachment' );
							$wp_db_backup_destination_email = get_option( 'wp_db_backup_destination_Email' );
							echo '<p>';
							echo '<span class="glyphicon glyphicon-envelope"></span> Send Email Notification</br></p>';
							$ischecked = ( true === isset( $wp_db_backup_destination_email ) && 1 === (int) $wp_db_backup_destination_email ) ? 'checked' : '';
							echo '<div class="row form-group">
                                <label class="col-sm-2" for="wp_db_backup_destination_Email">Enable Email Notification:</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" ' . esc_attr( $ischecked ) . ' id="wp_db_backup_destination_Email" name="wp_db_backup_destination_Email">
                                </div>
                            </div>';
							echo '<div class="row form-group"><label class="col-sm-2" for="wp_db_backup_email_id">Email Id</label>';
							echo '<div class="col-sm-6"><input type="text" id="wp_db_backup_email_id" class="form-control" name="wp_db_backup_email_id" value="' . esc_attr( $wp_db_backup_email_id ) . '" placeholder="Your Email Id"></div>';
							echo '<div class="col-sm-4">Leave blank if you don\'t want use this feature or Disable Email Notification</div></div>';
							echo '<div class="row form-group"><label class="col-sm-2" for="lead-theme">Attach backup file </label> ';
							$selected_option = get_option( 'wp_db_backup_email_attachment' );

							if ( 'yes' === $selected_option ) {
								$selected_yes = 'selected="selected"';
							} else {
								$selected_yes = '';
							}
							if ( 'no' === $selected_option ) {
								$selected_no = 'selected="selected"';
							} else {
								$selected_no = '';
							}
							echo '<div class="col-sm-2"><select id="lead-theme" class="form-control" name="wp_db_backup_email_attachment">';
							echo '<option value="none">Select</option>';

							echo '<option  value="yes"' . esc_attr( $selected_yes ) . '>Yes</option>';
							echo '<option  value="no" ' . esc_attr( $selected_no ) . '>No</option>';

							echo '</select></div>';

							echo '<div class="col-sm-8">If you want attache backup file to email then select "yes" (File attached only when backup file size <=25MB)</div>';

							echo '</div>';
							echo '<p class="submit">';
							echo '<input type="submit" name="Submit" class="btn btn-primary" value="Save Settings" />';
							echo '</p>';
							echo '</form>';
							?>
						</div>		
					</div>
				</div>
