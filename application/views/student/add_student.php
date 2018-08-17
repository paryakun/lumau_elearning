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
            Tambah Siswa / Peserta
            <small>Kelola</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Siswa / Peserta</a></li>
            <li class="active">Tambah Siswa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                <a href="<?php echo site_url("student/list_student"); ?>" class="btn btn-primary pull-right">Daftar</a>
                </div>
                <div class="col-md-12">
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
                        

                        <?php 
                        $today= date('Ymd');
                        $student_unique_no =  uniqid($today.'_');
                         ?>
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-12">
                                    <p style="border-bottom: 1px solid black;"><strong>Detail</strong> (Isi semua tanda*)</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="student_unique_no">Unique No <span class="red">*</span> </label>
                                        <input type="text" class="form-control" id="student_unique_no" name="student_unique_no" readonly=""  value="<?php echo $student_unique_no; ?>"/>
                                        <p>Note*: Unique No di auto generate oleh sistem</p>
                                    </div>
                                      <div class="col-md-12">
                                        <label for="student_name">Nama <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="student_name" name="student_name" value="<?php if(isset($_REQUEST["student_name"])){echo $_REQUEST["student_name"]; } ?>"/>
                                    </div>
                                    <p> </p>
                                   <!-- <div class="col-md-6">
                                        <label for="student_roll_no">Student Roll No <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="student_roll_no" name="student_roll_no" value="<?php //if(isset($_REQUEST["student_roll_no"])){echo $_REQUEST["student_roll_no"]; } ?>"/>
                                        
                                    </div> -->
                                    
                                      
                                     <div class="col-md-6">
                                        <label for="student_username"><span class="required_lable">Username </span> <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="student_username" name="student_username" value="<?php if(isset($_REQUEST["student_username"])){echo $_REQUEST["student_username"]; } ?>"/>
                                        <p>Note *: Username Login (Harus unik dan tidak bisa diganti)</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="student_password"><span class="required_lable">Password</span><span class="red">*</span></label>
                                        <input type="password" class="form-control" id="student_password" name="student_password" value="<?php if(isset($_REQUEST["student_password"])){echo $_REQUEST["student_password"]; } ?>"/>
                                        <p>Note *: login password </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="student_birthdate">Tanggal Lahir <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="student_birthdate" name="student_birthdate" placeholder="Show Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask value="<?php if(isset($_REQUEST["student_birthdate"])){echo $_REQUEST["student_birthdate"]; } ?>">
                                    </div>
                                     <div class="col-md-6">
                                        <label for="student_standard">Standar <span class="red">*</span></label>
                                        <select class="form-control select2" name="student_standard" id="student_standard" style="width: 100%;">
                                            <?php foreach($school_standard as $standard){
                                                ?>
                                                <option value="<?php echo $standard->standard_id; ?>" <?php if(isset($_REQUEST["student_standard"]) && $_REQUEST["student_standard"]==$standard->standard_id){echo "selected"; } ?>><?php echo $standard->standard_title; ?></option>
                                                <?php
                                            } ?>
                                        </select>
                                        <p>Note: Standar tidak tersedia? : <a href="<?php echo site_url("standard/manage_standard"); ?>"> Tambah Standar</a></p>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="student_address">Alamat <span class="red">*</span></label>
                                       <textarea rows="2" id="student_address" name="student_address" class="form-control"><?php if(isset($_REQUEST["student_address"])){echo $_REQUEST["student_address"]; } ?></textarea>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <label for="student_city">Kota <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="student_city" name="student_city" value="<?php if(isset($_REQUEST["student_city"])){echo $_REQUEST["student_city"]; } ?>"/>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="student_phone">Telepon <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="student_phone" name="student_phone" value="<?php if(isset($_REQUEST["student_phone"])){echo $_REQUEST["student_phone"]; } ?>"/>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="student_parent_phone">Telepon Orang Tua  </label>
                                        <input type="text" class="form-control" id="student_parent_phone" name="student_parent_phone" value="<?php if(isset($_REQUEST["student_parent_phone"])){echo $_REQUEST["student_parent_phone"]; } ?>"/>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label for="student_enr_no">Student Enrolment No  </label>
                                        <input type="text" class="form-control" id="student_enr_no" name="student_enr_no" value="<?php // if(isset($_REQUEST["student_enr_no"])){echo $_REQUEST["student_enr_no"]; } ?>"/>
                                    </div> -->
                                     <div class="col-md-6">
                                        <label for="student_email">Email </label>
                                        <input type="email" class="form-control" id="student_email" name="student_email" value="<?php if(isset($_REQUEST["student_email"])){echo $_REQUEST["student_email"]; } ?>"/>
                                    </div>
                                   <!--  <div class="col-md-6">
                                        <label for="student_branch">Student Branch </label>
                                        <input type="text" class="form-control" id="student_branch" name="student_branch" value="<?php // if(isset($_REQUEST["student_branch"])){echo $_REQUEST["student_branch"]; } ?>"/>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label for="student_semester">Student Semester </label>
                                        <input type="text" class="form-control" id="student_semester" name="student_semester" value="<?php //if(isset($_REQUEST["student_semester"])){echo $_REQUEST["student_semester"]; } ?>"/>  
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label for="student_division">Student Division</label>
                                        <input type="text" class="form-control" id="student_division" name="student_division" value="<?php //if(isset($_REQUEST["student_division"])){echo $_REQUEST["student_division"]; } ?>"/>
                                    </div> -->
                                   <!--  <div class="col-md-6">
                                        <label for="student_batch">Student Batch </label>
                                        <input type="text" class="form-control" id="student_batch" name="student_batch" value="<?php // if(isset($_REQUEST["student_batch"])){echo $_REQUEST["student_batch"]; } ?>"/>
                                    </div> -->

                                    <div class="col-md-6">
                                        <label for="pangkat">Pangkat <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php if(isset($_REQUEST["pangkat"])){echo $_REQUEST["pangkat"]; } ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="korp">Korp <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="korp" name="korp" value="<?php if(isset($_REQUEST["korp"])){echo $_REQUEST["korp"]; } ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nrp">NRP <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="nrp" name="nrp" value="<?php if(isset($_REQUEST["nrp"])){echo $_REQUEST["nrp"]; } ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kesatuan">Kesatuan <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="kesatuan" name="kesatuan" value="<?php if(isset($_REQUEST["kesatuan"])){echo $_REQUEST["kesatuan"]; } ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jabatan">Jabatan <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php if(isset($_REQUEST["jabatan"])){echo $_REQUEST["jabatan"]; } ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="matra">Matra <span class="red">*</span></label>
                                        <input type="text" class="form-control" id="matra" name="matra" value="<?php if(isset($_REQUEST["matra"])){echo $_REQUEST["matra"]; } ?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="student_photo">Foto </label>
                                        <input type="file" class="form-control" id="student_photo" name="student_photo" />
                                    </div>
                                    
                                    
                                    
                                    </div>
                                </div>
                              
                              </div><!-- /.box-body -->
            
                              <div class="box-footer">
                                <button type="submit" name="savestudent" class="btn btn-primary">Simpan Data</button>
                              </div>
                            </form>
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
    $(function(){
       $(".select2").select2();
    });
    </script>
     <script>
      $(function () {
        
         $("[data-mask]").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
        $(".timepicker").timepicker({
          showInputs: false
        });
      

      });
    </script>
    
  </body>
</html>
