<?php

class OptionsBase extends CActiveRecord
{
    /**
     * @return HTML array of options, indexed by IDs
     */
    public function getOptions()
    {
        $optsArray = CHtml::listData($this->findAll(), 'id', 'name');
        return $optsArray;
    }
    /**
    * @return plain array of options
    
    public function getArrayOptions()
    {
        $optsArray = $this->findAll();
    }*/
}