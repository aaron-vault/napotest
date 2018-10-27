<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 27.10.2018
 * Time: 10:27
 */

namespace App\Contracts;


interface PostContract extends CrudContract
{
    public function show($id);
}