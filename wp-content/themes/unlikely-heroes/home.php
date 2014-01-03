<?php get_header(); ?>

<div class="jumbotron jumbotron-home">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>
					To the 27 million people trapped in slavery
					<span>We are coming for you</span>
				</h1>
			</div>
		</div>
	</div>
</div>

<div class="section section-gray text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<p class="lead">
					<?php the_field('cta_inspiring_paragraph', 'options'); ?>
				</p>
				<div class="hidden-xs">
					<a href="<?php bloginfo('url' ); ?>/get-involved" class="btn btn-teal btn-lg"><?php the_field('cta_long_button_label', 'options'); ?></a>
				</div>
				<div class="visible-xs">
					<a href="<?php bloginfo('url' ); ?>/get-involved" class="btn btn-teal btn-lg"><?php the_field('cta_short_button_label', 'options'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section section-dark-gray text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<h2 class="text-center"><?php the_field('featured_video_video_title', 'options'); ?></h2>
				<div class="video-container">
					<?php the_field('featued_video_embed_code', 'options'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="section boxes-one hidden">
		<h2 class="text-center">Heroic Campaigns</h2>
		<div class="row">
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
						</div>
						<h3>Campaign 1</h3>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								<span class="sr-only">60% Complete</span>
							</div>
						</div>
						<div class="money-raised"><span>$2,456</span> Raised</div>
						<div class="days-left">64 Days Left</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum!</p>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
						</div>
						<h3>Campaign 2</h3>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								<span class="sr-only">60% Complete</span>
							</div>
						</div>
						<div class="money-raised"><span>$2,456</span> Raised</div>
						<div class="days-left">64 Days Left</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum!</p>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
						</div>
						<h3>Campaign 3</h3>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
								<span class="sr-only">60% Complete</span>
							</div>
						</div>
						<div class="money-raised"><span>$2,456</span> Raised</div>
						<div class="days-left">64 Days Left</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum!</p>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img box-one-action">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
							<div class="plus"></div>
						</div>
						<h3>Create a campaign</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum!  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum! Perferendis, eveniet unde tempora.</p>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="section boxes-one hidden">
		<h2 class="text-center">Heroic Events</h2>
		<div class="row">
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
						</div>
						<h3>Event 1</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum! Perferendis, eveniet unde tempora molestias ut.</p>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
						</div>
						<h3>Event 2</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum! Perferendis, eveniet unde tempora molestias ut.</p>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
						</div>
						<h3>Event 3</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum! Perferendis, eveniet unde tempora molestias ut.</p>
					</a>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 box-one">
				<div class="box-one-inner">
					<a href="#">
						<div class="box-one-img box-one-action">
							<img src="<?php bloginfo('template_directory'); ?>/img/township.jpg" alt="" class="img-responsive">
							<div class="arrow"></div>
						</div>
						<h3>All Events</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit harum optio saepe quam nostrum! Perferendis, eveniet unde tempora molestias ut.</p>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="section boxes-one">
		<h2 class="text-center">Heroic Campaigns</h2>
		<div class="row">
			
			<?php $args = array( 'post_type' => 'ignition_product','category_name' => 'featured' ,'posts_per_page' => 3); ?>
			<?php $all_campaigns = new WP_Query( $args ); ?>

			<?php if ( $all_campaigns->have_posts() ) : ?>
				<?php while ( $all_campaigns->have_posts() ) : $all_campaigns->the_post(); ?>
					<?php get_template_part('campaign','listing'); ?>
				<?php endwhile; ?>
					<?php get_template_part('create','campaign'); ?>
					<?php wp_reset_postdata(); ?>
						<div class="clearfix"></div>
						<div class="text-center">
							<a href="<?php bloginfo('url'); ?>/campaigns" class="btn btn-lg">All Campaigns</a>
						</div>

			<?php else:  ?>
				<h3 class="text-center"><?php _e( 'No campaigns yet.  Create one now!' ); ?></h3>
				<?php get_template_part('create','campaign'); ?>
				<?php get_template_part('create','campaign'); ?>
				<?php get_template_part('create','campaign'); ?>
				<?php get_template_part('create','campaign'); ?>
			<?php endif; ?>
		
			
		</div>
	</div>

</div><!-- END: container -->
<?php get_footer(); ?>
