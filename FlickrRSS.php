<?php
date_default_timezone_set('UTC');
$uri="";
$first_var = "1";
foreach($_GET as $variable => $value)
{
if ($variable == 'uri')
{
$uri = $uri . $value;
}
else
{
$uri = $uri . "&" . $variable . "=" . $value;
}
}
header("Content-Type: application/xml; charset=ISO-8859-1");
$ch = curl_init() or die(curl_error());
curl_setopt($ch, CURLOPT_URL,$uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data1=curl_exec($ch) or die(curl_error());
$data1=str_replace("_s.jpg","_b.jpg",$data1);
$data1=str_replace('height="75"', "",$data1);
$data1=str_replace('width="75"', "",$data1);
echo $data1;
echo curl_error($ch);
curl_close($ch);
?>