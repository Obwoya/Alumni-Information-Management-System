<?php
namespace app\index\controller;
use think\Controller;//引入Controller类
use think\Request;
use think\Session;
use app\index\model\User;
use think\Db;
class Index extends Controller
{
    //post 用于获取api
    private function request_post($url = '', $post_data = array()) {//url为必传  如果该地址不需要参数就不传
        if (empty($url)) {
            return false;
        }
        if(!empty($post_data)){
            $params = '';
            foreach ( $post_data as $k => $v )
            {
                $params.= "$k=" . urlencode($v). "&" ;
                // $params.= "$k=" . $v. "&" ;
            }
            $params = substr($params,0,-1);
        }
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$url);//抓取指定网页
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        if(!empty($post_data))curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return $data;
    }

    //判断是否登录，同时判断session是否过期
    private function is_login(){
        if(Session::has('name') and time()-\session('session_start_time')>\session('expire')){
            \session_destroy();
            $this->error('会话过期，请重新登录', url('/'));
        }
        if(!Session::has('name')){
            $this->error('请先登录', url('/'));
        }
    }

    //首页
    public function index(Request $request)
    {
        //若已经登录
        if(Session::has('name')){
            //判断会话是否过期
            if(time()-\session('session_start_time')>\session('expire')){
                \session_destroy();
                $this->error('会话过期，请重新登录', url('/'));
            }
            $db = db('userinfo');
            $list = $db->where('学号',$request->session('name'))->select();

            if($list){  //数据库如果已有该人信息，直接读出
                $this->assign('list',$list[0]);
                //echo dump($list[0]);
            }
            else{   //数据库若无此人信息，插入信息，再读出给前端
                Db::execute("insert into userinfo (学号,姓名) values (?,?)",[$request->session('name'),$request->session('cname')]);
                $list = $db->where('学号',$request->session('name'))->select();
                $this->assign('list',$list);
                //echo dump($list[0]);
            }
            #如果是微信登录，返回手机版界面，否则返回电脑版
            if(Session::has('wechat')){
                return view('information2');
            }
            else{
                return view('information2');
            }
        }

        //微信接口登录
        else if(preg_match('/=\S+&/',$request->url(),$st)){
            preg_match('/=\S+&/',$request->url(),$st);
            #print_r($st);
            if($st){
                $post_data['appid']='sspkuku4ahyvh99n4k';
                $post_data['appsecret']='ee2e1adef43e111a9ad2b3d01ffe3fd0';
                $post_data['content']=substr($st[0],1,strlen($st[0])-2);

                $jso=$this->request_post('https://icampus.ss.pku.edu.cn/iaaa/index.php/Home/OpenApi/decode',$post_data);
                $jso=json_decode($jso);
                #print_r($jso);
                Session::set('wechat',1);
                Session::set('cname',$jso->data->name);
                Session::set('name',$jso->data->card_number);
                return view('information2');
            }
        }
        //网址的第二种情况
        else if(preg_match('/=\S+/',$request->url(),$st)){
            preg_match('/=\S+/',$request->url(),$st);
            #print_r($st);
            if($st){
                $post_data['appid']='sspkuku4ahyvh99n4k';
                $post_data['appsecret']='ee2e1adef43e111a9ad2b3d01ffe3fd0';
                $post_data['content']=substr($st[0],1,strlen($st[0])-1);

                $jso=$this->request_post('https://icampus.ss.pku.edu.cn/iaaa/index.php/Home/OpenApi/decode',$post_data);
                $jso=json_decode($jso);
                #print_r($jso);
                Session::set('wechat',1);
                Session::set('cname',$jso->data->name);
                Session::set('name',$jso->data->card_number);
                return view('information2');
            }
        }
        //否则进入登陆页面
        else{
            #$this->assign('username',null);
            return view('loadpage');
        }

    }

    public function index1(Request $request)
    {
        //若已经登录
        if(Session::has('name')){
            //判断会话是否过期
            if(time()-\session('session_start_time')>\session('expire')){
                \session_destroy();
                $this->error('会话过期，请重新登录', url('/'));
            }

            $db = db('userinfo');
            $list = $db->where('学号',$request->session('name'))->select();
            if($list){  //数据库如果已有该人信息，直接读出
                $this->assign('list',$list[0]);
                //echo dump($list[0]);
                return view('information2');
            }
            else{   //数据库若无此人信息，插入信息，再读出给前端
                Db::execute("insert into userinfo (学号,姓名) values (?,?)",[$request->session('name'),$request->session('cname')]);
                $list = $db->where('学号',$request->session('name'))->select();
                $this->assign('list',$list);
                //echo dump($list[0]);
                return view('information2');
            }
        }
        else{
            $this->error('请先登录', url('/'));
        }

    }
    //留存旧版首页代码。可删
    private function index2(Request $request)
    {
        Session::prefix('stu');
        //如果已登陆就跳转到登陆成功页面，否则进入登陆页面
        if(Session::has('name')){
            $username=$request->session('name');
            $this->assign('username',$username);
            return view('dongtai');
        }
        else{
            return view('loadpage');
        }

    }

    //处理登录
    public function login(Request $request)
    {
        //处理登录
        $db = db('users');
        $list = $db->where('id', $request->post('id'))->select();
        Session::set('session_start_time',time());
        if($request->post('remember')){
            Session::set('expire',3600*24*7);
        }
        else{
            Session::set('expire',3600);
        }
        if ($list) {
            if ($list[0]['password'] == $request->post('password')) {
                //$db->where('id', $request->post('id'))->update(['status' => 1]);
                $db = db('userinfo');
                $list = $db->where('学号',$request->post('id'))->select();

                Session::set('cname',$list[0]["姓名"]);
                Session::set('name',$request->post('id'));
                $this->success('登录成功，'.Session::get('name'),url('/'));
            } else {
                $this->error('密码错误');
            }
        } else {
            $this->error('用户名不存在');
        }
    }

    //退出
    public function logout(Request $request)
    {
        //退出，销毁session
        Session::delete('wechat');
        Session::delete('name');
        Session::delete('cname');
        return view('loadpage');
    }

    //修改个人信息
    public function changeinfo(Request $request)
    {
        $this->is_login();//判断是否登陆以及session是否过期

        $db = db('userinfo');
        $list = $db->where('学号',$request->session('name'))->select();
        $this->assign('list',$list[0]);
        $this->assign('username',$request->session('name'));
        return view('submit');

    }
    //修改个人信息-微信版
    public function changeinfowe(Request $request)
    {
        $this->is_login();//判断是否登陆以及session是否过期

        $db = db('userinfo');
        $list = $db->where('学号',$request->session('name'))->select();
        $this->assign('list',$list[0]);
        $this->assign('username',$request->session('name'));
        return view('submit2');

    }

    //提交修改的个人信息
    public function submit(Request $request)
    {
        $this->is_login();//判断是否登陆以及session是否过期

        //echo dump($request->post());
        $db = db('userinfo');
        Db::execute("update userinfo set 方向=:d1,籍贯=:d2,手机=:d3,邮箱=:d4,省份=:d5,城市=:d6,
通讯地址=:d7,行业=:d8,现工作单位=:d9,职务=:d10 where 学号=:id;",
            ['d1'=>$request->post('方向'),'d2'=>$request->post('籍贯'),'d3'=>$request->post('手机'),
                'd4'=>$request->post('邮箱'),'d5'=>$request->post('省份'),'d6'=>$request->post('城市'),
                'd7'=>$request->post('通讯地址'),'d8'=>$request->post('行业'),'d9'=>$request->post('现工作单位'),
                'd10'=>$request->post('职务'),'id'=>$request->session('name')]);
        $this->success('修改成功', url('/'));
    }
    //微信版提交个人信息
    public function submitwe(Request $request)
    {
        $this->is_login();//判断是否登陆以及session是否过期

        //echo dump($request->post());
        $db = db('userinfo');
        Db::execute("update userinfo set 方向=:d1,籍贯=:d2,手机=:d3,邮箱=:d4,省份=:d5,城市=:d6,
通讯地址=:d7,行业=:d8,现工作单位=:d9,职务=:d10,性别=:d11,导师=:d12,年级（入学）=:d13,毕业年份=:d14,出生日期=:d15,邮编=:d16 where 学号=:id;",
            ['d1'=>$request->post('方向'),'d2'=>$request->post('籍贯'),'d3'=>$request->post('手机'),
                'd4'=>$request->post('邮箱'),'d5'=>explode(" ",$request->post('省市'))[0],
                'd6'=>explode(" ",$request->post('省市'))[1],
                'd7'=>$request->post('通讯地址'),'d8'=>$request->post('行业'),'d9'=>$request->post('现工作单位'),
                'd10'=>$request->post('职务'),'d11'=>$request->post('性别'),'d12'=>$request->post('导师'),
                'd13'=>$request->post('入学'),'d14'=>$request->post('毕业'),'d15'=>$request->post('出生日期'),
                'd16'=>$request->post('邮编'),'id'=>$request->session('name')]);
        return view('success');
    }

    //活动页面
    public function huodong(){
        $this->is_login();//判断是否登陆以及session是否过期
        return view('huodong');
    }
    //学院动态
    public function dongtai(){
        $this->is_login();//判断是否登陆以及session是否过期
        return view('dongtai');
    }

    //个人信息页面
    public function info(Request $request){
        $this->is_login();//判断是否登陆以及session是否过期

        $db = db('userinfo');
        $list = $db->where('学号',$request->session('name'))->select();
        if($list){  //数据库如果已有该人信息，直接读出
            $this->assign('list',$list[0]);
            //echo dump($list[0]);
            return view('information');
        }
        else{   //数据库若无此人信息，插入信息，再读出给前端
            Db::execute("insert into userinfo (学号,姓名) values (?,?)",[$request->session('name'),$request->session('cname')]);
            $list = $db->where('学号',$request->session('name'))->select();
            $this->assign('list',$list);
            //echo dump($list[0]);
            return view('information');
        }

    }


}
