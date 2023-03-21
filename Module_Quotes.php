<?php
namespace GDO\Quotes;

use GDO\Core\GDO_Module;
use GDO\Core\GDT_Checkbox;
use GDO\Core\GDT_UInt;
use GDO\DB\Cache;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;
use GDO\User\GDT_Level;

/**
 * Quote/Oneliner module.
 * Quotes are likable
 *
 * @version 7.0.2
 * @since 6.10.3
 * @author gizmore
 */
final class Module_Quotes extends GDO_Module
{

	##############
	### Module ###
	##############
	public int $priority = 75;

	public function onLoadLanguage(): void { $this->loadLanguage('lang/quotes'); }

	public function getDependencies(): array
	{
		return [
			'Address',
			'Votes',
		];
	}

	public function getClasses(): array
	{
		return [
			GDO_Quote::class,
			GDO_QuoteLikes::class,
		];
	}

	##############
	### Config ###
	##############
	public function getConfig(): array
	{
		return [
			GDT_Checkbox::make('quote_sidebar')->initial('1'),
			GDT_Checkbox::make('quote_likes')->initial('1'),
			GDT_Checkbox::make('quote_guest_likes')->initial('1'),
			GDT_UInt::make('quote_max_likes')->min('1')->max('255')->bytes(1)->initial('1'),
			GDT_Level::make('quote_likes_minscore')->initial('0'),
		];
	}

	public function onInitSidebar(): void
	{
		if ($this->cfgSidebar())
		{
			$num = $this->numQuotes();
			GDT_Page::instance()->leftBar()->addFields(
				GDT_Link::make('link_add_quote')->icon('create')->href(href('Quotes', 'Add')),
				GDT_Link::make('link_random_quote')->icon('quote')->href(href('Quotes', 'Rand')),
				GDT_Link::make('link_quotes')->icon('quote')->text('link_quotes', [$num])->href(href('Quotes', 'Table')));
		}
	}

	public function cfgSidebar(): bool { return $this->getConfigVar('quote_sidebar'); }

	public function numQuotes(): int
	{
		$key = 'gdo_quote_count';
		if (null === ($count = Cache::get($key)))
		{
			$count = GDO_Quote::table()->countWhere('quote_deleted IS NULL');
			Cache::set($key, $count);
		}
		return $count;
	}

	public function cfgLikes(): bool { return $this->getConfigVar('quote_likes'); }

	public function cfgGuestLikes(): bool { return $this->getConfigVar('quote_guest_likes'); }

	###############
	### Sidebar ###
	###############

	public function cfgMaxLikes(): int { return $this->getConfigVar('quote_max_likes'); }

	#############
	### Cache ###
	#############

	public function cfgLikesMinscore(): int { return $this->getConfigVar('quote_likes_minscore'); }

}
