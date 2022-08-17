<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDT_Object;
use GDO\Quotes\GDO_QuoteLikes;
use GDO\Votes\Method\UnLike;

final class Dislike extends UnLike
{
    public function isCLI() : bool { return true; }
    public function getLikeTableClass() : string { return GDO_QuoteLikes::class; }
    
    public function gdoParameters() : array
    {
        return [
            GDT_Object::make('id')->table($this->getLikeTable())->notNull(),
        ];
    }
}
