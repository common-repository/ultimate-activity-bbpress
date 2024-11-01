<?php
/**
 * Created by: Gabriel Robles - Entiven
 * Text domain: uabbps_domain
 */

function uabbps_else() {
	?>
<div class="container-fluid">

<div class="uabbp_tt">
	<center><h1><div class="barIi"></div><i class="fa fa-rebel" aria-hidden="true"></i><div class="barIr"></div></h1></center>
	<!-- izquierda -->
	<div class="left-zone">
	<div class="versiones"><div class="version"></div>Versión 1.0</div>
	<center><h3><?php _e('Welcome to', 'uabbps_domain'); ?> Ultimate Activity BBPRESS Lite</h3></center>
	<br>
	<?php if( isset($_GET['settings-updated']) ) { ?>
	<div id="alerta_uabbps" class="alert alert-success">
		<strong><?php _e('Settings saved.') ?></strong>
		<?php _e('please continue adjusting your plugin','uabbps_domain'); ?> <i id="alert_hide" class="fa fa-times" aria-hidden="true"></i>
	</div>
	<?php } ?>
	</div>
	<!-- derecha -->
	<br>
	<div id="mis-opciones" class="featured_options">
	<center>
	<p style="font-size:20pt;"><?php _e('bbpress is required for activate this plugin','uabbps_domain');?></p>
	<p style="font-size:20pt;font-weight:bold;"><a target="_blank" href="https://bbpress.org/download/"><?php _e('You can download the lastest version here','uabbps_domain');?> <i class="fa fa-cloud-download" aria-hidden="true"></i></a></p>
	<p>
	<p style="font-size:18pt"><?php _e('Follow us on','uabbps_domain');?></p>
	<li class="network"><a target="_blank" href="https://www.facebook.com/serverpucon/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
	<li class="network"><a target="_blank" href="https://twitter.com/EntivenOficial"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
	<li class="network"><a target="_blank" href="https://www.youtube.com/channel/UCBlDFxuvJFZqZwZ19xwVG6g"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
	</p>
	</center>	

	</div>
<?php
}