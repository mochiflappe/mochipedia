<div class="secondary">

  <div class="widget">
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
      <div>
        <label class="screen-reader-text" for="s">検索:</label>
        <input type="text" value="" name="s" id="s" class="searchinput" placeholder="Search" >
        <input type="submit" id="searchsubmit" class="searchsubmit" value="検索">
      </div>
    </form>
  </div>

  <div class="widget">
    <h3 class="widget-title">Author</h3>
    <div class="textwidget">
      <p><i class="mochi mochi-icon twitter_icon"></i><br />
        もち<br />
        <a href="https://twitter.com/mochi_Flappe" target="_blank"> @mochi_Flappe</a>
      </p>
    </div>
  </div>

  <ul class="dynamic_sidebar">
  <?php dynamic_sidebar(); ?>
  </ul>

  <aside class="widget">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- adsense -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-8882921596311592"
         data-ad-slot="6755807066"
         data-ad-format="auto"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!--<div style="background: #f00;min-height: 150px;max-width: 250px"></div>-->
  </aside>