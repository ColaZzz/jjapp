<?php

namespace App\Admin\Controllers;

use App\Models\EstateImage;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EstateImageController extends Controller
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
        $grid = new Grid(new EstateImage);

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->where(function ($query) {

                $query->whereHas('estate', function ($query) {
                    $query->where('title', 'like', "%{$this->input}%");
                });
            
            }, '楼盘名称');
        });

        $grid->id('Id');
        // $grid->estate_id('Estate id');
        $grid->estate()->title('名称')->label('primary');
        $grid->imgurl('图片')->image();
        $grid->rank('排位（越大表示越靠前）');
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
        $show = new Show(EstateImage::findOrFail($id));

        $show->id('Id');
        // $show->estate_id('Estate id');
        $show->estate()->title('名称');
        $show->imgurl('图片')->image();
        $show->rank('排位');
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
        $form = new Form(new EstateImage);

        $form->select('estate_id', 'Estate id')->options('/api/selectionoftitle');
        $form->image('imgurl', 'Imgurl')->uniqueName();
        $form->number('rank', '排位');

        return $form;
    }
}
