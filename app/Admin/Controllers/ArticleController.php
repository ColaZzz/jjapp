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
        $grid->title('标题');
        $grid->img_url('封面');
        $grid->subtitle('副标题');
        $grid->state('状态');
        // $grid->information('内容');
        $grid->rank('排序');
        // $grid->flag('Flag');
        // $grid->type('类型');
        $grid->indexpage('是否首页');
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
        $show = new Show(Article::findOrFail($id));

        $show->id('Id');
        $show->title('标题');
        $show->img_url('封面')->image();
        $show->subtitle('副标题');
        $show->state('状态');
        $show->information('内容');
        $show->rank('排序')->sortable();
        // $show->flag('Flag');
        // $show->type('类型');
        $show->indexpage('是否首页');
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
        $form = new Form(new Article);

        $form->text('title', '标题');
        $form->image('img_url', '封面')->uniqueName();
        $form->text('subtitle', '副标题');
        $form->select('state', '状态')->options(['正在进行' => '正在进行', '尚未开始' => '尚未开始', '已结束' => '已结束']);
        $form->editor('information', '内容');
        $form->number('rank', '排序');
        // $form->number('flag', 'Flag');
        // $form->radio('type', '类型')->options([1 => '活动资讯', 2 => '商家资讯',]);
        $form->radio('indexpage', '是否首页')->options([0 => '不显示在首页', 1 => '显示在首页',]);

        return $form;
    }
}
