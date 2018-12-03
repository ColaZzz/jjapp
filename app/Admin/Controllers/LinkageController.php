<?php

namespace App\Admin\Controllers;

use App\Models\Linkage;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LinkageController extends Controller
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
            ->header('联动单')
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
        $grid = new Grid(new Linkage);

        $grid->id('Id');
        $grid->user_id('User id');
        $grid->platform('Platform');
        $grid->project('Project');
        $grid->company('Company');
        $grid->worker('Worker');
        $grid->worker_number('Worker number');
        $grid->username('User Name');
        $grid->user_number('User number');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->qrcode('Qrcode');
        $grid->state('State');

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
        $show = new Show(Linkage::findOrFail($id));

        $show->id('Id');
        $show->user_id('User id');
        $show->platform('Platform');
        $show->project('Project');
        $show->company('Company');
        $show->worker('Worker');
        $show->worker_number('Worker number');
        $show->user('User');
        $show->user_number('User number');
        $show->created_at('Created at');
        $show->updated_at('Updated at');
        $show->qrcode('Qrcode');
        $show->state('State');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Linkage);

        $form->number('user_id', 'User id');
        $form->text('platform', 'Platform');
        $form->text('project', 'Project');
        $form->text('company', 'Company');
        $form->text('worker', 'Worker');
        $form->text('worker_number', 'Worker number');
        $form->text('user', 'User');
        $form->text('user_number', 'User number');
        $form->text('qrcode', 'Qrcode');
        $form->number('state', 'State');

        return $form;
    }
}
