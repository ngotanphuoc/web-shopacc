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
<h2 style="text-align: center;">Quản lí sản phẩm</h2>
<a href="?mod=quanlisanpham&act=add" type="button" class="btn btn-primary" style="margin-bottom: 30px;">Thêm</a>
<table class="table table-bordered" id="example" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên tài khoản</th>
      <th scope="col">Mật khẩu</th>
      <th scope="col">Thumbnail</th>
      <th scope="col">Rank</th>
      <th scope="col">SL tướng</th>
      <th scope="col">SL trang phục</th>
      <th scope="col">SL linh thú</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Khuyến mãi</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Ngày đăng bán</th>
      <th scope="col">Giá tiền(VNĐ)</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($data as $r){?>
      <tr>
        <th scope="row"><?php echo $r['id_tai_khoan']?></th>
        <td><?php echo $r['taikhoan']?></td>
        <td><?php echo $r['matkhau']?></td>
        <td><img style="width: 300px;" src="../<?php echo $r['anh']?>" alt=""></td>
        <td><?php echo $r['rank']?></td>
        <td><?php echo $r['sl_tuong']?></td>
        <td><?php echo $r['sl_trang_phuc']?></td>
        <td><?php echo $r['sl_linh_thu']?></td>
        <td><?php if($r['trangthai'] == 1){
            echo "Đang bán";}else{
            echo "Đã bán";}?></td>
        <td><?php $obj = new quanLiSanPham(); $data = $obj->layTenKhuyenMaitheoid($r['id_km']);foreach($data as $r1){
          echo $r1['ten'];}?></td>
        <td><?php $obj1 = new quanLiSanPham(); $data1 = $obj->layTenDanhMuctheoid($r['id_danhmuc']); foreach($data1 as $r2){
            echo $r2['ten'];
        } ?></td>
        <td><?php echo $r['ngaytao']?></td>
        <td><?php echo number_format($r['giahientai'])?> VNĐ</td>
        <td>
          <a href="?mod=quanlituongsohuu&idtaikhoan=<?php echo $r['id_tai_khoan']?>" type="button" class="btn btn-primary">Thư viện tướng</a>
        </td>
        <td>
          <a href="?mod=quanlilinhthusohuu&idtaikhoan=<?php echo $r['id_tai_khoan']?>" type="button" class="btn btn-primary">Thư viện linh thú</a>
        </td>
        <td>
          <a href="?mod=quanlitrangphucsohuu&idtaikhoan=<?php echo $r['id_tai_khoan']?>" type="button" class="btn btn-primary">Thư viện trang phục</a>
        </td>
        <td>
          <a href="?mod=quanlianhsohuu&idtaikhoan=<?php echo $r['id_tai_khoan']?>" type="button" class="btn btn-primary">Thư viện ảnh</a>
        </td>
        <td>
          <a href="?mod=quanlisanpham&act=edit&id=<?php echo $r['id_tai_khoan']?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=quanlisanpham&act=delete&idtaikhoan=<?php echo $r['id_tai_khoan']?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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