<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	 <!------quick links start-------------></div>
	 
<div class="grids-of_4 in-assocated">
   <?php
   		$args = array( 'numberposts' => '5' );
		$recent_posts = wp_get_recent_posts( $args,OBJECT );
	?>
	<div class="grid_of_1">
       <?php if( have_posts() ):?>                                 
	  <div class="sub_grid">
	  
		
        	<span>Blogs</span>
			
        <ul>
                <?php foreach( $recent_posts as $key => $s ) : ?>              
          <li><a href="<?php echo $recent_posts[$key]->guid; ?>" style="color:#fff;"><?php echo $recent_posts[$key]->post_title; ?></a></li>
                <?php endforeach; ?>  
       </ul>

		</div>
		<?php endif; ?>
		
        <div class="clear"> </div>
	</div>
	
    <div class="grid_of_1">
                                        
		<div class="sub_grid">
			<span>Recent Events</span>
			<?php $event = tribe_get_events();$i=0;?>
            <ul>
				<?php foreach($event as $key => $s) :?>
                	<?php if($i<5){?>
                <li><a href="<?php echo $event[$key]->guid;?>" style="color:#fff;" ><?php echo $event[$key]->post_title;?></a></li>
                <?php $i++;}endforeach;?>
			
            </ul>
		</div>

		<div class="clear"> </div>
	</div>

	<div class="grid_of_1">

		<div class="sub_grid">
			<span>Quick Links</span>
            <ul>
            <?php wp_nav_menu( array( 'theme_location' => 'footer-nav' ) );
		// refer theme's function.php
		 ?>
                
            </ul>
        </div>
		
        <div class="clear"> </div>
	</div>

	<div class="clear"> </div>

</div>

	<!------quick links end------------->
    <div id="footer">
<div class="fcred">
          Copyright &copy; 2014 
          <a href="http://www.cochinadventure.org/">
Cochin Adventure Foundation
</a>
          | Powered by 
          <a href="http://www.wordpress.com/">
            Wordpress
          </a>
<br>
          Templated By
          <a title="" target="_blank" href="http://www.i3wiz.com/">
            IOWiz
          </a>
</div>
<div class="clear"></div>
</div>
<?php wp_footer(); ?>
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#toTop").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#toTop').fadeIn();
			} else {
				$('#toTop').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#toTop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});
</script>
<a style="display: block;" id="toTop" href="#"><span style="opacity: 0;" id="toTopHover"></span></a>
</body>
</html>