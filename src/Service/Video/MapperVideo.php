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
        if(is_object($datas)) {
            $vid->setId($datas->ID);
            $vid->setDmid($datas->DMID);
            $vid->setLongTitle($datas->TITRE_LONG);
            $vid->setTitle($datas->TITRE);
            $vid->setSurtitle1($datas->SURTITRE1);
            $vid->setSurtitle2($datas->SURTITRE2);
            $vid->setDescriptif($datas->DESCRIPTIF);
            $vid->setDuree(sprintf('%02d', $datas->DUREE / 60).':'.sprintf('%02d', $datas->DUREE % 60));
            $vid->setDate(strtoupper(date('d M. Y | H:i', strtotime($datas->DATE))));
            $vid->setIdSport($datas->IDSPORT);
            $vid->setKeywords($datas->KEYWORDS);
            $vid->setNbVues($datas->NB_VUES);
            $vid->setHorsMobile($datas->HORS_MOBILES);
            $vid->setImage($datas->IMAGE);  
            $vid->setTags($datas->TAGS);
            
        } else {
            $vid->setId($datas['ID']);
            $vid->setDmid($datas['DMID']);
            $vid->setLongTitle($datas['TITRE_LONG']);
            $vid->setTitle($datas['TITRE']);
            $vid->setSurtitle1($datas['SURTITRE1']);
            $vid->setSurtitle2($datas['SURTITRE2']);
            $vid->setDescriptif($datas['DESCRIPTIF']);
            $vid->setDuree(sprintf('%02d', $datas['DUREE'] / 60).':'.sprintf('%02d', $datas['DUREE'] % 60));
            $vid->setDate(strtoupper(date('d M. Y | H:i', strtotime($datas['DATE']))));
            $vid->setIdSport($datas['IDSPORT']);
            $vid->setKeywords($datas['KEYWORDS']);
            $vid->setNbVues($datas['NB_VUES']);
            $vid->setHorsMobile($datas['HORS_MOBILES']);
            $vid->setTags($datas['TAGS']);
            $vid->setImage($datas['IMAGE']);
        }
    }
    
    public function getVideos($datas) {
        $videos = array();
        
        if(is_object($datas)) {
            foreach ($datas->children()->children() as $d) {
                $tmp = new Video();
                $this->populateVideo($tmp, $d);
                $videos[] = $tmp;
                unset($tmp);
            }
        } else {
            $iterator = new \RecursiveArrayIterator($datas);
            while ($iterator->valid()) {
                if ($iterator->hasChildren()) {
                    foreach ($iterator->getChildren() as $key => $value) {
                        if(is_array($value) && !empty($value)) {
                            $tmp = new Video();
                            $this->populateVideo($tmp, $value);
                            $videos[] = $tmp;
                            unset($tmp);
                        }
                    }
                }
                $iterator->next();
            }
        }
        return $videos;
    }
    public function populateTypeVideo(TypeVideo $typeVid, $datas) {
        if(is_object($datas)) {
            $typeVid->setId($datas->ID);
            $typeVid->setType($datas->TYPE);
        } else {
            $typeVid->setId($datas['ID']);
            $typeVid->setType($datas['TYPE']);
        }
    }
    
    public function getTypeVideos($datas) {
       $tmp = new TypeVideo();
        
        if(is_object($datas)) {
            $this->populateTypeVideo($tmp, $datas->children()->children()->children());
        } else {
            $iterator = new \RecursiveArrayIterator($datas);
            while ($iterator->valid()) {
                if ($iterator->hasChildren()) {
                    foreach ($iterator->getChildren() as $key => $value) {
                        if(is_array($value) && !empty($value)) {
                            $this->populateTypeVideo($tmp, $value);
                        }
                    }
                }
                $iterator->next();
            }
        }
        return $tmp;
    }
}
