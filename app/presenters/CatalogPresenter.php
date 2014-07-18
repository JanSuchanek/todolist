<?php

namespace Todolist;


final class CatalogPresenter extends SecuredPresenter
{
	
	/**
	 * @var ICatalogControlFactory
	 * @inject
	 */
	public $catalogControlFactory;
	
	/**
	 * @var ICatalogFormFactory
	 * @inject
	 */
	public $catalogFormFactory;


	/**
	 * Pohled na seznam a jeho úkoly
	 * 
	 * @param string
	 */
	public function actionList($id = NULL)
	{
		if(!$this->user->isAllowed('catalog', 'read'))
		{
			$this->flashMessage("nemate prava");
			$this->template->catalogs = [];
			$this->template->catalogId = NULL;
		}
		else
		{
			$this->template->catalogs = $this->userEntity->catalogs;
			$this->template->catalogId = $id;
		}
	}


	/**
	 * @return CatalogControl
	 */
	public function createComponentCatalogControl()
	{
		return $this->catalogControlFactory->create();
	}


	/**
	 * @return CatalogForm
	 */
	public function createComponentNewCatalogForm()
	{
		return $this->catalogFormFactory->create();
	}

}
