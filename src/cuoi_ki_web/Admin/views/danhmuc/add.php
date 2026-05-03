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
       <form action="?mod=quanlidanhmuc&act=store" method="POST" role="form" enctype="multipart/form-data">
           <div class="form-group">
               <label for="">Tên danh mục </label>
               <input type="text" class="form-control" id="" placeholder="" name="tendanhmuc">
           </div>
           <div class="form-group">
               <label for="">Ảnh</label>
               <input type="file" class="form-control" id="" placeholder="" name="anh">
           </div>
           <div class="form-group">
               <label for="">Loại game</label>
               <select name="idloaigame" id="">
                    <?php foreach($data as $r){?>
                    <option value="<?php echo $r['id_loai_game']?>"><?php echo $r['ten']?></option>
                    <?php } ?>
               </select>
           </div>
           <button type="submit" class="btn btn-primary">Tạo</button>
       </form>
   </table>