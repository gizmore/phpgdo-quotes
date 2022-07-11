<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDO;
use GDO\Form\MethodCrud;
use GDO\Quotes\GDO_Quote;

final class Edit extends MethodCrud
{
    public function canCreate(GDO $table) { return false; }
    
    public function hrefList()
    {
        return href('Quotes', 'Table');
    }

    public function gdoTable()
    {
        return GDO_Quote::table();
    }

    
}
