<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>Text here<?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"search",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"PAGE" => "#SITE_DIR#search/",
		"USE_SUGGEST" => "N"
	)
);?>....<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>