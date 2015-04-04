<?php get_header(); ?>
  <div class="main">

    <?php // http://webshufu.com/breadcrumbs/ ?>
    <nav class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
      <a href="<?php echo get_bloginfo('url'); ?>/" itemprop="url">Top</a> &gt;
      <?php
      $cates = get_the_category(); $cat = $cates[0];
      $the_cate=$cat->cat_ID;
      $ancestors=get_ancestors($the_cate, 'category' );
      $kosu=count($ancestors);
      for ($i = 1; $i <= $kosu; $i++)
      {
        ?>
        <a href="<?php echo get_category_link($ancestors[$kosu-$i]); ?>" itemprop="url"><?php echo get_cat_name($ancestors[$kosu-$i]); ?></a> &gt;
      <?php
      }
      ?>

      <a href="<?php echo get_category_link($the_cate); ?>" itemprop="url"><?php echo get_cat_name($the_cate); ?></a>
    </nav>


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
              Category : <a href=""><?php the_category(','); ?></a>
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

    <ul class="social_buttons">
      <li>
        <a href="http://b.hatena.ne.jp/entry/<?php the_permalink() ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?> | <?php bloginfo('name'); ?>" data-hatena-bookmark-layout="standard-balloon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
      </li>
      <li>
        <iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:106px;" allowTransparency="true"></iframe>
      </li>
      <li>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-via="mochi_Flappe">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
      </li>
    </ul>

  </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>