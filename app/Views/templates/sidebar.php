 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
         <div class="sidebar-brand-icon">
             <i class="fas fa-mail-bulk"></i>
         </div>
         <div class="sidebar-brand-text mx-3">E-Surat SKB Salatiga</div>
     </a>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Admin
     </div>

     <!-- Nav Item - My Profile -->
     <li class="nav-item <?php if ($segment->uri->getPath(1) == 'user') {
                                echo 'active';
                            } ?>">
         <a class="nav-link" href="/user">
             <i class="fas fa-fw fa-users"></i>
             <span>Manajemen User</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href=" #" data-toggle="collapse" data-target="#collapseriwayat" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-envelope-square"></i>
             <span>Riwayat Surat</span>
         </a>
         <div id="collapseriwayat" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="/history/suratmasuk">Surat Masuk</a>
                 <a class="collapse-item" href="/history/suratkeluar">Surat Keluar</a>
             </div>
         </div>
     </li>



     <!-- <li class="nav-item <?php if ($segment->uri->getPath(1) == 'database') {
                                    echo 'active';
                                } ?>">
         <a class="nav-link" href="/database">
             <i class="fas fa-database"></i>
             <span>Database</span></a>
     </li> -->

     <li class="nav-item <?php if ($segment->uri->getPath(1) == 'log') {
                                echo 'active';
                            } ?>">
         <a class="nav-link" href="/log">
             <i class="fas fa-fw fa-history"></i>
             <span>Log</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Menu
     </div>


     <!-- Nav Item - Dashboard -->
     <li class="nav-item <?php if ($segment->uri->getPath(1) == 'home') {
                                echo 'active';
                            } ?>">
         <a class="nav-link" href="/home">
             <i class="fas fa-fw fa-home"></i>
             <span>Beranda</span></a>
     </li>

     <li class="nav-item <?php if ($segment->uri->getPath(1) == 'klasifikasi') {
                                echo 'active';
                            } ?>">
         <a class="nav-link" href="/klasifikasi">
             <i class="fas fa-fw fa-id-badge"></i>
             <span>Klasifikasi</span></a>
     </li>

     <!-- Nav Item -Surat Masuk -->
     <li class="nav-item <?php if ($segment->uri->getPath(1) == 'suratmasuk') {
                                echo 'active';
                            } ?>">
         <a class="nav-link" href="/suratmasuk">
             <i class="far fa-fw fa-envelope"></i>
             <span>Surat Masuk</span></a>
     </li>

     <!-- Nav Item - My Profile -->
     <li class="nav-item <?php if ($segment->uri->getPath(1) == 'suratkeluar') {
                                echo 'active';
                            } ?>">
         <a class="nav-link" href="/suratkeluar">
             <i class="far fa-fw fa-envelope-open"></i>
             <span>Surat Keluar</span></a>
     </li>


     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-book"></i>
             <span>Laporan</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">

                 <a class="collapse-item" href="/laporan/suratmasuk">Surat Masuk</a>
                 <a class="collapse-item" href="/laporan/suratkeluar">Surat Keluar</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Logout -->
     <li class="nav-item">
         <a class="nav-link" href="/auth/logout" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>Logout</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>
 <!-- End of Sidebar -->