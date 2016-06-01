<?php
function kt_ngto($n)
{
	$kt = 1;
	for($i=2;$i<=sqrt($n);$i++)
	{
		if($n%$i==0 && $n>2)
		{
			$kt = 0;
		}		
	}
	return $kt;
}
function lk_ngto($n)
{
		
	$i=2;
	$dem =1;
	(string) $ketqua = "";
	while($dem<=$n)
	{
		if(kt_ngto($i)==1)
		{
			$ketqua .= $i." &nbsp;";
			$dem++;	
		}	
		$i++;
	}
	return $ketqua;
}
	
	if(isset($_POST["ok"]))
	{
		$ketqua ="";
		$n = $_POST["n"];
		$ketqua = lk_ngto($n);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>N snt đầu tiên</title>
</head>

<body>
	<br />
    <br />
    <br />
    <br />
    <form action="n-so-ng-to-dautien.php" method="post">
  
    	<table style="font-size:20px;" width="630" height="337" border="0" align="center" cellpadding="2" cellspacing="2">
    	  <tr>
    	    <td height="70" colspan="2" bgcolor="#8CC6FF"><div align="center"><strong><em>Liệt Kê N Số Nguyên Tố Đầu Tiên</em></strong></div></td>
   	      </tr>
    	  <tr>
    	    <td width="162" height="68" bgcolor="#8CC6FF"><div align="center">Nhập n:</div></td>
    	    <td width="268" bgcolor="#8CC6FF"><div align="center">
  	          <input type="text" name="n" value="<?php if(isset($_POST["n"])){echo $_POST["n"];} ?>" />
  	      </div></td>
  	    </tr>
        <tr bgcolor="#33CC00">
        	<td height="119" colspan="2" bgcolor="#8CC6FF"><div align="center">
        	  <input style="background-color:#0F0; width:100px; height:30px;" type="submit" value="Liệt Kê" name="ok" />
              <br />
              <br />
              <strong style="color:#000"> Kết quả: <?php if(isset($_POST["n"])){echo $ketqua;} ?> </strong>
      	  </div></td>
          </tr>
  	  </table>
</form>
<h4 style="float:right;margin-right:450px;"><a href="https://www.facebook.com/lightning.quan" target="_blank">Trung Quân</a></h4>
</body>
</html>
