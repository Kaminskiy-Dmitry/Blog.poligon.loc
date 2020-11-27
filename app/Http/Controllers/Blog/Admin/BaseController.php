<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;

abstract class BaseController extends GuestBaseController
{
    /**
     * Базовый контроллер для всех контроллеров управления
     * блогом в панели администрирования.
     *
     * Должен быть родителем всех контроллеров управления блогом.
     *
     * @package App\Http\Controllers\Blog\Admin
     */

    /**
     * Base Controller
    */
    public function __construct(){
        //Инициализация общих параметров
    }
}
