<?php if(isset($_SESSION['username'])){?>
    <center>
        <div class="container" style="margin-top: 100px; background-color: white;height: 90vh;overflow: hidden;
    overflow-y: auto;
    overflow-x: hidden;">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" style="display: flex; justify-content: center;">
                    <button class="nav-link active" style="width: 250px; text-align: center; margin-top: 20px; color: rgb(221, 11, 11); font-weight: 600;" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-home" aria-selected="false"><i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin tài khoản</button>
                    <button class="nav-link" style="width: 250px; text-align: center; margin-top: 20px; color: rgb(221, 11, 11); font-weight: 600;" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-key" aria-hidden="true"></i> Đổi mật khẩu</button>
                    <button class="nav-link" style="width: 250px; text-align: center; margin-top: 20px;color: rgb(221, 11, 11); font-weight: 600;" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-history" aria-hidden="true"></i> Lịch sử giao dịch</button>
                    <button class="nav-link" style="width: 250px; text-align: center; margin-top: 20px;color: rgb(221, 11, 11); font-weight: 600;" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-history" aria-hidden="true"></i> Lịch sử nạp thẻ</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <!-- thông tin tài khoản -->
                <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab">
                    <style>
                        .table tbody tr td{
                            width: 300px;
                        }
                    </style>
                    <table class="table table-bordered border-dark" style="margin-top: 30px; width: 80%;">
                        <tbody>
                            <tr>
                                <td>Tên hiển thị</td>
                                <td><?php echo $_SESSION['username']?></td>
                            </tr>
                            <tr>
                                <td>Tên tài khoản</td>
                                <td><?php echo $_SESSION['username']?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $_SESSION['email']?></td>
                            </tr>
                            <tr>
                                <td>Ngày tham gia</td>
                                <td><?php echo $_SESSION['ngaytao']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- đổi mật khẩu -->

                <div class="tab-pane fade container" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row" style="display: block;">
                        <label for="passhientai" style="margin-top: 50px;">Mật khẩu hiện tại: </label>
                        <input type="password" id="passhientai" style="width: 40%; margin-bottom: 30px;">
                        <label for="passmoi">Mật khẩu mới: </label>
                        <input type="password" id="passmoi" style="width: 40%; margin-bottom: 30px;">
                        <label for="cfpassmoi">Nhập lại mật khẩu mới: </label>
                        <input type="password" id="cfpassmoi" style="width: 40%; margin-bottom: 30px;"><br>
                        <button onclick="thay_doi_mat_khau()" style="width: 40%; border: none; background-color: rgb(221, 11, 11); color: white; font-weight: 600;">THAY ĐỔI</button>
                    </div>
                </div>
      
                <!-- thông tin tìa khoản đã mua -->
                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <?php if(isset($data)){?>
                    <table class="table table-bordered border-dark" id="example1">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">ID tài khoản</th>
                                <th scope="col">Tài khoản</th>
                                <th scope="col">Mật khẩu</th>   
                                <th scope="col">Giá(VNĐ)</th>
                                <th scope="col">Khuyến mãi</th>
                                <th scope="col">Ngày mua</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ; 
                            foreach($data as $r){?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $r['id_tai_khoan']?></td>
                                    <td><?php echo $r['taikhoan'] ?></td>
                                    <td><?php echo $r['matkhau']?></td>
                                    <td><?php echo $format_number_1 = number_format($r['gia']);?></td>
                                    <td><?php echo $r['ten']?></td>
                                    <td><?php echo $r['ngaymua']?></td>
                                    <td><a href="?act=detail&id_taikhoan= <?php echo $r['id_tai_khoan']?>" class="btn btn-dark" style="width: 100%;">Xem</a></td>
                                </tr>
                            <?php  $i++;} ?>
                        </tbody>
                    </table>
                    <?php }else{?>
                        <h1 style="margin-top: 50px;">KHÔNG CÓ DỮ LIỆU</h1>
                    <?php } ?>
                </div>
                <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
          
            </div>
        </div>
    </center>
<?php } ?>
<script>
    $(document).ready(function() {
    $('#example1').DataTable();
  });
</script>
