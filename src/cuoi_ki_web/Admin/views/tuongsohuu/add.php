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
       <form action="?mod=quanlituongsohuu&act=store&id=<?php echo $_GET['id']?>" method="POST" role="form" enctype="multipart/form-data">
           <div class="form-group">
               <label for="">Tướng</label>
               <select name="tuong[]" class="states" multiple>
                    <?php foreach($data as $r){?>
                        <option value="<?php echo $r['id']?>"><?php echo $r['ten']?></option>
                    <?php } ?>
               </select>
           </div>
            <?php if(empty($data)){?>
                <p class="btn btn-primary">Tài khoản đã đủ tướng</p>
            <?php }else{?>
                <button type="submit" class="btn btn-primary">Tạo</button>
            <?php } ?>
       </form>
   </table>