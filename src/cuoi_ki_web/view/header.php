
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="border-bottom: 2px solid black; z-index: 1; background-color: black;">
            <div class="container-fluid">
                <div class="logo"><a class="navbar-brand" href="?act=home"><img src="<?php echo $logo?>" alt=""></a></div>
                
                <button class="navbar-toggler" style="background-color: yellow; color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                            <a href="?act=home"><i class="fa fa-home" aria-hidden="true"></i> TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a href=""><i class="fa fa-usd" aria-hidden="true"></i> NẠP THẺ</a>
                        </li>
                        <li class="nav-item">
                            <a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> THÔNG TIN SHOP</a>
                        </li>
                        <?php if(empty($_SESSION['username']) and empty($_SESSION['password'])){?>
                            <li class="nav-item">
                                <button class="show-popup-login"><i class="fa fa-sign-in" aria-hidden="true"></i> ĐĂNG NHẬP</button> 
                            </li>    
                        <?php }else{?>
                            <li>
                                <div class="dropdown">
                                    <button class="dropbtn"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<i class="fa fa-chevron-down" style="font-size: 10px;" aria-hidden="true"></i></button>
                                    <div class="dropdown-content">
                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['username']?></a>
                                        <a href="#"><i class="fa fa-usd" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $format_number_1 = number_format($_SESSION['sodu'])?> VNĐ</a>
                                        <a href="?act=quanlitaikhoan"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Thông tin tài khoản</a>
                                        <?php if($_SESSION['maquyen'] == 2 || $_SESSION['maquyen'] == 3){?>
                                            <a href="Admin/index.php"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Trang quản trị</a>
                                        <?php } ?>

                                        <a href="" onclick="dang_xuat()"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Đăng xuất</a>
                                    </div>
                                </div>
                            </li> 
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="popup-login-signup">
            <p id="close-pop-up">&times;</p>

            <div class="login">
                
                    <h1>Đăng nhập</h1>
                    <p style="color: red; font-size: 15px; text-align: center; width: 100%; margin-top: -7px;" id="error"></p>
                    <label for="username"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản:</label>
                    <input type="text" placeholder="Enter username" id="username" value="<?php echo $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : "";?>">

                    <label for="password"><i class="fa fa-key" aria-hidden="true"></i> Mật khẩu:</label>
                    <input type="password" placeholder="Enter password" id="password" value="<?php echo $password = isset($_COOKIE['password']) ? $_COOKIE['password'] : "";?>">

                    <input type="checkbox" id="remember">
                    <label for="remember">Nhớ tài khoản</label>

                    <button style="background-color: black; color: white;" onclick="checkdangnhap()">Đăng nhập</button>
                    
                    <button>Quên mật khẩu?</button>    
                
                <button id="show-signup">Đăng kí</button>
            </div>

            <div class="signup">
                
                    <h1>Đăng kí</h1>
                    <p style="color: red; font-size: 15px; text-align: center; width: 100%; margin-top: -7px;" id="error1"></p>
                    <label for="username1"><i class="fa fa-user" aria-hidden="true"></i> Tài khoản:</label>
                    <input type="text" placeholder="Enter username" id="username1">

                    <label for="password1"><i class="fa fa-key" aria-hidden="true"></i> Mật khẩu:</label>
                    <input type="password" placeholder="Enter password" id="password1">

                    <label for="cfpassword"><i class="fa fa-key" aria-hidden="true"></i> Nhập lại mật khẩu:</label>
                    <input type="password" placeholder="Enter password" id="cfpassword">

                    <label for="email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email:</label>
                    <input type="email" placeholder="Enter email" id="email">

                    <input type="button" onclick="checkdangki()" value="Đăng kí" id="bt_signup">
                   
                <button style="border: 2px solid black; background-color: transparent; color: black;" id="show-login">Đăng nhập</button>
            </div>
        </div>
                            



