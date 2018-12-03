<?php

namespace App\Admin\Controllers;

use App\Models\Investment;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class InvestmentController extends Controller
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
            ->header('品牌招商')
            ->description('')
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
            ->header('详情')
            ->description('')
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
            ->header('编辑')
            ->description('')
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
            ->header('创建')
            ->description('')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Investment);

        $grid->id('Id');
        $grid->username('姓名');
        $grid->sex('性别');
        $grid->number('联系方式');
        $grid->business('意向业态');
        $grid->brand('意向品牌');
        $grid->area('意向面积');
        $grid->file('PPT');
        $grid->created_at('提交时间');
        $grid->updated_at('更新时间');

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
        $show = new Show(Investment::findOrFail($id));

        $show->id('Id');
        $show->username('姓名');
        $show->sex('性别');
        $show->number('联系方式');
        $show->business('意向业态');
        $show->brand('意向品牌');
        $show->area('意向面积');
        $show->file('PPT')->file();
        $show->created_at('提交时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Investment);

        $form->text('username', '姓名');
        $form->text('sex', '性别');
        $form->text('number', '联系方式');
        $form->text('business', '意向业态');
        $form->text('brand', '意向品牌');
        $form->text('area', '意向面积');
        $form->textarea('file', 'PPT');

        return $form;
    }
}
