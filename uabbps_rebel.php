<?php
/**
* Plugin Name: Ultimate Activity bbpress
* Plugin URI: www.entiven.com
* Description: get the latest activity from your bbpress forum and configure this it to your liking - Obtenga la más reciente actividad de su foro bbPress y configurela a su gusto
* Version: 1.0
* Author: Gabriel Robles
* License: GPLv2 or later
* Licence URI: http://www.gnu.org/licenses/gpl-2.0.html
* Tags: activity, admin panel, bbPress, forum, replys, topics, dashboard, administrator, latest activity, users, edit post,delete
* Author URI: www.entiven.com
* Text Domain: uabbps_domain
**/

/*FINALIZANDO PUNTOS*/
add_action( 'admin_menu','actividad_hub' );
add_action( 'admin_enqueue_scripts', 'uabbpsJS' );
	function uabbpsJS() {
		#SCRIPTS
		wp_enqueue_script( 'JSuabbps', plugins_url( 'assets/js/admin_panel.js' , __FILE__ ), array( 'jquery' ) );
		#STYLES
		wp_register_style( 'CSSuabbps1', plugins_url( 'ultimate-activity-bbpress/assets/css/style.css' ) );
		wp_register_style( 'CSSuabbps2', plugins_url( 'ultimate-activity-bbpress/assets/css/balloon.css' ) );
		wp_register_style( 'CSSuabbps3', plugins_url( 'ultimate-activity-bbpress/assets/css/font-awesome/css/font-awesome.min.css' ) );
		wp_enqueue_style( 'CSSuabbps1' );
		wp_enqueue_style( 'CSSuabbps2' );
		wp_enqueue_style( 'CSSuabbps3' );
	}
