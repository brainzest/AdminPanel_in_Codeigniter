<?php
class Admin_synopsis extends CI_Controller {


    const VIEW_FOLDER = 'admin/synopsis';


    public function __construct()
    {
        parent::__construct();
        $this->load->model('synopsis_model');
        ;

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }


    public function index()
    {
        $config['per_page'] = 5;

        $config['base_url'] = base_url().'admin/storyboard';
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



        //initializate the panination helper 
        $this->pagination->initialize($config);

        //load the view
        $data['synopsis'] =  $this->synopsis_model->getAllSynopsis();
        $data['main_content'] = 'admin/synopsis/list';
        $this->load->view('includes/template', $data);

    }//index

    public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');


            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'sid'=>$this->input->post('synopsis_id'),
                    'synopsis_description' => $this->input->post('description'),
                    'synopsis_name' => $this->input->post('name'),
                    'genre'=>$this->input->post('genre'),
                   'tagline'=>$this->input->post('tagline'),
                    'expiry_time' => $this->input->post('expiryDate')
                );
                //if the insert has returned true then we show the flash message
                if($this->synopsis_model->insertSynopsis($data_to_store)){
                    $data['flash_message'] = TRUE;
                }else{
                    $data['flash_message'] = FALSE;
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/synopsis/add';
        $this->load->view('includes/template', $data);
    }




}