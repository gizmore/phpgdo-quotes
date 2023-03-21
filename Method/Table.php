<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDO;
use GDO\Quotes\GDO_Quote;
use GDO\Table\MethodQueryCards;

final class Table extends MethodQueryCards
{

	public function gdoTable(): GDO { return GDO_Quote::table(); }

}
