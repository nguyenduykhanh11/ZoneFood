<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey='id';
    protected $guarded = [];

    public function products(){
        return $this->belongsTo(Product::class,'product_id', 'id');
    }

    public function orders(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
//<div class="" style="padding-top: 50px; margin-top: 50px;">
//<div class="col-md-12 table-responsive">
//<h3>Quản Lý Sản Phẩm</h3>
//
//<a href="editor.php"><button class="btn btn-success">Thêm Sản Phẩm</button></a>
//
//<table class="table table-bordered table-hover" style="margin-top: 20px;">
//<thead>
//<tr>
//<th>STT</th>
//<th>tên món</th>
//<th>hình ảnh</th>
//<th>giá</th>
//<th>num</th>
//<th>tổng tiền</th>
//<th style="width: 50px"></th>
//<th style="width: 50px"></th>
//</tr>
//</thead>
//<tbody>
//
//<input type="hidden" value="{{$index = 0}}">
//
//@foreach($order_details as $order)
//                                <tr>
//                                    <th>{{++$index}}</th>
//                                    <td>{{$order->products->name}}</td>
//@foreach($order->products->product_images as $image_order)
//                                        <td><img class="pic-2" src="{{asset('ImageUploads/'.$image_order->image)}}"></td>
//
//@endforeach
//                                    <td>{{$order->products->prince}}</td>
//                                    <td>{{$order->num}}</td>
//                                    <td>{{$order->total}}</td>
//
//                                    <td style="width: 50px">
//                                        <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Trạng thái</button></a>
//                                    </td>
//                                    <td style="width: 50px">
//                                        <a class="collapse-item active" href="order_watting">Đơn đang chờ</a>
//                                    </td>
//
//                                </tr> @endforeach
//                            </tbody>
//                        </table>
//                    </div>
//                </div>
}
