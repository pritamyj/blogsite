 <?php $ob = new LikeDislike();
	$user_id = $_SESSION['ui'];
	?>
 <div class="rate">

 	<h3><i <?php if ($ob->userLiked($q['id'], $user_id)) : ?> class="fa fa-thumbs-up like-btn" <?php else : ?> class="fa fa-thumbs-o-up like-btn" <?php endif ?> data-id="<?php echo $q['id'] ?>"></i>
 		<span class="likes"><?php
								$likes = $ob->getLikes($q['id']);
								foreach ($likes as $Q) {
									echo $Q;
								} ?></span>

 		&nbsp;&nbsp;&nbsp;&nbsp;

 		<i <?php if ($ob->userDisliked($q['id'], $user_id)) : ?> class="fa fa-thumbs-down dislike-btn" <?php else : ?> class="fa fa-thumbs-o-down dislike-btn" <?php endif ?> data-id="<?php echo $q['id'] ?>"></i>
 		<span class="dislikes"><?php
								$dislikes = $ob->getDislikes($q['id']);
								foreach ($dislikes as $Q) {
									echo $Q;
								} ?></span>
 	</h3>
 </div>