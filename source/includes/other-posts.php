<?php


$blogs = array_filter($blogs, "remove_current");
shuffle($blogs);
$random = current(array_chunk($blogs,2));

function remove_current($arr) {
  $title = htmlspecialchars($_REQUEST['title']);
  return implode('-',explode(' ',strtolower($arr['title']))) != $title;
}
?>

<section class="other-posts">
<h2>Other Post</h2>
<p>Here are some posts you might like...</p>
<section class="post-cards">
<?php
foreach($random as $post){
    $link = implode('-',explode(' ',strtolower($post['title'])));
    echo "<article class='post-card'>
    <h1>$post[title]</h1>
    <p>$post[description]</p>
    <a href='read.php?title=$link'>Read More</a>
    </article>";
}

?>
</section>
</section>
