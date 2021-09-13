  <!--/login -->
  <section class="banner-bottom py-5">
        <div class="container">
            <div class="content-grid">
                <div class="text-center icon">
                    <span class="fa fa-user-circle-o"></span>
                </div>
                <div class="content-bottom">
                 <form class="user" method="POST" action=" <?php echo base_url('Auth/registration'); ?>">
                        <div class="field-group">
                        <div class="content-input-field">                                 
                                <input type="text" class="form-control form-control-user"
                                    id="name" name ="name" placeholder="Full Name"  value="<?= set_value('name');?>">                              
                                    <?= form_error('name','<small class="text-danger pl-2">','</small>'); ?>
                             </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">                                 
                                <input type="text" class="form-control form-control-user"
                                    id="email" name ="email" placeholder="Enter Email Address"  value="<?= set_value('email');?>">                              
                                    <?= form_error('email','<small class="text-danger pl-2">','</small>'); ?>
                             </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="password1" id="password1" type="Password"  placeholder="Password">
                                <?= form_error('password1','<small class="text-danger pl-2">','</small>'); ?>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="content-input-field">
                                <input name="password2" id="password2" type="Password" placeholder="Konfirmasi Password">
                            </div>
                        </div>
                        <div class="content-input-field">
                            <button type="submit" class="btn">Register Account</button>
                        </div>
                        <div class="list-login-bottom text-center mt-lg-5 mt-4">

                            <a href="<?php echo base_url('auth');?>" class="">Already have an account? Login!</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>