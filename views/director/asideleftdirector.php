<!-- .aside -->
<?php 
$session = $this->session->userdata;
$user_id = $session[0]->id;
 ?>       
    
<aside class="bg-dark aside-sm" id="nav">
    <section class="vbox">
        <header class="dker nav-bar">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                <i class="icon-reorder"></i>
            </a>
            <a href="<?php echo base_url(); ?>director" class="nav-brand" >Director</a>
            <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
                <i class="icon-comment-alt"></i>
            </a>
        </header>
        <section>

            <nav class="nav-primary hidden-xs">
                <ul class="nav">
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="dashboard"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>director/">
                            <i class="icon-eye-open"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="collection"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>director/collectionform">
                            <i class="icon-beaker"></i>
                            <span>Collection</span>
                        </a>              
                    </li>               
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="requisition"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>director/requisitionform">
                            <i class="icon-beaker"></i>
                            <span>Requisition<?php if(isset($numberofrequisition)){  echo "(".$numberofrequisition.")"; } ?></span>
                        </a>              
                    </li>

                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="inventory"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>director/inventory">
                            <i class="icon-file-text"></i>
                            <span>Inventory</span>
                        </a>

                    </li>
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="tools"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="#">
                            <i class="icon-file-text"></i>
                            <span>Tools</span>
                        </a>
                        <ul class="dropdown-menu">                
                            <li><a href="<?php echo base_url(); ?>director/tools_requisition_form">Tools Requisition</a></li>
                            <li><a href="<?php echo base_url(); ?>director/tools_by_user/">Tools Status</a></li>
                             <li><a href="<?php echo base_url(); ?>director/tools_inventory/">Tools inventory</a></li>
                        </ul>   
                    </li>	
                    <li class="dropdown-submenu">
                        <a>
                            <i class="icon-file-text"></i>
                            <span>Operations</span>
                        </a>
                        <ul class="dropdown-menu">                
                            <li><a href="<?php echo base_url(); ?>director/department">Department</a></li>
                            <li><a href="<?php echo base_url(); ?>director/category">Category</a></li>
                            <li><a href="<?php echo base_url(); ?>director/add_product">Add Product</a></li>
                        </ul>				
                    </li>
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="reports"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>" >
                            <a href="#"> <i class="icon-file-text"></i><span>Reports</span></a>
                            <ul class="dropdown-menu">                
                            <li><a href="<?php echo base_url(); ?>director/collectionhistory">Collection History</a></li>
                            <li><a href="<?php echo base_url(); ?>director/requisitionhistory">Requisition History</a></li>
                            <li><a href="<?php echo base_url(); ?>director/tools_by_user/">Tools History</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>director/user">
                            <i class="icon-time"></i>
                            <span>User</span>
                        </a>
                    </li>                    
                    <li>
                        <a href="<?php echo base_url(); ?>director/profile">
                            <i class="icon-time"></i>
                            <span>Profile</span>
                        </a>
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




                </ul>
            </nav>
        </section>
    </section>
</aside>
<!-- /.aside -->