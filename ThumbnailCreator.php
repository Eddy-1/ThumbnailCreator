    #creates thumbnails for the site pages
    class ThumbnailCreator{
        private $src = null, $fileName = null, $srcWidth = null, $srcHeight = null, $srcDir = null;

        function __construct($srcURL){
            $this->srcDir = dirname($srcURL);           
            $this->src = imagecreatefromjpeg($srcURL);
            $this->fileName = basename($srcURL);
            list($this->srcWidth, $this->srcHeight) = getimagesize($srcURL);
        }

        #get thumbnails for the images to be displayed on the homepage
        function createThumbnail($x, $y, $destURL){
            //create an image resource for th thumbnail
            $thumb = imagecreatetruecolor($x,$y);

            //place the image into  the thumbnail resource
            imagecopyresized($thumb, $this->src, 0, 0, 0, 0, $x, $y, $this->srcWidth, $this->srcHeight);

            //save the thumbnail with an appropriate name in the thumbnails folder      
            return (imagejpeg($thumb, $destURL."/".$this->fileName))?true:false;
        }
    }