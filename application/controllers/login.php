<?php
class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        // Load the form helper
        $this->load->helper('form');
    }
    function index()
    {
        $this->load->model('loginmodel');
        $this->load->view('loginview');
    }
    function check()
    {
        $this->load->library('form_validation');   #1
        $this->form_validation->set_rules('username', 'User Name', 'trim|required'); #2
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE)    #3
        {
            $this->load->view('loginview');
        }

        $this->load->model('loginmodel');
        $userName = $this->input->post('username'); #4
        $password = $this->input->post('password');
        $userCount = $this->loginmodel->check($userName, $password); #5

        if ($userCount[0]['count'] > 0) {
            echo "Login Successful";
        } else if ($userCount[0]['count'] == 0) {
            echo "Wrong User Name / Password";
        }
    } // end of funcion check
} //end of class


// And the explanation for this is as follows:

//     1.We loaded the form_validation library manually, to use the built-in validation functions.
//     2.We set the rules for our data fields. Arguments passed are the field name, error message and validation rules, respectively; the most important is the last one. The required rule makes that field compulsory. You can set multiple rules for a single field using a | operator between them. For example, to specify that a valid email address is required, use required|valid_email. Explore more built-in validation rules in the documentation of form_validation.
//     3.In case form validation fails, the page will simply get reloaded.
//    4. As explained in the view file source, the form will throw its data to the check function of the controller file. To access that data, use the built-in $this->input->post('fieldname') API of the form helper. Here, they are stored in different variables.
//    5. Next, control will move to the model file, and it will check for the entered username and password in the database. If the count returns more than one, the username and password is correct, and “Login Successful” will be displayed, else “Wrong user name/password”.
//     Submitting a form with blank fields yields validation errors, like those in Figure 2.

