<?php
/**
 * Created by PhpStorm.
 * User: 钟宇翔
 * Date: 2018/4/23/023
 * Time: 15:38
 */

namespace app\index\controller;
use think\Controller;//引入Controller类
use think\Request;
use think\Session;
use app\index\model\User;
use think\Db;

class Admin extends Controller
{
    public function index (Request $request){
        //如果已登陆就跳转到登陆成功页面，否则进入登陆页面
        if(Session::has('name','admin')){
            $username=$request->session('name');
            $this->assign('username',$username);
            return view('index');
        }
        else{
            return view('login');
        }
    }

    public function login(Request $request){
        $db=db('rootadmin');
        $list = $db->where('Admin', $request->post('id'))->select();
        if ($list) {
            if ($list[0]['Password'] == $request->post('password')) {
                //$db->where('id', $request->post('id'))->update(['status' => 1]);
                Session::set('name',$request->post('id'),'admin');
                $this->success('登录成功','index/admin/index');
            } else {
                $this->error('用户名或密码错误');
            }
        } else {
            $this->error('用户名或密码错误');
        }
    }

    public function logout()
    {
        //退出，销毁session
        Session::delete('name','admin');
        return view('login');
    }

    public function searchForTable1(Request $request){
        if(Session::has('name','admin')){
            $db = db('userinfo');
            $list =$db->select();
            $this->assign('list',$list);
            return view('tables');
        }
        else {
            $this->error('请先登录');
            return view('login');
        }
    }

    public function searchForTable2(Request $request){
        if(Session::has('name','admin')){
            $db = db('userinfo');
            $list =$db->where('现工作单位',null)->select();
            $this->assign('list',$list);
            return view('tables');
        }
        else {
            $this->error('请先登录');
            return view('login');
        }
    }
}