<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Страница не найдена");?>


<style type="text/css">
	body {
		background: #1e1e1e url(img/404bg.jpg) no-repeat center center;
		background-position-y: 174px;
	}

	.numb {
		color: #daac4f;
		font-size: 100px;
		font-family: 'Roboto Condensed', sans-serif;
    	letter-spacing: 1.5px;
    	margin-top: 135px;
	}

	.text {
		font-size: 20px;
		color: #d5d5d5;
		margin-top: 25px;
		line-height: 30px;
	}

	.text span {
		font-size: 14px;
	}

	.text span .link {
		color: #daac4f;
		text-decoration: none;
	}

	.text span .link:hover {
		color: #daac4f;
		text-decoration: underline;
	}

	.content-header{
		display: none;
	}

	.main-container{
		text-align: center;
	}

	@media (max-width: 757px){
		body {
			background-position-y: 90px;
		}
	}
	

</style>

	<div class="numb">404</div>
	<div class="text"><b>Страница не найдена или не существует.</b></br>
	<span>Попробуйте <a href="/" class="link">вернуться на главную</a> или воспользоваться поиском.</span></div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>