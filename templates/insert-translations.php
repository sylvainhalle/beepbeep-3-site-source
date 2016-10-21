<?php
/*
This piece of template manipulates the page's content as follows:
- Extract first <h1> element in the page
- Show that heading
- Show the list of translations for that page
- In the rest of the page, replace all occurrences of SNIP(...) by code
  fetched in BeepBeep's source
- Show the rest of the page's content
*/
require_once("code-processing.php");

$body = $page->dom->getElementsByTagName("body")->item(0);
$heading1 = $page->dom->getElementsByTagName("h1")->item(0);

// Show page heading 1 as level 2
if ($heading1)
{
  $content = $heading1->C14N();
  $content = preg_replace("/\\bh1\\b/", "h2", $content);
  echo $content;
  $heading1->parentNode->removeChild($heading1);
}

// Get page translations
if (isset($page->data["slug"]))
{
  foreach ($pages as $p)
  {
    $lang = $p->data["lang"];
    if (isset($p->data["slug"]) && $page->data["slug"] === $p->data["slug"] && $page->data["lang"] !== $lang)
    {
      echo "<span class=\"langlink-$lang\"><a href=\"".$p->getUrl($page->getOutputFilename())."\">".$langnames[$lang]."</a></span>";
    }
  }
}

// Show rest of page
$content = demote_headers(get_inner_html($body));
$content = insert_code_snippets($content);
$content = resolve_javadoc($content);
echo $content;
?>
