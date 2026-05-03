    <div class="container thongtintaikhoan" style="margin-top: 100px;">
        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide col-lg-7 col-sm-12 col-xs-12" data-bs-ride="carousel" style="z-index: 0;overflow: hidden;">
                
                <div class="carousel-inner">
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php $i = 0; if(!empty($dataAnh)){?>
                            <?php  foreach($dataAnh as $r){
                                    $i++;?>
                                    <div class="carousel-item <?php if($i == 1){echo "active";}?>">
                                        <img style="height: 60vh;" src="<?php echo $r['anh']?>" class="d-block w-100" alt="...">
                                    </div>
                            <?php } ?>
                        <?php } ?>

                        <div class="carousel-indicators">
                            <?php $i1 = 0; foreach($dataAnh as $r1){$i1++;?>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i1-1?>" class="<?php if($i1 == 1){echo "active";}?>" aria-current="true" aria-label="Slide <?php echo $i1?>"></button>
                            <?php } ?>
                        </div>

                </div>
                
            </div>
            <div class="col-lg-5 col-sm-12 col-xs-12 contain_thong_tin" style="background-color: white; height: 60vh; position: relative;border-radius: 10px;">
                <div class="contain_danhmuc_id">
                    <p style="font-weight: 600; font-size: 20px; color: white; margin-top: 2px;">&nbsp;&nbsp;MÃ SỐ: <?php echo $id_tai_khoan_game?></p>
                    <P style="font-size: 13px; color: rgba(255, 255, 255, 0.9);margin-top: -18px;">&nbsp;&nbsp; DANH MỤC: <?php echo $danh_muc?></P>
                </div>
                <?php foreach($dataTaiKhoan as $r){?>
                    <?php $obj = new Shop(); $d = $obj->listKhuyenMaiTheoId($r['id_km']);
                    foreach($d as $r1){ $tenkhuyenmai = $r1['ten'];$giakm = $r1['giatri'];}?>
                    <?php if($giakm != 0){?>
                        <div class="contain_gia_tien">Giá: <?php  echo $format_number_1 = number_format($giatien = $r['giahientai'] - $r['giahientai']*($r1['giatri']/100));?> VNĐ <span style="color: black; text-decoration: line-through;margin-left: 20px; font-size: 15px;"><?php echo number_format($r['giahientai'])?> VNĐ</span></div>
                    <?php }else{?>
                        <div class="contain_gia_tien">Giá: <?php echo number_format($giatien = $r['giahientai'])?> VNĐ</div>
                    <?php } ?>
                        <div class="row" style="position: absolute; margin-top: 155px; width: 100%; border-bottom: 1px solid gray; padding: 5px; border-top: 1px solid gray;">
                        <div class="col-4 col-lg-4 col-sm-4"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Tướng</div>
                        <div class="col-4 col-lg-4 col-sm-4"><?php echo $r['sl_tuong'];?></div>
                        <div class="col-4 col-lg-4 col-sm-4"><button id="open_tuong" onclick="mo_tuong()" style="background-color: black; color: white; border-radius: 10px; width: 50px;">xem</button></div>
                    </div>

                    <div class="row" style="position: absolute; margin-top: 200px; width: 100%; border-bottom: 1px solid gray; padding: 5px;">
                        <div class="col-4 col-lg-4 col-sm-4"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Trang phục</div>
                        <div class="col-4 col-lg-4 col-sm-4"><?php echo $r['sl_trang_phuc'];?></div>
                        <div class="col-4 col-lg-4 col-sm-4"><button id="open_trang_phuc" onclick="mo_trang_phuc()" style="background-color: black; color: white; border-radius: 10px; width: 50px;">xem</button></div>
                    </div>

                    <div class="row" style="position: absolute; margin-top: 245px; width: 100%; border-bottom: 1px solid gray; padding: 5px;">
                        <div class="col-4 col-lg-4 col-sm-4"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Linh thú</div>
                        <div class="col-4 col-lg-4 col-sm-4"><?php echo $r['sl_linh_thu'];?></div>
                        <div class="col-4 col-lg-4 col-sm-4"><button id="open_linh_thu" onclick="mo_linh_thu()" style="background-color: black; color: white; border-radius: 10px; width: 50px;">xem</button></div>
                    </div>

                    <div class="row" style="position: absolute; margin-top: 290px; width: 100%; border-bottom: 1px solid gray; padding: 5px;">
                        <div class="col-4 col-lg-4 col-sm-4"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Rank</div>
                        <div class="col-4 col-lg-4 col-sm-4"><?php echo $r['rank'];?></div>
                    </div>
        
                    <?php if(!empty($_SESSION['username']) and !empty($_SESSION['password'])) {?>
                    <?php if($r['trangthai'] == 1){?>
                        <button onclick="xulimuaacc('<?php echo $r['id_tai_khoan']?>','<?php echo $giatien?>', '<?php echo $_SESSION['email']?>','<?php echo $r['id_km']?>')" style="position: absolute; width: 100%;left: 0;bottom: 0; background-color: black; color: white; margin-top: 360px; font-size: 30px; border: none; transition: all 0.7s;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> MUA NGAY</button>
                    <?php } else{?>
                        <button style="position: absolute; width: 100%;left: 0;bottom: 0; background-color: black; color: white; margin-top: 360px; font-size: 30px; border: none; transition: all 0.7s;">ĐÃ BÁN</button>
                <?php }}else{ ?>
                    <?php if($trangthai == 1){?>
                        <button onclick="mo_dang_nhap()" style="position: absolute; width: 100%;left: 0;bottom: 0; background-color: black; color: white; margin-top: 360px; font-size: 30px; border: none; transition: all 0.7s;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> MUA NGAY</button>
                    <?php }else {?>
                        <button style="position: absolute; width: 100%;left: 0;bottom: 0; background-color: black; color: white; margin-top: 360px; font-size: 30px; border: none; transition: all 0.7s;">ĐÃ BÁN</button>
                    <?php } ?>
                <?php }?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="wrapper_tuong">
        <p id="close_tuong" onclick="dong_tuong()">&times;</p>
       <div class="contain_tuong container">
                    <h1 style="text-align: center; font-weight: 600;">TƯỚNG</h1>
            <div class="row">
                <?php if(!empty($data_tuong)){?>
                <?php foreach($data_tuong as $r){?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="card"
                            style="border:3px solid white; width: 90%; background: black; color: yellow;border-radius: 5px;">
                                <img src="<?php echo $r['anh']?>" class="card-img-top" alt="..." width="85%">
                            <div class="card-body">
                                <li style="font-size: 12px;"><?php echo $r['ten']?></li> <br>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
       </div>       
    </div>

    <div class="wrapper_trang_phuc">
        <p id="close_trang_phuc" onclick="dong_trang_phuc()">&times;</p>
       <div class="contain_trang_phuc container">
                    <h1 style="text-align: center; font-weight: 600;">TRANG PHỤC</h1>
            <div class="row">
            <?php if(!empty($data_trang_phuc)){?>
                <?php foreach($data_trang_phuc as $r){?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="card"
                            style="border:3px solid white; width: 90%; background: black; color: yellow;border-radius: 5px;">
                                <img style="height: 20vh;" src="<?php echo $r['anh']?>" class="card-img-top" alt="..." width="85%">
                            <div class="card-body">
                                <li style="font-size: 12px;"><?php echo $r['ten']?></li> <br>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
       </div>       
    </div>

    <div class="wrapper_linh_thu">
        <p id="close_linh_thu" onclick="dong_linh_thu()">&times;</p>
       <div class="contain_linh_thu container">
                    <h1 style="text-align: center; font-weight: 600;">LINH THÚ</h1>
            <div class="row">
            <?php if(!empty($data_linh_thu)){?>
                <?php foreach($data_linh_thu as $r){?>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="card"
                            style="border:3px solid white; width: 90%; background: black; color: yellow;border-radius: 5px;">
                                <img style="height: 20vh;" src="<?php echo $r['anh']?>" class="card-img-top" alt="..." width="85%">
                            <div class="card-body">
                                <li style="font-size: 12px;"><?php echo $r['ten']?></li> <br>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
       </div>       
    </div>
    <center>
        <div class="container contain_tai_khoan_de_xuat">
            <div class="row">
                <h1 style="padding: 10px; font-weight: 600;color: orange;">TÀI KHOẢN LIÊN QUAN</h1>
                <?php foreach($data_tk_lien_quan as $row){?>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card card-product" style="width: 85%; height: 95%;">
                            <div class="contain_img">
                                <img src="<?php echo $row['anh']?>" class="card-img-top" height="150px">
                            </div>
                                                
                            <div class="card-body">                       
                                <div class="banaccLMHT" style="font-size: 14px; font-weight: 550;">
                                    <p style="font: 17px; border: none; text-align: center;">LIÊN MINH HUYỀN THOẠI</p>
                                </div>                
                                                    
                                <li>ID: <?php echo $row['id_tai_khoan']?></li>
                                <li>Tướng : <?php echo $row['sl_tuong']?></li>
                                <li>Trang phục : <?php echo $row['sl_trang_phuc']?></li>
                                <li>Mức Rank: <?php echo $row['rank']?></li>	              
                                <li><span style="font-weight: 600;">Giá: <?php echo $format_number_1 = number_format($row['giahientai'])?> VNĐ</span></li>
                                          
                                <a href="?act=detail&id_taikhoan=<?php echo $row['id_tai_khoan']?>&id_danhmuc=<?php echo $row['id_danhmuc']?>" class="btn">CHI TIẾT</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </center>
    
