<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDO;
use GDO\Quotes\GDO_Quote;
use GDO\UI\MethodRandomCard;

final class Rand extends MethodRandomCard
{
    public function gdoTable() : GDO
    {
        return GDO_Quote::table();
    }
    
    public function getMethodTitle() : string
    {
        return t('link_random_quote');
    }
    
}
