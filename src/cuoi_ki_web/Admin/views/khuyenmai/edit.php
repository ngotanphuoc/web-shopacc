<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
       <form action="?mod=quanlikhuyenmai&act=edit&id=<?php echo $_GET['id']?>" method="POST" role="form" enctype="multipart/form-data">
        <?php foreach($data as $r){?>
            <div class="form-group">
               <label for="">Tên khuyến mãi</label>
               <input type="text" class="form-control" required id="" placeholder="" name="ten" value="<?php echo $r['ten']?>">
           </div>
           <div class="form-group">
               <label for="">Giá trị khuyến mãi(%)</label>
               <input type="number" min= "1" required class="form-control" id="" placeholder="" name="giatri" value="<?php echo $r['giatri']?>">
           </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        <?php } ?>
       </form>
   </table>