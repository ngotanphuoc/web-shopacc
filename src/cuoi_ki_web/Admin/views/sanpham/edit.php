<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <?php if (isset($_COOKIE['msg'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
           </div>
       <?php } ?>
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
       <form action="?mod=quanlisanpham&act=edit&id=<?php echo $_GET['id']?>" method="POST" role="form" enctype="multipart/form-data">
           <?php foreach($data as $r){?>
            <div class="form-group">
               <label for="">Tài khoản</label>
               <input type="text" class="form-control" id="" placeholder="" name="taikhoan" value="<?php echo $r['taikhoan']?>">
           </div>
           <div class="form-group">
               <label for="">Mật khẩu</label>
               <input type="text" class="form-control" id="" placeholder="" name="matkhau" value="<?php echo $r['matkhau']?>">
           </div>
           <div class="form-group">
               <label for="">Ảnh Thumbnail</label>
               <img style="width: 50%; height: 40vh;" src="../<?php echo $r['anh']?>" alt="">
               <input type="file" class="form-control" id="" placeholder="" name="anh" value="<?php echo $r['anh']?>">
           </div>
           <div class="form-group">
               <label for="">Rank</label>
               <input type="text" class="form-control" id="" placeholder="" name="rank" value="<?php echo $r['rank']?>">
           </div>
           <div class="form-group">
               <label for="">Giá tiền</label>
               <input type="text" class="form-control" id="" placeholder="" name="gia" value="<?php echo $r['giahientai']?>">
           </div>
           <div class="form-group">
               <label for="">Danh mục</label>
               <select name="danhmuc" id="">
                    <?php foreach($danhmuc as $r1){?>
                        <?php if($r['id_danhmuc'] == $r1['id_danhmuc']){?>
                            <option selected value="<?php echo $r1['id_danhmuc']?>" ><?php echo $r1['ten']?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $r1['id_danhmuc']?>"><?php echo $r1['ten']?></option>
                    <?php }} ?>
               </select>
           </div>
           <div class="form-group">
               <label for="">Khuyến mãi</label>
               <select name="khuyenmai" id="">
                    <?php foreach($khuyemmai as $r2){?>
                        <?php if($r['id_km'] == $r2['id_km']){?>
                            <option selected value="<?php echo $r2['id_km']?>" ><?php echo $r2['ten']?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $r2['id_km']?>"><?php echo $r2['ten']?></option>
                    <?php }} ?>
               </select>
           </div>
           <div class="form-group">
               <label for="">Trạng thái</label>
               <select name="trangthai" id="">
                    <?php if($r['trangthai'] == 0){?>
                        <option value="0" selected>Đã bán</option>
                    <?php }else{ ?>
                        <option value="0" selected>Đã bán</option>
                    <?php }?>

                    <?php if($r['trangthai'] == 1){?>
                        <option value="1" selected>Đang bán</option>
                    <?php }else{ ?>
                        <option value="1">Đang bán</option>
                    <?php }?>
               </select>
           </div>
           <div class="form-group">
               <label for="">Số lượng tướng</label>
               <input type="text" class="form-control" id="" placeholder="" name="sltuong" value="<?php echo $r['sl_tuong']?>">
           </div>
           <div class="form-group">
               <label for="">Số lượng trang phục</label>
               <input type="text" class="form-control" id="" placeholder="" name="sltrangphuc" value="<?php echo $r['sl_trang_phuc']?>">
           </div>
           <div class="form-group">
               <label for="">Số lượng linh thú</label>
               <input type="text" class="form-control" id="" placeholder="" name="sllinhthu" value="<?php echo $r['sl_linh_thu']?>">
           </div>
           <?php } ?>
           <button type="submit" class="btn btn-primary">Cập nhật</button>
       </form>
   </table>