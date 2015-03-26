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
            $vid->setId((string)$datas->ID);
            $vid->setDmid((string)$datas->DMID);
            $vid->setLongTitle((string)$datas->TITRE_LONG);
            $vid->setTitle((string)$datas->TITRE);
            $vid->setSurtitle1((string)$datas->SURTITRE1);
            $vid->setSurtitle2((string)$datas->SURTITRE2);
            $vid->setDescriptif((string)$datas->DESCRIPTIF);
            $vid->setDuree(sprintf('%02d', ((int)$datas->DUREE) / 60).':'.sprintf('%02d', ((int)$datas->DUREE) % 60));
            $vid->setDate(strtoupper(date('d M. Y | H:i', strtotime((string)$datas->DATE))));
            $vid->setSport((string)$datas->SPORT);
            $vid->setIdSport((string)$datas->IDSPORT);
            $vid->setIdTagSport((string)$datas->IDTAG_SPORT);
            $vid->setKeywords((string)$datas->KEYWORDS);
            $vid->setNbVues((int)$datas->NB_VUES);
            $vid->setHorsMobile((int)$datas->HORS_MOBILES);
            $vid->setPrivee((int)$datas->PRIVEE);
            $vid->setKid((string)$datas->KID);
            $vid->setChaine((string)$datas->CHAINE);
            $vid->setNbCommentaires((int)$datas->NB_COMMENTAIRES);
            $vid->setImage((string)$datas->IMAGE);
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
            $vid->setSport($datas['SPORT']);
            $vid->setIdSport($datas['IDSPORT']);
            $vid->setIdTagSport($datas['IDTAG_SPORT']);
            $vid->setKeywords($datas['KEYWORDS']);
            $vid->setNbVues($datas['NB_VUES']);
            $vid->setHorsMobile($datas['HORS_MOBILES']);
            $vid->setPrivee($datas['PRIVEE']);
            $vid->setKid($datas['KID']);
            $vid->setChaine($datas['CHAINE']);
            $vid->setNbCommentaires($datas['NB_COMMENTAIRES']);
            $vid->setImage($datas['IMAGE']);
            $vid->setTags($datas['TAGS']);
        }
    }
    
    public function getVideos($datas) {
        $videos = array();
        
        if(is_object($datas)) {
            foreach ($datas->children()->children() as $d) {
                if(isset($d->ID) && !empty($d->ID)) {
                    $tmp = new Video();
                    $this->populateVideo($tmp, $d);
                    $videos[] = $tmp;
                    unset($tmp);
                }
            }
        } else {
            $iterator = new \RecursiveArrayIterator($datas);
            while ($iterator->valid()) {
                if ($iterator->hasChildren()) {
                    foreach ($iterator->getChildren() as $key => $value) {
                        if(is_array($value) && !empty($value['ID'])) {
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
