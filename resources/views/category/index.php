<?php foreach($categoryList as $key => $category): ?>
  <a  href="<?=route('category.show', ['id' => $key])?>"><?=$category['caption']?></a>
  <br><hr>
<?php endforeach; ?>