<?php
/**
 * The template for displaying tags pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package iWrite
 */

get_header(); ?>

<section id="primary">
	<main id="main" class="site-main site-category">

	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
		
			<div class="row border-bottom pb-5 mt-5">
			
				<?php if(function_exists('z_taxonomy_image')) : ?>
				<div class="col-md-3">
					<?php z_taxonomy_image(); ?>
				</div>
				<?php endif; ?>

				<div class="col">
					<div class="row">
						<div class="col">
						<?php // the_archive_title();
							single_tag_title( '<h2 class="iwrite-category-title text-uppercase mt-2 mt-md-0">', '</h2>' ); 
						?>
						</div>
						<div class="col-md-4">
							
							<div class="text-center" style="display:none;" id="issue-loading">
								<div class="spinner-border text-info" role="status">
									<span class="sr-only">Loading...</span>
								</div>
							</div>

							<div class="form-group" id="issue-input">
								<input class="form-control form-control-sm" list="issues" name="issue" placeholder="issue" oninput="checkIssue(this.value)">
								<datalist id="issues">
									<?php 
										$tags = get_tags(['order' => DESC]);
										foreach ( $tags as $tag ) :
									?>
										<option data-value="<?php echo $tag->slug; ?>" value="<?php echo $tag->name ?>" onclick="alert('click')"><?php echo $tag->count; ?> </option>
									<?php 
									endforeach 
									?>
								</datalist>
							</div>

						</div>
					</div>
					<?php
						the_archive_description( '<p class="taxonomy-description">', '</p>' );
					?>
				</div>
			</div>
		</header><!-- .page-header -->

		<div class="row mt-5">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>
		
		<?php
		the_posts_pagination( array(
			'prev_text' => esc_html__( '&laquo; Previous', 'write' ),
			'next_text' => esc_html__( 'Next &raquo;', 'write' ),
		) );
		?>
		</div>
	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

<script>
	var tags = <?php echo json_encode(get_tags()) ?>;
	
	var issues = tags.map(tag => tag.slug);

	function checkIssue(value){
		
		try {
			var value2send = document.querySelector("#issues option[value='"+value+"']").dataset.value;
			if(issues.includes(value2send)) {
				window.location.replace( '<?php echo get_site_url(); ?>/tag/'+value2send );
				document.getElementById("issue-input").style.display = "none";
				document.getElementById("issue-loading").style.display = "block";
			}
		} catch (error) { }

	}

	

</script>

<?php get_footer(); ?>
