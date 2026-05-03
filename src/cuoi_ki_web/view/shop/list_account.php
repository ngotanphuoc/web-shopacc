                    <?php 
                        if(!empty($list_tai_khoan))
                        {
                            foreach( $list_tai_khoan as $row){?>
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
                                            <a href="?act=detail&id_taikhoan=<?php echo $row['id_tai_khoan']?>&id_danhmuc=<?php echo $row['id_danhmuc']?>&id_loai_game=<?php echo $id_loai_game?>" class="btn">CHI TIẾT</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }}else{?>
                                <h1 style="color: orange;">không tìm thấy tài khoản nào</h1>
                            <?php } ?> 