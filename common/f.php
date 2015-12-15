<?php
function upload($path='./',$n=3,$ext=['jpg','gif','png','rar','ppt','doc'],$length=20971520){
	ini_set('max_execution_time',0);
	ini_set('date.timezone','PRC');
	ini_set('post_max_size','1024M');
	ini_set('upload_max_filesize','1024M');
	$ufs = $_FILES;
    if(count($ufs)<=0){
	    return;	
	}else{
		if(!file_exists($path)){
		    mkdir($path,0777,true);	
		}
		$uuu = [];

		foreach($ufs as $k=>$v){
			if(is_array($v['name'])){
				$ns = $v['name'];
				$fs = $v['tmp_name'];
				$ss = $v['size'];
				foreach($fs as $kk=>$vv){
					if($ss[$kk]==0){
						continue;
					}
					$uf = iconv('utf-8','gbk',$ns[$kk]);
					$et = strtolower(substr($uf,strrpos($uf,'.')+1));
					
					if($n==1){
					    $uf = uniqid().'.'.$et;	
					}else if($n==2){
					    $uf = uuid().'.'.$et;						    	
					}else if($n==3){
						$nnn = substr($uf,0,strrpos($uf,'.'));
						$t = 0;
					    while(file_exists($path.$uf)){
							$uf = $nnn.(++$t).'.'.$et;
						}	
					}
					if(in_array($et,$ext) && $ss[$kk]<=$length){
						move_uploaded_file($vv,$path.$uf);
						$uuu[] = $uf;
					}
				}	
			}else{
				if($v['size']==0){
					continue;
				}
				$uf = iconv('utf-8','gbk',$v['name']);
				$et = strtolower(substr($uf,strrpos($uf,'.')+1));
				if($n==1){
				    $uf = uniqid().'.'.$et;	
				}else if($n==2){
					 $uf = uuid().'.'.$et;	
				}else if($n==3){
						$nnn = substr($uf,0,strrpos($uf,'.'));
						$t = 0;
					    while(file_exists($path.$uf)){
							$uf = $nnn.(++$t).'.'.$et;
						}	
					}
                if(in_array($et,$ext) && $v['size']<=$length){
					move_uploaded_file($v['tmp_name'],$path.$uf);
					$uuu[] = $uf;
				}
			}
		}
		return $uuu;	
	}
}

function uuid($namespace = '') {    
     $guid = $namespace; 
     $uid = uniqid("", true);
     $data = $namespace;
     $data .= $_SERVER['REQUEST_TIME'];
     $data .= $_SERVER['HTTP_USER_AGENT'];
     $data .= $_SERVER['REMOTE_ADDR'];
     $data .= $_SERVER['REMOTE_PORT'];
     $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
     $guid = substr($hash,  0,  8) . '-' .
             substr($hash,  8,  4).'-' .substr($hash, 12,  4) .
             '-' .substr($hash, 16,  4).'-'.substr($hash, 20, 12);
     return $guid;
}