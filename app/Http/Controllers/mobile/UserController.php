<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\UserService;

class UserController extends Controller
{
    
    public function myBookrack(UserService $userService)
    {
        $userId = null;
        
        $data = [];
        
        $books = $userService->lsMyBookrack($userId);        
        $data['books'] = $books['data'];           
        
        $data['title'] = '我的书架';
        $data['keywords'] = '666看书、笔趣阁、书趣阁、最热最全小说、无广告无弹窗小说网、免费小说、VIP小说免费';
        $data['description'] = '666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费';
        
        return view('mobile/user/mybookrack', $data);
        
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