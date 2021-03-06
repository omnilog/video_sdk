<?php

namespace Lequipe\Entity;

/**
 * Description of Video.
 *
 * @author cguinet
 */
class Video
{
    private $id;
    private $dmid;
    private $idEmission;
    private $nomEmission;
    private $nomEmissionUrl;
    private $longTitle;
    private $longTitleUrl;
    private $title;
    private $surtitle1;
    private $surtitle2;
    private $descriptif = null;
    private $duree;
    private $date;
    private $sport;
    private $idSport;
    private $idTagSport;
    private $keywords = null;
    private $nbVues;
    private $horsMobile = false;
    private $privee;
    private $kid = null;
    private $chaine;
    private $nbCommentaires;
    private $image;
    private $tags = array();

    /**
     * Set the id of the video.
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * return the id of the video.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * set the dailymotion_id of the video.
     *
     * @param int $dmid
     */
    public function setDmid($dmid)
    {
        $this->dmid = $dmid;
    }

    /**
     * return the dailymotion_id of the video.
     *
     * @return int
     */
    public function getDmid()
    {
        return $this->dmid;
    }

    /**
     * retourne l'id de l'émission pour les vidéos de L'Equipe21.
     *
     * @return int
     */
    public function getIdEmission()
    {
        return $this->idEmission;
    }

    /**
     * sette l'id de l'émission pour les vidéos de L'Equipe21.
     *
     * @param int $idEmission
     */
    public function setIdEmission($idEmission)
    {
        $this->idEmission = $idEmission;

        return $this;
    }

    /**
     * retourne le nom de l'émission.
     *
     * @return string
     */
    public function getNomEmission()
    {
        return $this->nomEmission;
    }

    /**
     * sette le nom de l'émission.
     *
     * @param string $nomEmission
     */
    public function setNomEmission($nomEmission)
    {
        $this->nomEmission = $nomEmission;

        return $this;
    }

    /**
     * retourne le nom de l'émission utilisable dans les URLs.
     *
     * @return string
     */
    public function getNomEmissionUrl()
    {
        return $this->nomEmissionUrl;
    }

    /**
     * sette le nom de l'émission utilisable dans les URLs.
     *
     * @param string $nomEmissionUrl
     */
    public function setNomEmissionUrl($nomEmissionUrl)
    {
        $this->nomEmissionUrl = $nomEmissionUrl;

        return $this;
    }

    /**
     * set the longTitle of the video.
     *
     * @param string $longTitle
     */
    public function setLongTitle($longTitle)
    {
        $this->longTitle = $longTitle;

        return $this;
    }

    /**
     * return the longtitle of the video.
     *
     * @return string
     */
    public function getLongTitle()
    {
        return $this->longTitle;
    }

    /**
     * retourne le titre long de la vidéo utilisable dans les URLs.
     *
     * @return string
     */
    public function getLongTitleUrl()
    {
        return $this->longTitleUrl;
    }

    /**
     * sette le titre long de la vidéo utilisable dans les URLs.
     *
     * @param string $longTitleUrl
     */
    public function setLongTitleUrl($longTitleUrl)
    {
        $this->longTitleUrl = $longTitleUrl;

        return $this;
    }

    /**
     * set the title of the video.
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * return the title of the video.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * return the surtitle1 of the video.
     *
     * @return string
     */
    public function getSurtitle1()
    {
        return $this->surtitle1;
    }

    /**
     * set the surtitle1 of the video.
     *
     * @param string $surtitle1
     */
    public function setSurtitle1($surtitle1)
    {
        $this->surtitle1 = $surtitle1;

        return $this;
    }

    /**
     * return the surtitle2 of the video.
     *
     * @return string
     */
    public function getSurtitle2()
    {
        return $this->surtitle2;
    }

    /**
     * set the surtitle2 of the video.
     *
     * @param string $surtitle2
     */
    public function setSurtitle2($surtitle2)
    {
        $this->surtitle2 = $surtitle2;

        return $this;
    }

