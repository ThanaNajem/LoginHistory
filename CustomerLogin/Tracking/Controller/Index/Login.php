<?php
/**
 *
 * Copyright © Thana', Inc. All rights reserved. 
 */
namespace CustomerLogin\Tracking\Controller\Index; 

use \Magento\Customer\Model\Session;

/**
 * Class Login  
 */
class Login extends \Magento\Framework\App\Action\Action {

	/**
    * @var \Magento\Framework\View\Result\PageFactory
    */
	protected $resultPageFactory; 

    /**
    * @var Session
    */
    protected $session;

	/**
    * @param \Magento\Framework\App\Action\Context $context
    * @param Session $session
    * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory 
    */
	public function __construct(
		\Magento\Framework\App\Action\Context $context, 
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
        Session $session) {
            parent::__construct($context, $session, $resultPageFactory);
            $this->session = $session; 
            $this->resultPageFactory = $resultPageFactory; 
	}

	/**
     * Login  nav section redirect page creation
     *
     * @return \Magento\Framework\Controller\Result\Redirect 
     */
	public function execute() { 
        if (!$this->session->isLoggedIn()) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('home');
            return $resultRedirect;
        }
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->set(__('Success Customer Login Tracking'));
		return $resultPage;

	}

}