add_action( 'plugins_loaded', 'uabbps_domain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function uabbps_domain() {
  load_plugin_textdomain( 'uabbps_domain', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}

/*COMENZANDO FUNCIONES PARA UABBPS*/
function actividad_hub() {
	add_menu_page(
                  	'Ultimate Activity BBPress',
		            'Ultimate Act',
                    'manage_options',
                    'ultimate-activity-bbpress',
                    'UABBPS_0411',
                    plugins_url('ultimate-activity-bbpress/assets/img/icon.png'),6);
}
add_action( 'admin_init', 'uabbps_display_post' );
if( !function_exists ('uabbps_display_post' ) )
{
  function uabbps_display_post()
  {
  register_setting( 'uabbps_options_post', 'DisplayPost' );
  register_setting( 'uabbps_options_post', 'OrdenPor' );
  register_setting( 'uabbps_options_post', 'CharacterMin' );
  }
}
		

function UABBPS_0411() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'bbpress/bbpress.php' ) ) {
$curUser =  wp_get_current_user();

?>
<?php screen_icon()?>
<div class="uabbp_tt">
	<center><h1><div class="barIi"></div><i class="fa fa-rebel" aria-hidden="true"></i><div class="barIr"></div></h1></center>
	<!-- izquierda -->
	<div class="left-zone">
	<div class="versiones"><div class="version"></div><?php _e('Version','uabbps_domain');?> 1.0</div>
	<center><h2><?php _e('Welcome to', 'uabbps_domain'); ?> Ultimate Activity bbPress LITE</h2></center>
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
		<ul class="col-1">
			<li><i class="fa fa-newspaper-o" aria-hidden="true"></i> <?php _e('Displayed messages', 'uabbps_domain');?>: <span class="countMSJ">8</span></li>
			<li class="checked"><?php _e('Points plugin', 'uabbps_domain');?>: <i class="fa fa-clock-o" aria-hidden="true"></i> <?php _e('Coming soon','uabbps_domain'); ?></li>
			<li class="bbpress-verify checked"><?php _e('bbPress status','uabbps_domain'); ?>: 
			<?php
			if ( is_plugin_active( 'bbpress/bbpress.php' ) ) {
				echo "<i class='fa fa-check-circle' aria-hidden='true'></i> ";
				_e('enabled','uabbps_domain');
			} else {
				echo "<i class='fa fa-exclamation-triangle' aria-hidden='true'></i>";
				_e('disabled','uabbps_domain');
			}
			?>
			</li>
			<li class="mostrador_por"><?php _e('Organized by','uabbps_domain'); ?>:
				<?php
				_e('News','uabbps_domain');
				?>
			</li>
		</ul>
	</div>
	<center><h4 class="purchase"><?php _e('Purchase the premium version','uabbps_domain'); ?></h4></center>
</div>

<div class="sidebar-right">
<div class="barizq">
<div class="sidebar bar-right"><i class="fa fa-plug" aria-hidden="true"></i> <?php _e('Basic settings','uabbps_domain'); ?></div>
<section class="lite-version">
	<p style="font-size:17px">
	<h4 style="text-align:center;"><?php _e('With Premium version, you can manage all options of this plugin, you can setup all options like:','uabbps_domain'); ?></h4>
	<li><?php _e('picker the number of items to show on the dashboard left','uabbps_domain'); ?></li>
	<li><?php _e('You can delete topics and replies from the dashboard left','uabbps_domain'); ?></li>
	<li><?php _e('You can go directly to the ubicacion Post','uabbps_domain'); ?></li>
	<li><?php _e('you can go directly to the ubicacion of the profile user','uabbps_domain'); ?></li>
	<li><?php _e('You can select how many words you want to display on the content of the left panel','uabbps_domain'); ?></li>
	<li><?php _e('will you have access to more features that we will implement in this plugin','uabbps_domain'); ?></li>
	<li><?php _e('you can view the profile image of users','uabbps_domain'); ?>	</li>
	</p>
	<center>
	<p class="social" style="font-size:18pt"><?php _e('Follow us on','uabbps_domain');?></p>
	<li class="network"><a target="_blank" href="https://www.facebook.com/serverpucon/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
	<li class="network"><a target="_blank" href="https://twitter.com/EntivenOficial"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
	<li class="network"><a target="_blank" href="https://www.youtube.com/channel/UCBlDFxuvJFZqZwZ19xwVG6g"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
	</p>
	</center>
</section>
</div>
</div>
<?php


$widget_options = get_option('DisplayPost');
$OrderBy = get_option('OrdenPor');
	$forums_query = new WP_Query( array(
		'post_type' => array( 'topic', 'reply' ),
		'showposts' => '8',
		'orderby' => 'date',
		'order' => 'DESC'
	) );

	$forums =& $forums_query->posts;

	if ( $forums && is_array( $forums ) ) {
		$list = array();
		foreach ( $forums as $forum ) {

		$url_edit = get_edit_post_link( $forum->ID );
		$title = _draft_or_post_title( $forum->ID );
		$fecha = get_the_date( $format, $forum->ID );
		$migas = get_the_title($forum->post_parent);
  		$hace = bbp_get_forum_freshness_link($forum->ID);
		$reply_id = bbp_get_reply_id();
		$autor = bbp_get_topic_author( $forum->ID );
			if ( 'reply' == get_post_type( $forum->ID ) ) {
				$identifier = '<div id="respuestas">
				<span class="dashicons dashicons-admin-comments"></span> 
				'.__('Answer to','uabbps_domain').': 
				<div class="migas">
				'.$migas.'
				</div>
				</div>
				';
				$url_public = bbp_get_reply_url( $forum->ID );

			} else if ( 'topic' == get_post_type( $forum->ID ) ) {
				$identifier = '<div id="temas">
                                <span class="dashicons dashicons-admin-post"></span>
								'.__('Topic','uabbps_domain').':
                                <div class="migas">'
                                .$migas.
                                '</div>
                               </div>
                               <div class="hace">'
                               .$hace.
                               '</div>';

			}

			$item = "
				<div class='dashboard-comment-wrap'>
    <div class='hpar_uabbps'>
    <div class='identificador'>
	$identifier
    </div>
    </div>
	<table>
	<tr>
    <td><h4><span class='enlace' title='" . sprintf( __( 'View "%s"' ), esc_attr( $title ) ) . "'>".__('View full','uabbps_domain')."</span></td>
    <td><div class='autores'><b>".__('Posted by','uabbps_domain')."</b><span data-balloon='".__('View profile of','uabbps_domain')." $autor' data-balloon-pos='up'> $autor</span></div>
    <div class='fecha'><span class='fecha1'>".__('Date','uabbps_domain').":</span><span class='fecha2'> $fecha</span></div></td>
    <td>
	<ul>
    <li><a class='crud_action_1' href='$url_edit'><button class='btn btn-primary'><span class='editar'> ".__("Edit",'uabbps_domain')."</span></button></a></li>
    <li><div class='crud_action_3'><button class='btn btn-danger'><span class='borrar'> ".__("Delete","uabbps_domain")."</span></button></div></li>
	</ul>
    </td>
  </tr>
</table>
				";

			if ( $the_content = preg_split( '#\s#', strip_tags( $forum->post_content ), 50, PREG_SPLIT_NO_EMPTY ) )

				$item .= '<div class="textocon">'.__('Content','uabbps_domain').':

				</div> <br><blockquote class="contenido"><p>' . join( ' ', array_slice( $the_content, 0, 39 ) ) . ( 49 < count( $the_content ) ? '&hellip;' : '' ) . '</p></blockquote><p></div>';

			$list[] = $item;

		}
?>
<div class="escritorio_hub">
<div class="escritorio_hub_bor"><?php _e('Forum activity','uabbps_domain'); ?></div>
<ul class="escritorio_hub_ul">
	<li class="activity-item"><?php echo join( "</li>\n<li class='activity-item'>", $list); ?></li><br>
</ul>

</div>
<ul class="subsubsub especial">
	<?php
		$count_the_topics = wp_count_posts( 'topic' );
	    $count_topics = number_format_i18n( $count_the_topics->publish );
		$count_the_replies = wp_count_posts( 'reply' );
	    $count_replies = number_format_i18n( $count_the_replies->publish );
	?>

</ul>

<?php
	} else {
		_e( '<p>Not found anything</p>', 'uabbps_domain' );
	}
} else 
	{
	include_once('includes/else.php');
	echo uabbps_else();
	}
}
//proando



function opciones_uabbps_post() {
	
	$defaults = array(get_option('DisplayPost'));
	if ( ( !$options = get_option( 'DisplayPost' ) ) || !is_array( $options ) )
	
		$options = array();
	return array_merge( $defaults, $options );

}


function uabbps_activity_setup() {
 
	$options = opciones_uabbps_post();
 
	if ( 'post' == strtolower( $_SERVER['REQUEST_METHOD'] ) && isset( $_POST['widget_id'] ) && 'DisplayPost_Act' == $_POST['widget_id'] ) {
		$options['DisplayPost'] = intval( $_POST['DisplayPost'] );
		if ( $options['DisplayPost'] < 1 )
			$options['DisplayPost'] = 5;
		update_option( 'DisplayPost_Act', $options );
	}
}

function count_user_posts_by_type( $userid, $post_type = 'post' ) {
	global $wpdb;

	$where = get_posts_by_author_sql( $post_type, true, $userid );

	$conteo = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts $where" );

  	return apply_filters( 'get_usernumposts', $conteo, $userid );
	}

?>
