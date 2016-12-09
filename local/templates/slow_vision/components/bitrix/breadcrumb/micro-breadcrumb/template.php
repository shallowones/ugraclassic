<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";
	
$strReturn = '<div prefix="v:http://rdf.data-vocabulary.org/#" class="bx_breadcrumbs"><ul>';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	if($arResult[$index]["LINK"] <> "")
		$strReturn .= '<li><span typeof="v:Breadcrumb" class="microspan"><a href="'.$arResult[$index]["LINK"].'" rel="v:url" property="v:title" title="'.$title.'">'.$title.'</a></span><li class="slash">/</li></li>';
	else
		$strReturn .= '<li><span>'.$title.'</span></li>';
}

$strReturn .= '</ul></div>';

return $strReturn;
?>