<?php
namespace GDO\Quotes;

use GDO\Vote\GDO_LikeTable;

/**
 * The quote likes table.
 * @author gizmore
 */
final class GDO_QuoteLikes extends GDO_LikeTable
{
    public function gdoLikeObjectTable() { return GDO_Quote::table(); }
    public function gdoLikeForGuests() { return Module_Quotes::instance()->cfgGuestLikes(); }
    public function gdoMaxLikeCount() { return Module_Quotes::instance()->cfgMaxLikes(); }
    public function gdoLikeCooldown() { return 60*60*24; }
    
}
