<?php
/**
 *
 * Copyright © Thana', Inc. All rights reserved. 
 */
namespace CustomerLogin\Tracking\Controller\Index; 

use \Magento\Customer\Model\Session;

/**
 * Class Index  
 */
class Index extends \Magento\Framework\App\Action\Action {

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
    * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory 
    * @param Session $session
    */
	public function __construct(
		\Magento\Framework\App\Action\Context $context, 
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
        Session $session) {
            $this->session = $session;
	        parent::__construct($context, $session, $resultPageFactory);
	        $this->resultPageFactory = $resultPageFactory; 
	}

	/**
     * Index action
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
        $resultPage->getConfig()->getTitle()->set(__('Customer Login Tracking'));
        return $resultPage;

	}

}