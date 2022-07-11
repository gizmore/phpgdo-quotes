<?phpuse GDO\Quotes\GDO_Quote;
use GDO\UI\GDT_Card;/** @var $gdo GDO_Quote **/
$card = GDT_Card::make()->gdo($gdo);$card->creatorHeader();$card->addField($gdo->gdoColumn('quote_by'));$card->addField($gdo->gdoColumn('quote_from'));$card->addField($gdo->gdoColumn('quote_date'));$card->addField($gdo->gdoColumn('quote_text'));$card->editorFooter();echo $card->render();