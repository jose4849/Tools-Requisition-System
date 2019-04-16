<!-- .aside -->
<aside class="bg-dark aside-sm" id="nav">
    <section class="vbox">
        <header class="dker nav-bar">
            <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                <i class="icon-reorder"></i>
            </a>
            <a href="<?php echo base_url(); ?>purchase" class="nav-brand" >Purchase</a>
            <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
                <i class="icon-comment-alt"></i>
            </a>
        </header>
        <section>
            <div class="lter nav-user hidden-xs pos-rlt">            


            </div>





            <nav class="nav-primary hidden-xs">
                <ul class="nav">
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="dashboard"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>purchase">
                            <i class="icon-eye-open"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>              
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="collection"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>purchase/collectionform">
                            <i class="icon-beaker"></i>
                            <span>Collection</span>
                        </a>              
                    </li>

                   <!-- <li class="<?php if(isset($leftmenu)&& $leftmenu=="requisition"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>purchase/requisitionform">
                            <i class="icon-beaker"></i>
                            <span>Requisition</span>
                        </a>              
                    </li>-->

                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="inventory"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="<?php echo base_url(); ?>purchase/inventory">
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
                          <!--   <li><a href="<?php echo base_url(); ?>purchase/tools_requisition_form">Tools Requisition</a></li>-->
                             <li><a href="<?php echo base_url(); ?>purchase/tools_inventory/">Tools inventory</a></li>
                        </ul>               
                    </li>	
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="operations"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>">
                        <a href="#">
                            <i class="icon-file-text"></i>
                            <span>Operations</span>
                        </a>
                        <ul class="dropdown-menu">                
                            <li><a href="<?php echo base_url(); ?>purchase/add_product">Add New Product</a></li>
                        </ul>				
                    </li>				  
                    <li class="<?php if(isset($leftmenu)&& $leftmenu=="profile"){echo "active dropdown-submenu"; } else { echo "dropdown-submenu"; } ?>" >
                        <a href="<?php echo base_url(); ?>purchase/profile">
                            <i class="icon-time"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    
                   


                </ul>
            </nav>		
        </section>
        <footer class="footer bg-gradient hidden-xs">

        </footer>
    </section>
</aside>
<!-- /.aside -->