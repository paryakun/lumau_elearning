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
            <small>Kelola</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Materi Kuliah / Pelatihan </a></li>
            <li class="active">Kelola </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
               
                <div class="col-md-12">
                
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                           <p><strong>Tambah Mata Kuliah / Pelatihan </strong></p>
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
                                        <input type="text" class="form-control" id="event_title" name="event_title" placeholder="" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="event_description">Deskripsi Mata Kuliah / Pelatihan <span class="red">*</span></label>
                                       <textarea rows="5" id="event_description" name="event_description" class="form-control" placeholder=""></textarea>
                                    </div>
                                    <div class="col-md-12">
                                   <div class="form-group">
                                  <label for="start_date">Tanggal Dimulai<span class="red">*</span></label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                  <input type="text" class="form-control" id="start_date" name="start_date" placeholder="" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
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
                                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Show Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask >
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                            <label for="event_photo">Photo Materi Kuliah / Pelatihan </label>
                                            <input type="file" class="form-control" id="event_photo" name="event_photo" />
                                       </div>
                                       <div class="col-md-12">
                                            <label for="file_attachment">File Materi Kuliah / Pelatihan </label>
                                            <input type="file" class="form-control" id="file_attachment" name="file_attachment" />
                                       </div>
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
                    <div class="col-md-8">
                    <div class="box">
                <div class="box-header">
                
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Judul </th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dimulai</th>
                        <th>Tanggal Berakhir</th>
                        <th width="80">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php foreach($event as $eventdlist){
                    ?>
                    <tr>
                        <td><?php echo $eventdlist->event_id; ?></td>
                        <td><?php echo substr($eventdlist->event_title, 0,100);?></td>
                        <td>
                            <?php echo substr($eventdlist->event_description, 0,200)."<br />";?> 
                               <?php 
                          
                                  if($eventdlist->event_image!=""){
                                    $img = $this->config->item('base_url')."uploads/eventphoto/".$eventdlist->event_image;?>

                                     <img src="<?php echo $img; ?>" style="height: 100px; width: 100px;"/>

                            <?php } ?>

                            <?php 
                          
                                  if($eventdlist->file_attachment!=""){
                                    $file = $this->config->item('base_url')."uploads/eventphoto/".$eventdlist->file_attachment;?>
                                    <a href="<?php echo $file; ?>" download> Unduh Materi</a>

                            <?php } ?>

                        </td>
                         
                        <td><?php echo $eventdlist->event_start; ?></td>
                        <td><?php echo $eventdlist->event_end; ?></td>
                        <td>
                            <a href="<?php echo site_url("event/edit_event/".$eventdlist->event_id); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo site_url("event/delete_event/".$eventdlist->event_id); ?>" onclick="return confirm('Yakin akan menghapus?')" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    <?php
                } ?>
                    </tbody>
                </table>
            </div>
        </div>
                    </div>
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
           "order": [[ 0, "desc" ]],
          "info": true,
          "autoWidth": false
        });

      });
    </script>
    <script>
    $(function(){
       $(".select2").select2();
    });
    </script>
 
    
  </body>
</html>
