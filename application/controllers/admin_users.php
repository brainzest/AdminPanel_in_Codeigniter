<?php
class Admin_users extends CI_Controller {
 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    public function index()
    {

      

        $config['per_page'] = 5;
        $config['base_url'] = base_url().'admin/users';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 


        $this->pagination->initialize($config);   
          $data['users'] = $this->user_model->getUsers();

        $data['main_content'] = 'admin/users/list';
        $this->load->view('includes/template', $data);  

    }

    public function add()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
              
                //if the insert has returned true then we show the flash message
                if($this->user_model->createUsers()){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }

        $data['main_content'] = 'admin/users/add';
        $this->load->view('includes/template', $data);  
    }       

    public function delete()
    {

        $id = $this->uri->segment(4);
        $this->users_model->delete_product($id);
        redirect('admin/users');
    }

}