<?php

$blogs = json_decode(file_get_contents('blog/blog.json'), true);
uasort($blogs, 'sort_blog');
$chunks = array_chunk($blogs, 5);

function sort_blog($previous, $next){
  if($previous == $next) return 0;
  $prev_date = date('l F, Y ', strtotime($previous['date']));
  $next_date = date('l F, Y ', strtotime($next['date']));
  return ($prev_date < $next_date );
}

?>
