<?php

namespace Todolist;


/**
 * Presenter, který pustí dál jen přihlášeného uživatele
 */
abstract class SecuredPresenter extends BasePresenter
{
	
	/** @var User */
	protected $userEntity;

	/** @var UserRepository */
	private $users;

	/**
	 * @var ILogoutControlFactory
	 * @inject
	 */
	public $logoutControlFactory;


	public function startup()
	{
		parent::startup();

		if (!$this->user->isLoggedIn()) {
			$this->flashMessage("Bez přihlášení nelze vstoupit do aplikace.");
			$this->redirect('Application:login');
		}
		
		$this->userEntity = $this->users->get($this->user->id);
	}
	
	
	/**
	 * @return LogoutControl
	 */
	public function createComponentLogoutControl()
	{
		return $this->logoutControlFactory->create();
	}
	
	
	/**
	 * @param UserRepository $users
	 */
	public function injectUserRepository(UserRepository $users)
	{
		$this->users = $users;
	}

}
