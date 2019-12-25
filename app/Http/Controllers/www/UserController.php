<?php

namespace App\Http\Controllers\www;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\UserService;
use App\Service\CategoryService;

class UserController extends Controller
{
    
 
    
    public function myBookrack(CategoryService $categoryService, UserService $userService)
    {
        $userId = null;
        
        $data = [];
        
        $categories = $categoryService->ls();
        $data['categories'] = $categories['data'];
        
        $books = $userService->lsMyBookrack($userId);        
        $data['books'] = $books['data'];           
        
        return view('www/user/mybookrack', $data);
        
    }
    public function actionSetBookrack(Request $request, UserService $userService)
    {
        
        
        $bookIdcode=  $request->input('book_idcode');
        
        $userId = null;
        
        $set = $userService->setMyBookrack($userId, $bookIdcode);
        
        switch ($set['msg']){
            
            case 'success':
                return response()->json(['msg' => 'success', 'code' => 200]);
                break;
            default:
                return response()->json(['msg' => '操作失败，请稍后再试', 'code' => 400]);
                break;
        }
    }
    
}