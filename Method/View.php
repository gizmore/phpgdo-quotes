<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDO;
use GDO\Quotes\GDO_Quote;
use GDO\UI\MethodCard;

final class View extends MethodCard
{
    public function gdoTable() : GDO
    {
        return GDO_Quote::table();
    }

}
