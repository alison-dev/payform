<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Models;

use \Source\Core\Model;


/**
 * @author Alison
 */
class Form extends Model
{
    public function __construct()
    {
        parent::__construct("form", ["id"], ["name", "email", "telephone", "desired_job_title", "categories", "curriculum", "userip"]);
    }
}
