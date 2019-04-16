<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>StoreManager</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/bootstrap.css" type="text/css" />
    <head>
    <body>
        <?php echo $header; ?>
       









  <section class="vbox" style="width:90%;margin:0px auto;">
   
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">


                <section class="panel">
                    <header class="panel-heading">
                        All Tools
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>

                    <div class="table-responsive">
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="20">Product ID</th>
                                    <th width="400"  data-toggle="class" class="th-sortable">Name
                                        <span class="th-sort">
                                            <i class="icon-sort-down text"></i>
                                            <i class="icon-sort-up text-active"></i>
                                            <i class="icon-sort"></i>
                                        </span>
                                    </th>
                                    <th width="150" >Current Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result as $data) { ?>   
                                <tr>
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->product_id;    ?></td>
                                    <td style="border-right:1px solid #e0e4e8">
                                        <?php echo $data->product_name;    ?>
                                    </td>
                                    
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->current_quantity;    ?></td>
                                   
                                  
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                    
                        
                    </div>
                </section>
                
                
                
            </div>


        </div>
    </section>
</section>




















        <?php echo $footer; ?>
    </body>
</html>