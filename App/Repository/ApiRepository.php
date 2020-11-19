<?php

namespace App\Repository;

use App\Service\Request\RequestService;
use App\Model\EntryModel;
use App\Model\GradeModel;
use DateTime;
use DateTimeZone;
use DateInterval;

class ApiRepository
{
    private $data;

    public function __construct(RequestService $requestService)
    {
        $requestService->getRequest();
        $this->data = $requestService->data;
    }

    public function getEntryModel()
    {
        $entry = new EntryModel();

        foreach ($this->data["programme"]["entries"] as $key => $value) {
            $grade = new GradeModel();

            $grade->setmediaId($value["media_id"]);
            $grade->settitle($value["title"]);
            $grade->setdescription($value["description"]);
            $grade->setstartTime($value["start_time"]);
            $grade->setendTime($value["end_time"]);
            $grade->sethumanStartTime($value["human_start_time"]);
            $grade->sethumanEndTime($value["human_end_time"]);
            $grade->setdurationInMinutes($value["duration_in_minutes"]);
            $grade->setPrograma($value["custom_info"]["Programa"]);
            $grade->setGenero($value["custom_info"]["Genero"]["Descricao"]);
            $grade->setName($value["program"]["name"]);
            $grade->setCategory($value["program"]["category"]);
            $grade->setURLPrograma($value["custom_info"]["URLPrograma"]);
            $grade->setSinopse($value["custom_info"]["Resumos"]["Sinopse"]);

            $grade->setstatus($this->addState($value["start_time"], $value["end_time"]));

            $entry->add($grade);
        }

        return $entry;
    }

    private function addState(string $hourInitial, string $hourFinal):int
    {
        $datetime = new DateTime();
        $timezone = new DateTimeZone('Brazil/East');
        $datetime->setTimezone($timezone);
        $datetime->add(new DateInterval('PT2H'));
        
        $hourCurrent = strtotime($datetime->format('H:i:s'));

        if ($hourFinal < $hourCurrent) {
            return 1;
        } elseif ($hourCurrent > $hourInitial && $hourCurrent < $hourFinal) {
            return 2;
        } elseif ($hourFinal > $hourCurrent) {
            return 3;
        }
    }

    private function clearDate(string $hour):string
    {
        return substr($hour, 0, -6);
    }
}
