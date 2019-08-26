<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.08.2019
 * Time: 1:40
 */

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController as GuestBaseController;

/**
 * Базовый когтроллер для всех контроллеров управления
 * блогом в панели администрирования.
 *
 * Должен быть родителем всех контроллеров управления блогом.
 *
 * @package App\Http\Controllers\Blog\Admin
 */
abstract class BaseController extends GuestBaseController
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        // Инициализация общих моментов для админки.
    }
}