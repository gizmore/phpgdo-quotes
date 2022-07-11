<?php
namespace GDO\Quotes\Method;

use GDO\Quotes\GDO_Quote;
use GDO\UI\MethodCard;

final class View extends MethodCard
{
    public function gdoTable()
    {
        return GDO_Quote::table();
    }

}
