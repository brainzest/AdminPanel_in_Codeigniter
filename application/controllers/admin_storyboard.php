<?php
class Admin_storyboard extends CI_Controller {


    const VIEW_FOLDER = 'admin/storyboard';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('storyboard_model');
     ;

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }
 

    public function index()
    {

        //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
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
     $data['storyboard'] =  $this->storyboard_model->getAllStory();
        $data['main_content'] = 'admin/storyboard/list';
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
                $contents = file_get_contents($_FILES['uploadedfile']['tmp_name']);
              //  $contents = mysql_real_escape_string($contents);
                $data_to_store = array(
                    'synopsis_id'=>$this->input->post('synopsis_id'),
                     'story_description' => $this->input->post('description'),
                      'image_src' => $contents,
                       'expiry_time' => $this->input->post('expiryDate'),
                );
                //if the insert has returned true then we show the flash message
                if($this->storyboard_model->insertStory($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/storyboard/add';
        $this->load->view('includes/template', $data);  
    }       


    public function update()
    {
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
                    'name' => $this->input->post('name'),
                );
                //if the insert has returned true then we show the flash message
                if($this->manufacturers_model->update_manufacture($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/manufacturers/update/'.$id.'');

            }//validation run

        }


        $data['manufacture'] = $this->storyboard_model->get_story_by_id($id);
        //load the view
        $data['main_content'] = 'admin/storyboard/edit';
        $this->load->view('includes/template', $data);            

    }
    public function delete()
    {

        $id = $this->uri->segment(4);
        $this->storyboard_model->delete_story($id);
        redirect('admin/storyboard');
    }

}