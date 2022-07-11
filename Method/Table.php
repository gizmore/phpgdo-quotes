<?php
namespace GDO\Quotes\Method;

use GDO\Quotes\GDO_Quote;
use GDO\Table\MethodQueryCards;

final class Table extends MethodQueryCards
{
    public function gdoTable() { return GDO_Quote::table(); }
    
}
