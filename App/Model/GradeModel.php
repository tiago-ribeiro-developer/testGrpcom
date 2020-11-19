<?php

namespace App\Model;

class GradeModel
{
    private $mediaId;
    private $title;
    private $description;
    private $startTime;
    private $endTime;
    private $humanStartTime;
    private $humanEndTime;
    private $durationInMinutes;
    private $Programa;
    private $Genero;
    private $Name;
    private $Category;
    private $URLPrograma;
    private $Sinopse;

    private $status;

    public function __construct()
    {
    }

    public function getmediaId()
    {
        return $this->mediaId;
    }

    public function gettitle()
    {
        return $this->title;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function getstartTime()
    {
        return $this->startTime;
    }

    public function getendTime()
    {
        return $this->endTime;
    }

    public function gethumanStartTime()
    {
        return $this->humanStartTime;
    }

    public function gethumanEndTime()
    {
        return $this->humanEndTime;
    }

    public function getdurationInMinutes()
    {
        return $this->durationInMinutes;
    }

    public function getPrograma()
    {
        return $this->Programa;
    }

    public function getGenero()
    {
        return $this->Genero;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getCategory()
    {
        return $this->Category;
    }

    public function getURLPrograma()
    {
        return $this->URLPrograma;
    }

    public function getSinopse()
    {
        return $this->Sinopse;
    }

    public function getstatus()
    {
        return $this->status;
    }

    public function setmediaId($mediaId)
    {
        $this->mediaId = $mediaId;
    }

    public function settitle($title)
    {
        $this->title = $title;
    }

    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function setstartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    public function setendTime($endTime)
    {
        $this->endTime = $endTime;
    }

    public function sethumanStartTime($humanStartTime)
    {
        $this->humanStartTime = $humanStartTime;
    }

    public function sethumanEndTime($humanEndTime)
    {
        $this->humanEndTime = $humanEndTime;
    }

    public function setdurationInMinutes($durationInMinutes)
    {
        $this->durationInMinutes = $durationInMinutes;
    }

    public function setPrograma($Programa)
    {
        $this->Programa = $Programa;
    }

    public function setGenero($Genero)
    {
        $this->Genero = $Genero;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function setCategory($Category)
    {
        $this->Category = $Category;
    }

    public function setURLPrograma($URLPrograma)
    {
        $this->URLPrograma = $URLPrograma;
    }

    public function setSinopse($Sinopse)
    {
        $this->Sinopse = $Sinopse;
    }

    public function setstatus($status)
    {
        $this->status = $status;
    }
}
