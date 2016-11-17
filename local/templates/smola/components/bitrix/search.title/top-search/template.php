<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
?>
<div class="bx-searchtitle">
	<form action="<?echo $arResult["FORM_ACTION"]?>" id="search_form">
		<div class="bx-input-group">
			<input type="text" name="q" value="<?=htmlspecialcharsbx($_REQUEST["q"])?>" autocomplete="off" class="bx-form-control mobile" placeholder="Поиск по сайту"/>
			<span class="bx-input-group-btn">
				<i class="sformsubmit btn btn-default fa fa-search"></i>
			</span>
			<span class="mob mobile shidden">
				<i class="mob sformsubmit btn btn-default fa fa-search shidden"></i>
			</span>
		</div>
		
	</form>
</div>
<script>
	BX.ready(function(){
		$('.bx-searchtitle .sformsubmit').click(function(){
			if($('.bx-form-control').val() != ''){
				$('#search_form').submit();
			}
		});	
		$('i.mob').click(function(){
			if($("span.mobile").hasClass("shidden") && $("span.mobile i").hasClass("shidden")){
				$('.shidden').removeClass('shidden');
				$(".logo").hide();
				$("input.bx-form-control").removeClass('mobile');
				$("input.bx-form-control").focus()
			} else {
				$('span.mobile').addClass('shidden');
				$("span.mobile i").addClass('shidden');
				$(".logo").show();
				$("input.bx-form-control").addClass('mobile');
			}
		});	

	});
</script>