    /**
     * return the descriptif of the tag.
     *
     * @return string
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * set the descriptif of the video.
     *
     * @param string $descriptif
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * return the duree of the video.
     *
     * @param string $format
     *
     * @return int
     */
    public function getDuree($format = 'FULL')
    {
        if ('MINUTES' === $format) {
            return sprintf(
                '%02d min',
                $this->duree / 60
            );
        }

        return sprintf(
            '%d:%d',
            sprintf('%02d', $this->duree / 60),
            sprintf('%02d', $this->duree % 60)
        );
    }

    /**
     * set the duree of the video.
     *
     * @param int $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * return the duree of the video.
     *
     * @param string $format
     *
     * @return \DateTime
     */
    public function getDate($format = '%d %b %Y | %H:%M')
    {
        return mb_strtoupper(
            strftime($format, $this->date),
            'UTF-8'
        );
    }

    /**
     * set the date of the video.
     *
     * @param string $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = strtotime($date);

        return $this;
    }

    /**
     * return the idSport of the video.
     *
     * @return int
     */
    public function getIdSport()
    {
        return $this->idSport;
    }

    /**
     * set the idsport of the video.
     *
     * @param int $idSport
     */
    public function setIdSport($idSport)
    {
        $this->idSport = $idSport;

        return $this;
    }

    /**
     * return the sport of the video.
     *
     * @return string
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * set the sport of the video.
     *
     * @param string $sport
     */
    public function setSport($sport)
    {
        $this->sport = $sport;

        return $this;
    }

    /**
     * return the sport's idtag of the video.
     *
     * @return string
     */
    public function getIdTagSport()
    {
        return $this->idTagSport;
    }

    /**
     * set the sport's idtag of the video.
     *
     * @param int $idTagSport
     */
    public function setIdTagSport($idTagSport)
    {
        $this->idTagSport = $idTagSport;

        return $this;
    }

    /**
     * return the keywords of the video.
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * set the keyword of the video.
     *
     * @param string $keyword
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * return the nbVues of the video.
     *
     * @return int
     */
    public function getNbVues()
    {
        return $this->nbVues;
    }

    /**
     * set the nbVues of the video.
     *
     * @param int $nbVues
     */
    public function setNbVues($nbVues)
    {
        $this->nbVues = $nbVues;

        return $this;
    }

    /**
     * return the horsMobile of the video.
     *
     * @return bool
     */
    public function getHorsMobile()
    {
        return $this->horsMobile;
    }

    /**
     * set the horsMobile of the video.
     *
     * @param bool $horsMobile
     */
    public function setHorsMobile($horsMobile)
    {
        $this->horsMobile = $horsMobile;

        return $this;
    }

    /**
     * return the privee status of the video.
     *
     * @return bool
     */
    public function getPrivee()
    {
        return $this->privee;
    }

    /**
     * set the privee status of the video.
     *
     * @param bool $privee
     */
    public function setPrivee($privee)
    {
        $this->privee = $privee;
    }

    /**
     * return the kid of the video (for privates videos).
     *
     * @return string
     */
    public function getKid()
    {
        return $this->kid;
    }

    /**
     * set the Kid of the video.
     *
     * @param string $kid
     */
    public function setKid($kid)
    {
        $this->kid = $kid;
    }

    /**
     * return the channel of the video.
     *
     * @return string
     */
    public function getChaine()
    {
        return $this->chaine;
    }

    /**
     * set the channel of the video.
     *
     * @param string $chaine
     */
    public function setChaine($chaine)
    {
        $this->chaine = $chaine;
    }

    /**
     * return the number of comments of the video.
     *
     * @return int
     */
    public function getNbCommentaires()
    {
        return $this->nbCommentaires;
    }

    /**
     * set the NbCommentaires of the video.
     *
     * @param int $nbCommentaires
     */
    public function setNbCommentaires($nbCommentaires)
    {
        $this->nbCommentaires = $nbCommentaires;
    }

    /**
     * return the image preview uri of the video.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * set the image preview uri of the video.
     *
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * return the tags of the video.
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * set the tags the video.
     *
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }
}
