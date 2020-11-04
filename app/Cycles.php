<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cycles extends Model
{
    protected $fillable = ['id', 'name', 'grade', 'year', 'deleted'];

    public function Cycles($data)
{
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->grade = $data['grade'];
        $this->year = $data['year'];
        $this->deleted = data;
}
}
