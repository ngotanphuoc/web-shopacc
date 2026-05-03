<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <?php if (isset($_COOKIE['msg'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
           </div>
       <?php } ?>
       <form action="?mod=quanlitaikhoan&act=store" method="POST" role="form" enctype="multipart/form-data">
           <div class="form-group">
               <label for="">Tài khoản</label>
               <input type="text" class="form-control" id="" placeholder="" name="taikhoan">
           </div>
           <div class="form-group">
               <label for="">Mật khẩu</label>
               <input type="password" class="form-control" id="" placeholder="" name="matkhau">
           </div>
           <div class="form-group">
               <label for="">Email</label>
               <input type="text" class="form-control" id="" placeholder="" name="email">
           </div>
           <div class="form-group">
               <label for="">Số dư</label>
               <input type="text" class="form-control" id="" placeholder="" name="sodu" value="0">
           </div>
           <div class="form-group">
               <label for="">Quyền hạn</label>
               <select name="quyenhan">
                    <?php foreach($data_quyen as $r){?>
                        <option value="<?php echo $r['maquyen']?>"><?php echo $r['tenquyen']?></option>
                    <?php } ?>
               </select>
           </div>
           <button type="submit" class="btn btn-primary">Tạo</button>
       </form>
   </table>