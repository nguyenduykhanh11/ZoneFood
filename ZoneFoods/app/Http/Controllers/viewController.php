public function actionAddProduct(Request $request)
{


session_start();

$_SESSION['soluong'] = [$request->id, $request->num, $request->id_money];
$data = [
'id_product' => $request->id,
'num' => $request->num,
'prince' => $request->prince,

];

$cartUpdate = Cart::where(['id_product'=>$request->id])->get();

//        Update
try {
if($cartUpdate) {
$num = $cartUpdate[0]->num + $request->num;
$prince = $cartUpdate[0]->prince + $request->prince;
$aa = DB::table('carts')
->where('id_product', $request->id)
->update(['num' => $num , 'prince' => $prince]);
return response()->json(['num' => 'update thanh cong']);
}
}
catch (\Throwable $er){
if ($cart = Cart::create($data)){
return response()->json(['num' => 'thanh cong']);
}
}


//        Create
return response()->json(['num' => 'Khong thanh cong']);

}
///*xữ lý ajax, nut num product*/


public function addNumCart(Request $request)
{
$data = [
'id' => $request->id,
'num' => $request->num,
'prince' => $request->prince,
];


$aa =DB::table('carts')
->where('id', $request->id)
->update(['num' => $request->num, 'prince' => $request->prince,]);

if($aa){
return response()->json(['num' => 'thanh cong']);
}
return response()->json(['num' => 'that bai']);

}

public function deleteProductCart(Request $request)
{

if($aa = DB::table('carts')->where(['id'=>$request->id])->delete()){
return response()->json(['num' => 'thanh cong']);
}
return response()->json(['num' => 'that bai']);

}
