<?php
/**
 *
 * Copyright © Thana', Inc. All rights reserved. 
 */
namespace CustomerLogin\Tracking\Controller\Account;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use \Magento\Customer\Model\Session;

/**
 * Class Index to represent default customer account page
 */
class Index extends \Magento\Customer\Controller\Account\Index {
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
    * @var Session
    */
    protected $session;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Session $session
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Session $session
    ) {
        $this->session = $session;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $resultPageFactory);
    }

    /**
     * Default customer account page
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute() {
        if (!$this->session->isLoggedIn()) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('home');
            return $resultRedirect;
        }
        return $this->resultPageFactory->create();
    }
}
