<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application\mixed;
use PhpParser\Node\Expr\AssignOp\Mod;

/**
 * Class CoreRepository.
 *
 * @package App/Repositories
 *
 * Репоситорий работы с сущностью.
 * Может выдавать наборы данных
 * Не может создавать/изменять сущности.
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */

    protected $model;

    /**
     *CoreRepository construct
     */

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * @return Model|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
