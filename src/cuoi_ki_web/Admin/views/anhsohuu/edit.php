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
       <form action="?mod=quanlianhsohuu&act=edit&idtaikhoan=<?php echo $_GET['idtaikhoan'];?>&idsohuu=<?php echo $_GET['idsohuu']?>" method="POST" role="form" enctype="multipart/form-data">
           <div class="form-group">
            <?php foreach($data as $r){?>
               <label for="">Ảnh </label>
               <img style="width: 600px; height: 50vh;" src="../<?php echo $r['anh']?>" alt="">
               <input type="file" class="form-control" id="" placeholder="" name="anh">
            <?php } ?>
            </div>
           <button type="submit" class="btn btn-primary">Cập nhật</button>
       </form>
   </table>