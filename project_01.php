<?php
//  ================= 
//  = 6种方式获得文件后缀名 = 
//  =================
function get_ext1($filename)
{
	return strrchr($filename, '.');
}
function get_ext2($filename)
{
	return substr($filename, strrpos($filename,'.'));
}
function get_ext3($filename)
{
	return array_pop(explode('.', $filename));
}
function get_ext4($filename)
{
	return pathinfo($filename,PATHINFO_EXTENSION);
}
function get_ext5($filename)
{
	return strrev(substr(strrev($filename),0,strpos(strrev($filename),'.')));
}
function get_ext6($filename)
{
	$pattern = '/^[^\.]+\.([\w]+)$/';
	return preg_replace($pattern,'${1}',basename($filename));
}

$filename = "1.php.jpg";
echo get_ext1($filename)."\n";
echo get_ext2($filename)."\n";
echo ".".get_ext3($filename)."\n";
echo ".".get_ext4($filename)."\n";
echo ".".get_ext5($filename)."\n";
echo get_ext6($filename)."\n";

//  ============ 
//  = 遍历普通目录 = 
//  ============ 
function myScandir($dir)
{
	$files = array();
	if(is_dir($dir));
	{
	if($handle = opendir($dir))
	{
		while (($file = readdir($handle)) != false)
		{
			if($file != "." && $file != "..")
			{
				$newDir = $dir."/".$file;
				if(is_dir($newDir))
				{
					$files[$file] = myScandir($newDir);
				}
				else
				{
					$files[] = $file;
				}
			}
		}
		closedir($handle);
		return $files;
	}
}
}
//  ============ 
//  = 遍历中文目录 = 
//  ============ 
function refresh($dir){
    $dir=iconv("utf-8","gb2312",$dir);
    if ($headle=opendir($dir)){
        while ($file=readdir($headle)){
            $file=iconv("gb2312","utf-8",$file); 
            if ($file!='.' && $file!='..'){
                echo "文件".$file."在文件夹".$dir."下<br />";
            }
        }
        closedir($headle);
    }
}
refresh("D:/AppServ/www/test");































