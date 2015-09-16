

<?php while (have_posts()) : the_post(); ?>

  <header class="col-sm-12">
      <h1 class="entry-title"><?php the_title(); ?></h1>
      
    </header>

  </div><!-- /.row -->
  <div class="row">

  <div class="col-sm-8">

  <article <?php post_class(); ?>>

    <?php get_template_part('templates/entry-meta'); ?>
    
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
  </div>
<?php endwhile; ?>
