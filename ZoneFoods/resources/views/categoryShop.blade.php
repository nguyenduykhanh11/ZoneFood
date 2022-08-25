<section class="featured spad">

    <div class="container" style="cursor: grab;">
        <div class="row">
            <div class="col-lg-12">

                <div class="featured__controls" style="margin-top: 50px">
                    <ul>

                        @foreach ($product_category as $category)
                        <li data-filter=".product-{{$category->id}}" id="product_reload">
                            {{--<a href="{{route('product.Category',['id'=>$category->id])}}">--}}
                            <div class="img">
                                <img src="{{asset('ImageUploads/'.$category->image)}}" alt="">
                            </div>
                            <div class="ca-content">
                                <h2 class="ca-main">{{$category->name}}</h2>
                            </div>
                        </li>
                        @endforeach

                        <a class="link" style="font-size:25px; position: absolute; top: 100px;" class="active"
                            data-filter="*"> Xem
                            tất cả <i class="bi bi-arrow-right-circle-fill"></i></a>

                    </ul>

                </div>
            </div>

        </div>

    </div>
</section>
<!-- Featured Section End -->






<script src="{{asset('js/mixitup.min.js') }}" defer></script>
<script src="{{asset('js/owl.carousel.min.js') }}" defer></script>
<script src="{{asset('js/main.js') }}" defer></script>



<script>

    $('.product_reload').click(function (ev){
        document.getElementsByClassName("infinity-scroll")[0].style.display = "none";
    });

function btnaddtocart(id) {
    var _csrf = '{{csrf_token()}}';
    var _addProductUrl = '{{route("ajax.actionAddProduct")}}';
    var num = 1;
    var money = parseInt($('#tinhtien2-' + id).html());


    console.log(id, num, money, _addProductUrl, _csrf);

    $.ajax({
        url: _addProductUrl,
        type: 'POST',
        data: {
            id: id,
            num: num,
            prince: money,
            _token: _csrf
        },

        success: function(request) {
            if (request.num) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thêm giỏ hàng thành công',
                    showConfirmButton: false,
                    timer: 1500
                })

            }

        }
    });
}
</script>
