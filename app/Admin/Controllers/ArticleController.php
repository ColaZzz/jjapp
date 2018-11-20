<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ArticleController extends Controller
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
        $grid = new Grid(new Article);

        $grid->id('Id');
        $grid->title('Title');
        $grid->img_url('Img url');
        $grid->subtitle('Subtitle');
        $grid->state('State');
        // $grid->information('Information');
        $grid->rank('Rank');
        $grid->flag('Flag');
        $grid->type('Type');
        $grid->indexpage('Indexpage');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(Article::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->img_url('Img url');
        $show->subtitle('Subtitle');
        $show->state('State');
        $show->information('Information');
        $show->rank('Rank');
        $show->flag('Flag');
        $show->type('Type');
        $show->indexpage('Indexpage');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);

        $form->text('title', 'Title');
        $form->image('img_url', 'Img url')->uniqueName();
        $form->text('subtitle', 'Subtitle');
        $form->text('state', 'State');
        $form->editor('information', 'Information');
        $form->number('rank', 'Rank');
        $form->number('flag', 'Flag');
        $form->number('type', 'Type');
        $form->number('indexpage', 'Indexpage');

        return $form;
    }
}
