
//hàm check đăng nhập
function checkdangki(){
    var username = $("#username1").val();
	var password = $("#password1").val();
	var cfpassword = $("#cfpassword").val();
	var email = $("#email").val();
    var error = $("#error1");
	var noidung = "Mã dăng kí của bạn là: ";
    // resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
		error.html("");

		// Kiểm tra nếu username rỗng thì báo lỗi
		if (username == "") {
			error.html("Tên đăng nhập không được để trống");
			return false;
		}
		// Kiểm tra nếu password rỗng thì báo lỗi
		if (password == "") {
			error.html("Mật khẩu không được để trống");
			return false;
		}
		// Kiểm tra nếu cfpassword rỗng thì báo lỗi
		if (cfpassword == "") {
			error.html("Mật khẩu nhập lại không được để trống");
			return false;
		}
		// Kiểm tra email nếu rỗng thì báo lỗi
		if (email == "") {
			error.html("Email không được để trống");
			return false;
		}
		// Kiểm tra 2 mk có khớp hay không
		if (cfpassword != password ) {
			error.html("Mật khẩu nhập lại không khớp !!!");
			return false;
		}

		//kiểm tra tài khoản có tồn tại hay không
		$.ajax({
			url: "view/checktaikhoancostontai.php",
			method: "GET",
			data: { username : username, password : password },
			success : function(response){
				if (response == "1") {
					error.html("Tài khoản đã tồn tại !!!");
				}else if(response == 0){
					// Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
					// để kiểm tra thông tin đăng nhập hợp lệ hay chưa
					$.ajax({
						url: "view/checkTonTaiEmail.php",
						method: "GET",
						data: { email : email },
						success : function(response){
							if (response >= 1) {
								swal("Fail","Tài khoản email đã được đăng kí vui lòng sử dụng tài khoản khác", "error");
							}else{
								//kiểm tra mail có đúng không bằng cách gữi mã về mail
								var maxacnhan = Math.floor(Math.random() * (9999 + 1 - 1000)) + 1000;
								$.ajax({
									url: "mail/sendemail.php",
									method: "GET",
									data: { email : email, maxacnhan : maxacnhan,noidung : noidung },
									success : function(response){
										if (response == 1) {
											//nhập mã xác nhận
											swal("Hãy nhập mã xác nhận mà chúng tôi vừa gửi về email của bạn :", {
												content: "input",
											})
											.then((value) => {
												if(value == maxacnhan){

													//xử lí đăng kí
													$.ajax({
														url: "view/checkdangki.php",
														method: "GET",
														data: { username : username, password : password , email : email },
														success : function(response){
															if (response == 1) {
																swal("Success","Đăng kí tài khoản thành công", "success");
															}else{
																error.html("Tài khoản tồn tại");
															}
														}
													});
												}else{
													swal("Fail","Mã xác nhận không khớp vui lòng đăng kí lại tài khoản.","error");
												}
											});
										}else{
											error.html("Lỗi gửi mã mong quý khách thông cảm, f5 để thử lại.");
										}
									}
								});
							}
						}
					});
				}
			}
		});
	}

	
	function checkdangnhap(){
		var username = $("#username").val();
		var password = $("#password").val();
		var remember = document.getElementById("remember").checked;
		var error = $("#error");
		// resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
			error.html("");
	
			// Kiểm tra nếu username rỗng thì báo lỗi
			if (username == "") {
				error.html("Tên đăng nhập không được để trống");
				return false;
			}
			// Kiểm tra nếu password rỗng thì báo lỗi
			if (password == "") {
				error.html("Mật khẩu không được để trống");
				return false;
			}
	
			// Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
			// để kiểm tra thông tin đăng nhập hợp lệ hay chưa
			$.ajax({
			  url: "view/checkdangnhap.php",
			  method: "GET",
			  data: { username : username, password : password, remember : remember },
			  success : function(response){
				  if (response == "1") {
					window.location.reload();
				  }else{
					error.html("Tài khoản hoặc mật khẩu không chính xác !!!");
				  }
			  }
			});
	
		}

		// hàm đăng xuất
		function dang_xuat(){
			$.ajax({
				url: "view/ajax_dang_xuat.php",
				method: "GET",
				data: { },
				success : function(response){
					window.location = "?act=home";
				}
			  });
		}
// hàm lọc dữ liệu 
function locdulieu(danhmuc,trang){
    var tuong = document.getElementById("tuong").value;
	var linhthu = document.getElementById("linhthu").value;
	var trangphuc = document.getElementById("trangphuc").value;
	var hang = document.getElementById("hang").value;
	var giatienden = document.getElementById("giatienden").value;
	var giatientu = document.getElementById("giatientu").value;
	var danhmuc = danhmuc;
	var trang = trang;
	var contain = $("#contain_taikhoan");
		$.ajax({
		  url: "view/locdatataikhoan.php",
		  method: "GET",
		  data: {tuong : tuong, linhthu : linhthu, trangphuc : trangphuc, hang : hang, giatienden : giatienden,giatientu : giatientu,danhmuc : danhmuc,trang : trang },
		  success : function(response){
			contain.html(response);
		  }
		});

	}
