<?php
/**
 * Created by PhpStorm.
 * User: mmarynich
 * Date: 09/03/16
 * Time: 14:25
 */

namespace Lequipe\Service\Lequipe21;


use Lequipe\Entity\DiffusionLequipe21;
use Lequipe\Entity\EmissionLequipe21;

class MapperLequipe21 implements MapperLequipe21Interface
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
                ->setIsDirect(1 === ((int)$datas->IS_DIRECT))
                ->setIdEmission((string)$datas->ID_EMISSION)
                ->setDureeEmission((string)$datas->DUREE_EMS)
                ->setNomEmission((string)$datas->NOM_EMS)
                ->setNomEmissionUrl((string)$datas->NOM_EMS_URL)
                ->setTitleEmission((string)$datas->TITRE_EMS);

            if (isset($datas->DMID)) {
                $diff->setDmidVideo((string)$datas->DMID)
                    ->setLongTitleVideo((string)$datas->TITRE_LONG)
                    ->setLongTitleUrlVideo((string)$datas->TITRE_LONG_URL);
            }
        } else {
            $diff->setIdDiffusion($datas['ID_DIFFUSION'])
                ->setDateDiffusion($datas['DATE_DIFF'])
                ->setHeureDiffusion($datas['TIME_DIFF'])
                ->setTitleDiffusion($datas['SOUSTITRE'])
                ->setDescriptifDiffusion($datas['TEXTE'])
                ->setDureeDiffusion($datas['DUREE_DIFF'])
                ->setTypeDiffusion($datas['TYPE'])
                ->setIsDirect(1 === ((int)$datas['IS_DIRECT']))
                ->setIdEmission($datas['ID_EMISSION'])
                ->setDureeEmission($datas['DUREE_EMS'])
                ->setNomEmission($datas['NOM_EMS'])
                ->setNomEmissionUrl($datas['NOM_EMS_URL'])
                ->setTitleEmission($datas['TITRE_EMS']);

            if (isset($datas['DMID'])) {
                $diff->setDmidVideo($datas['DMID'])
                    ->setLongTitleVideo($datas['TITRE_LONG'])
                    ->setLongTitleUrlVideo($datas['TITRE_LONG_URL']);
            }
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

    public function populateEmissionLequipe21(EmissionLequipe21 $ems, $datas)
    {
        if (is_object($datas)) {
            $ems->setId((string)$datas->ID_EMS)
                ->setNom((string)$datas->NOM_EMS);
        } else {
            $ems->setId($datas['ID_EMS'])
                ->setNom($datas['NOM_EMS']);
        }
    }

    public function getEmissions($datas)
    {
        $emissions = array();

        if (is_object($datas)) {
            foreach ($datas->children()->children() as $d) {
                if (isset($d->ID_EMS) && ! empty($d->ID_EMS)) {
                    $tmp = new EmissionLequipe21();
                    $this->populateEmissionLequipe21($tmp, $d);
                    $emissions[] = $tmp;
                    unset($tmp);
                }
            }
        } else {
            $iterator = new \RecursiveArrayIterator($datas);
            while ($iterator->valid()) {
                if ($iterator->hasChildren()) {
                    foreach ($iterator->getChildren() as $key => $value) {
                        if (is_array($value) && isset($value['ID_EMS']) && ! empty($value['ID_EMS'])) {
                            $tmp = new EmissionLequipe21();
                            $this->populateEmissionLequipe21($tmp, $value);
                            $emissions[] = $tmp;
                            unset($tmp);
                        }
                    }
                }
                $iterator->next();
            }
        }

        return $emissions;
    }

}