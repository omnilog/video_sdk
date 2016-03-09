<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 09/03/16
 * Time: 14:25
 */

namespace Lequipe\Service\GrilleLequipe21;


use Lequipe\Entity\DiffusionLequipe21;

class MapperGrilleLequipe21 implements MapperGrilleLequipe21Interface
{
    public function populateDiffusionLequipe21(DiffusionLequipe21 $diff, $datas)
    {
        if (is_object($datas)) {
            $diff->setIdDiffusion((string)$datas->ID_DIFFUSION)
                ->setDateDiffusion((string)$datas->DATE_DIFF)
                ->setHeureDiffusion((string)$datas->TIME_DIFF)
                ->setTitleDiffusion((string)$datas->SOUSTITRE)
                ->setDescriptifDiffusion((string)$datas->TEXTE)
                ->setDureeDiffusion((string)$datas->DUREE_DIFF)
                ->setTypeDiffusion((string)$datas->TYPE)
                ->setIdEmission((string)$datas->ID_EMISSION)
                ->setDureeEmission((string)$datas->DUREE_EMS)
                ->setNomEmission((string)$datas->NOM_EMS)
                ->setTitleEmission((string)$datas->TITRE_EMS);
        } else {
            $diff->setIdDiffusion($datas['ID_DIFFUSION'])
                ->setDateDiffusion($datas['DATE_DIFF'])
                ->setHeureDiffusion($datas['TIME_DIFF'])
                ->setTitleDiffusion($datas['SOUSTITRE'])
                ->setDescriptifDiffusion($datas['TEXTE'])
                ->setDureeDiffusion($datas['DUREE_DIFF'])
                ->setTypeDiffusion($datas['TYPE'])
                ->setIdEmission($datas['ID_EMISSION'])
                ->setDureeEmission($datas['DUREE_EMS'])
                ->setNomEmission($datas['NOM_EMS'])
                ->setTitleEmission($datas['TITRE_EMS']);
        }
    }

    public function getGrille($datas)
    {
        $grille = array();

        if (is_object($datas)) {
            foreach ($datas->children()->children() as $d) {
                if (isset($d->ID_DIFFUSION) && ! empty($d->ID_DIFFUSION)) {
                    $tmp = new DiffusionLequipe21();
                    $this->populateDiffusionLequipe21($tmp, $d);
                    $grille[] = $tmp;
                    unset($tmp);
                }
            }
        } else {
            $iterator = new \RecursiveArrayIterator($datas);
            while ($iterator->valid()) {
                if ($iterator->hasChildren()) {
                    foreach ($iterator->getChildren() as $key => $value) {
                        if (is_array($value) && isset($value['ID_DIFFUSION']) && ! empty($value['ID_DIFFUSION'])) {
                            $tmp = new DiffusionLequipe21();
                            $this->populateDiffusionLequipe21($tmp, $value);
                            $grille[] = $tmp;
                            unset($tmp);
                        }
                    }
                }
                $iterator->next();
            }
        }

        return $grille;
    }

}