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
    <h4>Tools History</h4>
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="20">ID</th>
                                    <th width="210">Request By</th>
                                    <th width="210" data-toggle="class" class="th-sortable">Product Name</th>
                                    <th  width="50">Quantity</th>
                                    <th width="92">Date</th>
                                    <th width="30">Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $data) { //print_r($data); ?>   
                                    <tr>
                                        <td><?php echo $data->tool_action_id; ?></td>
                                         <td><?php echo $data->fullname; ?></td>
                                        <td><?php echo $data->product_name; ?></td>
                                        <td><?php echo $data->quantity; ?></td>
                                        <td><?php echo $data->request_date; ?></td>
                                        <td><?php echo $data->tools_action_status; ?></td>
                                        
                                    </tr>
                                <? } ?>
                            </tbody>
                        </table>
                        
                    
</section>




























        <?php echo $footer; ?>
    </body>
</html>