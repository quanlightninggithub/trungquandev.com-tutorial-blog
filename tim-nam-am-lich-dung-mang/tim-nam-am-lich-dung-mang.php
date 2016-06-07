<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tìm năm âm lịch(dùng mảng)</title>
</head>

<body>
	<?php
		if(isset($_POST["ok"]))
		{
			$nam_dl = $_POST["nam"];
			$mang_can = array("Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỉ","Canh","Tân","Nhâm");
			$mang_chi = array("Hợi","Tý","Sửu","Dần","Mão","Thìn","Tỵ","Ngọ","Mùi","Thân","Dậu","Tuất");
			$mang_hinh = array("lon.jpeg","chuot.jpg","trau.jpg","ho.jpeg","meo.jpg","rong.jpg","ran.jpg","ngua.jpg","de.jpg",
								"khi.jpg","ga.jpg","cho.jpg");
			
			$nam_dl = $nam_dl - 3;
			$can = $nam_dl%10;
			$chi = $nam_dl%12;
			$nam_al = $mang_can[$can]." ".$mang_chi[$chi];
			$hinh = $mang_hinh[$chi];
			$hinh_anh = "<img src='12con%20giap/$hinh'>";
		}
	?>
    <br />
    <br />
    <br />
<form action="tim-nam-am-lich-dung-mang.php" method="post" enctype="multipart/form-data">
  
    	<table style="font-size:20px;" width="630" height="337" border="0" align="center" cellpadding="2" cellspacing="2">
    	  <tr>
    	    <td height="70" colspan="2" bgcolor="#8CC6FF"><div align="center"><strong><em>Chuyển đổi năm Dương Lịch -> Âm Lịch</em></strong></div></td>
   	      </tr>
    	  <tr>
    	    <td width="162" height="68" bgcolor="#8CC6FF"><div align="center">Nhập năm bất kỳ:</div></td>
    	    <td width="268" bgcolor="#8CC6FF"><div align="center">
  	          <input type="number" name="nam" value="<?php if(isset($_POST["nam"])){echo $_POST["nam"];} ?>" />
  	      </div></td>
  	    </tr>
        <tr bgcolor="#33CC00">
        	<td height="119" colspan="2" bgcolor="#8CC6FF"><div align="center">
        	  <input style="background-color:#0F0; width:100px; height:30px;" type="submit" value="Chuyển" name="ok" />
              <br />
              <br />
              <strong style="color:#000"> Kết quả: <?php if(isset($_POST["nam"])){echo "Năm ".$_POST["nam"]." là năm ".$nam_al; echo "<br> <br>"; echo $hinh_anh;} ?> </strong>
      	  </div></td>
          </tr>
  	  </table>
</form>
<h4 style="float:right;margin-right:450px;"><a href="https://www.facebook.com/lightning.quan" target="_blank">Trung Quân</a></h4>
</body>
</html>