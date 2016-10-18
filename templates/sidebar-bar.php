<?php
$sidebar_filename = $rendering->getContentDir()."/".$page->getPath($rendering->getOutputDir()."/").$page->data["slug"].".sidebar.md";
if (file_exists($sidebar_filename))
  include($sidebar_filename);
?>
