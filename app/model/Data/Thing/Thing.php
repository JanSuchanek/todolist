<?php

namespace Todolist;

use LeanModel\Entity;


/**
 * Entita reprezentující věc ve vstupní schránce
 * 
 * @property User   $user  m:hasOne
 * 
 * @property int     $id
 * @property string  $title
 * @property string  $note
 */
class Thing extends Entity
{
	
}
