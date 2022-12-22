<?php

$wpdbbkp_local_enabled	=	get_option( 'wp_db_local_backup',null );
$wpdbbkp_local_path		=	get_option( 'wp_db_local_backup_path',null );
$wpdbbkp_local_status		=	'<label><b>Status</b>: Not Configured </label> ';
if($wpdbbkp_local_enabled==1 && !empty($wpdbbkp_local_path))
{
	$wpdbbkp_local_status='<label><b>Status</b>: <span class="dashicons dashicons-yes-alt" style="color:green;font-size:16px" title="Destination enabled"></span><span class="configured">Configured </span> </label> ';
}
?>
<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseLocal">
								<h2>Local Backup <?php echo $wpdbbkp_local_status;?> <span class="dashicons dashicons-admin-generic"></span></h2>

							</a>
						</h4>
					</div>
					<div id="collapseLocal" class="panel-collapse collapse">
						<div class="panel-body">
							<?php
							/**
							 * Destination form.
							 *
							 * @package wpdbbkp
							 */

							echo '<form name="wp-local_form" method="post" action="" >';
							wp_nonce_field( 'wp-database-backup' );
							$wp_db_local_backup_path = get_option( 'wp_db_local_backup_path' );
							$wp_db_local_backup      = get_option( 'wp_db_local_backup' );
							echo '<p>';
							$ischecked = ( isset( $wp_db_local_backup ) && 1 === (int) $wp_db_local_backup ) ? 'checked' : '';
							echo '<div class="row form-group">
                                <label class="col-sm-2" for="wp_db_local_backup_path">Enable Local Backup:</label>
                                <div class="col-sm-6">
                                    <input type="checkbox" ' . esc_attr( $ischecked ) . ' id="wp_db_local_backup_path" name="wp_db_local_backup">
                                </div>
                            </div>';
							echo '<div class="row form-group"><label class="col-sm-2" for="wp_db_backup_email_id">Local Backup Path</label>';
							echo '<div class="col-sm-6"><input type="text" id="wp_db_backup_email_id" class="form-control" name="wp_db_local_backup_path" value="' . esc_html( $wp_db_local_backup_path ) . '" placeholder="Directory Path"></div>';
							echo '<div class="col-sm-4">Leave blank if you don\'t want use this feature or Disable Local Backup</div></div>';
							echo '<div class="row form-group">';
							echo '<div class="col-sm-12">';
							if ( false === empty( $wp_db_local_backup_path ) && false === file_exists( $wp_db_local_backup_path ) ) {
								echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
								esc_attr_e( 'Invalid Local Backup Path : ', 'wpdbbkp' );
								echo esc_attr( $wp_db_local_backup_path );
								echo '</div>';
							}
							esc_attr_e( 'Backups outside from the public_html directory or inside public_html directory but diffrent location (without using FTP).', 'wpdbbkp' );
							esc_attr_e( 'Ex.: C:/xampp/htdocs', 'wpdbbkp' );
							echo '</div>';
							echo '<div class="col-sm-12 submit">';
							echo '<input type="submit" name="Submit" class="btn btn-primary" value="Save Settings" />';
							echo '</div>';
							echo '</form>';
							?>
						</div>
					</div>
				</div>
						</div>
