<?php
include 'includes/header.php';
require '../vendor/autoload.php';
 

$title = htmlspecialchars($_REQUEST['title']);
$blogs = json_decode(file_get_contents('blog/blog.json'), true);
$parsedown = new Parsedown();

function find_blog($arr) {
  global $title;
  return implode('-',explode(' ',strtolower($arr['title']))) == $title;
}

$found = array_filter($blogs, "find_blog");
$blog = current($found) ?? null;

if($blog){
try{
  $content = file_get_contents('blog/'.$blog['link']);
  $markdown = $parsedown->text($content);
  $title = $blog['title'];

  echo "
  <!DOCTYPE html>
  <html>
  <head>
    <title>Blogga: $title</title>
    <link rel='stylesheet' href='static/css/main.css' />
    <link rel='stylesheet' href='static/css/blog.css' />
  </head>
  <body>
  <main>
    $markdown
  </main>
  </body>
  </html>
  ";
}catch(Error $ex){
  echo 404;
}
}else{
  echo "Blog: Not Found";
}
?>
