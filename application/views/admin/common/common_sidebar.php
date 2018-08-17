<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
           
       <?php if(_get_current_user_type_id($this)==0){ ?>
             <li>
              <a href="<?php echo site_url("admin/dashboard"); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
           <!--  <li>
              <a href="<?php echo site_url("requestdemo"); ?>">
                <i class="fa fa-reply"></i> <span>Demo Request</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li> -->
            <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Kelola Pengguna</span> <small class="label pull-right bg-green"></small>
              </a>
              <ul class="treeview-menu">
                        <li><a href="<?php echo site_url("users/add_user"); ?>"><i class="fa fa-plus"></i>Pengguna Baru</a></li>
                        <li><a href="<?php echo site_url("users"); ?>"><i class="fa fa-list"></i>Daftar Pengguna</a></li>
              </ul>
            </li>
           <?php } ?> 
            
            
              <?php if(_get_current_user_type_id($this)==1){ ?>
               <li>
              <a href="<?php echo site_url("school/dashboard"); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
               <li>
              <a href="<?php echo site_url("school/profile"); ?>">
                <i class="fa fa-refresh"></i> <span>Perbarui Profil Kelas</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
             <li>
              <a href="#">
                <i class="fa fa-graduation-cap"></i> <span>Kelola Instruktur</span> <small class="label pull-right bg-green"></small>
              </a>
              <ul class="treeview-menu">
                        <li><a href="<?php echo site_url("teacher/add_teacher"); ?>"><i class="fa fa-plus"></i>Tambah Instruktur</a></li>
                        <li><a href="<?php echo site_url("teacher/list_teacher"); ?>"><i class="fa fa-list"></i>Daftar Instruktur</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo site_url("standard/manage_standard"); ?>">
                <i class="fa fa-tasks "></i> <span>Kelola Standar</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
             
              <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Kelola Siswa / Peserta</span> <small class="label pull-right bg-green"></small>
              </a>
              <ul class="treeview-menu">
                        <li><a href="<?php echo site_url("student/add_student"); ?>"><i class="fa fa-plus"></i>Tambah Siswa / Peserta</a></li>
                        <li><a href="<?php echo site_url("student/list_student"); ?>"><i class="fa fa-list"></i>Daftar Siswa / Peserta</a></li>
              </ul>
            </li>
             <li>
              <a href="<?php echo site_url("attendence/add_attendence"); ?>">
                <i class="fa fa-calendar-check-o"></i> <span>Kehadiran Siswa / Peserta</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
             
           <li>
              <a href="<?php echo site_url("exam/manage_exam"); ?>">
                <i class="fa fa-briefcase"></i> <span>Kelola Ujian</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
            
            <li>
              <a href="<?php echo site_url("event/manage_event"); ?>">
                <i class="fa fa-calendar"></i> <span>Kelola Materi Kuliah / Pelatihan</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
             <li>
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Kelola Hari Libur</span> <small class="label pull-right bg-green"></small>
              </a>
              <ul class="treeview-menu">
                        <li><a href="<?php echo site_url("holiday/manage_holiday"); ?>"><i class="fa fa-plus"></i>Tambah Hari Libur</a></li>
                        <li><a href="<?php echo site_url("holiday/list_holiday"); ?>"><i class="fa fa-list"></i>Daftar Hari Libur</a></li>
              </ul>
            </li>
          <li>
              <a href="#">
                <i class="fa fa-user"></i> <span>Rangking 10 Siswa / Peserta </span> <small class="label pull-right bg-green"></small>
              </a>
              <ul class="treeview-menu">
                        <li><a href="<?php echo site_url("topstudent/add_topstudent"); ?>"><i class="fa fa-plus"></i>Tambah Rangking</a></li>
                        <li><a href="<?php echo site_url("topstudent/list_top"); ?>"><i class="fa fa-list"></i>Daftar Peringkat</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo site_url("noticeboard/manage_noticeboard"); ?>">
                <i class="fa fa-tasks"></i> <span>Papan Pengumuman</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
            <li>
              <a href="<?php echo site_url("chat/manage_chat"); ?>">
                <i class="fa fa-pencil-square-o"></i> <span>Pertanyaan Siswa / Peserta</span> <small class="label pull-right bg-green"></small>
              </a>
               
            </li>
            
           <?php } ?>  
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>