<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Số bạn bè Friend Numbers</title>
</head>

<body>
	<?php
    	/*
			Để tìm cặp số bè bạn ta làm theo 2 bước sau:
			Bước 1: Xây dựng một hàm tính tổng các ước của một số nguyên
			Bước 2: Duyệt tất cả các số bắt đầu từ 2 cho đến số giới hạn, nếu tồn tại hai số i và j khác nhau mà tổng ước của số 				       				này bằng số kia thì in ra cặp i và j --- (i và j là một cặp friend number)
		*/
	?>
	<?php
		//Bước 1:
    	function tong_uoc_cua_mot_so_nguyen_da_toi_uu($so)
		{
			$tong_uoc=1; //vì 1 luôn là ước của 1 số bất kỳ nên tổng ban đầu bằng 1, và khi duyệt sẽ duyệt từ 2
			//vì các ước số sẽ không vượt quá căn bậc 2 của số nhập vào nên ta sẽ tối ưu
			$can = sqrt($so);
			for($i=2;$i<=$can;$i++)
			{
				if(($so%$i)==0) //và khi $i là 1 ước của $so thì ($so chia $i) cũng là 1 ước của $so
				{
					$tong_uoc = ($tong_uoc+$i+($so/$i));	
				}
			}
			return $tong_uoc;
		}
		function tong_uoc_cua_mot_so_nguyen_chua_toi_uu($so) //ví dụ hàm tính tổng ước này ta chưa tối ưu vòng lặp, vẫn lặp đến hết n
		{
			$s=1;
			for($i=2;$i<$so;$i++)
			{
				if($so%$i==0)
				{
					$s = ($s+ $i);	
				}	
			}
			return $s;
		}
		//echo tong_uoc_cua_mot_so_nguyen_da_toi_uu(8).'<br>';
		//echo tong_uoc_cua_mot_so_nguyen_chua_toi_uu(6);
		
		//Sang bước 2:
		function xac_dinh_so_be_ban_chua_toi_uu($limit)//thuật toán thông thường, chưa tối ưu, chạy sẽ lâu
		{
			for($i=2;$i<=$limit;$i++)
			{
				for($j=$i+1;$j<=$limit;$j++)	
				{
					if(tong_uoc_cua_mot_so_nguyen_da_toi_uu($i)==$j && tong_uoc_cua_mot_so_nguyen_da_toi_uu($j)==$i)
					{
						echo 'Cap so be ban: '.$i.' va '.$j.'<br>';
					}	
				}
			}
		}
		//echo xac_dinh_so_be_ban_chua_toi_uu(3000);//đã test dòng này và chạy khá lâu, chỉ với mức limit=3000
		
		function xac_dinh_so_be_ban_da_toi_uu($limit) //thuật toán đã tối ưu, chạy nhanh hơn nhiều, giảm bớt 1 vòng lặp
		{
			$result='';
			for($i=2;$i<=$limit;$i++)
			{
				$j = tong_uoc_cua_mot_so_nguyen_da_toi_uu($i);
				if($j<=$limit&&tong_uoc_cua_mot_so_nguyen_da_toi_uu($j)==$i&&$j>$i)//$j luôn phải lớn hơn $i để in ra được 2 số 				 					khác nhau, như ở cách thông thường 2 vòng for thì $j=$i+1
				{
					$result = $result.$i.' và '.$j.'<br>';
				}	
			}
			return $result;
		}
		//echo xac_dinh_so_be_ban_da_toi_uu(100000);//chạy nhanh ngon lành, nhập vào 100000 cũng k đến 3s là ra
		
		if(isset($_POST["ok"]))
		{
			$so_gioi_han=$_POST['sogioihan'];
			$ketqua = 'Những cặp số bạn bè nhỏ hơn '.$so_gioi_han.' là: <br>'.xac_dinh_so_be_ban_da_toi_uu($so_gioi_han);
		}
		
	?>
<br />
    <br />
    <br />
    <br />
    <form action="friend-numbers.php" method="post" enctype="multipart/form-data">
  
    	<table style="font-size:20px; border-radius:50px;" width="630" height="337" border="0" align="center" cellpadding="2" cellspacing="2">
    	  <tr>
    	    <td height="70" colspan="2" bgcolor="#00CCFF"><div align="center"><strong><em style="font-size:26;">Tìm kiếm các cặp số bạn bè - Friend Numbers </em></strong></div></td>
   	      </tr>
    	  <tr>
    	    <td width="162" height="68" bgcolor="#CCFF99"><div align="center">Nhập số giới hạn:</div></td>
    	    <td width="268" bgcolor="#CCFF99"><div align="center">
  	          <input type="number" name="sogioihan" value="<?php if(isset($_POST["sogioihan"])){echo $_POST["sogioihan"];} ?>" />
  	      </div></td>
  	    </tr>
        <tr bgcolor="#33CC00">
        	<td height="119" colspan="2" bgcolor="#CCFF99"><div align="center">
        	  <input style="background-color:#0F0; width:100px; height:30px;" type="submit" value="Tìm Kiếm" name="ok" />
              <br />
              <br />
              <strong style="color:#000"><?php if(isset($_POST["sogioihan"])){echo $ketqua;} ?> </strong>
      	  </div></td>
          </tr>
  	  </table>
</form>
<h4 style="float:right;margin-right:350px;"><a href="https://www.facebook.com/lightning.quan" target="_blank">Trung Quân</a></h4>
</body>
</html>