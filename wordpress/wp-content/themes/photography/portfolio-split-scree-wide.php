<?php
/**
 * Template Name: Portfolio Split Screen Wide
 * The main template file for display portfolio page.
 *
 * @package WordPress
 */

/**
*	Get Current page object
**/
$page_obj = get_page($post->ID);
$current_page_id = '';

if(isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

global $photography_homepage_style;

$tg_menu_layout = photography_menu_layout();
if($tg_menu_layout == 'leftmenu')
{
	$photography_homepage_style = 'fullscreen';
}

get_header();

//Include custom header feature
global $photography_screen_class;
$photography_screen_class = 'split wide';

global $photography_page_content_class;
$photography_page_content_class = 'split wide';

get_template_part("/templates/template-header");

//Check if display title
$page_show_title = get_post_meta($current_page_id, 'page_show_title', true);

if(empty($page_show_title))
{
?>
<div class="post_caption">
    <h1><?php echo the_title(); ?></h1>
    <?php
    	//Get current page tagline
		$page_tagline = get_post_meta($current_page_id, 'page_tagline', true);
    
	    if(!empty($page_tagline))
	    {
	?>
	    <hr class="title_break">
	    <div class="page_tagline">
	    	<?php echo wp_kses_post($page_tagline); ?>
	    </div>
	<?php
	    }
	?>
</div>
<?php
}
?>

<div class="inner">

    <!-- Begin main content -->
    <div class="inner_wrapper">

	    <div class="sidebar_content full_width fixed_column">
	    
	    	<?php
	    		//Include project filterable options
				get_template_part("/templates/template-portfolio-filterable");
			?>
			
			<?php
			    if(!empty($post->post_content) && empty($term))
			    {
			?>
			    <div class="standard_wrapper"><?php echo photography_apply_content($post->post_content); ?></div><br class="clear"/><br/>
			<?php
			    }
			    elseif(!empty($term) && !empty($ob_term->description))
			    { 
			?>
			    <div class="standard_wrapper"><?php echo esc_html($ob_term->description); ?></div><br class="clear"/><br/>
			<?php
			    }
			?>
	
			<div id="portfolio_filter_wrapper" class="gallery two_cols portfolio-content section content clearfix wide" data-columns="2">
	
			<?php
				//Get number of portfolios per page
				$tg_portfolio_items = kirki_get_option('tg_portfolio_items');
				
				//Get all portfolio items for paging
				global $wp_query;
				
				if(is_front_page())
				{
				    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
				}
				else
				{
				    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				}
				
				$query_string = 'paged='.$paged.'&orderby=menu_order&order=ASC&post_type=portfolios&numberposts=-1&suppress_filters=0&posts_per_page='.$tg_portfolio_items;
			
				if(!empty($term))
				{
					$ob_term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$custom_tax = $wp_query->query_vars['taxonomy'];
				    $query_string .= '&posts_per_page=-1&'.$custom_tax.'='.$term;
				}
				query_posts($query_string);
			
				$key = 0;
				if (have_posts()) : while (have_posts()) : the_post();
					$key++;
					$image_url = '';
					$portfolio_ID = get_the_ID();
							
					if(has_post_thumbnail($portfolio_ID, 'large'))
					{
					    $image_id = get_post_thumbnail_id($portfolio_ID);
					    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
					    
					    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-grid', true);
					}
					
					$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
					
					if(empty($portfolio_link_url))
					{
					    $permalink_url = get_permalink($portfolio_ID);
					}
					else
					{
					    $permalink_url = $portfolio_link_url;
					}
					
					//Get portfolio category
					$portfolio_item_set = '';
					$portfolio_item_sets = wp_get_object_terms($portfolio_ID, 'portfoliosets');
					
					if(is_array($portfolio_item_sets))
					{
					    foreach($portfolio_item_sets as $set)
					    {
					    	$portfolio_item_set.= $set->slug.' ';
					    }
					}
			?>
			<div class="element grid classic2_cols <?php echo esc_attr($portfolio_item_set); ?>" data-type="<?php echo esc_attr($portfolio_item_set); ?>">
			
				<div class="one_half gallery2 static filterable gallery_type animated<?php echo esc_attr($key+1); ?> portfolio_type" data-id="post-<?php echo esc_attr($key+1); ?>">
				<?php 
					if(!empty($small_image_url[0]))
					{
				?>		
					<?php
							$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
							$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
							
							switch($portfolio_type)
							{
							case 'External Link':
								$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
						?>
						<a target="_blank" href="<?php echo esc_url($portfolio_link_url); ?>">
							<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"/>
							<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5><?php echo get_the_title(); ?></h5>
							            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
	        						</div>
	        					</div>
					        </div>
			            </a>
						
						<?php
							break;
							//end external link
							
							case 'Portfolio Content':
	        				default:
	        			?>
	        			<a href="<?php echo esc_url(get_permalink($portfolio_ID)); ?>">
	        				<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
	        				<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5><?php echo get_the_title(); ?></h5>
							            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
	        						</div>
	        					</div>
					        </div>
			            </a>
		                
		                <?php
							break;
							//portfolio content
	        				
	        				case 'Image':
						?>
						<a data-caption="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($image_url[0]); ?>" class="fancy-gallery">
							<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
							<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5><?php echo get_the_title(); ?></h5>
							            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
	        						</div>
	        					</div>
					        </div>
		                </a>
						
						<?php
							break;
							//end image
							
							case 'Youtube Video':
						?>
						
						<a href="https://www.youtube.com/embed/<?php echo esc_attr($portfolio_video_id); ?>" class="lightbox_youtube" data-options="width:900, height:488">
							<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
							<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5><?php echo get_the_title(); ?></h5>
							            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
	        						</div>
	        					</div>
					        </div>
			            </a>
						
						<?php
							break;
							//end youtube
						
						case 'Vimeo Video':
						?>
						<a href="https://player.vimeo.com/video/<?php echo esc_attr($portfolio_video_id); ?>?badge=0" class="lightbox_vimeo" data-options="width:900, height:506">
							<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
							<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5><?php echo get_the_title(); ?></h5>
							            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
	        						</div>
	        					</div>
					        </div>
			            </a>
						
						<?php
							break;
							//end vimeo
							
						case 'Self-Hosted Video':
						
							//Get video URL
							$portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
							$preview_image = wp_get_attachment_image_src($image_id, 'large', true);
						?>
						<a href="<?php echo esc_url($portfolio_mp4_url); ?>" class="lightbox_vimeo">
							<img src="<?php echo esc_url($small_image_url[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
							<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5><?php echo get_the_title(); ?></h5>
							            <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
	        						</div>
	        					</div>
					        </div>
			            </a>
						
						<?php
							break;
							//end self-hosted
						?>
						
						<?php
							}
							//end switch
						?>
				<?php
					}		
				?>
				</div>
			</div>
			<?php
				endwhile; endif;
			?>
				
			</div>
			
			<?php
			    if($wp_query->max_num_pages > 1)
			    {
			    	if (function_exists("photography_pagination")) 
			    	{
			?>
					<br class="clear"/>
			<?php
			    	    photography_pagination($wp_query->max_num_pages);
			    	}
			    	else
			    	{
			    	?>
			    	    <div class="pagination"><p><?php posts_nav_link(' '); ?></p></div>
			    	<?php
			    	}
			    ?>
			    <div class="pagination_detail">
			     	<?php
			     		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			     	?>
			     	<?php esc_html_e('Page', 'photography-translation' ); ?> <?php echo esc_html($paged); ?> <?php esc_html_e('of', 'photography-translation' ); ?> <?php echo esc_html($wp_query->max_num_pages); ?>
			     </div>
			     <br class="clear"/><br/>
			     <?php
			     }
			?>
			
			<?php
				get_template_part("/templates/template-footer-split");
			?>
	
	    </div>
	
    </div>
    <!-- End main content -->
    	
</div>

<br class="clear"/><br/>
<?php
	get_footer();
?>