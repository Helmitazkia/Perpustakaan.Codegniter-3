<section class="banner-bottom py-5">
    <div class="container py-5">
        <h3 class="title-wthree mb-lg-5 mb-4 text-center">Book Now</h3>
        <div class="row">
            <?php foreach ($Buku as $m) : ?>
                <div class="col-lg-3  text-center mt-4">
                    <div class="card-mb-2">
                        <div class="product-shoe-info shoe">
                            <div class="men-thumb-item">
                                <img src=" <?= base_url('project/images/') .  $m['image']; ?>" class="img-fluid" alt="" style="width: 150px;">
                            </div>
                            <div class="item-info-product">
                                <h4> <a href="single.html"><?= $m['judul_buku']; ?></a></h4>
                                <div class="product_price">
                                    <div class="grid-price">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>