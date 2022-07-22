<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDT_Object;
use GDO\Quotes\GDO_QuoteLikes;

final class Dislike extends \GDO\Vote\Method\UnLike
{
    public function isCLI() : bool { return true; }
    public function getLikeTableClass() { return GDO_QuoteLikes::class; }
    
    public function gdoParameters() : array
    {
        return [
            GDT_Object::make('id')->table($this->getLikeTable())->notNull(),
        ];
    }
}
