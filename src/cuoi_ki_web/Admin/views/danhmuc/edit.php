<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       <?php if (isset($_COOKIE['msg'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
           </div>
       <?php } ?>
       <?php if (isset($_COOKIE['msg1'])) { ?>
           <div class="alert alert-warning">
               <strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
           </div>
       <?php } ?>
       <form action="?mod=quanlidanhmuc&act=edit&iddanhmuc=<?php echo $iddanhmuc;?>" method="POST" role="form" enctype="multipart/form-data">
           <div class="form-group">
               <label for="">Tên danh mục </label>
               <input type="text" class="form-control" id="" placeholder="" name="tendanhmuc" value="<?php echo $tendanhmuc?>">
           </div>
           <div class="form-group">
               <label for="">Ảnh</label>
               <img src="<?php echo $anh?>" alt="">
               <input type="file" class="form-control" id="" placeholder="" name="anh">
           </div>
           <div class="form-group">
               <label for="">Loại game</label>
               <select name="idloaigame" id="">
                    <?php foreach($data1 as $r){?>
                        <?php if($r['id_loai_game']==$idloaigame){?>
                            <option value="<?php echo $r['id_loai_game']?>" selected><?php echo $r['ten']?></option>
                        <?php }else{?>
                            <option value="<?php echo $r['id_loai_game']?>"><?php echo $r['ten']?></option>
                        <?php } ?>
                    <?php } ?>
               </select>
           </div>
           <button type="submit" class="btn btn-primary">Tạo</button>
       </form>
   </table>