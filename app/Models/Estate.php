<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    /**
     * 关联关系
     * 关联对象：EstateImage
     * 数量关系：一对多
     */
    public function estateImages()
    {
        return $this->hasMany('App\Models\EstateImage', 'estate_id', 'id');
    }

    // 远程关联 EstateArticleImage
    public function estateArticleImages()
    {
        return $this->hasManyThrough('EstateArticleImage', 'EstateArticle', 'estate_id', 'estate_article_id', 'id', 'id');
    }

    /**
     * 返回楼盘列表
     *@return array 返回类型
     */
    public function showEstateList()
    {
        return Estate::orderBy('rank', 'desc')->paginate(5);
    }

    /**
     * 返回楼盘详情
     *@param int $id 传入的estate_id
     *@return EstateArticle 返回类型
     */
    public function showEstate($id)
    {
        return $this->where('id', $id)->with(['estateImages' => function ($query) {
            $query->orderBy('rank', 'desc');
        }])->first();
    }

    /**
     * 楼盘列表排序
     * @param string $state 销售状态
     * @param int $priceRank 0默认1升序2降序
     */
    public function estateFilter($state, $priceRank)
    {
        $rank;
        $price;

        if($state && $priceRank){
            $rank = null;
        }else{
            $rank = 'desc';
        }
        
        if($priceRank == 1){
            $price = 'asc';
        }else if($priceRank == 2){
            $price = 'desc';
        }else if($priceRank == 0){
            $price = null;
        }

        return $this->when($state, function ($query) use ($state) {
            return $query->where('state', $state);
        })
        ->when($price, function ($query) use ($price){
            return $query->orderBy('price', $price);
        })
        ->when($rank, function ($query) use ($rank) {
            return $query->orderBy('rank', $rank);
        })
        ->paginate(5);
    }
}
