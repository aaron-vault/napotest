<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 27.10.2018
 * Time: 10:23
 */

namespace App\Contracts;

use Illuminate\Http\Request;

interface CrudContract
{
    public function create(Request $data);
    public function all();
    public function update(Request $data, $id);
    public function delete($id);
}