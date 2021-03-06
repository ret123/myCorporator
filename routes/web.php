<?php
use App\Ward;
use App\Area;
use App\Corporator;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Corporators@home');

Auth::routes();
Route::get('new_ticket/resend','TicketsController@resendOtp');
Route::get('new_ticket/verify',function(){
  return view('tickets.verify');
});

Route::post('new_ticket/verify',[
  //'middleware' => 'pin',
  'as' => 'tickets.verify',
  'uses' => 'TicketsController@verify',
]);


Route::get('/home', 'Corporators@home');
Route::get('corporators/{corporator_id}','Corporators@show');
Route::get('/search','Corporators@search');
Route::get('new_ticket/{corporator_id}','TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');
Route::get('ticket/{id}','TicketsController@showTicket');

Route::group(['prefix' => 'admin', 'middleware' => 'corporator'], function() {
  Route::post('close_ticket/{ticket_id}','TicketsController@close');
  Route::get('assign_ticket/{ticket_id}','TicketsController@assign');
  Route::post('assign_ticket','TicketsController@saveAssign');
});

/*
Route::get('/ward/{id}/area',function($id){
$ward=Ward::find($id);
foreach($ward->areas as $area) {
  echo $area->name.'<br>';
}
});
Route::get('/ward/{id}/corporators',function($id){
$ward=Ward::find($id);
foreach($ward->corporators as $corporator) {
  echo $corporator->name.'<br>';
}
});

Route::get('/corporator/{id}/ward',function($id){
$corporator=Corporator::find($id);
return $corporator->ward->name;

});
Route::get('/corporator/{id}/area',function($id){
$corporator=Corporator::find($id);
return $corporator->area->name;

});
Route::get('/ward/{id}/area/{name}', function($id,$name){
  $area=Area::find($name)->where('ward_id',$id);
  $corporator=Corporator::find($area);
  return $corporator->name;
});

Route::get('/ward',function(){
  $wards=Ward::orderBy('name')->get();
  foreach($wards as $ward) {
    echo $ward->name;
  }
});



Route::get('/areas',function(){
  $areas=Area::orderBy('name')->get();
  foreach($areas as $ward) {
    echo $ward->name;
  }
});
*/
