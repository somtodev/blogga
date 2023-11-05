<section class="pagination">
<span>Page: </span>
<?php
for($index = 0; $index < count($chunks); $index++){
  $pagination = $index + 1;
  echo '<a href="/blogga/source?page='. $index.'">'.$pagination.'</a>';
}
?>
</section>

