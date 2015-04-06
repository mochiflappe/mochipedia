<?php get_header(); ?>
  <div class="main">

    <?php
    if(have_posts()):
      while(have_posts()):
        the_post();
        ?>

        <article class="entry">
          <header class="entry_header">
            <h1 class="entry_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <div class="entry_meta">
              Published : <time datetime="<?php the_date_xml(); ?>" itemprop="datePublished"><?php echo get_the_date() ?></time>
              Category : <?php the_category(', '); ?>
            </div>
          </header>

          <div class="entry_content">
            <?php if(has_post_thumbnail()){ ?>
              <figure class="entry_thumbnail">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
              </figure>
            <?php } ?>
            <?php the_excerpt(); ?>

            <a href="<?php the_permalink() ?>">Read More »</a>
          </div>
        </article>


      <?php
      endwhile;

      //ページネーション
      //http://wordpress.hitsuji.me/add-paginations/
      $prev_link = get_previous_posts_link();
      $next_link = get_next_posts_link();

      if (isset($prev_link) or isset($next_link)) {
        echo '<ul class="pagination">', PHP_EOL;
        if (isset($prev_link)) {
          echo '<li class="page_prev">', previous_posts_link(), '</li>', PHP_EOL;
        }
        if (isset($next_link)) {
          echo '<li class="page_next">', next_posts_link(), '</li>', PHP_EOL;
        }
        echo '</ul>', PHP_EOL;
      };

      else:echo '<p>記事が見つかりませんでした。</p>
      <p><a href="http://mochi-flappe.com/">トップページへ戻る &gt;</a></p>';

    endif;

    ?>

  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>