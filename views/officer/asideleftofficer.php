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
            <a href="<?php echo base_url(); ?>officer" class="nav-brand" >Officer</a>
            <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
                <i class="icon-comment-alt"></i>
            </a>
        </header>
        <section>
            <div class="lter nav-user hidden-xs pos-rlt">            
            </div>
            </div>
            <nav class="nav-primary hidden-xs">
                <ul class="nav">
                    <li  class="<?php if(isset($leftmenu)&& $leftmenu=="dashboard"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>" >
                        <a href="<?php echo base_url(); ?>officer">
                            <i class="icon-eye-open"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>              
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=='collection'){ echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>officer/collectionform">
                            <i class="icon-beaker"></i>
                            <span>Collection</span>
                        </a>              
                    </li>
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=='requisition'){ echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>officer/requisitionform">
                            <i class="icon-beaker"></i>
                            <span>Requisition</span>
                        </a>              
                    </li>
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=='inventory'){ echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>officer/inventory">
                            <i class="icon-file-text"></i>
                            <span>Inventory</span>
                        </a>

                    </li>
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=='tools'){ echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="#">
                            <i class="icon-file-text"></i>
                            <span>Tools</span>
                        </a>
                        <ul class="dropdown-menu">                
                            <li><a href="<?php echo base_url(); ?>officer/tools_requisition_form">Tools Requisition</a></li>
                            <li><a href="<?php echo base_url(); ?>officer/tools_by_user/?user_id=<?php echo $user_id; ?>">Tools Status</a></li>
                        </ul>                        
                    </li>	
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=='operation'){ echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>"> 
                        <a href="#">
                            <i class="icon-file-text"></i>
                            <span>Operations</span>
                        </a>
                        <ul class="dropdown-menu">                
                            <li><a href="<?php echo base_url(); ?>officer/add_product">Add New Product</a></li>
                        </ul>				
                    </li>				  
                   <li class="<?php if(isset($leftmenu)&& $leftmenu=='profile'){ echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>" >
                        <a href="<?php echo base_url(); ?>officer/profile">
                            <i class="icon-time"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <footer class="footer bg-gradient hidden-xs">
            <!--<a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
                <i class="icon-off"></i>
            </a>
            <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
                <i class="icon-reorder"></i>-->
            </a>
        </footer>
    </section>
</aside>
<!-- /.aside -->