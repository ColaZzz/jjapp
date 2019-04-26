<?php

namespace App\Admin\Controllers;

use App\Models\Shop;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ShopController extends Controller
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
            ->header('商铺')
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
            ->header('商铺')
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
            ->header('商铺')
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
            ->header('Create')
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
        $grid = new Grid(new Shop);

        $grid->id('Id');
        $grid->title('商铺名');
        $grid->icon_url('商标')->image();
        $grid->img_url('封面')->image();
        $grid->address('地址');
        $grid->customize_type('自定义子分类');
        $grid->average_spent('人均消费');
        $grid->type_top('是否置顶')->sortable();
        $grid->rank('排序')->sortable();
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        //搜索框
        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->like('title', '店名');
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
        $show = new Show(Shop::findOrFail($id));

        $show->id('Id');
        $show->title('商铺名');
        $show->subtitle('副标题');
        $show->icon_url('商标')->image();
        $show->img_url('封面')->image();
        $show->address('地址');
        $show->introduction('内容')->editor();
        $show->type_top('是否置顶');
        $show->shop_floor_id('楼层');
        $show->shop_business_id('分类');
        $show->customize_type('自定义子分类');
        $show->average_spent('人均消费');
        $show->indexpage('是否首页');
        $show->flag('Flag');
        $show->search_word('搜索关键字');
        $show->rank('排序');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        $show->commodities('商品', function($commodities){
            $commodities->resource('/admin/commodities');

            $commodities->id();
            $commodities->name();
        });
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Shop);

        $form->text('title', '*商铺名');
        $form->text('subtitle', '副标题');
        $form->image('icon_url', '商标')->uniqueName();
        $form->image('img_url', '封面')->uniqueName();
        $form->text('address', '地址');
        $form->editor('introduction', '内容');
        $form->radio('type_top', '是否置顶')->options([0=>'否', 1=>'是']);
        $form->select('shop_floor_id', '*楼层')->options('/api/selectionofshopfloor');
        $form->select('shop_business_id', '*分类')->options('/api/selectionofshopbusiness');
        $form->text('customize_type', '自定义子分类');
        $form->number('average_spent', '人均消费');
        $form->radio('indexpage', '是否首页')->options([0=>'否', 1=>'是']);
        // $form->number('flag', 'Flag');
        $form->text('search_word', '搜索关键字');
        $form->number('rank', '排序');
        $form->text('business_hours', '营业时间');
        return $form;
    }
}
