<?php header("content-type: application/x-javascript");?>
<?php
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
?>
var calScreenWidth = jQuery(window).width();
var imgFlowSize = 0.6;
if(calScreenWidth > 480)
{
imgFlowSize = 0.4;
}
else
{
imgFlowSize = 0.2;
}
<?php
if(isset($_GET['portfolioset']))
{
?>
imf.create("imageFlow", '<?php echo get_template_directory_uri(); ?>/image-portfolio-flow.php?portfolioset=<?php echo esc_attr($_GET['portfolioset']); ?>', 0.6, 0.4, 0, 10, 8, 4);
<?php
}
else
{
?>
imf.create("imageFlow", '<?php echo get_template_directory_uri(); ?>/image-portfolio-flow.php', 0.6, 0.4, 0, 10, 8, 4);

<?php
}
?>