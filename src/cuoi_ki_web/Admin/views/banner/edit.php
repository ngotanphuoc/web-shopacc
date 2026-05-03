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
       <form action="?mod=quanlibanner&act=edit&idbanner=<?php echo $_GET['idbanner'];?>" method="POST" role="form" enctype="multipart/form-data">
            <?php foreach($data as $r){?> 
                <div class="form-group">
                    <label for="">Ảnh banner</label>
                    <img src="<?php echo $r['anh'];?>" alt="">
                    <input type="file" class="form-control" id="" placeholder="" name="anh">
                </div>
                 <button type="submit" class="btn btn-primary">Cập nhật</button>
            <?php }?>
       </form>
   </table>