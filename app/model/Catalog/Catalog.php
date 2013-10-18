<?php

/**
 * ToDoList
 * Školní projekt k seznámení s Nette a ORM
 * 
 * @author IIVOS <miroslav.mrazek@gmail.com>
 */

namespace Todolist\Model;


/**
 * Entita reprezentujici seznam úkolů
 * 
 * @property User   $user m:hasOne
 * 
 * @property int    $id
 * @property string $title
 */
class Catalog extends Entity
{

}