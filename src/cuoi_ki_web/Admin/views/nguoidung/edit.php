<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
       <form action="?mod=quanlitaikhoan&act=edit&taikhoan=<?php echo $taikhoan?>" method="POST" role="form" enctype="multipart/form-data">

            <div class="form-group">
               <label for="">Tài khoản</label>
               <input type="text" class="form-control" id="" placeholder="" name="taikhoan" value="<?php echo $taikhoan?>">
           </div>
           <div class="form-group">
               <label for="">Mật khẩu</label>
               <input type="password" class="form-control" id="" placeholder="" name="matkhau" value="<?php echo $matkhau?>">
           </div>
           <div class="form-group">
               <label for="">Email</label>
               <input type="text" class="form-control" id="" placeholder="" name="email" value="<?php echo $email?>">
           </div>
           <div class="form-group">
               <label for="">Số dư</label>
               <input type="text" class="form-control" id="" placeholder="" name="sodu" value="0" value="<?php echo $sodu?>">
           </div>
           <div class="form-group">
               <label for="">Quyền hạn</label>
               <select name="quyenhan" >
                    <?php foreach($data_quyen as $r){?>
                        <?php if($maquyen == $r['maquyen']){?>
                            <option value="<?php echo $r['maquyen']?>" selected><?php echo $r['tenquyen']?></option>
                        <?php }else{?>
                            <option value="<?php echo $r['maquyen']?>"><?php echo $r['tenquyen']?></option>
                        <?php } ?>
                    <?php } ?>
               </select>
           </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>

       </form>
   </table>