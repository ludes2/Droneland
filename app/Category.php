<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'productcategories';

    /*
    |----------------------------------------------------------------------------------------------------
    | ONE TO MANY RELATIONSHIP
    |----------------------------------------------------------------------------------------------------
    |
    | A Category can have multiple children.
    | A "one-to-many" relationship is used to define relationships where a single model owns any amount of other models.
    | Passing additional arguments: return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    |
     */
    public function children(){
        return $this->hasMany('App\Category', 'parentId', 'id');
    }

    /*
    |----------------------------------------------------------------------------------------------------
    | ONE TO ONE RELATIONSHIP
    |----------------------------------------------------------------------------------------------------
    |
    | A Category can have only one parent.
    | A "one-to-one" relationship is used to define relationships where a single model owns exactly one other model.
    | For example: A User might have exactly one Phone
    | Passing additional arguments: return $this->hasOne('App\Comment', 'foreign_key', 'local_key');
    |
     */
    public function parent(){
        return $this->hasOne('App\Category', 'id', 'parentId');
    }


    /*
    |----------------------------------------------------------------------------------------------------
    | CTREATES A TREE STRUCTURE WTIH PARENT AND CHILDREN
    |----------------------------------------------------------------------------------------------------
    |
    | implode():
    | joins array-elements with a string. First argument is the separator.
    |
    | array_fill():
    | argument one is the first index of the returned array
    | argument two ist the number of elements to insert > 0
    | argument three is the value to insert
    |
    | where():
    | The first argument is the name of the column. The second argument is an operator,
    | which can be any of the database's supported operators.
    | The third argument is the value to evaluate against the column.
    |
     */
    public static function tree(){
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parentId', '=', '0')->get();
    }
}
