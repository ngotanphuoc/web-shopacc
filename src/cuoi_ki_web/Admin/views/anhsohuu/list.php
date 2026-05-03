<?php if (isset($_COOKIE['msg'])) { ?>
           <div class="alert alert-success">
               <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
           </div>
       <?php } ?>
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-success">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
<h2 style="text-align: center;">Quản lí ảnh sở hữu</h2>
<a href="?mod=quanlianhsohuu&act=add&idtaikhoan=<?php echo $_GET['idtaikhoan']?>" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered"  id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ảnh</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <th scope="row"><?php echo $r['id_sohuu']?></th>
      
          <td><img style="width: 70%; height: 50vh;" src="../<?php echo $r['anh']?>" alt=""></td>
 
        <td>
          <a href="?mod=quanlianhsohuu&act=delete&idsohuu=<?php echo $r['id_sohuu']?>&idtaikhoan=<?php echo $r['id_tai_khoan']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <a href="?mod=quanlianhsohuu&act=edit&idsohuu=<?php echo $r['id_sohuu']?>&idtaikhoan=<?php echo $r['id_tai_khoan']?>" type="button" class="btn btn-warning">Sửa</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
  });
</script>