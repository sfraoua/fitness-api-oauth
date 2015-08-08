<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\DocumentInheritance;


interface TranslatableNameDescriptionInterface
{
    //english
    public function getNameEn();
    //french
    public function getNameFr();
    //spanish
    public function getNameSp();
    //russian
    public function getNameRu();
    //chinese
    public function getNameCh();
    //italian
    public function getNameIt();

    public function getDescriptionEn();
    public function getDescriptionFr();
    public function getDescriptionSp();
    public function getDescriptionRu();
    public function getDescriptionCh();
    public function getDescriptionIt();

}