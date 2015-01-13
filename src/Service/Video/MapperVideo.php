<?php

namespace Lequipe\Service\Video;

use Lequipe\Entity\Video;
use Lequipe\Entity\TypeVideo;
/**
 * Description of MapperVideo
 *
 * @author cguinet
 */
class MapperVideo implements MapperVideoInterface{
    
    public function populateVideo(Video $vid, $datas) {
        $vid->setId($datas['ID']);
        $vid->setLongTitle($datas['TITRE_LONG']);
        $vid->setTitle($datas['TITRE']);
        $vid->setSurtitle1($datas['SURTITRE1']);
        $vid->setSurtitle2($datas['SURTITRE2']);
        $vid->setDescriptif($datas['DESCRIPTIF']);
        $vid->setDuree($datas['DUREE']);
        $vid->setDate($datas['DATE']);
        $vid->setIdSport($datas['IDSPORT']);
        $vid->setKeyword($datas['KEYWORD']);
        $vid->setNbVues($datas['NB_VUES']);
        $vid->setTags($datas['TAGS']);
    }
    
    public function getVideos($datas) {
        $videos = array();
        foreach ($datas as $d) {
            $tmp = new Video();
            $this->populateVideo($tmp, $d);
            $videos[] = $tmp;
            unset($tmp);
        }
        return $videos;
    }
    public function populateTypeVideo(TypeVideo $typeVid, $datas) {
        $typeVid->setId($datas['ID']);
        $typeVid->setType($datas['TYPE']);
    }
    
    public function getTypeVideos($datas) {
        $tmp = new TypeVideo();
        $this->populateTypeVideo($tmp, $datas);
    }
}