// mở tướng
	function mo_tuong(){

    	document.querySelector('.wrapper_tuong').classList.add('active');
	};
	// đóng tướng
	function dong_tuong(){
		document.querySelector('.wrapper_tuong').classList.remove('active');
	};

//xử lí thay đổi mật khẩu
function thay_doi_mat_khau(){
	var passmoi = document.getElementById("passmoi").value;
	var passhientai = document.getElementById("passhientai").value;
	var cfpassmoi = document.getElementById("cfpassmoi").value;
	

	if (passhientai == "") {
		swal("ERROR","Mật khẩu hiện tại không được để trống","error");;
		return false;
	}

	if (passmoi == "") {
		swal("ERROR","Mật khẩu mới không được để trống","error");;
		return false;
	}

	if (cfpassmoi == "") {
		swal("ERROR","Nhập lại mật khẩu mới không được để trống","error");;
		return false;
	}

	if (cfpassmoi != passmoi) {
		swal("ERROR","Mật khẩu nhập lại không khớp","error");;
		return false;
	}
	//kiểm tra mật khẩu hiện tại có đúng không
	$.ajax({
		url: "view/kiem_tra_mk_hien_tai.php",
		method: "GET",
		data: { passhientai : passhientai},
		success : function(response){
			if(response == 1)
			{
				//xử lí thay đổi mật khẩu
				$.ajax({
					url: "view/ajax_thay_doi_mat_khau.php",
					method: "GET",
					data: { passmoi : passmoi },
					success : function(response){
					  if(response == 1)
					  {
						swal("SUCCESS","Thay đổi mật khẩu thành công","success")
						.then((value) => {
							window.location = "?act=home";
						});
						
					  }
					  else{
						swal("ERROR",response,"error");
					  }
					}
				  });
			}else{
				swal("ERROR","Mật khẩu hiện tại không đúng!!!","error");
			}
		}
	});
}

// xử lí mua acc game
function xulimuaacc(id_tai_khoan, gia, email,id_km){
	swal({
		title: "Xác nhận",
		text: "Bạn có muốn mua tài khoản id: "+id_tai_khoan+" có giá "+gia+" VNĐ không?",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
			$.ajax({
				url: "view/xu_li_mua_acc.php",
				method: "GET",
				data: {gia : gia, id_tai_khoan : id_tai_khoan, id_km : id_km},
				success : function(response){
					if(response == 1)
					{
						swal("Thank you","Cảm ơn bạn đã ủng hộ shop của chúng tôi, bạn có thể vào phần lịch sử giao dịch trong mục quản lí tài khoản để xem thông tin tài khoản bạn vừa thanh toán, nếu có vấn đề bạn hãy liên hệ đến SĐT: 123456789 để được tư vấn.", {
							icon: "success",
						  }).then((s) => {
							if(s){
								window.location.reload();
							}
						  });
						
					}else{
						swal("Error",response, {
							icon: "error",
						  });
					}
				}
			  });
		}
	  });
}
// mở trang phục
function mo_trang_phuc(){
	document.querySelector('.wrapper_trang_phuc').classList.add('active');
};

function dong_trang_phuc(){

	document.querySelector('.wrapper_trang_phuc').classList.remove('active');
};


// mở linh thú
function mo_linh_thu(){
	document.querySelector('.wrapper_linh_thu').classList.add('active');
};

function dong_linh_thu(){
	document.querySelector('.wrapper_linh_thu').classList.remove('active');
};


document.querySelector('.show-popup-login').addEventListener('click', function(){

    document.querySelector('.popup-login-signup').classList.add('active');
});
//mở dăng nhập khi bấm vào mua tài khoản lúc chưa đăng nhập
	function mo_dang_nhap(){
		document.querySelector('.popup-login-signup').classList.add('active');
	}


document.querySelector('#close-pop-up').addEventListener('click', function(){

    document.querySelector('.popup-login-signup').classList.remove('active');
});

document.querySelector('#show-login').addEventListener('click', function(){

    document.querySelector('.popup-login-signup .login').classList.remove('active');
    document.querySelector('.popup-login-signup .signup').classList.remove('active');

});

document.querySelector('#show-signup').addEventListener('click', function(){

    document.querySelector('.popup-login-signup .login').classList.add('active');
    document.querySelector('.popup-login-signup .signup').classList.add('active');
});


