<?php $pager->setSurroundCount(2) ?>
<div class="product__pagination">
  <?php foreach($pager->links() as $link): ?>
  <a class="<?= $link['active'] ? 'active' : '' ?>" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
  <?php endforeach; ?>
</div>