<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Country;
use App\Post;
use App\User;



Route::get('/', function () {

    return view('welcome');


});

//Route::get('/about', function () {
//
//    echo "hi about page";
//
//
//});
//
//Route::get('/contact', function () {
//
//echo "I am contact page";
//
//
//});
//
//
//Route::get('/post/{id}/{name}', function($id,$name) {
//
//    return "this is the post number". $id . " " .$name;
//
//});
//
//Route::get('/admin/posts/example',array('as' => 'admin.home' ,function(){
//
//
//
//    $url = route('admin.home');
//    return "this url is ". $url;
//
//
//}));
   //  Route::get('post/{num}', 'PostsController@index');















//     Route::resource('posts', 'PostsController');
//
//
//     Route::get('/contact','PostsController@contact');
//
//
//     Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');
//

//Database row queries


//inserting to db
//Route::get('/insert', function(){
//
//    DB::insert('insert into posts(title, content) value(?, ?)',['PHP with Laravel','Laravel is the best thing that has happened to php']);
//
//});

//reading the db
//    Route::get('/read', function(){
//
//    $results = DB::select("select * from posts where id = ?", [1]);
//
////    return $results;
//
//    foreach ($results as $post){
//
//        return $post->title;
//    }
//
//    });

//updating the db

//Route::get('/update', function (){
//
//
//$updated= DB::update('update posts set title = "updated title" where id =?', [1]);
//return $updated;
//
//
//});


//deleting a table


//Route::get('/delete', function(){
//
//$deleted = DB::delete('delete from posts where id= ?', [1]);
//
//return $deleted;
//
//});

////ELOQUENT or object relational model
//Route::get('/find', function(){
//
//$post = Post::find(2);
//    Return $post->title     ;
////foreach($posts as $post){
////
//// Return $post->id ;
//
////}
//
//
//});




//Route::get('/findmore', function(){
//
//
////   $posts = Post::findOrFail(1);
////   return $posts;
//
//     $posts = Post::where('users_count', '<', 50)->firstOrFail();
//
//
//});

//
//    Route::get('/basicinsert', function(){
//
//
//    $post = new Post;
//    $post->title= 'new Eloquent title insert';
//    $post->content = 'Wow eloquent is really cool, look at this content';
//    $post->save();
//
//    });

//Route::get('create', function(){
//
//    Post::create(['title'=>'the create method', 'content'=>'Wow this is amazing']);
//
//});



//Route::get('/update', function(){
//
//
//
//   Post::where('id', 2)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'I love Laravel']) ;
//
//
//});

//Route::get('/delete', function(){
//
//
//   $post = Post::find(4);
//
//   $post->delete();

//});

//Route::get('delete2', function(){
//
//
//   Post::destroy([]);
//
//
//});

Route::get('/softdelete', function(){


 Post::find(6)->delete();


});
//
//Route::get('readsoftdelete', function(){
//
//
////   $post = Post::find();
////   return $post;
////   $post = Post::withTrashed()->where('id', 6)->get();
////   return $post;
//     $post = Post::onlyTrashed()->where('id', 6)->get();
//     return $post;
//
//});


//Route::get('/restore', function(){
//
//    Post::withTrashed()->where('is_admin', 0)->restore();
//
//});



// Eloquent relationships


//has one / one to one relationship



Route::get('/user/{id}/post', function($id){

    return User::find($id)->post->content;

});

Route::get('/post/{id}/user', function($id){
    return Post::find($id)->user->name;
});



Route::get('/forcedelete', function(){


    Post::withTrashed()->where('id', 6)->forceDelete();


});

//one to many relationships
Route::get('/posts', function(){

   $user = User::find(1);
    foreach($user->posts as $post){

        echo $post->title . "<br>";

    }

});
//many to many relationship

//Route::get('/user/{id}/role', function($id){
//
//    $user = User::find(1)->roles()->orderBy('id', 'desc')->get();
//      return $user;
////    $user = User::find($id);
////    foreach($user->roles as $role){
////        return $role->name;
////    }
//
//});




////accessing the intermediate table
//Route::get('user/pivot', function(){
//
//    $user = User::find(1);
//    foreach ($user->roles as $role){
//
//        return $role->pivot;
//
//    }
//
//
//});
//Route::get('/user/country', function(){
//
//    $country = Country::find(7);
//    foreach($country->posts as $post) {
//
//        return $post->title;
//
//    }
//
//});

// Polymorphic Relations
Route::get('user/photos', function(){

    $user = User::find(1);

    foreach($user->photos as $photo) {

        return $photo;

    }


});
Route::get('post/{id}/photos', function($id){

    $post = Post::find($id);

    foreach($post->photos as $photo) {

        echo $photo->path . "</br>";

    }


});

