<?php
include('../model/shop.php');
    $linhthu = $_GET['linhthu'];
    $trangphuc = $_GET['trangphuc'];
    $tuong = $_GET['tuong'];
    $giatienden = $_GET['giatienden'];
    $giatientu = $_GET['giatientu'];
    $hang = $_GET['hang'];
    $danhmuc = $_GET['danhmuc'];
    $obj = new Shop();
    $trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
    $limit = 9;
    $start = ($trang - 1) * $limit;
    $data = $obj->danh_sach_san_pham_sau_khi_loc($danhmuc,$linhthu,$tuong,$giatientu,$giatienden,$trangphuc,$hang,$start,$limit);
    $tong_so_tai_khoan = $obj->dem_so_tai_khoan($danhmuc,$linhthu,$tuong,$giatientu,$giatienden,$trangphuc,$hang);

?>
                <?php if(!empty($tong_so_tai_khoan)){?>
                    <p style="margin-top: 20px; font-size: 20px; font-weight: 600;color:orange;">Có <?php echo $tong_so_tai_khoan?> tài khoản</p>
                <?php } ?>
                <div class="row">
                    <?php
                    if(!empty($data))
                    { 
                        foreach( $data as $row){?>
                                <div class="col-lg-4 col-sm-6 mb-4">
                                    <div class="card card-product" style="width: 85%; height: 95%;">
                                        <div class="contain_img">
                                            <img src="<?php echo $row['anh']?>" class="card-img-top" height="150px">
                                        </div>
                                        
                                        <div class="card-body">                       
                                        <div class="banaccLMHT" style="font-size: 14px; font-weight: 550;">
                                                <p style="font: 17px; border: none; text-align: center;">LIÊN MINH HUYỀN THOẠI</p>
                                            </div>                
                                            
                                            <li>ID: <?php echo $row['id_tai_khoan']?></li>
                                            <li>Tướng : <?php $obj = new Shop(); $data = $obj->dem_so_tuong_theo_id($row['id_tai_khoan']); foreach($data as $r){if(empty($r['sltuong'])){echo 0;}else{echo $r['sltuong'];}} ?></li>
                                            <li>Trang phục : <?php $data1 = $obj->dem_so_trang_phuc_theo_id($row['id_tai_khoan']); foreach($data1 as $r){if(empty($r['sltrangphuc'])){echo 0;}else{echo $r['sltrangphuc'];}} ?></li>
                                            <li>Mức Rank: <?php echo $row['rank']?></li>	              
                                            <?php $obj = new shop(); foreach($data = $obj->listKhuyenMaiTheoId($row['id_km']) as $r){ $giatri = $r['giatri'];$ten = $r['ten'];}
                                            if($giatri != 0){?>   
                                               <li><span>Giá hiện tại: <?php $gia = $row['giahientai'] - $row['giahientai']*($giatri/100); echo number_format($gia); ?> VNĐ</span></li>
                                               <li style="color: gray; text-decoration: line-through;" >Giá cũ: <?php echo number_format($row['giahientai'])?> VNĐ</li>
                                               <li>Khuyến mãi: <?php echo $ten?></li>
                                            <?php }else{ ?>  
                                                <li><span> Giá: <?php echo number_format($row['giahientai'])?> VNĐ</span></li>
                                            <?php } ?>                                
                                            <a href="?act=detail&id_taikhoan=<?php echo $row['id_tai_khoan']?>&id_danhmuc=<?php echo $row['id_danhmuc']?>" class="btn">CHI TIẾT</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }} else{?>
                                <h1 style="color: orange;">không tìm thấy tài khoản</h1>
                            <?php } ?> 
	            </div>
                <div class="row">
						<div class="col-sm-12">
							<div class="pagnation-ul">
								<ul class="clearfix" style=" display: flex; justify-content: center;">
									<?php if ($tong_so_tai_khoan > 9) {
                                        if($tong_so_tai_khoan % 9 == 0)
                                        {
                                            for ($i = 1; $i <= $tong_so_tai_khoan / 9; $i++) { ?>
                                            <?php if(!empty($_GET['trang']) and $_GET['trang']== $i){?>
                                                <li style="list-style: none; margin-left: 2px; background-color: white; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: orange; font-weight: 600;cursor: pointer;" onclick="locdulieu(<?php echo $danhmuc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                            <?php }else{ ?>
                                                <li style="list-style: none; margin-left: 2px; background-color: black; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: white; font-weight: 600;cursor: pointer;" onclick="locdulieu(<?php echo $danhmuc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                            <?php }}?>
                                       <?php } else{ for ($i = 1; $i <= ($tong_so_tai_khoan / 9)+1; $i++) {?>
                                        <?php if(!empty($_GET['trang']) and $_GET['trang']== $i){?>
                                                <li style="list-style: none; margin-left: 2px; background-color: white; width: 30px;border-radius: 5px;"><a onclick="locdulieu(<?php echo $danhmuc?>,<?php echo $i?>)" style="text-decoration: none;color: orange; font-weight: 600; cursor: pointer;"><?= $i ?></a></li>
                                            <?php }else{ ?>
                                                <li style="list-style: none; margin-left: 2px; background-color: black; width: 30px;border-radius: 5px;"><a style="text-decoration: none;color: white; font-weight: 600;cursor: pointer;" onclick="locdulieu(<?php echo $danhmuc?>,<?php echo $i?>)"><?= $i ?></a></li>
                                        <?php }}}} ?>
								</ul>
							</div>
						</div>
				</div>