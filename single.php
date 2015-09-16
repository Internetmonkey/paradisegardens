
<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
	<div class="feature-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
<?php endif; ?>



<section class="page-section">

<div class="container">
	<div class="row">

<?php get_template_part('templates/content-single', get_post_type()); ?>

