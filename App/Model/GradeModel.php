<?php

namespace App\Model;

class GradeModel
{
    private $media_id;
    private $title;
    private $description;
    private $start_time;
    private $end_time;
    private $human_start_time;
    private $human_end_time;
    private $duration_in_minutes;
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

    public function getmedia_id()
    {
        return $this->media_id;
    }

    public function gettitle()
    {
        return $this->title;
    }

    public function getdescription()
    {
        return $this->description;
    }

    public function getstart_time()
    {
        return $this->start_time;
    }

    public function getend_time()
    {
        return $this->end_time;
    }

    public function gethuman_start_time()
    {
        return $this->human_start_time;
    }

    public function gethuman_end_time()
    {
        return $this->human_end_time;
    }

    public function getduration_in_minutes()
    {
        return $this->duration_in_minutes;
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

    public function setmedia_id($media_id)
    {
        $this->media_id = $media_id;
    }

    public function settitle($title)
    {
        $this->title = $title;
    }

    public function setdescription($description)
    {
        $this->description = $description;
    }

    public function setstart_time($start_time)
    {
        $this->start_time = $start_time;
    }

    public function setend_time($end_time)
    {
        $this->end_time = $end_time;
    }

    public function sethuman_start_time($human_start_time)
    {
        $this->human_start_time = $human_start_time;
    }

    public function sethuman_end_time($human_end_time)
    {
        $this->human_end_time = $human_end_time;
    }

    public function setduration_in_minutes($duration_in_minutes)
    {
        $this->duration_in_minutes = $duration_in_minutes;
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