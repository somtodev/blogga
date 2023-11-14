<?php include "includes/header.php" ?>
<?php include "lib/function.php" ?>
<main>
  <?php

  $page = 0;

  if (isset($_GET['page'])) $page =  htmlspecialchars($_GET['page']);

  $blogs = isset($chunks[$page]) ? $chunks[$page] : null;

  if (!empty($blogs)) {
    foreach ($blogs as $blog) {
      $draft = $blog['draft'] ?? false;

      if ($draft == false) {

        $title = ucwords($blog['title']);
        $description = $blog['description'];
        $link = implode('-', explode(' ', strtolower($blog['title'])));
        $date = date('l F, Y ', strtotime($blog['date']));

        $template = "
      <article class='blog-post'>
        <h2 class='post-title'><a href='read?title=$link'>$title</a></h2>
        <p class='post-description'>$description</p>
        <p class='post-date'>Published on $date</p>
        <a class='read-more-link' href='read?title=$link'>Read More</a>
      </article>
   ";

        echo $template;
      }
    }
  } else {
    header("Location: 404.php");
  }


  ?>
  <?php include "includes/pagination.php" ?>
</main>
<?php include "includes/footer.php" ?>