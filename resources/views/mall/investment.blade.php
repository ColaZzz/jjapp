<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>品牌招商</title>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <style>
        .row{
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="page-header" style="text-align: center;">
                <h1>品牌招商</h1>
            </div>
        </div>
    </div>
    @include('shared._errors')
    <form action="/investmentstore" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">姓名:</span>
                    <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="请输入姓名" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">性别:</span>
                    <input type="radio" name="sex" value="男" /> 男
                    <input type="radio" name="sex" value="女" /> 女
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">联系方式:</span>
                    <input type="text" name="number" value="{{old('number')}}" class="form-control" placeholder="请输入联系方式" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">意向经营业态:</span>
                    <input type="text" name="business" value="{{old('business')}}" class="form-control" placeholder="请输入意向经营业态" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">意向品牌名称:</span>
                    <input type="text" name="brand" value="{{old('brand')}}" class="form-control" placeholder="请输入意向品牌名称" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">意向铺位面积:</span>
                    <input type="text" name="area" value="{{old('area')}}" class="form-control" placeholder="请输入意向铺位面积" aria-describedby="basic-addon1">
                    <span class="input-group-addon">m²</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <label for="">资料(不超过8M|非必填)</label>
                <input type="file" name="file" class="form-control"></input>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-xs-4 col-xs-offset-4">
                <button class="btn btn-default" type="submit">提交资料</button>
            </div>
        </div>
    </form>

    <script>

    </script>
</body>

</html>