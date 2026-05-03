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
<h2 style="text-align: center;">Quản lí danh mục</h2>
<a href="?mod=quanlidanhmuc&act=add" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered" id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên</th>
      <th scope="col">Ảnh</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <th scope="row"><?php echo $r['id_danhmuc']?></th>
        <td><?php echo $r['ten']?></td>
        <td><img src="../<?php echo $r['anh']?>" alt=""></td>   
        <td>
          <a href="?mod=quanlidanhmuc&act=edit&danhmuc=<?php echo $r['id_danhmuc']?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=quanlidanhmuc&act=delete&danhmuc=<?php echo $r['id_danhmuc']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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