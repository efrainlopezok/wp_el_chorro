
<?php if($form_shortcode = get_field('form_shortcode','options')): ?>
<section class="contact_us_form">
	<div class="row form_row">
		<div class="columns medium-4 large-3">
		<?php if($form_title = get_field('form_title','options')): ?>
			<h2 class="form_title"><?php echo $form_title; ?></h2>
		<?php endif; ?>
		<?php if($form_desription = get_field('form_desription','options')): ?>
			<p class="form_description"><?php echo $form_desription; ?></p>
		<?php endif; ?>
		</div>
		<div class="columns medium-8 large-9">
			<?php echo do_shortcode( '' . $form_shortcode . '' ); ?>
		</div>
	</div>
</section>
<?php endif; ?>
