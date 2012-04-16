<?php
namespace KapitchiLocation\Controller;

use Zend\Mvc\Controller\ActionController,
    KapitchiLocation\Module;

class AddressController extends ActionController {
    protected $module;
    protected $addressService;
    protected $addressForm;
    
    public function __construct(Module $module) {
        $this->module = $module;
    }
    
    public function indexAction() {
        $routeMatch = $this->getEvent()->getRouteMatch();
        $page = $routeMatch->getParam('page', 1);
        
        $paginator = $this->getAddressService()->getPaginator();
        $paginator->setItemCountPerPage($this->getModule()->getOption('address.view.item_count_per_page', 10));
        $paginator->setCurrentPageNumber($page);
        
        return new TableViewModel(array(
            'paginator' => $paginator
        ));
    }
    
    public function createAction() {
        $form = $this->getAddressForm();
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $postData = $request->post()->toArray();
            if($form->isValid($postData)) {
                $ret = $this->getIdentityService()->persist($form->getValues());
                return $this->redirect()->toRoute('KapitchiLocation/Address/Update', array('id' => $ret['model']->getId()));
            }
        }
        
        $form->addElement('submit', 'submit', array(
            'label' => 'Create'
        ));
        
        $viewModel = new ViewModel(array(
            'addressForm' => $form
        ));
        $viewModel->setTemplate('address/update');
        return $viewModel;
    }
    
    public function updateAction() {
        $id = $this->getAddressId();
        if(empty($id)) {
            throw new NoIdException("No id");
        }
        
        $form = $this->getAddressForm();
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $postData = $request->post()->toArray();
            if($form->isValid($postData)) {
                $ret = $this->getIdentityService()->persist($form->getValues());
            }
        }
        
        $identity = $this->getAddressService()->get(array(
            'priKey' => $id
        ), true);
        $form->populate($identity->toArray());
        
        $form->addElement('submit', 'submit', array(
            'label' => 'Update'
        ));
        
        $viewModel = new ViewModel(array(
            'addressForm' => $form
        ));
        $viewModel->setTemplate('address/update');
        return $viewModel;
    }
    
    public function removeAction() {
        $id = $this->getAddressId(); 
        if(empty($id)) {
            throw new NoIdException("No id");
        }        
        
        $ret = $this->getAddressService()->remove($id);
        
        return $this->redirect()->toRoute('KapitchiLocation/Address/Index');        
    }
    
    //helper methods
    protected function getAddressId() {
        $routeMatch = $this->getEvent()->getRouteMatch();
        $id = $routeMatch->getParam('id');
        return $id;
    }    
    
    //listeners
    protected function attachDefaultListeners()
    {
        parent::attachDefaultListeners();
        $events = $this->events();
    }
    
    //getters/setters
    public function getModule() {
        return $this->module;
    }

    public function setModule(Module $module) {
        $this->module = $module;
    }

    public function getAddressService() {
        return $this->addressService;
    }

    public function setAddressService($addressService) {
        $this->addressService = $addressService;
    }

    public function getAddressForm() {
        return $this->addressForm;
    }

    public function setAddressForm($addressForm) {
        $this->addressForm = $addressForm;
    }

}