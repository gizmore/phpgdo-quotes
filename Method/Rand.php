<?php
namespace GDO\Quotes\Method;

use GDO\Quotes\GDO_Quote;
use GDO\UI\MethodRandomCard;

final class Rand extends MethodRandomCard
{
    public function gdoTable()
    {
        return GDO_Quote::table();
    }
    
    public function getTitle()
    {
        return t('link_random_quote');
    }
    
}
