<?php
namespace GDO\Quotes\Method;

use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Core\GDO;
use GDO\Quotes\GDO_Quote;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Submit;

final class Add extends MethodForm
{

	public function gdoTable(): GDO
	{
		return GDO_Quote::table();
	}

	public function getMethodTitle() : string
	{
		return t('link_add_quote');
	}

	public function createForm(GDT_Form $form): void
	{
		$table = $this->gdoTable();
		$form->addFields(
			$table->gdoColumn('quote_text'),
			$table->gdoColumn('quote_date'),
			$table->gdoColumn('quote_from'),
			$table->gdoColumn('quote_by'),
			GDT_AntiCSRF::make(),
		);
		$form->actions()->addField(GDT_Submit::make()->icon('plus')
			->label('btn_create'));
	}

	public function formValidated(GDT_Form $form)
	{
		$quote = GDO_Quote::blank($form->getFormVars())->insert();

		$this->redirectMessage('msg_quote_added', [
			$quote->getID()
		], href('Quotes', 'Table'));
	}

}

