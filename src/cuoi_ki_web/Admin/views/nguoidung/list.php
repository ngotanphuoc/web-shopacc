<?php if (isset($_COOKIE['msg'])) { ?>
           <div class="alert alert-success">
               <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
           </div>
       <?php } ?>
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
<h2 style="text-align: center;">Quản lí tài khoản</h2>
<a href="?mod=quanlitaikhoan&act=add" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered" id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Tài khoản</th>
      <th scope="col">Email</th>
      <th scope="col">Số dư</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Quyền hạn</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <th scope="row"><?php echo $r['taikhoan']?></th>
        <td><?php echo $r['email']?></td>
        <td><?php echo $r['sodu']?></td>
        <td><?php echo $r['ngaytao']?></td>
        <td><?php if($r['maquyen'] == 1){ echo "Khách hàng";}else if($r['maquyen'] == 3){echo "Nhân viên";}else{echo "Quản trị viên";} ?></td>
       
        <td>
          <a href="?mod=quanlitaikhoan&act=edit&taikhoan=<?php echo $r['taikhoan']?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=quanlitaikhoan&act=delete&taikhoan=<?php echo $r['taikhoan']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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