<?php
/**
 * Destination file.
 *
 * @package wpdbbkp
 */

$wpdbbkp_ftp_enabled	=	get_option( 'wp_db_backup_destination_FTP',null );
$wpdbbkp_ftp_host		=	get_option( 'backupbreeze_ftp_host',null );
$wpdbbkp_ftp_user		=	get_option( 'backupbreeze_ftp_user',null );
$wpdbbkp_ftp_pass		=	get_option( 'backupbreeze_ftp_pass',null );
$wpdbbkp_ftp_status		=	'<span class="dashicons dashicons-warning" style="color:orange;font-size: 30px;" title="Destination not setup"></span> ';
if($wpdbbkp_ftp_enabled==1 && !empty($wpdbbkp_ftp_host) && !empty($wpdbbkp_ftp_user) && !empty($wpdbbkp_ftp_pass))
{
	$wpdbbkp_ftp_status='<span class="dashicons dashicons-yes-alt" style="color:green;font-size: 30px;" title="Destination enabled"></span>';
}

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseI">
				<h2>FTP/sFTP <?php echo $wpdbbkp_ftp_status;?> </h2> 
			</a>
		</h4>
	</div>
	<div id="collapseI" class="panel-collapse collapse">
		<div class="panel-body">
			<p>FTP/sFTP Destination Define an FTP destination connection. You can define destination which use FTP.</p>
			<?php
							/**
							 * Destination form.
							 *
							 * @package wpdbbkp
							 */

			require plugin_dir_path( __FILE__ ) . 'ftp-form.php'; // Include file.
			?>
		</div>		
	</div>
</div>
