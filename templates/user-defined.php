<?php
// Demotes all headers by one level
function demote_headers($s)
{
  $s = preg_replace("/\\bh5\\b/i", "h6", $s);
  $s = preg_replace("/\\bh4\\b/i", "h5", $s);
  $s = preg_replace("/\\bh3\\b/i", "h4", $s);
  $s = preg_replace("/\\bh2\\b/i", "h3", $s);
  $s = preg_replace("/\\bh1\\b/i", "h2", $s);
  return $s;
}

// User-defined function to display the inner HTML of some DOM node
// as a string
function get_inner_html( $node ) 
{
  $innerHTML= '';
  $children = $node->childNodes;
  foreach ($children as $child)
  {
    $innerHTML .= $child->ownerDocument->saveXML( $child );
  }
  return $innerHTML;
}


// User-defined array that maps language codes to language names
$langnames = array("fr" => "Lire en français", "en" => "Read in English");

// Add the "current" class to the page when its slug matches the menu item
function output_menu_item($slug, $page)
{
	$class="";
	if (isset($page->data["section-slug"]) && $page->data["section-slug"] == $slug)
	{
		$class = "class = \"current\"";
	}
	return $class;
}
?>
