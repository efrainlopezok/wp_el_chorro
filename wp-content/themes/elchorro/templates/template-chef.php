<?php
/**
 * Template Name: Chef Page
 */
get_header(); ?>

<?php show_template('banner') ?>

<section class="executive_chef">
	<div class="row column form_row">
		<?php if($executive_chef_title = get_field('executive_chef_title')): ?>
			<h2 class="text-center"><?php echo $executive_chef_title; ?></h2>
		<?php endif; ?>
		<?php if($executive_chef_photo = get_field('executive_chef_photo')): ?>
			<div class="executive_chef_photo" style="background-image: url(<?php echo $executive_chef_photo['sizes']['medium'] ?>)"></div>
		<?php endif; ?>
		<?php if($executive_chef_content = get_field('executive_chef_content')): ?>
			<div class="executive_chef_content">
				<p><?php echo $executive_chef_content; ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
	<?php if (have_rows('сhefs')) : ?>
		<div class="chefs">
			<div class="row">
				<?php while (have_rows('сhefs')) : the_row(); ?>
					<div class="medium-6 large-3 columns matchHeight">
						<?php if($photo = get_sub_field('photo')): ?>
							<div class="photo" style="background-image: url(<?php echo $photo['sizes']['medium'] ?>)"></div>
						<?php endif; ?>
						<?php if($name = get_sub_field('name')): ?>
							<h3><?php echo $name; ?></h3>
						<?php endif; ?>
						<?php if($description = get_sub_field('description')): ?>
							<p><?php echo $description; ?></p>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if($team_image = get_field('team_image')): ?>
		<section class="team_image" style="background-image: url(<?php echo $team_image['sizes']['full_hd'] ?>)"></section>
	<?php endif; ?>

<?php get_footer(); ?>
