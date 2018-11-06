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

    /**
     * 返回当前楼盘下的户型
     * @param int $id 传入的estate_id
     * @return array 返回类型
     */
    public function showAllRows($id)
    {
        $allRows = $this->where('estate_id', $id)->orderBy('rank', 'desc')->paginate(5);
        return $allRows;
    }

    /**
     * 返回户型的详细信息
     * @param int $id 传入的estate_article_id
     * @return EstateArticle 返回类型
     */
    public function showRows($id)
    {
        $row = $this->find($id);
        $row->estateArticleImages;
        $row->estate;
        return $row;
    }

    /**
     * 随机推荐户型文章
     * @param int $rows 获取随机的行数
     */
    public function randomEstateArticles($rows)
    {
        return $this->with('estate')->inRandomOrder()->limit($rows)->get();
    }
}
