<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
	<?php
    	/*
			Số tự mãn (Amstrong number) là số mà tổng các lũy thừa của các chữ số của nó bằng chính nó(đơn vị lũy thừa ở đây tùy)
			VD: 153 thì 1^3+5^3+3^3 = 153
				1634 thì 1^4 + 6^4 + 3^4 + 4^4 = 1634
			Chương trình dưới đây yêu cầu liệt kê ra các số amstrong nhỏ hơn 10000
			
			
		*/
		function dem_so_chu_so($n)
		{
			if($n>=0){
				$dem =0;
				do
				{
					$dem++;
					$n/=10;
				}
				while($n>=1); //chia 10 cho đến khi só $n nhỏ hơn 1 thì dừng lại
				
				return $dem;
			}
			else
			{
				echo 'yêu cầu nhập số dương';	
			}
		}
		//dem_so_chu_so(13); //đổi return ở hàm trên thành echo và chạy câu lệnh này là ok
		
		function is_Armstrong_Number($so)
		{
			if($so>=0){
				$so_mu = dem_so_chu_so($so);
				//echo $so_chu_so;
				$p = $so;
				$tong_luy_thua =0;
				while($so>0)//đến khi biểu thức trong while sai thì dừng
				{
					$k = $so%10; // lấy ra phần dư chính là từng chữ số trong số đó
					$tong_luy_thua += pow($k,$so_mu);
					$so/=10;
				}
				if($p == $tong_luy_thua)
				{
					return true;	
				}
				else
				{
					return false;
				}
			}
			else
			{
				echo 'yêu cầu nhập số dương';	
			}
		}
		//is_Amstrong_Number(153);
		function list_armstrong($limit)
		{
			(string)$ketqua = "";
			for($i=0;$i<$limit;$i++)
			{
				if(is_Armstrong_Number($i)==true)
				{
					$ketqua .= $i.' &nbsp;';
				}	
			}	
			return $ketqua;
		}
		if(isset($_POST["ok"]))
		{
			$limit = $_POST["limit"];
			$ketqua = list_armstrong($limit);
		}
	?>
    <br />
    <br />
    <br />
    <br />
    <form action="so-armstrong.php" method="post">
  
    	<table style="font-size:20px;" width="630" height="337" border="0" align="center" cellpadding="2" cellspacing="2">
    	  <tr>
    	    <td height="70" colspan="2" bgcolor="#71CDDA"><div align="center"><strong><em>Liệt Kê Danh Sách Số Armstrong</em></strong></div></td>
   	      </tr>
    	  <tr>
    	    <td width="162" height="68" bgcolor="#71CDDA"><div align="center">Nhập số giới hạn:</div></td>
    	    <td width="268" bgcolor="#71CDDA"><div align="center">
  	          <input type="number" name="limit" value="<?php if(isset($_POST["limit"])){echo $_POST["limit"];} ?>" />
  	      </div></td>
  	    </tr>
        <tr bgcolor="#33CC00">
        	<td height="119" colspan="2" bgcolor="#71CDDA"><div align="center">
        	  <input style="background-color:#0F0; width:100px; height:30px;" type="submit" value="Liệt Kê" name="ok" />
              <br />
              <br />
              <strong style="color:#000"> Kết quả: <?php if(isset($_POST["limit"])){echo $ketqua;} ?> </strong>
      	  </div></td>
          </tr>
  	  </table>
</form>
<h4 style="float:right;margin-right:450px;"><a href="https://www.facebook.com/lightning.quan" target="_blank">Trung Quân</a></h4>
</body>
</html>