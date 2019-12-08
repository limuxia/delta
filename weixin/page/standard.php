<?php
  header("Location: page/standard/{$_REQUEST['standard']}.html");

  // 静态 .html会调用所在目录下 image 目录下图片文件，require 会导致图片路径不匹配而无法显示
  //require("standard/{$_REQUEST['standard']}.html");
?>