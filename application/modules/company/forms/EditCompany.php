<?php

class company_Form_EditCompany extends Zend_Form
{

    public function init()
    {
    }
     /**
     * @author Vlad Skachkov 29.10.2010
     *
     * return empty/filled Company form
     * @param int $isNew=1 # 1 = empty form; 0 = form containing some data
     * @param int $id #ID of company
     * @param int $pc_id #ID of parent company
     * @param int $c_id #ID of record containing address part
     * @return mixed
     */
    public function companyForm($isNew=1,$id=null,$pc_id=null,$c_id=null)
    {
        if($isNew==0){
            
        }
        $this->setMethod('post');

        $c_id = $this->createElement('hidden', 'UserId');
        // element options
        $c_id->setDecorators(array('ViewHelper'));
        // add the element to the form
        $this->addElement($c_id);

        $userType = $this->createElement('select', 'UserTypeID', $userTypes);
        $userType->setLabel("UserType:");
        $this->addElement($userType);

        $staffId = $this->createElement('text','StaffID');
        $staffId->setLabel('Staff: ');
        $staffId->addFilter('StripTags');
        $this->addElement($staffId);

        $homeBaseId = $this->createElement('text','HomeBaseID');
        $homeBaseId->setLabel('HomeBase: ');
        $homeBaseId->addFilter('StripTags');
        $this->addElement($homeBaseId);

        $companyID = $this->createElement('text','CompanyID');
        $companyID->setLabel('Company: ');
        $companyID->addFilter('StripTags');
        $this->addElement($companyID);

        $depotID = $this->createElement('text','DepotID');
        $depotID->setLabel('Depot: ');
        $depotID->addFilter('StripTags');
        $this->addElement($depotID);

        $username = $this->createElement('text','Username');
        $username->setLabel('Username: ');
        $username->setRequired('true');
        $username->addFilter('StripTags');
        $username->addErrorMessage('The username is required!');
        $this->addElement($username);

//      TODO Possible needed hidden.
//        $password = $this->createElement('password', 'Password');
        $password = $this->createElement('text', 'Password');
        $password->setLabel('Password: ');
        $password->setRequired('true');
        $this->addElement($password);

        $agreed = $this->createElement('checkbox','Agreed');
        $agreed->setLabel('Agreed: ');
        $this->addElement($agreed);

        $submit = $this->addElement('submit', 'submit', array('label' => 'Submit'));
    }


}

