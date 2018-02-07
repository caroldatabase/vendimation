<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException; 
//use Symfony\Component\HttpKernel\Exception\ErrorException;
use InvalidArgumentException; 
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Auth;
use Response;
use Request;
use Session;
use Redirect;
use URL;
use ErrorException;
use Illuminate\Database\QueryException;
use ClientException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {   
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, \Exception $e)
    {
        $path_info_url = $request->getpathInfo();
        $api_url='';
        $web_url ='';
        if (strpos($path_info_url, 'api/v1') !== false) {
            $api_url = $path_info_url;
        }else{
           $web_url = $path_info_url;
        } 
        
         if($e instanceof InvalidArgumentException)
        {
            if($api_url)
            {
                echo json_encode(
                    [ "status"=>0,
                      "code"=>500,
                      "message"=>"Route Not defind" ,
                      "data" => "" 
                    ]
                );
            }else{
                echo "This Route Not define";
            } 
            exit(); 
        }    
        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }
        $error_from_route =0;
        if($e instanceof NotFoundHttpException)
        {   
            $error_from_route =1;
            if($api_url)
            {
                echo json_encode(
                    [ "status"=>0,
                      "code"=>500,
                      "message"=>"Request URL not available" ,
                      "data" => "" 
                    ]
                );
            }else{
               
              //$url =  URL::previous().'?error=InvalidURL'; 
              return Redirect::to('admin/404');
            } 
            exit();
        }
        if($e instanceof QueryException)
        {    
            if($api_url)
            {    
                echo json_encode(
                    [ "status"=>0,
                      "code"=>500,
                      "message"=>$e->getMessage(),
                      "data" => "" 
                    ]
                );
            }else{
              $page_title = "404 Error";
              $page_action = "Page";
              $viewPage = "404 Error";
              $msg = "page not found";
              $error_msg = $e->getMessage(); //"Oops! Server is busy please try later."; 
              return view('packages::auth.page_not_found',compact('error_msg','page_title','page_action','viewPage'))->with('flash_alert_notice', $msg);
            } 
            exit();
        }
        if($e instanceof MethodNotAllowedHttpException){
            
            if($api_url)
            {
                echo json_encode(
                    [ "status"=>0,
                      "code"=>500,
                      "message"=>"Request method not found!" ,
                      "data" => "" 
                    ]
                );
            }else{
                echo "Method Not Allowed"; 
            } 
            exit();
           
        } 
        if($e instanceof ErrorException){
           if($api_url)
            {
                echo json_encode(
                    [ "status"=>1,
                      "code"=>500,
                      "message"=>[
                                    'error_message'=>$e->getmessage(),
                                    'file_path'=>$e->getfile(),
                                    'line_number'=>$e->getline()],    
                      "data" => "" 
                    ]
                );
            }else{
                $error =  [
                        'Error message'=>$e->getmessage(),
                        'File path'=>$e->getfile(),
                        'Line number'=>$e->getline()
                     ];
                
                echo "Opps..We found Error! Pease fix it.<ol>";    
                foreach ($error as $key => $value) {
                        echo "<li><b>$key =></b>".$value.'</li>';
                    }
                echo "</ol>";    
            } 
            exit();
        }
     return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
