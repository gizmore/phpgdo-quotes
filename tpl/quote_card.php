<?phpnamespace GDO\Quotes\tpl;use GDO\UI\GDT_Card;
/** @var $gdo \GDO\Quotes\GDO_Quote **/
$card = GDT_Card::make()->gdo($gdo);$card->creatorHeader();$card->addField($gdo->gdoColumn('quote_by'));$card->addField($gdo->gdoColumn('quote_from'));$card->addField($gdo->gdoColumn('quote_date'));$card->addField($gdo->gdoColumn('quote_text'));$card->editorFooter();echo $card->render();