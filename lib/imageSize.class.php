<?php
class ThumbnailException extends Exception{
	public function __construct($message=null,$code=0){
		parent::__construct($message,$code);
		error_log('Error in '.$this->getFile().' Line: '.$this->getLine().' Error: '.$this->getMessage());
	}
}
class ThumbnailFileException extends ThumbnailException{} //文件找不到
class ThumbnailNotSupportedException extends ThumbnailException{}  //类型不支持

class Thumbnail{
	private $maxWidth;
	private $maxHeight;
	private $scale;       //是否按比例拉伸图像
	private $inflate;     //是否放大 小的图像
	private $types;
	private $imgLoaders;
	private $imgCreators;
	private $source;
	private $sourceWidth;
	private $sourceHeight;
	private $sourceMime;
	private $thumb;
	private $thumbWidth;
	private $thumbHeight;
	
	public function __construct($maxWidth,$maxHeight,$scale=true,$inflate=true){
		$this->maxWidth=$maxWidth;
		$this->maxHeight=$maxHeight;
		$this->scale=$scale;
		$this->inflate=$inflate;
		$this->types=array('image/jpeg','image/png','image/gif');
		$this->imgLoaders=array(
			'image/gif'=>'imagecreatefromgif',
			'image/jpeg'=>'imagecreatefromjpeg',
			'image/png'=>'imagecreatefrompng'
		);
		$this->imgCreators=array(
			'image/jpeg'=>'imagejpeg',
			'image/gif'=>'imagegif',
			'image/png'=>'imagepng'
		);		
	}
	public function loadFile($image){
		if(!$dims=@getimagesize($image)){
			throw new ThumbnailFileException('Could not find image: '.$image);
		}
		if(in_array($dims['mime'],$this->types)){
			$loader=$this->imgLoaders[$dims['mime']];
			$this->source=$loader($image);
			$this->sourceWidth=$dims[0];
			$this->sourceHeight=$dims[1];
			$this->sourceMime=$dims['mime'];
			$this->initThumb();
			return true;
		}else{
			throw new ThumbnailNotSupportedException('Image MIME type '.$dims['mime'].' not supported');
		}
		
	}
	public function loadData($image,$mime){
		
		if(in_array($mime,$this->types)){
			if($this->source=@imagecreatefromstring($image)){
			$this->sourceWidth=imagesx($this->source);
			$this->sourceHeight=imagesx($this->source);
			$this->sourceMime=$mime;
			$this->initThumb();
			return true;
			}else{
				throw new ThumbnailFileException('Could not find image: '.$image);
			}
		}else{
			throw new ThumbnailNotSupportedException('Image MIME type '.$dims['mime'].' not supported');
		}
		
	}
	public function buildThumb($file=null){
		//传递名称则存储为文件，否则直接输出到浏览器
		
		$creator=$this->imgCreators[$this->sourceMime];
		//echo $creator;
		if(isset($file)){
			return $creator($this->thumb,$file);
		}else{
			return $creator($this->thumb);
		}
	}
	public function getMime(){
		return $this->sourceMime;
	}
	public function getThumbWidth(){
		return $this->thumbWidth;
	}
	public function getThumbHeight(){
		return $this->thumbHeight;
	}
	public function initThumb(){
		if($this->scale){
			if($this->sourceWidth>$this->sourceHeight){
				$this->thumbWidth=$this->maxWidth;
				$this->thumbHeight=floor($this->sourceHeight*($this->maxWidth/$this->sourceWidth));
			}else if($this->sourceWidth<$this->sourceHeight){
				$this->thumbHeight=$this->maxHeight;
				$this->thumbWidth=floor($this->sourceWidth*($this->maxHeight/$this->sourceHeight));
			}
			else{
				$this->thumbWidth=$this->maxWidth;
				$this->thumbHeight=$this->maxHeight;
			}
		}else{
			$this->thumbWidth=$this->maxWidth;
			$this->thumbHeight=$this->maxHeight;
		}
		$this->thumb=imagecreatetruecolor($this->thumbWidth,$this->thumbHeight);
		if($this->sourceWidth<=$this->maxWidth && $this->sourceHeight<=$this->maxHeight&&$this->inflate==false){
			$this->thumb=$this->source;
		}else{
			imagecopyresampled($this->thumb,$this->source,0,0,0,0,$this->thumbWidth,$this->thumbHeight,$this->sourceWidth,$this->sourceHeight);
		}
	}		
}

/*
传输到浏览器
$tn=new Thumbnail(200,300);
$tn->loadFile($filename);
header('Content-Type: '.$tn->getMime());
$tn->buildThumb();
*/
/*
生成图片文件
$tn=new Thumbnail(200,200);
$image=file_get_contents($filename);
$tn->loadData($image,'image/jpeg');
$tn->buildThumb('newfile.jpeg');
*/

