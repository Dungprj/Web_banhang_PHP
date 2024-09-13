<?php
// kiểm tra xem 'khachhang_id' có tồn tại trong session
if(isset($_SESSION['khachhang_id']))
{
	$khachhang_id = $_SESSION['khachhang_id']; //gán giá trị(nếu có tồn tại)
}

if(!isset($_SESSION['khachhang_id']))
{
	echo "<script>alert('chưa đăng nhập !')</script>";// đưa ra cảnh báo : chưa đăng nhập
	die(); //dừng thực thi
}
// Kiểm tra xem có dữ liệu nào được gửi đến server thông qua phương thức POST với tên là 'capnhatthongtin' hay không
// tạo hàm cập nhật thông tin
 if(isset($_POST['capnhatthongtin'])){
	// lấy dữ liệu từ form
	$name= $_POST['name']; // dữ liệu của nhập trên màn hình gán cho biến $name
   	$address = $_POST['address'];
   	$phone = $_POST['phone'];
   	$note = $_POST['note'];
   	// cập nhập bảng tbl_khachhang với các thông tin name, address, phone,note
   	$sql_update = mysqli_query($con, "UPDATE tbl_khachhang SET name ='$name', address = '$address', phone = '$phone', note = '$note' WHERE khachhang_id = '$khachhang_id'");
}
?>

</style>
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- trang tiêu đề -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Thông tin cá nhân
			</h3>
			<?php
			// lấy thông tin hiện tại của khách hàng đang đăng nhập từ bảng tbl_khachhang
			$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id = '$khachhang_id'");
			$row_capnhat = mysqli_fetch_array($sql_select_khachhang);// lưu kết quả đã cập nhập
			?>

            <div class="modal-content">
				<div class="modal-body">
					<!-- from cập nhập thông tin khách hàng -->
					<form action="" method="post">
						<!-- nhập tên khách hàng và hiển thị(bắt buộc điền)   -->
						<div class="form-group">
							<label class="col-form-label">Tên khách hàng</label>
							<input type="text" class="form-control" placeholder=" " name="name" value="<?php echo $row_capnhat['name'] ?>" required="required">
						</div>
						<!-- hiển thị email khách hàng(chỉ đọc)  -->
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" readonly value="<?php echo $row_capnhat['email'] ?>" required="required">
						</div>
						<!-- nhập số điện thoại và hiển thị(bắt buộc điền) -->
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" placeholder=" " name="phone" value="<?php echo $row_capnhat['phone'] ?>" required="required">
						</div>
						<!-- nhập địa chỉ và hiển thị (bắt buộc điền)-->
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input type="text" class="form-control" placeholder=" " name="address" value="<?php echo $row_capnhat['address'] ?>" required="required">
						</div>
						<!-- nhập ghi chú và hiển thị(không bắt buộc điền) -->
						<div class="form-group">
							<label class="col-form-label">Ghi chú</label>
							<input type="text" class="form-control" placeholder=" " name="note" value="<?php echo $row_capnhat['note'] ?>" >

						</div>
						<!-- nút submit để cập nhập thông tin -->
						<div class="right-w3l">
							<input type="submit" class="form-control" name="capnhatthongtin" value="Cập nhật">
						</div>
					
					</form>
				</div>
			</div>
			<!--kiểm tra người dùng đã đăng nhập chưa -->
			<?php
			if(!isset($_SESSION['dangnhap_home'])){ 
			?>

			<?php
			} 
			?>
		</div>
	</div>
	<!-- //checkout page -->

</script>

