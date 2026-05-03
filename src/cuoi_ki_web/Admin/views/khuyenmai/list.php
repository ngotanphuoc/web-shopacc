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
<h2 style="text-align: center;">Quản lí khuyến mãi</h2>
<a href="?mod=quanlikhuyenmai&act=add" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered" id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Mã khuyến mãi</th>
      <th scope="col">Tên khuyến mãi</th>
      <th scope="col">Giá trị khuyến mãi (%)</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <td><?php echo $r['id_km']?></td>
        <td><?php echo $r['ten']?></td>
        <td><?php echo $r['giatri']?></td>
        <td>
          <a href="?mod=quanlikhuyenmai&act=edit&id=<?php echo $r['id_km']?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=quanlikhuyenmai&act=delete&id=<?php echo $r['id_km']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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