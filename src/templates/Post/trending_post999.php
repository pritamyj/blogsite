
  <link rel="stylesheet" type="text/css" href="../../css/trending_post.css">  
  <link rel="stylesheet" type="text/css" href="../../css/trending_post0.css"> 

                 

              <div class="wrapperr">
 <?php 
                  $object=new LikeDislike();
                  $arrays=$object->trending_posts();
                  foreach($arrays as $q){
                    $a[]=$q['post_id'];
                  } 
                  $count=array_count_values($a);
                  asort(array_reverse($count,true));  

                  $i=0;
                  foreach($count as $x => $val){

                    $dats= new LikeDislike(); 
                    $rs=$dats->trending_posts_keys($x);
                    foreach($rs as $w){
                     $a=$w['title'];
                     $s= $w['content'];
                     $d= $w['images'];
                     $f= $w['id']; 
                   }
                   ?>
                <div class="cardd" style="--delay:-1">

                <div class="contentt">
                  <div class="imgg">
                    <img src="../../<?php echo $d;?>">
                  </div>
                  <div class="details">
                  <span class="name"><?php
                       echo substr($a,0 ,33); 
                       if(strlen($a) > 33){ 
                        echo "...";
                      }
                      ?></span>
                  <p> <?php echo substr($s, 0, 90); ?>...</p>
                </div>
          </div> 

          </div> 
        <?php } ?>
        </div>
              <div class="wrapperr">
 <?php $a=array('');
                  $object=new LikeDislike();
                  $arrays=$object->trending_posts();
                  foreach($arrays as $q){
                    $a =$q['post_id'];
                  } 
                  $count=array_count_values($a);
                  asort(array_reverse($count,true));  

                  $i=0;
                  foreach($count as $x => $val){

                    $dats= new LikeDislike(); 
                    $rs=$dats->trending_posts_keys($x);
                    foreach($rs as $w){
                     $a=$w['title'];
                     $s= $w['content'];
                     $d= $w['images'];
                     $f= $w['id']; 
                   }
                   ?>
                <div class="cardd" style="--delay:0">

                <div class="contentt">
                  <div class="imgg">
                    <img src="../../<?php echo $d;?>">
                  </div>
                  <div class="details">
                  <span class="name"><?php
                       echo substr($a,0 ,33); 
                       if(strlen($a) > 33){ 
                        echo "...";
                      }
                      ?></span>
                  <p> <?php echo substr($s, 0, 90); ?>...</p>
                </div>
          </div> 

          </div> 
        <?php } ?>
        </div>
              <div class="wrapperr">
 <?php 
                  $object=new LikeDislike();
                  $arrays=$object->trending_posts();
                  foreach($arrays as $q){
                    $a[]=$q['post_id'];
                  } 
                  $count=array_count_values($a);
                  asort(array_reverse($count,true));  

                  $i=0;
                  foreach($count as $x => $val){

                    $dats= new LikeDislike(); 
                    $rs=$dats->trending_posts_keys($x);
                    foreach($rs as $w){
                     $a=$w['title'];
                     $s= $w['content'];
                     $d= $w['images'];
                     $f= $w['id']; 
                   }
                   ?>
                <div class="cardd" style="--delay:1">

                <div class="contentt">
                  <div class="imgg">
                    <img src="../../<?php echo $d;?>">
                  </div>
                  <div class="details">
                  <span class="name"><?php
                       echo substr($a,0 ,33); 
                       if(strlen($a) > 33){ 
                        echo "...";
                      }
                      ?></span>
                  <p> <?php echo substr($s, 0, 90); ?>...</p>
                </div>
          </div> 

          </div> 
        <?php } ?>
        </div>
              <div class="wrapperr">
 <?php 
                  $object=new LikeDislike();
                  $arrays=$object->trending_posts();
                  foreach($arrays as $q){
                    $a[]=$q['post_id'];
                  } 
                  $count=array_count_values($a);
                  asort(array_reverse($count,true));  

                  $i=0;
                  foreach($count as $x => $val){

                    $dats= new LikeDislike(); 
                    $rs=$dats->trending_posts_keys($x);
                    foreach($rs as $w){
                     $a=$w['title'];
                     $s= $w['content'];
                     $d= $w['images'];
                     $f= $w['id']; 
                   }
                   ?>
                <div class="cardd" style="--delay:2">

                <div class="contentt">
                  <div class="imgg">
                    <img src="../../<?php echo $d;?>">
                  </div>
                  <div class="details">
                  <span class="name"><?php
                       echo substr($a,0 ,33); 
                       if(strlen($a) > 33){ 
                        echo "...";
                      }
                      ?></span>
                  <p> <?php echo substr($s, 0, 90); ?>...</p>
                </div>
          </div> 

          </div> 
        <?php } ?>
        </div>