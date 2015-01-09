<?php

namespace Lequipe\Services\Videos;

use Lequipe\Entity\Video;

/**
 * Description of MapperVideo
 *
 * @author cguinet
 */
class MapperVideo implements MapperVideosInterface{
    
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
        $vid->setKeyword($datas['KEYWORD']);
        $vid->setTags($datas['TAGS']);
    }
    
    public function getVideos($datas) {
        $videos = [];
        foreach ($data as $d) {
            $tmp = new Video();
            $this->populateVideo($tmp, $d);
            $videos[] = $tmp;
            unset($tmp);
        }
        return $videos;
    }
}
