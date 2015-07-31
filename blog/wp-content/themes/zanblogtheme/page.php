<?php
/**
 * Page 主题文件
 *
 * @package    YEAHZAN
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.1
 */
?>

<?php get_header(); ?>
<section id="zan-bodyer">
	<div class="container">
		<section class="row">
			<div class="col-md-8">
				<article class="zan-article">
					<!-- 面包屑 -->
					<div class="breadcrumb">
				    <?php 
				    	if( function_exists( 'bcn_display' ) ) {
			        	echo '<i class="fa fa-map-marker"></i> ';
			        	bcn_display();
				    	}
				    ?>
					</div>	
					<!-- 面包屑结束 -->
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			      <?php the_content(); ?>
			    <?php endwhile; ?>
				</article>
			</div>
			<?php get_sidebar(); ?>
		</section>
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>