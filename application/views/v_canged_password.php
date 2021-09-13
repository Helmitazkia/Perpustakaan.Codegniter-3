<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="box">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="box-body">
                        <form action="<?php base_url('user/cangedpassword'); ?>" method="post">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" class="form-control" id="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1">New Password</label>
                                <input type="password" name="new_password1" class="form-control" name="new_password1" id="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Repeat Password</label>
                                <input type="password" name="new_password2" class="form-control" name="new_password2" id="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-2">', '</small>');  ?>
                            </div>
                            <br>
                            <button class="btn btn-primary"><i class="fa fa-edit">Change Password</i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>