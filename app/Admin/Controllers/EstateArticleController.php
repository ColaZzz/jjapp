<?php

namespace App\Admin\Controllers;

use App\Models\EstateArticle;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EstateArticleController extends Controller
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
        $grid = new Grid(new EstateArticle);

        $grid->id('Id');
        $grid->estate()->title('所属楼盘')->label('primary');
        $grid->title('名称');
        $grid->total('总价');
        $grid->house_area('房屋面积');
        $grid->payment_proprotion('首付比例');
        $grid->direction('朝向');
        // $grid->content('简介');
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
        $show = new Show(EstateArticle::findOrFail($id));

        $show->id('Id');
        $show->estate_id('所属楼盘');
        $show->title('名称');
        $show->total('总价');
        $show->house_area('房屋面积');
        $show->payment_proprotion('首付比例');
        $show->direction('朝向');
        $show->content('简介');
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
        $form = new Form(new EstateArticle);

        $form->select('estate_id', '* 所属楼盘')->options('/api/selectionoftitle');
        $form->text('title', '* 名称');
        $form->text('total', '* 总价');
        $form->text('house_area', '* 房屋面积');
        $form->text('payment_proprotion', '* 首付比例');
        $form->text('direction', '* 朝向');
        $form->editor('content', '简介');

        return $form;
    }
}
