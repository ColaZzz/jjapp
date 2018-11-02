<?php

namespace App\Admin\Controllers;

use App\Models\Estate;
use App\Models\EstateArticle;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EstateController extends Controller
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
        $grid = new Grid(new Estate);

        $grid->id('Id');
        $grid->title('名称');
        $grid->area('地区');
        $grid->address('地址');
        $grid->state('状态');
        $grid->price('价格');
        // $grid->icon_url('Icon url');
        // $grid->img_url('Img url');
        // $grid->flag('Flag');
        // $grid->start_time('开盘时间');
        // $grid->sell_address('销售地址');
        // $grid->property_year('产权年限');
        // $grid->decoration('装修');
        // $grid->development_company('开发商');
        // $grid->greening('绿化率');
        // $grid->place_area('占地面积');
        // $grid->house_area('住宅面积');
        // $grid->property_costs('物业费');
        // $grid->property_company('物业公司');
        // $grid->telephone('电话');
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
        $show = new Show(Estate::findOrFail($id));

        $show->id('Id');
        $show->title('名称');
        $show->area('地区');
        $show->address('地址');
        $show->state('状态');
        $show->price('价格');
        $show->icon_url('商标')->image();
        $show->img_url('封面')->image();
        $show->flag('Flag');
        $show->start_time('开盘时间');
        $show->sell_address('销售地址');
        $show->property_year('产权年限');
        $show->decoration('装修');
        $show->development_company('开发商');
        $show->greening('绿化率');
        $show->place_area('占地面积');
        $show->house_area('住宅面积');
        $show->property_costs('物业费');
        $show->property_company('物业公司');
        $show->telephone('电话');
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
        $form = new Form(new Estate);

        $form->text('title', '* 名称');
        $form->text('area', '* 地区');
        $form->text('address', '* 地址');
        $form->select('state', '* 状态')->options(['待售' => '待售', '开盘' => '开盘']);
        $form->text('price', '* 价格');
        $form->image('icon_url', '* 商标')->uniqueName();
        $form->image('img_url', '* 封面')->uniqueName();
        $form->select('flag', '* 类型')->options([1 => '住宅']);
        $form->datetime('start_time', '开盘时间')->default(date('Y-m-d'));
        $form->text('sell_address', '销售地址');
        $form->text('property_year', '产权年限');
        $form->select('decoration', '装修')->options(['毛坯' => '毛坯', '精装' => '精装']);
        $form->text('development_company', '开发商');
        $form->text('greening', '绿化率');
        $form->text('place_area', '占地面积');
        $form->text('house_area', '住宅面积');
        $form->text('property_costs', '物业费');
        $form->text('property_company', '物业公司');
        $form->text('telephone', '电话');

        return $form;
    }
}
