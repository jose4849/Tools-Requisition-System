<script type="text/javascript">
    $(document).ready(function() {
        $('#selectbox-o').select2({
            placeholder: "Select a Product",
            allowClear: true,
            minimumInputLength: 2,
            ajax: {
                url: "<?php echo base_url(); ?>store/product_search",
                dataType: 'json',
                data: function(term, page) {
                    return {
                        q: term
                    };
                },
                results: function(data, page) {
                    return {results: data};
                }
            }
        });
        $(".add-product").click(function() {
            var val = $('[name=optionvalue]').val();
            $.ajax({url: "<?php echo base_url(); ?>officer/product_select_requisition", data: {id: val}, success: function(result) {
                    $("#tblData tbody").append(result);
                }});
        });
    });
    function delete_pro(id) {
        console.log(id);
        $('#' + id + '_row').remove();
    }
</script>
<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">All Requisition List</a></li>
        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">
                <div class="row"></div>
                <section class="panel">
                    <header class="panel-heading">
                        New Product List
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>
                    <div class="table-responsive">
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="20">ID</th>
                                    <th width="300" data-toggle="class" class="th-sortable">Requisition BY</th>
                                    <th  width="300">Note</th>
                                    <th width="150">Date</th>
                                    <th width="30">Status</th>
                                    <th width="30">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $data) { ?> 															
                                    <tr>
                                        <td><?php echo $data->requisition_id; ?></td>
                                        <td><?php echo $data->fullname; ?></td>
                                        <td><?php echo $data->note; ?></td>
                                        <td><?php echo $data->date; ?></td>
                                        <td><?php
                                            $s = $data->requisition_status;
                                            if ($s = 1) {
                                                echo "Done";
                                            } if ($s = 0) {
                                                echo "None";
                                            }
                                            ?></td>
                                        <td>
                                            <a  href="<?php echo base_url(); ?>store/requisitionview/?id=<?php echo $data->requisition_id; ?>">View</a>
                                        </td>
                                    </tr>
                                    <? } ?>
                            </tbody>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">
                                 <!-- <select class="input-sm form-control input-s-sm inline">
                                    <option value="0">Bulk action</option>
                                    <option value="1">Delete selected</option>
                                    <option value="2">Bulk edit</option>
                                    <option value="3">Export</option>
                                  <button class="btn btn-sm btn-white">Apply</button>  -->                
                                </div>
                                <div class="col-sm-4 text-center">
                                  <!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>-->
                                </div>
                                <div class="col-sm-4 text-right text-center-xs"> 
                                    <?php echo $pagi; ?>
                                    <!--<ul class="pagination pagination-sm m-t-none m-b-none">
                                      <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#"><i class="icon-chevron-right"></i></a></li> </ul>-->                 
                                </div>
                            </div>
                        </footer>
                    </div>
                </section>
            </div>
            <div class="tab-pane" id="datagrid">
            </div>
        </div>
    </section>
</section>