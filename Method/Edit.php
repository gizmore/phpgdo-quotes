<?php
namespace GDO\Quotes\Method;

use GDO\Core\GDO;
use GDO\Form\MethodCrud;
use GDO\Quotes\GDO_Quote;

final class Edit extends MethodCrud
{

	public function canCreate(GDO $table): bool { return false; }

	public function hrefList(): string
	{
		return href('Quotes', 'Table');
	}

	public function gdoTable(): GDO
	{
		return GDO_Quote::table();
	}


}
