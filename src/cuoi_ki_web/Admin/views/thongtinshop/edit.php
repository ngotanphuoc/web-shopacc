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
       <form action="?mod=quanlithongtinshop&act=edit&id=<?php echo $_GET['id'];?>" method="POST" role="form" enctype="multipart/form-data">
            <?php foreach($data as $r){?> 
                <div class="form-group">
                    <label for="">Ảnh logo</label>
                    <img style="width: 50%;" src="../<?php echo $r['anhlogo'];?>" alt="">
                    <input type="file" class="form-control" id="" placeholder="" name="anh">
                </div>

                <div class="form-group">
                    <label for="">Thông báo</label>
                    <input type="text" class="form-control" id="" placeholder="" name="thongbao" value="<?php echo $r['thongbao'];?>">
                </div>
                 <button type="submit" class="btn btn-primary">Cập nhật</button>
            <?php }?>
       </form>
   </table>