<?php
class Mailing_EmailNotificationController extends Zend_Controller_Action
{

    var $host;
    var $admin_email;

    public function init()
    {
        // TODO: make this more useful
        #$this->host = "77.52.3.148";
        $this->host = "localhost";
        $this->admin_email = "skachkov@guns.ru";

        # For menu highlighting:
        $this->view->currentPage = "NewDriver";

        $this->auth = Zend_Auth::getInstance();

        if ($this->auth->hasIdentity()) {
            $this->view->identity = $this->auth->getIdentity();
            $this->driver = new Driver_Model_Driver();
        }else{
            return $this->_redirect('user/login');
        }
        $this->host = "127.0.0.1";
        //$this->_helper->viewRenderer->setNoRender();
        //$this->_helper->layout()->disableLayout();
    }

    # Sending email notification to logined user's Companu e-mail 
    public function newDriverAction()
    {
        if ($this->auth->hasIdentity()) {
            # Breadcrumbs & page title goes here:
            $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;New Driver";
            $this->view->pageTitle = "NEW DRIVER";

            $this->view->headScript()->appendFile('/js/driver/index.js', 'text/javascript');

            $driverID = (int)$this->_request->getParam('id');
            $company = Company_Model_Company::getRecord($_SESSION['user_data']['u_Company_ID']);
            try{

                $body = "";
                $body = $body."Hello!<br/>";
                $body = $body."You can edit new driver information by clicking this link - <a href='";
                $body = $body."www.nsc2010.lcl/driver/Driver/view-driver-Information/id/".$driverID;
                $body = $body."'>Driver #".$driverID."</a>.<br/>";
                $body = $body."<br/>";
                $body = $body."Thank you!";
                $transport = new Zend_Mail_Transport_Smtp();

                $protocol = new Zend_Mail_Protocol_Smtp($this->host);
                $protocol->connect();
                $protocol->helo($this->host);
                $transport->setConnection($protocol);
                $mail = new Zend_Mail('UTF-8');
                $mail->addTo($company[0]['ct_Contact_Email']);
                $mail->setFrom('no-reply@nsc2000.com', 'NSC 2010 Admin');
                $mail->setSubject('New Driver registration at NSC 2010');
                $mail->setBodyHtml($body);
                $protocol->rset();
                $mail->send($transport);
                $protocol->quit();
                $protocol->disconnect();
            }catch(Exception $e){
                $e->getMessage();
            }
            if(isset($e)){
                $this->view->error = $e->getMessage();
            }else{
                $this->view->companyInfo = $company;
            }
        }
    }

    # Sending notification to system administrator
    public function newDriverEmployerAction()
    {
        if ($this->auth->hasIdentity()) {
            # Breadcrumbs & page title goes here:
            $this->view->breadcrumbs = "<a href='/driver/index/index'>DQF</a>&nbsp;&gt;&nbsp;New Driver";
            $this->view->pageTitle = "NEW DRIVER";

            $this->view->headScript()->appendFile('/js/driver/index.js', 'text/javascript');

            $driverID = (int)$this->_request->getParam('id');
            $company = Company_Model_Company::getRecord($_SESSION['user_data']['u_Company_ID']);
            try{

                $body = "";
                $body = $body."Hello!<br/>";
                $body = $body."You can edit new employer information by clicking this link - <a href='";
                //$body = $body."www.nsc2010.lcl/driver/Driver/view-driver-Information/id/".$driverID;
                $body = $body."#'></a>.<br/>";
                $body = $body."<br/>";
                $body = $body."Thank you!";
                $transport = new Zend_Mail_Transport_Smtp();

                $protocol = new Zend_Mail_Protocol_Smtp($this->host);
                $protocol->connect();
                $protocol->helo($this->host);
                $transport->setConnection($protocol);
                $mail = new Zend_Mail('UTF-8');
                $mail->addTo($this->admin_email);
                $mail->setFrom('no-reply@nsc2000.com', 'NSC 2010 Admin');
                $mail->setSubject("New Driver's Employer registration at NSC 2010");
                $mail->setBodyHtml($body);
                $protocol->rset();
                $mail->send($transport);
                $protocol->quit();
                $protocol->disconnect();
            }catch(Exception $e){
                $e->getMessage();
            }
            if(isset($e)){
                $this->view->error = $e->getMessage();
            }else{
                $this->view->companyInfo = $company;
            }
        }
    }

    public function sendDocumentScanCommentAction(){

        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout()->disableLayout();

        $to = trim($_GET['to']);
        $text = trim($_GET['text']);
        # TODO: �������� ����������� � ����
        try{
            # TODO: �������� ���������� ������ ���������;
            $body = "";
            $body = $body."Hello!<br/>";
            $body = $body."You have notification about your document scan! <br/>";
            $body = $body."The message is: <br/>";
            $body = $body." <pre>" . $text . "</pre> ";
            $body = $body."<br/>";
            $body = $body."Thank you!<br/><br/>";
            $body = $body.date("m/d/Y H:i:s");
            $transport = new Zend_Mail_Transport_Smtp();

            $protocol = new Zend_Mail_Protocol_Smtp($this->host);
            $protocol->connect();
            $protocol->helo($this->host);
            $transport->setConnection($protocol);
            $mail = new Zend_Mail('UTF-8');
            $mail->addTo($to);
            $mail->setFrom('no-reply@nsc2000.com', 'NSC 2010 Admin');
            $mail->setSubject('Comment about Scanned or Uploaded document on '.date("mm/dd/YYYY"));
            $mail->setBodyHtml($body);
            $protocol->rset();
            $mail->send($transport);
            $protocol->quit();
            $protocol->disconnect();
        }catch(Exception $e){
            $e->getMessage();
        }

        echo 1;
    }


}