<center>

    <div class="wrapper" style="background-color: black; margin-top: 100px;">
        <h1 style="padding-top: 10px; color: orange; font-weight: 600;"><?php echo $ten_danh_muc ?></h1>
         <!-- bo loc tim kiem -->
         <?php if($id_loai_game !=3){?>
         <div class="container boloc">
            <h5 style="color: white;"><i class="fa fa-search" aria-hidden="true"></i> Bộ lọc tìm kiếm</h5>
            <div class="row" style="display: flex;">

                        
                        <select id="giatientu" class="col-lg-3 col-sm-12 col-xs-12 states">
                            <option value="">Chọn giá tiền từ</option>
                            <option value="10000">10.000</option>
                            <option value="20000">20.000</option>
                            <option value="50000">50.000</option>
                            <option value="100000">100.000</option>
                            <option value="200000">200.000</option>
                            <option value="500000">500.000</option>
                            <option value="1000000">1.000.000</option>
                            <option value="2000000">2.000.000</option>
                            <option value="5000000">5.000.000</option>
                        </select>

                        <select id="giatienden" class="col-lg-3 col-sm-12 col-xs-12 states" >
                            
                            <option value="">Chọn giá tiền đến</option>
                            <option value="10000">10.000</option>
                            <option value="20000">20.000</option>
                            <option value="50000">50.000</option>
                            <option value="100000">100.000</option>
                            <option value="200000">200.000</option>
                            <option value="500000">500.000</option>
                            <option value="1000000">1.000.000</option>
                            <option value="2000000">2.000.000</option>
                            <option value="5000000">5.000.000</option>
                        </select>
                
                        <select id="hang" class="col-lg-3 col-sm-12 col-xs-12 states">
                            <option value="">Chọn rank</option>
                            <option value="Sắt">Sắt</option>
                            <option value="Đồng">Đồng</option>
                            <option value="Bạc">Bạc</option>
                            <option value="Vàng">Vàng</option>
                            <option value="Bạch kim">Bạch kim</option>
                            <option value="Lục Bảo">Lục Bảo</option>
                            <option value="Kim cương">Kim cương</option>
                            <option value="Cao thủ">Cao thủ</option>
                            <option value="Đại cao thủ">Đại cao thủ</option>
                            <option value="Thách Đấu">Thách Đấu</option>
                        </select>
                 

                        <select id="tuong" class="col-lg-3 col-sm-12 col-xs-12 states">
                            <option value="">Chọn tướng</option>
                            <?php
                                foreach ($data_tuong as $row) {
                            ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['ten']?></option>
                            <?php } ?>                   
                        </select>

                        <select id="trangphuc" class="col-lg-3 col-sm-12 col-xs-12 states">
                            <option value="">Chọn trang phục</option>
                            <?php
                                foreach ($data_trang_phuc as $row) {
                            ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['ten']?></option>
                            <?php } ?>                   
                        </select>

                        <select id="linhthu" class="col-lg-3 col-sm-12 col-xs-12 states">
                            <option value="">Chọn linh thú</option>
                            <?php
                                foreach ($data_linh_thu as $row) {
                            ?>
                                <option value="<?php echo $row['id']?>"><?php echo $row['ten']?></option>
                            <?php } ?>                   
                        </select>
                        


                        <input type="button" onclick="locdulieu(<?php echo $danh_muc?>,)" value="Lọc" style="background-color: rgb(221, 11, 11);color: white;font-weight: 550;">

            </div>
         </div>
         <?php } ?>
         <div class="container page" style="margin-top: 50px;" id="contain_taikhoan">
                <?php if(!empty($tong_so_tai_khoan)){?>
                    <p style="margin-top: 20px; font-size: 20px; font-weight: 600; color: orange;">Có <?php echo $tong_so_tai_khoan?> tài khoản</p>
                <?php } ?>

                <div class="row">
                    <?php require_once('list_account.php');?>
	            </div>
                <div class="row">
						<div class="col-sm-12">
							<div class="pagnation-ul">
								<ul class="clearfix" style=" display: flex; justify-content: center;">
                                    <?php if($id_loai_game != 3){?>
									<?php if ($tong_so_tai_khoan > 0) {
                                        if($tong_so_tai_khoan % 9 == 0)
                                        {
                                            for ($i = 1; $i <= $tong_so_tai_khoan / 9; $i++) { ?>
                                            <?php if(!empty($_GET['trang']) and $_GET['trang']== $i){?>
                                                <li style="list-style: none; margin-left: 2px; background-color: white; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: black; font-weight: 600;" onclick="locdulieu(<?php echo $danh_muc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                            <?php }else{ ?>
                                                <li style="list-style: none; margin-left: 2px; background-color: black; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: white; font-weight: 600;" onclick="locdulieu(<?php echo $danh_muc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                            <?php }}?>
                                       <?php } else{ for ($i = 1; $i <= ($tong_so_tai_khoan / 9)+1; $i++) {?>
                                        <?php if(!empty($_GET['trang']) and $_GET['trang']== $i){?>
                                                <li style="list-style: none; margin-left: 2px; background-color: white; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: black; font-weight: 600;" onclick="locdulieu(<?php echo $danh_muc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                            <?php }else{ ?>
                                                <li style="list-style: none; margin-left: 2px; background-color: black; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: white; font-weight: 600;" onclick="locdulieu(<?php echo $danh_muc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                        <?php }}}}} ?>
								</ul>
							</div>
						</div>
				</div>
	        </div>
	     </div>
    </div>
   

</center>