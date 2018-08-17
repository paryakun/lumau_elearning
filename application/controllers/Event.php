<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
    }
 
    public function manage_event(){
        if(_is_user_login($this)){
             $data["error"] = "";
            $this->load->model("event_model");
            $data["event"] = $this->event_model->get_school_event();
            if($_POST){
       
              $this->load->library('form_validation');
                
              $this->form_validation->set_rules('event_title', 'Judul Mata Kuliah / Pelatihan', 'trim|required');
              $this->form_validation->set_rules('event_description', 'Deskripsi Mata Kuliah / Pelatihan', 'trim|required');
              $this->form_validation->set_rules('start_date', 'Tanggal Dimulai', 'trim|required');
              $this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'trim|required');
              $this->form_validation->set_rules('teacher_id', 'Pilih Instruktur', 'trim|required');
             
                if ($this->form_validation->run() == FALSE) 
        		{
        		  
        			$data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Warning!</strong> '.$this->form_validation->error_string().'
                                </div>';
                    
        		}else
                {
                

                 $file_name="";
                 $file_attachment="";
                            
                 if($_FILES["event_photo"]["size"] > 0 OR $_FILES["file_attachment"]["size"] > 0)


                    $file_name = $this->upload_image('event_photo',null);
                    $file_attachment = $this->upload_file('file_attachment',null);


                           $event_title = $this->input->post("event_title");
                           $event_description = $this->input->post("event_description");
                           $start_date = $this->input->post("start_date");
                           $end_date = $this->input->post("end_date");
                           $teacher_id = $this->input->post("teacher_id");

                           $this->load->model("teacher_model");
                           $data_teacher["teacher"] = $this->teacher_model->get_school_teacher_detail($teacher_id);

                           $teacher = $data_teacher["teacher"]->teacher_name;

                            $this->load->model("common_model");
                            $this->common_model->data_insert("event",
                            array("event_title"=>$event_title, "school_id"=>_get_current_user_id($this), 
                                  "event_description"=>$event_description,
                                  "event_start"=>$start_date,
                                  "event_end"=>$end_date,
                                  "event_image"=>$file_name,
                                  "file_attachment"=>$file_attachment,
                                  "teacher_id"=>$teacher_id,
                                  "teacher"=>$teacher,
                                  "event_status"=>"1"
                                  ));
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Success!</strong> Materi Sukses Ditambahkan
                                </div>');
                                redirect("event/manage_event");
                       
                }
            }
            $this->load->model("teacher_model");
            $data["teacher_detail"] = $this->teacher_model->get_school_teacher();
            $this->load->view("event/manage_event",$data);
        }
    }
    public function edit_event($event_id){
        if(_is_user_login($this)){
            $data = array();
            $this->load->model("event_model");
            $eventid = $this->event_model->get_school_event_by_id($event_id);
            $data["event"] = $eventid;
            if($_POST){
                $this->load->library('form_validation');
                
              $this->form_validation->set_rules('event_title', 'Judul Mata Kuliah / Pelatihan', 'trim|required');
              $this->form_validation->set_rules('event_description', 'Deskripsi Mata Kuliah / Pelatihan', 'trim|required');
              $this->form_validation->set_rules('start_date', 'Tanggal Dimulai', 'trim|required');
              $this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'trim|required');
              $this->form_validation->set_rules('teacher_id', 'Pilih Instruktur', 'trim|required');

                if ($this->form_validation->run() == FALSE) 
        		{
        		  
        			$data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
                                  <strong>Warning!</strong> '.$this->form_validation->error_string().'
                                </div>';
                    
        		} else{
                        
                  $photo=$eventid->event_image;
                  $attachment=$eventid->file_attachment;


                 if($_FILES["event_photo"]["size"] > 0 OR $_FILES["file_attachment"]["size"] > 0){


                      if($photo != $_FILES["event_photo"]["name"] ){

                         $file_name =  $this->upload_image('event_photo',null);
                      }else {
                         $file_name = $photo;
                      }

                      if($attachment != $_FILES["file_attachment"]["name"]){
                        $file_attachment = $this->upload_file('file_attachment',null);
                      } else {
                        $file_attachment = $attachment;
                      }



                           $event_title = $this->input->post("event_title");
                           $event_description = $this->input->post("event_description");
                           $start_date = $this->input->post("start_date");
                           $end_date = $this->input->post("end_date");
                           $teacher_id = $this->input->post("teacher_id");
                           
                           $this->load->model("teacher_model");
                           $data_teacher["teacher"] = $this->teacher_model->get_school_teacher_detail($teacher_id);

                           $teacher = $data_teacher["teacher"]->teacher_name;


                        $update_array = array(
                                  "event_title"=>$event_title,
                                  "event_end"=>$end_date,
                                  "event_image"=>$file_name,
                                  "event_description"=>$event_description,
                                  "event_start"=>$start_date,
                                  "teacher_id"=>$teacher_id,
                                  "teacher"=>$teacher,
                                  "file_attachment"=>$file_attachment

                                  
                                );
                            $this->load->model("common_model");
                            $this->common_model->data_update("event",$update_array,array("event_id"=>$event_id)
                                );
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Success!</strong> Sukses Memperbarui Materi
                                </div>');
                                redirect("event/manage_event");
                    } else {

                          $file_name = $photo;
                          $file_attachment = $attachment;

                           $event_title = $this->input->post("event_title");
                           $event_description = $this->input->post("event_description");
                           $start_date = $this->input->post("start_date");
                           $end_date = $this->input->post("end_date");
                           $teacher_id = $this->input->post("teacher_id");
                           
                           $this->load->model("teacher_model");
                           $data_teacher["teacher"] = $this->teacher_model->get_school_teacher_detail($teacher_id);

                           $teacher = $data_teacher["teacher"]->teacher_name;
                
                           $update_array = array(
                                  "event_title"=>$event_title,
                                  "event_end"=>$end_date,
                                  "event_image"=>$file_name,
                                  "event_description"=>$event_description,
                                  "event_start"=>$start_date,
                                  "teacher_id"=>$teacher_id,
                                  "teacher"=>$teacher,
                                  "file_attachment"=>$file_attachment

                                  
                                );
                            $this->load->model("common_model");
                            $this->common_model->data_update("event",$update_array,array("event_id"=>$event_id)
                                );
                            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Success!</strong> Sukses Memperbarui Materi
                                </div>');
                                redirect("event/manage_event");

                    }
                    
                }
            }
            
            $this->load->model("teacher_model");
            $data["teacher_detail"] = $this->teacher_model->get_school_teacher();
            $this->load->view("event/edit_event",$data);
        }
    }
    function delete_event($event_id){
                $this->db->query("Delete from event where event_id = '".$event_id."'");
                redirect("event/manage_event");
    
    }

    function upload_image($photo = 'event_photo', $file_name){
                      
                $config['upload_path'] = './uploads/eventphoto/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config,'uploadPhoto');

                if ( ! $this->uploadPhoto->do_upload($photo))
                    {
                            $error = array('error' => $this->uploadPhoto->display_errors());
                
                            $this->load->view('upload_form', $error);
                    }
                    else
                    {
                            $file_data = $this->uploadPhoto->data();
                            $file_name = $file_data["file_name"];
                            // print_r($file_data);
                            // print_r($file_name);
                    
                    }

                
               return $file_name;

    }

    function upload_file($file = 'file_attachment', $file_attachment){

                $config_file_attachment['upload_path'] = './uploads/eventphoto/';
                $config_file_attachment['allowed_types'] = '*';
                $this->load->library('upload', $config_file_attachment,'uploadFile');

                if ( ! $this->uploadFile->do_upload($file))
                    {
                      $error = array('error' => $this->uploadFile->display_errors());
                
                      $this->load->view('upload_form', $error);
                    }
                    else
                    {
                            $file_data_attachment = $this->uploadFile->data();
                            $file_attachment = $file_data_attachment["file_name"];
                            // print_r($file_data_attachment);
                            // print_r($file_attachment);

                            
                           
                    }
                return $file_attachment;


    }
   
 
  
}