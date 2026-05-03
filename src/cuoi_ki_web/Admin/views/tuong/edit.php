<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
       <form action="?mod=quanlituong&act=edit&id=<?php echo $_GET['id']?>" method="POST" role="form" enctype="multipart/form-data">
        <?php foreach($data as $r){?>
            <div class="form-group">
               <label for="">Tên tướng</label>
               <input type="text" class="form-control" id="" placeholder="" name="ten" value="<?php echo $r['ten']?>">
           </div>
           <div class="form-group">
               <label for="">Ảnh</label>
                <img src="../<?php echo $r['anh']?>" alt="">
               <input type="file" class="form-control" id="" placeholder="" name="anh" value="<?php echo $r['anh']?>">
           </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        <?php } ?>
       </form>
   </table>