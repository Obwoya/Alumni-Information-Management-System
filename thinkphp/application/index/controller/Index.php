<?php
namespace app\index\controller;
use think\Controller;//引入Controller类
use think\Request;
use think\Session;
use app\index\model\User;
use think\Db;
class Index extends Controller
{
    public function index(Request $request)
    {
        //如果已登陆就跳转到登陆成功页面，否则进入登陆页面
        if(Session::has('name')){
            $username=$request->session('name');
            $this->assign('username',$username);
            return view('homepagesuc');
        }
        else{
            return view('loadpage');
        }

    }
    public function home(Request $request)
    {
        //首页，二者区别在于是否登陆，button显示不同
        if(Session::has('name')){
            $this->assign('username',$request->session('name'));
            return view('homepagesuc');
        }
        else{
            return view('homepage');
        }

    }
    public function admin(Request $request)
    {
        return view('admin');
    }

    public function login(Request $request)
    {
        //处理登录
        $db = db('users');
        $list = $db->where('id', $request->post('id'))->select();
        if ($list) {
            if ($list[0]['password'] == $request->post('password')) {
                //$db->where('id', $request->post('id'))->update(['status' => 1]);
                Session::set('name',$request->post('id'));
                $this->success('登录成功'+Session::get('name'),'/thinkphp/public/index.php?s=index/index/index');
            } else {
                $this->error('密码错误');
            }
        } else {
            $this->error('用户名不存在');
        }
    }
    public function logout(Request $request)
    {
        //退出，销毁session
        $db = db('users');
        Session::delete('name');
        return view('homepage');
    }
    public function information(Request $request)
    {
        if(Session::has('name')){
            $db = db('userinfo');
            $list = $db->where('学号',$request->session('name'))->select();
            $this->assign('list',$list[0]);
            $this->assign('username',$request->session('name'));
            return view('infomation');
        }
        else{
            $this->error('请先登录');
        }

    }
    public function changeinfo(Request $request)
    {
        if(Session::has('name')){
            $db = db('userinfo');
            $list = $db->where('学号',$request->session('name'))->select();
            $this->assign('list',$list[0]);
            $this->assign('username',$request->session('name'));
            return view('submit');
        }
        else{
            $this->error('请先登录');
        }

    }
    public function submit(Request $request)
    {
        if(Session::has('name')){
            //echo dump($request->post());
            $db = db('userinfo');
            Db::execute("update userinfo set 方向=:d1,籍贯=:d2,手机=:d3,邮箱=:d4,省份=:d5,城市=:d6,
通讯地址=:d7,行业=:d8,现工作单位=:d9,职务=:d10 where 学号=:id;",
                ['d1'=>$request->post('方向'),'d2'=>$request->post('籍贯'),'d3'=>$request->post('手机'),
                    'd4'=>$request->post('邮箱'),'d5'=>$request->post('省份'),'d6'=>$request->post('城市'),
                    'd7'=>$request->post('通讯地址'),'d8'=>$request->post('行业'),'d9'=>$request->post('现工作单位'),
                    'd10'=>$request->post('职务'),'id'=>$request->session('name')]);
            $this->success('修改成功', '/thinkphp/public/index.php?s=index/index/information');
        }
        else{
            $this->error('请先登录');
        }
    }

}
