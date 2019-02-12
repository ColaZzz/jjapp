<?php

namespace App\Admin\Controllers;

use App\Models\UserAccount;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserAccountController extends Controller
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
        $grid = new Grid(new UserAccount);

        $grid->model()->orderBy('created_at','desc');

        $grid->id('Id');
        $grid->username('客户姓名');
        $grid->user_number('联系方式');
        $grid->visit('上门日期')->sortable();
        $grid->follower('跟进人员');
        $grid->follow_date('跟进日期');
        $grid->created_at('创建时间')->sortable();
        $grid->updated_at('更新时间');

        $grid->filter(function ($filter) {

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
        
            // 在这里添加字段过滤器
            $filter->like('username', '客户姓名');
            $filter->like('user_number', '联系方式');
            $filter->where(function ($query) {
                $query->whereDate('visit', "{$this->input}");
            }, '日期');
            $filter->in('follow')->checkbox([
                0    => '无跟进',
                1    => '跟进',
            ]);
            $filter->where(function ($query) {
                $query->where('user_number', 'not like', "%{$this->input}%");
            }, '全号')->select([
                '*'    => '全号',
            ]);
            $filter->where(function ($query) {
                $query->where('user_number', 'like', "%{$this->input}%");
            }, '非全号')->select([
                '*'    => '非全号',
            ]);
        });

        $grid->disableCreateButton();
        $grid->disableActions();

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
        $show = new Show(UserAccount::findOrFail($id));

        $show->id('Id');
        $show->username('客户姓名');
        $show->user_number('联系方式');
        $show->visit('上门日期');
        $show->follower('跟进人员');
        $show->follow_date('跟进日期');
        $show->created_at('创建时间');
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
        $form = new Form(new UserAccount);

        $form->text('username', '客户姓名');
        $form->text('user_number', '联系方式');
        $form->date('visit', '上门日期')->default(date('Y-m-d'));
        $form->text('follower', '跟进人员');
        $form->text('follow_date', '跟进日期');

        return $form;
    }
}
