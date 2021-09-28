<link rel="stylesheet" type="text/css" href="../../css/trending_post.css">



<div class="contentt">

  <h4 class="text-center text-dark py-2"><strong>Trending Post</strong></h4>
  <div class="post-item py-1">


    <?php
    $object = new LikeDislike();
    $arrays = $object->trending_posts();
    foreach ($arrays as $q) {
      $a[] = $q['post_id'];
    }
    $count = array_count_values($a);
    asort(array_reverse($count, true));

    $i = 0;
    foreach ($count as $x => $val) {

      $dats = new LikeDislike();
      $rs = $dats->trending_posts_keys($x);
      foreach ($rs as $w) {
        $a = $w['title'];
        $s = $w['content'];
        $d = $w['images'];
        $f = $w['id'];


        $title = preg_replace('/[^\p{L}\p{N}\s]/u', '', $w['title']);

        $posttitle = str_replace(" ", "-", $title);


      }
      ?>

      <div class="article">
        <a href="../../blog/<?php echo $posttitle; ?>">
          <img src="../../<?php echo $d; ?>">
        </a>
        <div class="card-body">
          <div class="trending-category">
            <a href="../../blog/<?php echo $posttitle; ?>">
              <strong><?php
              echo substr($a, 0, 33);
              if (strlen($a) > 33) {
                echo "...";
              }
            ?></strong>
          </a>
        </div>
        <a href="../../blog/<?php echo $posttitle; ?>">
          <p class="text-title display-2 text-dark">
            <?php echo substr($s, 0, 90); ?>...
          </p>
        </a>
      </div>
      </div><?php
      if ($i == 4) {
        break;
      }
      $i++;
    }
    ?>
  </div>
</div> 