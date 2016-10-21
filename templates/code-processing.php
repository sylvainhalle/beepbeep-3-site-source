<?php

$javadoc_root = "http://liflab.github.io/beepbeep-3/javadoc/";
//$source_location = "/home/Sylvain/Workspaces/beepbeep-3/Source/Examples/src/";
$source_location = "C:/Users/Sylvain/.babun/cygwin/home/Sylvain/Workspaces/beepbeep-3/";

function insert_code_snippets($s)
{
  global $source_location;
  preg_match_all("/!!(.*?)\\((.*?)\\)/", $s, $matches, PREG_SET_ORDER);
  foreach($matches as $match)
  {
    $filename = $source_location.$match[2];
    if (file_exists($filename))
    {
      $snip_content = file_get_contents($filename);
      preg_match("/\\/\\/\\s*".$match[1]."(.*?)\\/\\/\\s*".$match[1]."/ms", $snip_content, $snip_matches);
      $s = str_replace($match[0], "<pre><code>".fix_indentation($snip_matches[1])."</code></pre>", $s);
    }
    else
    {
      $s = str_replace($match[0], "<pre><code>Source code not found</code></pre>", $s);
    }
  }
  return $s;
}

/**
 * Removes from each line of s the minimum number of spaces common
 * to all lines of s
 */
function fix_indentation($s)
{
  // Replace tabs by spaces
  $s = str_replace("\t", "    ", $s);
  $lines = explode("\n", $s);
  $num_spaces = 100000; // "MAX_INT"
  $out = "";
  // We skip the first and last line
  for ($i = 1; $i < count($lines) - 1; $i++)
  {
    $line = $lines[$i];
    $sp = strlen($line) - strlen(ltrim($line));
    $num_spaces = min($num_spaces, $sp);
  }
  for ($i = 1; $i < count($lines) - 1; $i++)
  {
    $line = $lines[$i];
    $out .= substr($line, $num_spaces)."\n";
  }
  return $out;
}

/**
 * Replaces all strings of the form "jdx:something" into an URL pointing
 * the the corresponding Javadoc
 */
function resolve_javadoc($s)
{
  preg_match_all("/(jd.:.*?)([\\]\\)\\\"])/", $s, $matches, PREG_SET_ORDER);
  foreach ($matches as $match)
  {
    $url = get_javadoc_url($match[1]);
    $s = str_replace($match[0], $url.$match[2], $s);
  }
  return $s;
}

/**
 * Find the Javadoc entry corresponding to a class
 */
function get_javadoc_url($string)
{
  global $javadoc_root;
  $left_part = substr($string, 0, 4);
  $right_part = substr($string, 4);
  $url = "#";
  switch ($left_part)
  {
    case "jdp:":
      // Package
      $parts = explode(".", $right_part);
      $path = implode("/", $parts);
      $url = $javadoc_root.$path."/package-summary.html";
      break;
    case "jdc:":
    case "jdi:":
      // Class or interface
      $parts = explode(".", $right_part);
      $path = implode("/", $parts);
      $url = $javadoc_root.$path.".html";
      break;
    case "jdm:":
      // Method
      $parts = explode(".", $right_part);
      $last_part = $parts[count($parts) - 1];
      unset($parts[count($parts) - 1]);
      $last_part_parts = explode("#", $last_part);
      $path = implode("/", $parts);
      $url = $javadoc_root.$path."/".$last_part_parts[0].".html#".$last_part_parts[1];
      break;
  }
  return $url;
}
?>