<?php
/**
 * Destination form.
 *
 * @package wpdbbkp
 */

?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion" href="#collapseIII">
				<h2>Dropbox </h2>
			</a>
		</h4>
	</div>
	<div id="collapseIII" class="panel-collapse collapse">
		<div class="panel-body">
			<?php
				require plugin_dir_path( __FILE__ ) . 'dropboxupload.php';
			?>
		</div>		
	</div>
</div>
