<?php
namespace KapitchiLocation\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel,
    KapitchiBase\View\Model\Table as TableViewModel,
    
    KapitchiLocation\Module;

class DivisionController extends ActionController {
    protected $module;
    protected $divisionService;
    protected $divisionForm;
    
    public function __construct(Module $module) {
        $this->module = $module;
    }
    
    public function indexAction() {
        $routeMatch = $this->getEvent()->getRouteMatch();
        $page = $routeMatch->getParam('page', 1);
        
        $paginator = $this->getDivisionService()->getPaginator(array(
            'where' => array(
                'typeHandle' => 'country'
            )
        ));
        $paginator->setItemCountPerPage($this->getModule()->getOption('division.view.item_count_per_page', 10));
        $paginator->setCurrentPageNumber($page);
        
        return new TableViewModel(array(
            'paginator' => $paginator
        ));
    }
    
    public function createAction() {
        $form = $this->getDivisionForm();
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $postData = $request->post()->toArray();
            if($form->isValid($postData)) {
                $ret = $this->getDivisionService()->persist($form->getValues());
                return $this->redirect()->toRoute('KapitchiLocation/Division/Update', array(
                    'id' => $ret['model']->getId()
                ));
            }
        }
        
        $form->addElement('submit', 'submit', array(
            'label' => 'Create'
        ));
        
        $viewModel = new ViewModel(array(
            'divisionForm' => $form
        ));
        //$viewModel->setTemplate('K/update');
        return $viewModel;
    }
    
    public function updateAction() {
        $id = $this->getDivisionId();
        if(empty($id)) {
            throw new NoIdException("No id");
        }
        
        $form = $this->getDivisionForm();
        
        $request = $this->getRequest();
        if($request->isPost()) {
            $postData = $request->post()->toArray();
            if($form->isValid($postData)) {
                $ret = $this->getDivisionService()->persist($form->getValues());
            }
        }
        
        $model = $this->getDivisionService()->get(array(
            'priKey' => $id
        ), true);
        $form->populate($model->toArray());
        
        $form->addElement('submit', 'submit', array(
            'label' => 'Update'
        ));
        
        $viewModel = new ViewModel(array(
            'divisionForm' => $form
        ));
        $viewModel->setTemplate('division/update');
        return $viewModel;
    }
    
    public function removeAction() {
        $id = $this->getDivisionId(); 
        if(empty($id)) {
            throw new NoIdException("No id");
        }        
        
        $ret = $this->getDivisionService()->remove($id);
        
        return $this->redirect()->toRoute('KapitchiLocation/Division/Index');        
    }
    
    //helper methods
    protected function getDivisionId() {
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

    public function getDivisionService() {
        return $this->divisionService;
    }

    public function setDivisionService($divisionService) {
        $this->divisionService = $divisionService;
    }

    public function getDivisionForm() {
        return $this->divisionForm;
    }

    public function setDivisionForm($divisionForm) {
        $this->divisionForm = $divisionForm;
    }

}