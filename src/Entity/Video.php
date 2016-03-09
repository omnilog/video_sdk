<?php

namespace Lequipe\Entity;
/**
 * Description of Video
 *
 * @author cguinet
 */
class Video {
    
    private $id;
    private $dmid;
    private $idEmission;
    private $longTitle;
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
     * Set the id of the video
     * @param integer $id
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    /**
     * return the id of the video
     * @return integer
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * set the dailymotion_id of the video
     * @param integer $dmid
     */
    function setDmid($dmid) {
        $this->dmid = $dmid;
    }
    
    /**
     * return the dailymotion_id of the video
     * @return integer
     */
    function getDmid() {
        return $this->dmid;
    }

    /**
     * retourne l'id de l'émission pour les vidéos de L'Equipe21
     * @return mixed
     */
    public function getIdEmission()
    {
        return $this->idEmission;
    }

    /**
     * sette l'id de l'émission pour les vidéos de L'Equipe21
     * @param mixed $idEmission
     */
    public function setIdEmission($idEmission)
    {
        $this->idEmission = $idEmission;
        return $this;
    }
        
    /**
     * set the longTitle of the video
     * @param string $longTitle
     */
    public function setLongTitle($longTitle) {
        $this->longTitle = $longTitle;
        return $this;
    }
    
    /**
     * return the longtitle of the video
     * @return string
     */
    public function getLongTitle() {
        return $this->longTitle;
    }
    
    /**
     * set the title of the video
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }
    
    /**
     * return the title of the video
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    
    /**
     * return the surtitle1 of the video
     * @return string
     */
    public function getSurtitle1() {
        return $this->surtitle1;
    }
    
    /**
     * set the surtitle1 of the video
     * @param string $surtitle1
     */
    public function setSurtitle1($surtitle1) {
        $this->surtitle1 = $surtitle1;
        return $this;
    }
    
    /**
     * return the surtitle2 of the video
     * @return string
     */
    public function getSurtitle2() {
        return $this->surtitle2;
    }
    
    /**
     * set the surtitle2 of the video
     * @param string $surtitle2
     */
    public function setSurtitle2($surtitle2) {
        $this->surtitle2 = $surtitle2;
        return $this;
    }
    
    /**
     * return the descriptif of the tag
     * @return string
     */
    public function getDescriptif() {
        return $this->descriptif;
    }
    
    /**
     * set the descriptif of the video
     * @param string $descriptif
     */
    public function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
        return $this;
    }
    
    /**
     * return the duree of the video
     * @return integer
     */
    public function getDuree() {
        return $this->duree;
    }
    
    /**
     * set the duree of the video
     * @param type $duree
     */
    public function setDuree($duree) {
        $this->duree = $duree;
        return $this;
    }
    
    /**
     * return the duree of the video
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }
    
    /**
     * set the date of the video
     * @param \DateTime $date
     */
    public function setDate($date) {
        $this->date = $date;
        return $this;
    }
    
    /**
     * return the idSport of the video
     * @return integer
     */
    public function getIdSport() {
        return $this->idSport;
    }
    
    /**
     * set the idsport of the video
     * @param integer $idSport
     */
    public function setIdSport($idSport) {
        $this->idSport = $idSport;
        return $this;
    }

    /**
     * return the sport of the video
     * @return string
     */
    public function getSport() {
        return $this->sport;
    }

    /**
     * set the sport of the video
     * @param string $sport
     */
    public function setSport($sport) {
        $this->sport = $sport;
        return $this;
    }

    /**
     * return the sport's idtag of the video
     * @return string
     */
    public function getIdTagSport() {
        return $this->idTagSport;
    }

    /**
     * set the sport's idtag of the video
     * @param int $idTagSport
     */
    public function setIdTagSport($idTagSport) {
        $this->idTagSport = $idTagSport;
        return $this;
    }
    
    /**
     * return the keywords of the video
     * @return string
     */
    public function getKeywords() {
        return $this->keywords;
    }
    
    /**
     * set the keyword of the video
     * @param string $keyword
     */
    public function setKeywords($keywords) {
        $this->keywords = $keywords;
        return $this;
    }
    
    /**
     * return the nbVues of the video
     * @return integer
     */
    public function getNbVues() {
        return $this->nbVues;
    }
    
    /**
     * set the nbVues of the video
     * @param integer $nbVues
     */
    public function setNbVues($nbVues) {
        $this->nbVues = $nbVues;
        return $this;
    }
    
    /**
     * return the horsMobile of the video
     * @return boolean
     */
    public function getHorsMobile() {
        return $this->horsMobile;
    }
    
    /**
     * set the horsMobile of the video
     * @param boolean $horsMobile
     */
    public function setHorsMobile($horsMobile) {
        $this->horsMobile = $horsMobile;
        return $this;
    }
    /**
     * return the privee status of the video
     * @return boolean
     */
    function getPrivee() {
        return $this->privee;
    }

    /**
     * set the privee status of the video
     * @param boolean $privee
     */
    function setPrivee($privee) {
        $this->privee = $privee;
    }
    
    /**
     * return the kid of the video (for privates videos)
     * @return string
     */
    function getKid() {
        return $this->kid;
    }

    /**
     * set the Kid of the video
     * @param string $kid
     */
    function setKid($kid) {
        $this->kid = $kid;
    }

    /**
     * return the channel of the video
     * @return string
     */
    function getChaine() {
        return $this->chaine;
    }

    /**
     * set the channel of the video
     * @param string $chaine
     */
    function setChaine($chaine) {
        $this->chaine = $chaine;
    }

    /**
     * return the number of comments of the video
     * @return integer
     */
    function getNbCommentaires() {
        return $this->nbCommentaires;
    }
    
    /**
     * set the NbCommentaires of the video
     * @param integer $nbCommentaires
     */
    function setNbCommentaires($nbCommentaires) {
        $this->nbCommentaires = $nbCommentaires;
    }

    
    /**
     * return the image preview uri of the video
     * @return string
     */
    public function getImage() {
        return $this->image;
    }
    
    /**
     * set the image preview uri of the video
     * @param string $image
     */
    public function setImage($image) {
        $this->image = $image;
        return $this;
    }
    
    /**
     * return the tags of the video
     * @return array
     */
    public function getTags() {
        return $this->tags;
    }
    
    /**
     * set the tags the video
     * @param array $tags
     */
    public function setTags($tags) {
        $this->tags = $tags;
        return $this;
    }
}
