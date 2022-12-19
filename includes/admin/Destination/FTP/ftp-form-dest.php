<?php
/**
 * Destination file.
 *
 * @package wpdbbkp
 */

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseI">
				<h2>FTP/sFTP </h2>
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
