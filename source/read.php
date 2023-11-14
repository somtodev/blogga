<?php
require '../vendor/autoload.php';
include 'lib/function.php';

$title = htmlspecialchars($_REQUEST['title']);
$parsedown = new Parsedown();

function find_blog($arr)
{
  global $title;
  return implode('-', explode(' ', strtolower($arr['title']))) == $title;
}

$found = array_filter($blogs, "find_blog");
$blog = current($found) ?? null;
$title = 'Blogga: ' . $blog['title'];
include 'includes/header.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Blogga: $title</title>
  <link rel='stylesheet' href='static/css/main.css' />
  <link rel='stylesheet' href='static/css/blog.css' />
  <link rel='stylesheet' href='static/css/markdown.css' />
  <script defer src="static/js/main.js"></script>
</head>

<body id='top'>
  <main class="blog-content">

    <?php
    if ($blog) {
      try {
        $content = file_get_contents('blog/' . $blog['link']);
        $markdown = $parsedown->text($content);
        $title = $blog['title'];
        echo $markdown;
      } catch (Error $ex) {
        echo 404;
      }
    } else {
      header("Location: 404.php");
    }
    ?>

    <?php include 'includes/other-posts.php' ?>
  </main>
  <a href='#top' class='back-top-button' back-top-button>Up<a />
</body>

</html>