<?php

namespace App\Admin\Controllers;

use App\Models\EstateArticle;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\Estate;

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
            ->header('户型')
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
            ->header('户型详情')
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
            ->header('户型编辑')
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
            ->header('创建户型')
            ->description('带*为必填项')
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
        $grid->estate()->title('所属楼盘')->label('primary')->sortable();
        $grid->img_url('封面图片')->image();
        $grid->title('名称');
        $grid->total('总价');
        $grid->house_area('房屋面积');
        $grid->payment_proprotion('首付比例');
        $grid->direction('朝向');
        // $grid->content('简介');
        $grid->created_at('创建时间');
        $grid->updated_at('最后更新');

        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->like('estate.title', '所属楼盘');
        });
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
        $show->img_url('封面图片')->image();
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
        $form->image('img_url', '* 封面图片')->uniqueName();
        $form->text('title', '* 名称');
        $form->text('subtitle', '副标题');
        $form->text('total', '* 总价');
        $form->text('house_area', '* 房屋面积');
        $form->text('payment_proprotion', '* 首付比例');
        $form->text('direction', '* 朝向');
        $form->kindeditor('content', '简介');
        $form->number('rank', '排序');
        $form->radio('indexpage', '是否在首页显示')->options([ 1 => '是', 0 => '否']);

        return $form;
    }
}
