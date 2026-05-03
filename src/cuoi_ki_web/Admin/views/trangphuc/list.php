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
<h2 style="text-align: center;">Quản lí trang phục</h2>
<a href="?mod=quanlitrangphuc&act=add" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered" id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên trang phuc</th>
      <th scope="col">Ảnh</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <td><?php echo $r['id']?></td>
        <td><?php echo $r['ten']?></td>
        <td><img style="width: 100px; height: 100px;" src="../<?php echo $r['anh']?>" alt=""></td>
        <td>
          <a href="?mod=quanlitrangphuc&act=edit&id=<?php echo $r['id']?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=quanlitrangphuc&act=delete&id=<?php echo $r['id']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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