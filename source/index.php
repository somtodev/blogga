<?php include "includes/header.php" ?>
<main>
<?php 

$blogs = file_get_contents('blog/blog.json');
$blog_data = json_decode($blogs,true);

foreach($blog_data as $blog){
  $draft = $blog['draft'] ?? false;

  if($draft == false){
    
   $title = ucwords($blog['title']);
   $description = $blog['description'];
   $link = implode('-',explode(' ',strtolower($blog['title'])));
   $date = date('l F, Y ', strtotime($blog['date']));

   $template = "
      <article class='blog-post'>
        <h2 class='post-title'><a href='read.php?title=$link'>$title</a></h2>
        <p class='post-description'>$description</p>
        <p class='post-date'>Published on $date</p>
        <a class='read-more-link' href='read.php?title=$link'>Read More</a>
      </article>
   ";
   
   echo $template;
  }
}

?>
<?php include "includes/pagination.php" ?>
</main>
<?php include "includes/footer.php" ?>