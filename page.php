<?php get_header(); ?>
  <div class="main">


    <?php
    if(have_posts()):
      while(have_posts()):
        the_post();
        ?>

        <article class="entry" itemscope itemtype="http://schema.org/BlogPosting">
          <header class="entry_header">
            <h1 class="entry_title" itemprop="name"><?php the_title(); ?></h1>
            <div class="entry_meta">
              Published : <time datetime="<?php the_date_xml(); ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>
            </div>
          </header>

          <div class="entry_content" itemscope="articleBody">
            <figure class="entry_thumbnail">
              <?php the_post_thumbnail(); ?>
            </figure>
            <?php the_content(); ?>
          </div>
        </article>


      <?php
      endwhile;
    endif;
    ?>

  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>