<?php
if(!function_exists('curl_version')){
  die("Error: curl is not installed/enabled\n");
}
if(!$argv[1]){
  die("Error: you must enter a url\n");
}

$max_hops = 10;
$start_url = $argv[1];

scan_url($start_url, 1, $max_hops);

function scan_url($url, $hop_no, $max_hops) {
  print "$url\n";
  $wikipedia_base_url = 'http://en.wikipedia.org';
  $skip_links = array('\/wiki\/Help','\/w\/index');

  //get wikipedia data
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $data = curl_exec($ch);
  curl_close($ch);

  //assumption: the first p tag indicates body content, truncate everything before that
  $data = substr($data, strpos($data,'<p>'));

  $regex  = '/(<a\s*'; // Start anchor
    $regex .= '(.*?)\s*'; // whitespace etc
    $regex .= 'href=[\'"]+?\s*'; //href begin
    //$regex .= '(?P<link>(?!\/wiki\/Help)[A-Z0-9_\/]\S+)'; //the link itself
    $regex .= '(?P<link>(?!(' . implode('|',$skip_links) . '))[A-Z0-9_\/]\S+)'; //the link itself
    $regex .= '\s*[\'"]+?\s*(.*?)\s*>\s*(\S+)\s*<\/a>)/i'; // quotes, other crap

  preg_match($regex,$data,$first_link);
  //print_r($first_link);
  $first_link_url = $wikipedia_base_url . $first_link['link'];

  if($first_link_url == 'http://en.wikipedia.org/wiki/Philosophy'){
    die("$hop_no\n");
  } else {
    if ($hop_no == $max_hops){
      die("Maximum hops reached\n");
    }
    $hop_no++;
    scan_url($first_link_url,$hop_no,$max_hops);
  }
}
?>
