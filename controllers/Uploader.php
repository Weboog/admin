<?php

class Uploader
{

    private static $DIR = 'public/img/';

    public function save (array $files) {
        for ($i = 0; $i < count($_FILES['gallery']['name']); $i++) {
            $type = $_FILES['gallery']['type'][$i];
            $name = $_FILES['gallery']['name'][$i];
            $size = $_FILES['gallery']['size'][$i] / 1024;
            echo $name.' '.$size.' Ko'.' '.$type;
        }
    }

}