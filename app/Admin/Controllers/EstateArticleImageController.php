<?php

namespace App\Admin\Controllers;

use App\Models\EstateArticleImage;
use App\Models\EstateArticle;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EstateArticleImageController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EstateArticleImage);

        //默认弹出筛选
        $grid->expandFilter();
        
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->where(function ($query) {

                $query->whereHas('estateArticle', function ($query) {
                    $query->where('id', "{$this->input}");
                });
            
            }, '户型ID');
        });

        // 列操作按钮 查看、编辑、删除
        $grid->actions(function ($actions) {
            // $actions->disableDelete();
            // $actions->disableEdit();
            $actions->disableView();
        });

        // $grid->id('Id');
        $grid->estate_article_id('户型ID')->label('danger');
        $grid->estateArticle()->title('户型')->label('primary');
        $grid->imgurl('图片')->image();
        $grid->rank('排序（数字越大表示越靠前）');
        $grid->created_at('创建时间');
        $grid->updated_at('最后更新');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(EstateArticleImage::findOrFail($id));

        $show->id('Id');
        $show->estate_article_id('户型ID');
        $show->imgurl('图片')->image();
        $show->rank('排序');
        $show->created_at('创建时间');
        $show->updated_at('最后更新');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EstateArticleImage);

        $form->number('estate_article_id', '户型ID');
        $form->image('imgurl', '图片')->uniqueName();
        $form->number('rank', '排序');

        return $form;
    }
}
