<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>History Donasi</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<?php foreach ($donasi AS $dns) { ?>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><?= $dns["nama_donatur"]?> Telah Berdonasi </h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Sebesar</div>
											<?php
												$nominal=  $dns["jml_donasi"]
												?>

											<td>Rp. <?= number_format($nominal ); ?></td>

											<!-- <td>Rp. <?= $dns["jml_donasi"]; ?></td> -->
										</div>
										<div class="avaiabilty">
											<div class="text-success">
												Tanggal: <td><?= date('d/m/Y',strtotime($dns["tgl_donasi"])); ?></td>
											</div>
										</div>
										<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $dns['status_verif'] == "baru" ) {

                                    $keterangan = "Verified";
                                    $warna      = "success";
                                } else if ( $dns['status_verif'] == "belum verifikasi" ) {
                                    $keterangan = "Failed";
                                    $warna = "info";
                                } 
                                ?>
										<span style="margin-left: 380px;" class="badge badge-<?=$warna;?>"><?= $keterangan; ?></td>
									</div>
								</div>
							</div>
						</div>
						<?php
                        }
                            ?>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Shipped Orders</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-5.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-4.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-3.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-3.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-2.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-5.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"> </i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-1.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-success btn-xs" href="order-history.html#">Shipped</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h5>Cancelled Orders</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-5.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-4.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-3.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-2.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-1.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-1.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-5.png" alt="#">
									<div class="media-body ms-3">
										<div class="product-name">
											<h6><a href="order-history.html#">Fancy Women's Cotton</a></h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Price</div>: 210$
										</div>
										<div class="avaiabilty">
											<div class="text-success">In stock</div>
										</div><a class="btn btn-danger btn-xs" href="order-history.html#">Cancelled</a><i class="close"
											data-feather="x"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
