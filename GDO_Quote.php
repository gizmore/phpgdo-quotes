<?php
namespace GDO\Quotes;

use GDO\Address\GDT_Realname;
use GDO\Core\GDO;
use GDO\Core\GDT_AutoInc;
use GDO\Core\GDT_CreatedAt;
use GDO\Core\GDT_CreatedBy;
use GDO\Core\GDT_DeletedAt;
use GDO\Core\GDT_DeletedBy;
use GDO\Core\GDT_EditedAt;
use GDO\Core\GDT_EditedBy;
use GDO\Core\GDT_Template;
use GDO\Date\GDT_Date;
use GDO\UI\GDT_Message;
use GDO\User\GDO_User;
use GDO\User\GDT_User;
use GDO\Votes\WithLikes;

/**
 * The quote table / entity.
 *
 * @author gizmore
 */
final class GDO_Quote extends GDO
{

	public function gdoColumns(): array
	{
		return [
			GDT_AutoInc::make('quote_id'),
			GDT_Message::make('quote_text')->label('text')->min(8)->max(512)->notNull(),
			GDT_Date::make('quote_date')->label('date'),
			GDT_User::make('quote_from')->label('quote_by_user'), # from and by mean the same thing.
			GDT_Realname::make('quote_by')->label('quote_by_whom'),
			GDT_CreatedBy::make('quote_creator'),
			GDT_CreatedAt::make('quote_created'),
			GDT_EditedBy::make('quote_editor'),
			GDT_EditedAt::make('quote_edited'),
			GDT_DeletedBy::make('quote_deletor'),
			GDT_DeletedAt::make('quote_deleted'),
		];
	}

	#############
	### Likes ###
	#############
	use WithLikes;

	public function renderCard(): string
	{
		return GDT_Template::php('Quotes', 'quote_card.php', ['gdo' => $this]);
	}

	public function gdoLikeTable() { return GDO_QuoteLikes::table(); }

	public function gdoCanLike(GDO_User $user)
	{
		if (!Module_Quotes::instance()->cfgLikes())
		{
			return false;
		}

		if ($user->isMember())
		{
			return $this->hasMinscore($user);
		}

		if ($user->isGuest())
		{
			if (!Module_Quotes::instance()->cfgGuestLikes())
			{
				return false;
			}
			return $this->hasMinscore($user);
		}

		return false;
	}

	##############
	### Render ###
	##############

	private function hasMinscore(GDO_User $user)
	{
		if ($level = Module_Quotes::instance()->cfgLikesMinscore())
		{
			return $user->getLevel() >= $level;
		}
		return true;
	}

}
