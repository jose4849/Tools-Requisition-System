	<!-- .aside -->
    <aside class="bg-dark aside-sm" id="nav">
      <section class="vbox">
        <header class="dker nav-bar">
          <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
            <i class="icon-reorder"></i>
          </a>
          <a href="<?php echo base_url(); ?>store" class="nav-brand" >Store</a>
          <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
            <i class="icon-comment-alt"></i>
          </a>
        </header>
        <section>
          <div class="lter nav-user hidden-xs pos-rlt">            
            <div class="nav-avatar pos-rlt">
              <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>additional/resources/images/avatar.jpg" alt="" class="">
                <span class="caret caret-white"></span>
              </a>
              <ul class="dropdown-menu m-t-sm animated fadeInLeft">
              	<span class="arrow top"></span>
                <li>
                  <a href="#">Settings</a>
                </li>
                <li>
                  <a href="profile.html">Profile</a>
                </li>
                <li>
                  <a href="#">
                    <span class="badge bg-danger pull-right">3</span>
                    Notifications
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="docs.html">Help</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>">Logout</a>
                </li>
              </ul>
              <div class="visible-xs m-t m-b">
                <a href="#" class="h3">John.Smith</a>
                <p><i class="icon-map-marker"></i> London, UK</p>
              </div>
            </div>
            <div class="nav-msg">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <b class="badge badge-white count-n">2</b>
              </a>
              <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                <div class="arrow left"></div>
                <section class="panel bg-white">
                  <header class="panel-heading">
                    <strong>You have <span class="count-n">2</span> notifications</strong>
                  </header>
                  <div class="list-group">
                    <a href="#" class="media list-group-item">
                      <span class="pull-left thumb-sm">
                        <img src="<?php echo base_url(); ?>additional/resources/images/avatar.jpg" alt="John said" class="img-circle">
                      </span>
                      <span class="media-body block m-b-none">
                        Use awesome animate.css<br>
                        <small class="text-muted">28 Aug 13</small>
                      </span>
                    </a>
                    <a href="#" class="media list-group-item">
                      <span class="media-body block m-b-none">
                        1.0 initial released<br>
                        <small class="text-muted">27 Aug 13</small>
                      </span>
                    </a>
                  </div>
                  <footer class="panel-footer text-sm">
                    <a href="#" class="pull-right"><i class="icon-cog"></i></a>
                    <a href="#">See all the notifications</a>
                  </footer>
                </section>
              </section>
            </div>
          </div>
	


	
		  
<nav class="nav-primary hidden-xs">
            <ul class="nav">
              <li class="active">
                <a href="index.html">
                  <i class="icon-eye-open"></i>
                  <span>Dashboard</span>
                </a>
              </li>              
              <li class="dropdown-submenu ">
                <a href="<?php echo base_url(); ?>requisition">
                  <i class="icon-beaker"></i>
                  <span>Requisition</span>
                </a>              
              </li>
              <li class="dropdown-submenu ">
                <a href="<?php echo base_url(); ?>store/collectionform">
                  <i class="icon-beaker"></i>
                  <span>Collection</span>
                </a>              
              </li>              
               <li class="dropdown-submenu">
                <a href="product.html">
                  <i class="icon-file-text"></i>
                  <span>Inventory</span>
                </a>
                
              </li>
               <li class="dropdown-submenu">
                <a href="product.html">
                  <i class="icon-file-text"></i>
                  <span>Tools</span>
                </a>               
              </li>	
               <li class="dropdown-submenu">
                <a href="product.html">
                  <i class="icon-file-text"></i>
                  <span>Operations</span>
                </a>
                <ul class="dropdown-menu">                
                  <li><a href="<?php echo base_url(); ?>store/department">Department</a></li>
                  <li><a href="<?php echo base_url(); ?>store/category">Category</a></li>
                  <li><a href="<?php echo base_url(); ?>store/add_product">Add Product</a></li>
                </ul>				
              </li>				  
            <!--  <li>
                <a href="mail.html">
                  <b class="badge bg-primary pull-right">3</b>
                  <i class="icon-envelope-alt"></i>
                  <span>Massege</span>
                </a>
              </li>
              
              
              <li>
                <a href="timeline.html">
                  <i class="icon-time"></i>
                  <span>History</span>
                </a>
              </li> -->

              <li>
                <a href="<?php echo base_url(); ?>admin/user">
                  <i class="icon-time"></i>
                  <span>User</span>
                </a>
              </li>
              
              
            </ul>
          </nav>
        
		
		
		
		
		
		
		</section>
        <footer class="footer bg-gradient hidden-xs">
          <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
            <i class="icon-off"></i>
          </a>
          <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
            <i class="icon-reorder"></i>
          </a>
        </footer>
      </section>
    </aside>
    <!-- /.aside -->