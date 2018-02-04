<?php

     Route::group(['namespace' => 'Modules\Admin\Http\Controllers'], function() {

        Route::get('admin/login','AuthController@index');
        Route::get('admin/forgot-password','AuthController@forgetPassword');
        Route::post('password/email','AuthController@sendResetPasswordLink');
        Route::match(['get','post'],'AuthController@resetPassword'); 
        Route::get('admin/logout','AuthController@logout');  
        Route::match(['get','post'],'admin/signup/{step}','AuthController@signup');
        Route::match(['post','get'],'admin/email_verification','AuthController@emailVerification');
        Route::get('admin/login','AuthController@index');
     });

    Route::match(['post'],'admin/user/addCard','PaymentController@addCard');
    Route::match(['get'],'admin/user/cardList','PaymentController@cardList');





    Route::post('admin/login',function(App\Admin $user, \Illuminate\Http\Request $request){
   
    $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')]; 
    $admin_auth = auth()->guard('admin'); 
    $user_auth =  auth()->guard('web'); //Auth::attempt($credentials);

    if ($admin_auth->attempt($credentials) OR $user_auth->attempt($credentials)) {
            return Redirect::to('admin');
        }else{  
            return redirect()
                    ->back()
                        ->withInput()  
                            ->withErrors(['message'=>'Invalid email or password. Try again!']);
            } 
    });


    Route::group(['middleware' => 'admin', 'namespace'=>'Modules\Admin\Http\Controllers' ], function () { 
         Route::get('admin', 'AdminController@index');
         Route::view('admin/drag-excel','packages::dashboard.drag-excel');
         Route::view('admin/add-card','packages::dashboard.add-card');  
         Route::view('admin/add-excel','packages::dashboard.add-excel'); 
         Route::get('admin/billing','AdminController@billing'); 
        Route::get('admin/account/{myprofile}','AdminController@renderPage');      
    }); 
      
    Route::group(['middleware' => ['admin']], function () { 
        Route::get('admin', 'Modules\Admin\Http\Controllers\AdminController@index');
        /*------------User Model and controller---------*/
        Route::bind('user', function($value, $route) {
            return Modules\Admin\Models\User::find($value);
        });

        Route::resource('admin/user', 'Modules\Admin\Http\Controllers\UsersController', [
            'names' => [
                'edit' => 'user.edit',
                'show' => 'user.show',
                'destroy' => 'user.destroy',
                'update' => 'user.update',
                'store' => 'user.store',
                'index' => 'user',
                'create' => 'user.create',
            ]
                ]
        );


        


        Route::bind('targetMarket', function($value, $route) {
            return Modules\Admin\Models\TargetMarketType::find($value);
        });

        Route::resource('admin/targetMarket', 'Modules\Admin\Http\Controllers\TargetMarketTypeController', [
            'names' => [
                'edit' => 'targetMarket.edit',
                'show' => 'targetMarket.show',
                'destroy' => 'targetMarket.destroy',
                'update' => 'targetMarket.update',
                'store' => 'targetMarket.store',
                'index' => 'targetMarket',
                'create' => 'targetMarket.create',
            ]
                ]
        );

         Route::bind('businessNature', function($value, $route) {
            return Modules\Admin\Models\BusinessNatureType::find($value);
        });

        Route::resource('admin/businessNature', 'Modules\Admin\Http\Controllers\BusinessNatureTypeController', [
            'names' => [
                'edit' => 'businessNature.edit',
                'show' => 'businessNature.show',
                'destroy' => 'businessNature.destroy',
                'update' => 'businessNature.update',
                'store' => 'businessNature.store',
                'index' => 'businessNature',
                'create' => 'businessNature.create',
            ]
                ]
        );




        


       
        /*------------User Category and controller---------*/

            Route::bind('category', function($value, $route) {
                return Modules\Admin\Models\Category::find($value);
            });
     
            Route::resource('admin/category', 'Modules\Admin\Http\Controllers\CategoryController', [
                'names' => [
                    'edit'      => 'category.edit',
                    'show'      => 'category.show',
                    'destroy'   => 'category.destroy',
                    'update'    => 'category.update',
                    'store'     => 'category.store',
                    'index'     => 'category',
                    'create'    => 'category.create',
                ]
                    ]
            );
        /*---------End---------*/   


        /*------------User Category and controller---------*/

            Route::bind('sub-category', function($value, $route) {
                return Modules\Admin\Models\Category::find($value);
            });
     
            Route::resource('admin/sub-category', 'Modules\Admin\Http\Controllers\SubCategoryController', [
                'names' => [
                    'edit' => 'sub-category.edit',
                    'show' => 'sub-category.show',
                    'destroy' => 'sub-category.destroy',
                    'update' => 'sub-category.update',
                    'store' => 'sub-category.store',
                    'index' => 'sub-category',
                    'create' => 'sub-category.create',
                ]
                    ]
            );
             /*------------User Category and controller---------*/

            Route::bind('category-dashboard', function($value, $route) {
                return Modules\Admin\Models\CategoryDashboard::find($value);
            });
     
            Route::resource('admin/category-dashboard', 'Modules\Admin\Http\Controllers\CategoryDashboardController', [
                'names' => [
                    'edit' => 'category-dashboard.edit',
                    'show' => 'category-dashboard.show',
                    'destroy' => 'category-dashboard.destroy',
                    'update' => 'category-dashboard.update',
                    'store' => 'category-dashboard.store',
                    'index' => 'category-dashboard',
                    'create' => 'category-dashboard.create',
                ]
                    ]
            );
        /*---------Contact Route ---------*/    

        Route::bind('contact', function($value, $route) {
            return Modules\Admin\Models\Contact::find($value);
        });
 
        Route::resource('admin/contact', 'Modules\Admin\Http\Controllers\ContactController', [
            'names' => [
                'edit' => 'contact.edit',
                'show' => 'contact.show',
                'destroy' => 'contact.destroy',
                'update' => 'contact.update',
                'store' => 'contact.store',
                'index' => 'contact',
                'create' => 'contact.create',
            ]
                ]
        );  

         Route::bind('comment', function($value, $route) {
            return App\Models\Comments::find($value);
        });
 
        Route::resource('admin/comment', 'Modules\Admin\Http\Controllers\CommentController', [
            'names' => [
                'edit' => 'comment.edit',
                'show' => 'comment.show',
                'destroy' => 'comment.destroy',
                'update' => 'comment.update',
                'store' => 'comment.store',
                'index' => 'comment',
                'create' => 'comment.create',
            ]
                ]
        );  



         Route::bind('postTask', function($value, $route) {
            return Modules\Admin\Models\PostTask::find($value);
        });
 
        Route::resource('admin/postTask', 'Modules\Admin\Http\Controllers\PostTaskController', [
            'names' => [
                'edit' => 'postTask.edit',
                'show' => 'postTask.show',
                'destroy' => 'postTask.destroy',
                'update' => 'postTask.update',
                'store' => 'postTask.store',
                'index' => 'postTask',
                'create' => 'postTask.create',
            ]
                ]
        );  



        // programs
         Route::bind('program', function($value, $route) {
            return Modules\Admin\Models\Program::find($value);
        });
 
        Route::resource('admin/program', 'Modules\Admin\Http\Controllers\ProgramController', [
            'names' => [
                'edit' => 'program.edit',
                'show' => 'program.show',
                'destroy' => 'program.destroy',
                'update' => 'program.update',
                'store' => 'program.store',
                'index' => 'program',
                'create' => 'program.create',
            ]
                ]
        );  

         Route::get('admin/createGroup', 'Modules\Admin\Http\Controllers\ContactController@createGroup');  
         Route::post('admin/contact/import', 'Modules\Admin\Http\Controllers\ContactController@contactImport');  


         Route::bind('contacts', function($value, $route) {
            return Modules\Admin\Models\Contact::find($value);
        });

        Route::resource('admin/contacts', 'Modules\Admin\Http\Controllers\ContactController', [
            'names' => [
                'edit' => 'contacts.edit',
                'show' => 'contacts.show',
                'destroy' => 'contacts.destroy',
                'update' => 'contacts.update',
                'store' => 'contacts.store',
                'index' => 'contacts',
                'create' => 'contacts.create',
            ]
                ]
        );  



        Route::get('admin/updateGroup', 'Modules\Admin\Http\Controllers\ContactGroupController@updateGroup'); 
         /*---------Contact Route ---------*/    

        Route::bind('contactGroup', function($value, $route) {
            return Modules\Admin\Models\ContactGroup::find($value);
        });
 
        Route::resource('admin/contactGroup', 'Modules\Admin\Http\Controllers\ContactGroupController', [
            'names' => [
                'edit' => 'contactGroup.edit',
                'show' => 'contactGroup.show',
                'destroy' => 'contactGroup.destroy',
                'update' => 'contactGroup.update',
                'store' => 'contactGroup.store',
                'index' => 'contactGroup',
                'create' => 'contactGroup.create',
            ]
                ]
        );


        Route::bind('transaction', function($value, $route) {
            return Modules\Admin\Models\Transaction::find($value);
        });
 
        Route::resource('admin/transaction', 'Modules\Admin\Http\Controllers\TransactionController', [
            'names' => [
                'edit'      => 'transaction.edit',
                'show'      => 'transaction.show',
                'destroy'   => 'transaction.destroy',
                'update'    => 'transaction.update',
                'store'     => 'transaction.store',
                'index'     => 'transaction',
                'create'    => 'transaction.create',
            ]
                ]
        ); 

        Route::bind('setting', function($value, $route) {
            return Modules\Admin\Models\Settings::find($value);
        });
 
        Route::resource('admin/setting', 'Modules\Admin\Http\Controllers\SettingsController', [
            'names' => [
                'edit'      => 'setting.edit',
                'show'      => 'setting.show',
                'destroy'   => 'setting.destroy',
                'update'    => 'setting.update',
                'store'     => 'setting.store',
                'index'     => 'setting',
                'create'    => 'setting.create',
            ]
                ]
        ); 


          Route::bind('page', function($value, $route) {
            return Modules\Admin\Models\Pages::find($value);    
        });
 
        Route::resource('admin/page', 'Modules\Admin\Http\Controllers\PageController', [
            'names' => [
                'edit'      => 'page.edit',
                'show'      => 'page.show',
                'destroy'   => 'page.destroy',
                'update'    => 'page.update',
                'store'     => 'page.store',
                'index'     => 'page',
                'create'    => 'page.create',
            ]
                ]
        ); 
        
         Route::bind('tags', function($value, $route) {
            return Modules\Admin\Models\Tag::find($value);    
        });
        // Routes for Tag added by Ocean
        Route::resource('admin/tags', 'Modules\Admin\Http\Controllers\TagController', [
            'names' => [
                'edit' => 'tags.edit',
                'show' => 'tags.show',
                'destroy' => 'tags.destroy',
                'update' => 'tags.update',
                'store' => 'tags.store',
                'index' => 'tags',
                'create' => 'tags.create',
            ]
                ]
        );


         Route::bind('funnels', function($value, $route) {
            return Modules\Admin\Models\Funnels::find($value);    
        });
        // Routes for Tag added by Ocean
        Route::resource('admin/funnels', 'Modules\Admin\Http\Controllers\FunnelsController', [
            'names' => [
                'edit' => 'funnels.edit',
                'show' => 'funnels.show',
                'destroy' => 'funnels.destroy',
                'update' => 'funnels.update',
                'store' => 'funnels.store',
                'index' => 'funnels',
                'create' => 'funnels.create',
            ]
                ]
        );


        
         Route::bind('consumer', function($value, $route) {
            return Modules\Admin\Models\Consumer::find($value);    
        });
        // Routes for Tag added by Ocean
        Route::resource('admin/consumer', 'Modules\Admin\Http\Controllers\ConsumerController', [
            'names' => [
                'edit' => 'consumer.edit',
                'show' => 'consumer.show',
                'destroy' => 'consumer.destroy',
                'update' => 'consumer.update',
                'store' => 'consumer.store',
                'index' => 'consumer',
                'create' => 'consumer.create',
            ]
                ]
        );


        
         Route::bind('sales-funnel', function($value, $route) {
            return Modules\Admin\Models\SalesFunnel::find($value);    
        });
        // Routes for Tag added by Ocean
        Route::resource('admin/sales-funnel', 'Modules\Admin\Http\Controllers\SalesFunnelController', [
            'names' => [
                'edit' => 'sales-funnel.edit',
                'show' => 'sales-funnel.show',
                'destroy' => 'sales-funnel.destroy',
                'update' => 'sales-funnel.update',
                'store' => 'sales-funnel.store',
                'index' => 'sales-funnel',
                'create' => 'sales-funnel.create',
            ]
                ]
        );


        /*----------End---------*/    
        
        Route::match(['get','post'],'admin/profile', 'Modules\Admin\Http\Controllers\AdminController@profile'); 
        
        Route::match(['get','post'],'admin/monthly-report/{name}', 'Modules\Admin\Http\Controllers\MonthlyReportController@corporateUser'); 
        Route::match(['get','post'],'admin/corporate-monthly-report', 'Modules\Admin\Http\Controllers\MonthlyReportController@index'); 
             
  });



 
 
     
 
  