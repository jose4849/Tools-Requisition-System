<script type="text/javascript">
    function update_user() {
    //    alert('hi');
        var email = $('#email').val();
        var oldpass = $('#oldpass').val();
        var newpass = $('#newpass').val();
        var id = $('#id').val();
        $.ajax({url: "<?php echo base_url(); ?>admin/update_user", data: {id: id, email: email,oldpass:oldpass,newpass:newpass}, success: function(result) {
                alert(result);
                window.location.reload()

            }});
    }
</script>
<!--====================================================================-->   

<?php //print_r($userinfo); ?>

<section class="vbox">

    <header class="header bg-white b-b">
        <p>Your Profile</p>
    </header>

    <div class="panel-body">
        <div class="row">
                        
            <div class="col-md-6">
<!--==========================================left------------------------------------> 
                
 <section class="panel">
                  <div class="panel-body">
                    <div class="clearfix text-center m-t">
                      <div class="inline">
                        <div data-size="150" data-scale-color="false" data-track-color="#f5f5f5" data-bar-color="#92cf5c" data-loop="false" data-line-width="5" data-percent="75" style="width: 150px; height: 150px; line-height: 106px;">
                          
                            <img width="100" height="100" src="<?php echo base_url(); ?>additional/avatar.jpg" >
                          
                            <div class="h4 m-t m-b-xs"><?php echo $userinfo[0]->fullname;  ?></div>
                        <small class="text-muted m-b"><?php  echo $userinfo[0]->designation;  ?></small>
                      </div>                      
                    </div>
                  </div>
                  <footer class="panel-footer bg-dark lter text-center">
                    <div class="row pull-out">
                      <div class="col-xs-4">
                        <div class="padder-v">
                          <span class="m-b-xs h4 block">Account create</span>
                          <small class="text-muted"><?php echo $userinfo[0]->date;  ?></small>
                        </div>
                      </div>
                      <div class="col-xs-4 bg-success">
                        <div class="padder-v">
                          <span class="m-b-xs h4 block">Last IP</span>
                          <small class="text-muted">Local</small>
                        </div>
                      </div>
                      <div class="col-xs-4">
                        <div class="padder-v">
                          <span class="m-b-xs h4 block">Last Login</span>
                          <small class="text-muted">undefined</small>
                        </div>
                      </div>
                    </div>
                  </footer>
                </section>               
                
<section class="panel bg-warning no-borders">
                      <div class="row">
                        <div class="col-xs-6">
                          <div class="wrapper">
                            <p>Your profile Complete</p>
                            <p class="h2 font-bold">32.5%</p>
                            <div class="progress progress-xs progress-striped active m-b-sm">
                              <div style="width: 32.5%" data-original-title="32.5%" data-toggle="tooltip" class="progress-bar progress-bar-warning"></div>
                            </div>
                            <div class="text-sm">Fill all information to complete your profile..</div>
                          </div>
                        </div>
                        <div class="col-xs-6 wrapper text-center">
                          <div class="inline m-t-sm">
                            <div data-size="100" data-scale-color="false" data-track-color="#c79d43" data-bar-color="#ffffff" data-line-width="8" data-percent="32.5" class="easypiechart easyPieChart" style="width: 100px; height: 100px; line-height: 100px;">
                              <span class="h2">32</span>%
                            <canvas height="100" width="100"></canvas></div>
                          </div>
                        </div>
                      </div>
                    </section>                
            </div>
            

            
            
            
            
            
            
            
            
 <div class="col-sm-6">
                  <section class="panel">
                    <header class="panel-heading font-bold">Account Information</header>
                    
                      <div class="panel-heading list-group no-radius alt">
                        
                          <table >
                              <tr>
                                  <td colspan="2">Below there are your account Information. You can change your account
                                      Information by editing.After editing save all by click save Button.
                                     <div style="height:38px;"></div>
                                     <input type="hidden" id="id" value="<?php echo $userinfo[0]->id;  ?>" class="form-control" disabled />
                                  </td>
                              </tr>
                              <tr><td width="100"><b>Full Name:</b></td><td><input type="email" placeholder="<?php echo $userinfo[0]->fullname;  ?>" class="form-control" disabled /></td></tr>
                              <tr><td><b>Designation:</b></td><td><input type="email" placeholder="<?php echo $userinfo[0]->designation;  ?>" class="form-control" disabled /></td></tr>
                              <tr><td><b>Department:</b></td><td><input type="email" placeholder="Email" class="form-control" disabled /></td></tr>
                              <tr><td><b>JOB ID:</b></td><td> <input type="email" placeholder="<?php echo $userinfo[0]->jobid;  ?>" class="form-control" disabled /></td></tr>
                              
                              <tr><td><b>Status:</b></td><td><input type="email" placeholder="<?php echo $userinfo[0]->status;  ?>" class="form-control" disabled /></td></tr>
                              <tr><td><b>Email:</b></td><td><input type="email" id="email" placeholder="<?php echo $userinfo[0]->email;  ?>" class="form-control"></td></tr>
                              <tr><td><b>Old Password</b></td><td><input type="text" id="oldpass" placeholder="Old password" class="form-control"></td></tr>
                              <tr><td><b>New password</b></td><td><input type="text" id="newpass" placeholder="New Password" class="form-control"></td></tr>
                          </table>
                      </div>               
                    
                    
                    
                    
                    <div class="panel-body">

                        <div class="form-group">
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm update_user btn-default" onclick="update_user()" type="submit">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </section>
                </div>
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              </li>
            </ul>
          </div>
            </div>
        </div>
    </div>    





</section>  









<!--====================================================================-->              

