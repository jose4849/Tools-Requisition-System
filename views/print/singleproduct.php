

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>StoreManager</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/bootstrap.css" type="text/css" />
        <script type="text/javascript">
        function go(){

        }
        </script>
    <head>
    <body >


        <?php echo $header;
       // print_r($result); ?>
        <section class = "vbox" style="width:90%;margin:0px auto;"> 
            <section class="scrollable wrapper">
                <div class="tab-content">

                    <div  class="tab-pane active" id="static">
                        <div class="row"></div>
                        <section class = "panel">
                            <header class = "panel-heading">
                                <h3>Product Information</h3>
                                <table border="1" width="100%">
                                    <tr>
                                        <td>Basic info</td>
                                        <td>Description</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">
                                            <strong>Product Name:</strong> <?php echo $result[0]->product_name; ?><br>
                                            <strong>Product ID:</strong> <?php echo $result[0]->id; ?><br>
                                            <strong>Category: </strong><?php echo $result[0]->category; ?><br> 
                                            <strong>Type: </strong><?php echo $result[0]->type; ?><br>                 
                                            <strong>Unit: </strong><?php echo $result[0]->Unit; ?><br> 
                                            <strong>Location: </strong><?php echo $result[0]->location; ?><br> 
                                            <strong>Date: </strong><?php echo $result[0]->date; ?><br> 
                                            <strong>Current Price: </strong><?php echo $result[0]->price; ?><br> 
                                            <strong>Quantity: </strong><?php echo $result[0]->quantity; ?><br> 
                                        </td>
                                        <td width="50%" style="vertical-align:top;"> <?php echo $result[0]->description; ?></td>
                                    </tr>

                                </table>



                            </header>
                            <div class = "table-responsive">
                                <table class = "table table-striped b-t text-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Ref ID</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Current Stock</th>
                                            <th>Price</th>
                                            <th>Agent</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php // print_r($journal); ?>
                                           <?php foreach($journal as $single){  ?>
                                           <tr>
                                            <td><?php echo $single->journal_id; ?></td>
                                            <td><?php echo $single->date ?></td>
                                             <td><?php echo $type=$single->ref_type; ?></td>
                                            <td>
                                                <?php if($type='collection'){ ?>
                                                <a  onclick="window.open('<?php echo base_url(); ?>report/collectionview/?id=<?php echo $single->ref ?>','_blank');"  >
                                                <?php echo $single->ref ?></a>
                                                <?php } else { ?>
                                                <a target="_blank" onclick="window.open('<?php echo base_url(); ?>report/collectionview/?id=<?php echo $single->ref ?>','_blank');"  >
                                                <?php echo $single->ref ?></a>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $single->description ?></td>
                                            <td><?php echo $single->quantity; ?></td>
                                            <td><?php echo $single->current_quantity; ?></td>
                                            <td><?php echo $single->price_new; ?></td>
                                            <td><?php echo $single->agent; ?></td>
                                        </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-12 hidden-xs">

                                        </div>

                                    </div>
                                </footer>
                            </div>
                        </section>           
                    </div>
                </div>
            </section>
        </section>
<?php echo $footer; ?>
    </body>
</html>
