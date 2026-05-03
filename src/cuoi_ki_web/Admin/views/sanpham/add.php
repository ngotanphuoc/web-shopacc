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
       <form action="?mod=quanlisanpham&act=store" method="POST" role="form" enctype="multipart/form-data">
           <div class="form-group">
               <label for="">Tài khoản</label>
               <input type="text" class="form-control" id="" placeholder="" name="taikhoan">
           </div>
           <div class="form-group">
               <label for="">Mật khẩu</label>
               <input type="text" class="form-control" id="" placeholder="" name="matkhau">
           </div>
           <div class="form-group">
               <label for="">Ảnh Thumbnail</label>
               <input type="file" class="form-control" id="" placeholder="" name="anh">
           </div>
           <div class="form-group">
               <label for="">Rank</label>
               <input type="text" class="form-control" id="" placeholder="" name="rank">
           </div>
           <div class="form-group">
               <label for="">Giá tiền</label>
               <input type="text" class="form-control" id="" placeholder="" name="gia">
           </div>
           <div class="form-group">
               <label for="">Danh mục</label>
               <select name="danhmuc" id="">
                    <?php foreach($data as $r){?>
                        <option value="<?php echo $r['id_danhmuc']?>"><?php echo $r['ten']?></option>
                    <?php } ?>
               </select>
           </div>
           <div class="form-group">
               <label for="">Khuyến mãi</label>
               <select name="khuyenmai" id="">
                    <?php foreach($data1 as $r){?>
                        <option value="<?php echo $r['id_km']?>"><?php echo $r['ten']?></option>
                    <?php } ?>
               </select>
           </div>
           <div class="form-group">
               <label for="">Trạng thái</label>
               <select name="trangthai" id="">
                    <option value="0">Đã bán</option>
                    <option value="1">Đang bán</option>
               </select>
           </div>
           <div class="form-group">
               <label for="">Số lượng tướng</label>
               <input type="text" class="form-control" id="" placeholder="" name="sltuong">
           </div>
           <div class="form-group">
               <label for="">Số lượng trang phục</label>
               <input type="text" class="form-control" id="" placeholder="" name="sltrangphuc">
           </div>
           <div class="form-group">
               <label for="">Số lượng linh thú</label>
               <input type="text" class="form-control" id="" placeholder="" name="sllinhthu">
           </div>
           
           <button type="submit" class="btn btn-primary">Tạo</button>
       </form>
   </table>