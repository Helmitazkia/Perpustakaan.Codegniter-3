<div class="content-wrapper">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row">
                        <h3 class="box-title" style="text-align: center;"><?= $title;  ?></h3>
                        <br>
                        <div class="product-shoe-info shoe">
                            <div style="text-align: center;">
                                <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" width="190" class="rounded float-left   ">
                            </div>
                            <div style="text-align: center;">
                                <h4><?= $user['name']; ?></h4>
                            </div>
                            <div style="text-align: center;">
                                <h4><?= $user['email']; ?></h4>
                            </div>
                            <div style="text-align: center;">
                                <h4><?= $user['role_id']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="box">
                    <div class="box-body">
                        <?= form_open_multipart('user/edit'); ?>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="name" class="form-control">
                            <?= form_error('name', '<small class="text-danger pl-2">', '</small>');  ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>" readonly>
                        </div>
                        <div class="custom-file">
                            <label>Gambar</label>
                            <input type="file" name="image" class="image" id="image">
                        </div>
                        <br>
                        <div style="text-align: left;">
                            <img src="<?= base_url('asset/img/profile/') . $user['image']; ?>" width="100" class="rounded float-left   ">
                        </div>
                        <br>
                        <button class="btn btn-primary"><i class="fa fa-edit">Edit</i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</div>

</body>

</html>