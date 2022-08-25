<!DOCTYPE html>
<html>

<head>
    <title>Thêm Sản Phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://www.flati/" type="image/x-icon" />


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<style type="text/css">

</style>

<body>
    <form action="add_food_done" method="POST" enctype="multipart/form-data">
        <div class="" style="padding-top: 50px;margin-top: 50px;">
            <div class="container">
                <h3>Thêm Sản Phẩm</h3>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-9 col-12">
                                <div class="form-group">
                                    <label>Tên Sản Phẩm:</label>
                                    <input type="text" class="form-control" name="name">

                                </div>
                                <div class="form-group">
                                    <label>Nội Dung:</label>
                                    <textarea type="text" class="form-control" rows="5" name="description"
                                        id="description"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Lưu Sản Phẩm</button>
                            </div>
                            <div class="col-md-3 col-12"
                                style="border: solid grey 1px; padding-top: 10px; padding-bottom: 10px;">
                                <div class="form-group" style="font-size:14px;">
                                    <input type="file" name="image"><br>
                                    <input type="file" name="image2"><br>
                                </div>

                                <div class="form-group">
                                    <label>Danh Mục Sản Phẩm:</label>
                                    <select class="form-group" name="category" style="font-size:20px;">
                                        @foreach($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá:</label>
                                    <input required="true" type="text" class="form-control" name="prince">
                                </div>
                                <div class="form-group">
                                    <label>Giảm Giá:</label>
                                    <input required="true" type="text" class="form-control" name="discount">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @csrf

    </form>
</body>

</html>