<?php

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


// -------------------news web----------------------
route::get('/','mycontroller@homenews')->name('homepage');

route::get('login','mycontroller@login')->name('login');

route::get('sign','mycontroller@sign')->name('sign');

route::post('showTags','mycontroller@showTags')->name('showTags');

route::post('dangbai','mycontroller@acction_insert')->name('acction_insert');

route::get('category','mycontroller@category')->name('category');

route::get('detailListNews/{slug}.html','mycontroller@detailListNews')->name('detailListNews');

route::get('login_form','mycontroller@login_form')->name('login_form');

route::post('loginAction','mycontroller@loginAction')->name('loginAction');

route::post('signAction','mycontroller@signAction')->name('signAction');

route::get('news_detail/{slug}.html','mycontroller@news_detail')->name('news_detail');

route::post('viewNumber','mycontroller@viewNumber')->name('viewNumber');

route::get('admin','mycontroller@admin')->name('admin');

route::post('commentShow','mycontroller@commentShow')->name('commentShow');

route::post('showReplyComment','mycontroller@showReplyComment')->name('showReplyComment');

route::post('showMoreCommentReply','mycontroller@showMoreCommentReply')->name('showMoreCommentReply');


    // group đăng nhập
route::group(['middleware' => ['ckeck_login']], function (){

    route::get('admin','mycontroller@admin')->name('admin');

    route::post('deleteNews','mycontroller@deleteNews')->name('deleteNews');

    route::get('vietbai','mycontroller@form_insert')->name('form_insert');

    route::get('logout', 'mycontroller@logout')->name('logout');

    route::get('list_news','mycontroller@list_news')->name('list_news');

    route::get('get_edit/{slug}.html','mycontroller@get_edit')->name('get_edit');

    route::post('post_edit/{id}','mycontroller@post_edit')->name('post_edit');

    route::post('delete_news','mycontroller@delete_news')->name('delete_news');

    route::post('postSearchNews','mycontroller@postSearchNews')->name('postSearchNews');

    route::post('listCategory','mycontroller@listCategory')->name('listCategory');

    route::post('showCategory','mycontroller@showCategory')->name('showCategory');

    route::post('updateCategory','mycontroller@updateCategory')->name('updateCategory');

    route::post('deleteCategory/{id}','mycontroller@deleteCategory')->name('deleteCategory');

    route::post('addCategory','mycontroller@addCategory')->name('addCategory');

    route::get('contactView','mycontroller@contactView')->name('contactView');

    route::post('contactUpdate','mycontroller@contactUpdate')->name('contactUpdate');

    route::get('resetPassword','mycontroller@resetPassword')->name('resetPassword');

    route::post('saveChangePassword','mycontroller@saveChangePassword')->name('saveChangePassword');


    // comment

    route::post('postComment','mycontroller@postComment')->name('postComment');

    route::post('postReplyComment','mycontroller@postReplyComment')->name('postReplyComment');

    // videos
    route::get('videos','mycontroller@videos')->name('videos');

    route::post('showlistVideos','mycontroller@showlistVideos')->name('showlistVideos');

    route::get('insertVideos','mycontroller@insertVideos')->name('insertVideos');

    route::post('actionInsertVideos','mycontroller@actionInsertVideos')->name('actionInsertVideos');

    route::get('listVideos','mycontroller@listVideos')->name('listVideos');

    route::post('actionInsertVideosAjax','mycontroller@actionInsertVideosAjax')->name('actionInsertVideosAjax');

    route::post('checkextension','mycontroller@checkextension')->name('checkextension');

    route::get('editVideos/{id}','mycontroller@editVideos')->name('editVideos');

    route::post('deleteVideos','mycontroller@deleteVideos')->name('deleteVideos');

    route::post('updateVideos','mycontroller@updateVideos')->name('updateVideos');


});

    route::get('testOop','videosController@testOop')->name('testOop');
