
<?php
    class RegisterController extends CI_Controller{
        public function __construct()
        {
            parent ::__construct();
            $this->load->model('RegistrationModel');

        }
        

        public function addUser()
     {
        $this->load->view('view_registrationForm');
      
        if($this->input->post('register')){
            
                //'id'=>$this->input->post('name'),
                $name=$this->input->post('name');
                $age=$this->input->post('age');
                $hometown=$this->input->post('hometown');
                $role=$this->input->post('role');
                $username=$this->input->post('username');
                $password=$this->input->post('password');

                 
            
                
             $val=$this->RegistrationModel->checkUsername($username);
             //echo $val;
                
              if($val=='1')
              {
                    echo("User Name already exists! Please enter another userName");
                   // redirect('registerController/addUser');

            
              }

              else{
                          $this->RegistrationModel->addUser($name,$age,$hometown,$role,$username,$password);
                            echo("User Added Successfully");
             }
            
    
        }
    
        
     }

    
    
    
    }




     

?>