<center>
			<div class="gioithieu">
				<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="width: 100%; z-index: 0;overflow: hidden;">
						<div class="carousel-inner">
									<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								<?php $i = 0; if(!empty($banner)){?>
									<?php  foreach($banner as $r){
											$i++;?>
											<div class="carousel-item <?php if($i == 1){echo "active";}?>">
												<img style="margin-top: 90px; height: 50vh; width: 100%;" src="<?php echo $r['anh']?>" class="d-block w-100" alt="...">
											</div>
									<?php } ?>
								<?php } ?>

								<div class="carousel-indicators">
									<?php $i1 = 0; foreach($banner as $r1){$i1++;?>
										<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i1-1?>" class="<?php if($i1 == 1){echo "active";}?>" aria-current="true" aria-label="Slide <?php echo $i1?>"></button>
									<?php } ?>
								</div>

						</div>
				</div>
			</div>

			<div class="thong_bao" style="margin-top: 100px;">
				&nbsp;<i class="fa fa-bell" aria-hidden="true" style="color: orange;font-size: 30px;width: 50px;"></i>
				<marquee style="color: white; font-size: 18px; font-weight: 700;">🛒 <?php echo $thongbao?></marquee>
			</div>
			
			<!-- danh muc 1 -->
			<div class="danh_muc1">
			<?php
				foreach ($danh_muc as $row) {
            ?>
                <h1><?php echo $row['ten'];?></h1>

				<div class="container" style="margin-bottom: 50px;">
	            	<div class="row">
					<?php 
				
					$model = new Home();
					$data = $model->lay_loai_san_pham_theo_danh_muc($row['id_loai_game']);
					foreach($data as $row){?>
							<div class="col-lg-3 col-sm-6 mb-4">
							<a href="?act=shop&dm=<?php echo $row['id_danhmuc']?>&ten_dm=<?php echo $row['ten']?>&id_loai_game=<?php echo $row['id_loai_game']?>">
									<div class="card" style="background-color: black; border: 3px solid orange;">
										<img src="<?php echo $row['anh'];?>" class="card-img-top" height="150px">
										<div class="card-body">                       
											<TABLE>
													<tr>
														<th style="font-size: 13px;"><?php echo $row['ten'];?></th>
													</tr>
											</TABLE>	
											<button style="margin-top: 20px; width: 150px; font-size: 20px; background: red; color: white; border-radius: 5px;">Xem tất cả</button>							
										</div>
									</div>
								</a>
							</div>
						
						<?php }} ?>
					</div>
				</div>
			</div>
		</center>