<!DOCTYPE html>
<html>
 <?php  $this->load->view("common/common_head"); ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php  $this->load->view("admin/common/common_header"); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php  $this->load->view("admin/common/common_sidebar"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Materi Kuliah / Pelatihan
            <small>Ubah</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Materi Kuliah / Pelatihan </a></li>
            <li class="active">Ubah</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo site_url("event/manage_event"); ?>" class="btn btn-primary pull-right">Daftar</a>
                </div>
                <div class="col-md-12">
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                           
                        </div>
                        <div class="box-body">
                        
                            <form role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="box-body">
                              <?php 
                                echo $this->session->flashdata("message");
                               ?>
                                <? if(isset($error)){
                            echo $error;
                        } ?>
                                <div class="form-group">
                                    <div class="row">
                                   
                                      <div class="col-md-12">
                                        <label for="event_title">Judul Mata Kuliah / Pelatihan <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Ex. Annual Function, Sport Day, Seminar, etc" value="<?php echo $event->event_title; ?>"/>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="event_description">Deskripsi Mata Kuliah / Pelatihan <span class="red">*</span></label>
                                       <textarea rows="5" id="event_description" name="event_description" class="form-control" placeholder="Event Detail"><?php echo $event->event_description; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                   <div class="form-group">
                                  <label for="start_date">Tanggal Dimulai <span class="red">*</span></label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                  <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Show Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask value="<?php echo $event->event_start; ?>">
                                  </div>
                                </div>
                                   </div> 
                                    <div class="col-md-12">
                                   <div class="form-group">
                                  <label for="end_date">Tanggal Berakhir <span class="red">*</span></label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                  <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Show Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask value="<?php echo $event->event_end; ?>">
                                  </div>
                                </div>
                                   </div>
                                    <div class="col-md-12">
                                        <label for="event_photo">Foto Mata Kuliah / Pelatihan</label>
                                        <input type="file" class="form-control" id="event_photo" name="event_photo" />
                                    </div>
                                     <?php if($event->event_image!=""){ ?>
                                     <div class="col-md-12" >
                                        
                                      <?php
                                            $img = $this->config->item('base_url')."uploads/eventphoto/".$event->event_image; ?>                                 
                                            <img src="<?php echo $img; ?>" style="height: 50px; width: 50px; margin-top: 10px;" class="pull-right"/>
                                       
                                    </div>
                                    <?php } ?>
                                    <p>
                                      
                                    </p>

                                    <div class="col-md-12">
                                        <label for="file_attachment">File Mata Kuliah / Pelatihan</label>
                                        <input type="file" class="form-control" id="file_attachment" name="file_attachment" />
                                    </div>
                                     <?php if($event->file_attachment!=""){ ?>
                                     <div class="col-md-12" >
                                 
                                      <?php
                                           $file = $this->config->item('base_url')."uploads/eventphoto/".$event->file_attachment;?>
                                           <a href="<?php echo $file; ?>" download> Unduh Materi</a>
                                       
                                    </div>
                                    <?php } ?>

                                    <div class="col-md-12">
                                        <label for="teacher_id">Instruktur<span class="red">*</span></label>
                                        <select class="form-control select2" name="teacher_id" id="teacher_id" style="width: 100%;">
                                            <?php foreach($teacher_detail as $teacher){
                                                ?>
                                                <option value="<?php echo $teacher->teacher_id; ?>" <?php if($teacher->teacher_id == $teacher->teacher_name){echo "selected";} ?>><?php echo $teacher->teacher_name; ?></option>
                                                <?php
                                            } ?>
                                        </select>
                                        <p>Daftar Instruktur tidak ada ?  : <a href="<?php echo site_url("teacher/add_teacher"); ?>"> Tambah Instruktur</a></p>
                                    </div>
                                   
                                    </div>
                                </div>
                             
                              </div><!-- /.box-body -->
            
                              <div class="box-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </form>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
               
                
            </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <?php  $this->load->view("admin/common/common_footer"); ?>  

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

     <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/select2.full.min.js"); ?>"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/input-mask/jquery.inputmask.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/input-mask/jquery.inputmask.date.extensions.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/input-mask/jquery.inputmask.extensions.js"); ?>"></script>
    <!-- bootstrap time picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
   
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/timepicker/bootstrap-timepicker.min.js"); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    <script>
      $(function () {
        
         $("[data-mask]").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
        $(".timepicker").timepicker({
          showInputs: false
        });
        
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

      });
    </script>
    
  </body>
</html>
