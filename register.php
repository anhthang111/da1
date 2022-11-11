<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="max-w-6xl mx-auto">
    <?php 
    include 'ketnoi/connection.php';
    if (isset($_POST["btn_submit"])) {
      //lấy thông tin từ các form bằng phương thức POST
      $username = $_POST["username"];
      $password = $_POST["pass"];
     
      $email = $_POST["email"];
      //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
      if ($username == "" || $password == "" || $email == "") {
         echo "<div class ='text-center text-red-500 font-bold mt-5 ' >bạn vui lòng nhập đầy đủ thông tin </div>";
      }else{
          // Kiểm tra tài khoản đã tồn tại chưa
          $sql="select * from taikhoan where username='$username'";
        $kt=mysqli_query($conn, $sql);

        if(mysqli_num_rows($kt)  > 0){
          echo "<div class ='text-center text-red-500 font-bold mt-5 ' >Tài khoản đã tồn tại </div>";
        }else{
          //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO taikhoan(
              username,
              password,
              email
              ) VALUES (
              '$username',
              '$password',
              '$email'
              )";
            // thực thi câu $sql với biến conn lấy từ file connection.php
             mysqli_query($conn,$sql);
             echo "<div class ='text-center text-red-500 font-bold mt-5 ' >chúc mừng bạn đã đăng ký thành công</div>";
        }
                    
        
      }
}
    ?>
    <div class="bg-blue-200 w-full h-[400px]">

			<h1 class="text-center font-black font-bold text-[50px] my-5 ">Đăng Ký</h1>
      
      <form action="register.php" method="post">
		<table class="mx-auto">
	
			<tr>
				<td class="font-bold">Username :</td>
				<td class ="text-[20px]"><input type="text" id="username" name="username" size="50" ></td>
			</tr>
      
			<tr>
				<td class ="font-bold">Password :</td>
				<td  class ="text-[20px]" ><input type="password" id="pass" name="pass" size="50"></td>
			</tr>
			
			<tr>
				<td class="font-bold" >Email :</td>
				<td  class ="text-[20px]" ><input type="text" id="email" name="email" size="50"></td>
			</tr>
			<tr class ="">
				<td><input type="submit" name="btn_submit" class="border-2 text-white rounded-lg bg-black my-2 py-1 px-2" value=" Đăng Ký ">
       <td > <button class="border-2 text-white rounded-lg bg-black my-2 py-1 px-2"><a href="/duan1/login.php">Đăng Nhập Ngay</a></button></td>
			</tr>

		</table>
		
	</form>
  </div>
  
  </div>
</body>
</html>