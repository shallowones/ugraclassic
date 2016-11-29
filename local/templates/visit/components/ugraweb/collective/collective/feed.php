<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?global $USER, $APPLICATION;
$CurUser = $USER->GetID();
$APPLICATION->SetTitle("Лента");
?>

<?$APPLICATION->IncludeComponent(
	"sh:feed.list", 
	"user-feed", 
	array(
		"CURRENT_USER" => $CurUser,
		"EVENTS_COUNT" => "5",
	), 
	$component
);
?>

<?if(defined("X_VIEW_FOOTER")):?>
<?$this->SetViewTarget(X_VIEW_FOOTER);?>
	<div class="sidebar-block">
		<h2 class="sidebar-h">Уведомления</h2>
	</div><!-- sidebar-block -->
	
	<?$APPLICATION->IncludeComponent(
		"sh:notice.list", 
		"user-notice", 
		array(
			"CURRENT_USER" => $CurUser,
			"EVENTS_COUNT" => "50",
		), 
		$component
	);
	?>
	<?$APPLICATION->IncludeComponent("sh:notice.top", ".default", array(
		"MATERIAL_ID" => "2",
		"CLUB_ID" => "1"
		),
		false
	);?>
<?$this->EndViewTarget();?> 
<?endif;?>