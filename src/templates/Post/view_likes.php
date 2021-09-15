
<div class="rate">  

	<h3><i <?php if (userLiked($q['id'])): ?>
	class="fa fa-thumbs-up like-btn"
<?php else: ?>
	class="fa fa-thumbs-o-up like-btn"
<?php endif ?>
data-id="<?php echo $q['id'] ?>"></i> 
<span class="likes"><?php echo getLikes($q['id']); ?></span>

&nbsp;&nbsp;&nbsp;&nbsp;

<i  <?php if (userDisliked($q['id'])): ?>
class="fa fa-thumbs-down dislike-btn"
<?php else: ?>
	class="fa fa-thumbs-o-down dislike-btn"
<?php endif ?>
data-id="<?php echo $q['id'] ?>"></i> 
<span class="dislikes"><?php echo getDislikes($q['id']); ?></span></h3> 
</div>