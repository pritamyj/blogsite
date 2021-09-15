<div class="col-md-4" style="padding:20px;">
                <div class="latest-news-wrap">
                  <div class="news-img">
                    <img src="../../<?php echo $q['images']; ?>" class="img-responsive">
                    <div class="date">
                      <?php 
                      $dt= new DateTime($q['date']);
                      ?>
                      <span><?php echo $dt->format('d'); ?></span>
                      <span><?php echo $dt->format('M');?></span>
                    </div>
                  </div> 
                  <div class="news-content">
                    <h3><?php
               echo substr($q['title'],0 ,20); 
              if(strlen($q['title']) > 20){ 
                echo "...";
              }
             ?></h3>
              <p > <?php echo substr($q['content'], 0, 190); ?>...</p>


                    <?php 
                    $a2= new Index(); 
                    $a1 = $a2->usern($q['user_id']); 
                    foreach($a1 as $u){
                      $uname= $u['username'] ;
                    }
                    ?>

                    <h4><small class="text-muted">Author: <?php echo $uname; ?></small></h4>

                    <p></p>
                    <h5><strong style=" color: darkslategrey;"><small"> <?php echo getLikes($q['id']); ?> Likes </small></strong> 

                      &nbsp;&nbsp;&nbsp;&nbsp;

                      <strong style=" color: darkslategrey;"> <span class="dislikes"><?php echo getDislikes($q['id']); ?> Dislikes</span></strong> </h5>

                      <p></p>
                      <div>                     
                        <a href="../Post/view.php?id=<?php echo $q['id']; ?>">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>