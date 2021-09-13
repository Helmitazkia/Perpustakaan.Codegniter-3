 <!-- //banner-->
 <!--/login -->
 <section class="banner-bottom py-5">
     <div class="container">
         <div class="content-grid">
             <div class="text-center icon">
                 <span class="fa fa-unlock-alt"></span>
             </div>
             <div class="content-bottom">
                 <?php echo $this->session->flashdata('message'); ?>
                 <form class="user" method="POST" action=" <?php echo base_url('Auth/index'); ?>">
                     <div class="field-group">
                         <div class="form-group">
                             <div class="content-input-field">
                                 <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address" value="<?= set_value('email'); ?>">
                                 <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="content-input-field">
                                 <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                 <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                             </div>
                         </div>
                         <div class="content-input-field">
                             <button type="submit" class="btn">Sign In</button>
                         </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
 <!-- /login -->
 <!--/shipping-->