<?php
	$dir = $_SESSION['zippath']?$_SESSION['zippath']:$_SESSION['zipfpath'];
	echo $dir;
	$filename = "download.zip";
	zip($dir,$filename);
	function zip($dir_path,$zipName){
	    $relationArr = [$dir_path=>[
	        'originName'=>$dir_path,
	        'is_dir' => true,
	        'children'=>[]
	    ]];
	    modifiyFileName($dir_path,$relationArr[$dir_path]['children']);
	    $zip = new ZipArchive();
	    $zip->open($zipName,ZipArchive::CREATE);
	    zipDir(array_keys($relationArr)[0],'',$zip,array_values($relationArr)[0]['children']);
	    $zip->close();
	    restoreFileName(array_keys($relationArr)[0],array_values($relationArr)[0]['children']);
	    echo "<script>alert('压缩成功')</script>";
	}

	function zipDir($real_path,$zip_path,&$zip,$relationArr){
	    $sub_zip_path = empty($zip_path)?'':$zip_path.'\\';
	    if (is_dir($real_path)){
	        foreach($relationArr as $k=>$v){
	            if($v['is_dir']){  //是文件夹
	                $zip->addEmptyDir($sub_zip_path.$v['originName']);
	                zipDir($real_path.'\\'.$k,$sub_zip_path.$v['originName'],$zip,$v['children']);
	            }else{ //不是文件夹
	                $zip->addFile($real_path.'\\'.$k,$sub_zip_path.$k);
	                $zip->deleteName($sub_zip_path.$v['originName']);
	                $zip->renameName($sub_zip_path.$k,$sub_zip_path.$v['originName']);
	            }
	        }
	    }
	}
	function modifiyFileName($path,&$relationArr){
	    if(!is_dir($path) || !is_array($relationArr)){
	        return false;
	    }
	    if($dh = opendir($path)){
	        $count = 0;
	        while (($file = readdir($dh)) !== false){
	            if(in_array($file,['.','..',null])) continue; //无效文件，重来
	            if(is_dir($path.'\\'.$file)){
	                $newName = md5(rand(0,99999).rand(0,99999).rand(0,99999).microtime().'dir'.$count);
	                $relationArr[$newName] = [
	                    'originName' => iconv('GBK','UTF-8',$file),
	                    'is_dir' => true,
	                    'children' => []
	                ];
	                @rename($path.'\\'.$file, $path.'\\'.$newName);
	                modifiyFileName($path.'\\'.$newName,$relationArr[$newName]['children']);
	                $count++;
	            }
	            else{
	                $extension = strchr($file,'.');
	                $newName = md5(rand(0,99999).rand(0,99999).rand(0,99999).microtime().'file'.$count);
	                $relationArr[$newName.$extension] = [
	                    'originName' => iconv('GBK','UTF-8',$file),
	                    'is_dir' => false,
	                    'children' => []
	                ];
	                @rename($path.'\\'.$file, $path.'\\'.$newName.$extension);
	                $count++;
	            }
	        }
	    }
	}
	function restoreFileName($path,$relationArr){
	    foreach($relationArr as $k=>$v){
	        if(!empty($v['children'])){
	            restoreFileName($path.'\\'.$k,$v['children']);
	            @rename($path.'\\'.$k,iconv('UTF-8','GBK',$path.'\\'.$v['originName']));
	        }else{
	            @rename($path.'\\'.$k,iconv('UTF-8','GBK',$path.'\\'.$v['originName']));
	        }
	    }
	}
	
?>