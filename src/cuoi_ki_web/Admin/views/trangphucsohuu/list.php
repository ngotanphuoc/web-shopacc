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
<h2 style="text-align: center;">Quản lí trang phục sở hữu</h2>
<a href="?mod=quanlitrangphucsohuu&act=add&id=<?php echo $_GET['idtaikhoan']?>" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered" id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">ID tướng</th>
      <th scope="col">Tên tướng</th>
      <th scope="col">Ảnh</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <th scope="row"><?php echo $r['id']?></th>
        <?php $obj = new quanLiTrangPhucSoHuu(); $data = $obj->listTrangPhucById($r['id']);
        foreach($data as $r1){?>
            <td><?php echo $r1['ten']?></td>
            <td><img style="width: 90%; height: 20vh;" src="../<?php echo $r1['anh']?>" alt=""></td>
        <?php } ?>
 
        <td>
          <a href="?mod=quanlitrangphucsohuu&act=delete&id=<?php echo $r['id_sohuu']?>&idtaikhoan=<?php echo $r['id_tai_khoan']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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