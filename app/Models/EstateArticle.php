<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstateArticle extends Model
{
    protected $table = 'estate_article';

    public function estateArticleImages()
    {
        return $this->hasMany('App\Models\EstateArticleImage', 'estate_article_id', 'id');
    }

    public function estate(){
        return $this->belongsTo('App\Models\Estate', 'estate_id', 'id');
    }

    public function showAllRows($id)
    {
        $allRows = $this->where('estate_id', $id)->orderBy('rank', 'desc')->paginate(5);
        // $allRows = $this->with('estateArticleImages')->where('estate_id', $id)->orderBy('rank', 'desc')->paginate(5);
        // foreach($allRows as $row){
        //     $row->estateArticleImages;
        // }
        return $allRows;
    }

    public function showRows($id)
    {
        $row = $this->find($id);
        $row->estateArticleImages;
        $row->estate;
        return $row;
    }
}
