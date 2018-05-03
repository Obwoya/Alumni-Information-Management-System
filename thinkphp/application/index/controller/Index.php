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

    //首页
    public function index(Request $request)
    {
        //若已经登录
        if(Session::has('name','stu')){
            return view('dongtai');
        }
        //微信借口登录
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
                Session::set('cname',$jso->data->name);
                Session::set('name',$jso->data->card_number,'stu');
                return view('dongtai');
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
                Session::set('cname',$jso->data->name);
                Session::set('name',$jso->data->card_number,'stu');
                return view('dongtai');
            }
        }
        //否则进入登陆页面
        else{
            #$this->assign('username',null);
            return view('loadpage');
        }

    }

    //留存旧版首页代码。可删
    private function index2(Request $request)
    {
        Session::prefix('stu');
        //如果已登陆就跳转到登陆成功页面，否则进入登陆页面
        if(Session::has('name','stu')){
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
        $db = db('users');
        $list = $db->where('id', $request->post('id'))->select();
        if ($list) {
            if ($list[0]['password'] == $request->post('password')) {
                //$db->where('id', $request->post('id'))->update(['status' => 1]);
                Session::set('name',$request->post('id'),'stu');
                $this->success('登录成功，'.Session::get('name','stu'),'index');
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
        $db = db('users');
        Session::delete('name','stu');
        Session::delete('cname');
        return view('loadpage');
    }

    //修改个人信息
    public function changeinfo(Request $request)
    {
        if(Session::has('name','stu')){
            $db = db('userinfo');
            $list = $db->where('学号',$request->session('name'))->select();
            $this->assign('list',$list[0]);
            $this->assign('username',$request->session('name'));
            return view('submit2');
        }
        else{
            $this->error('请先登录');
        }

    }

    //提交修改的个人信息
    public function submit(Request $request)
    {
        if(Session::has('name','stu')){
            //echo dump($request->post());
            $db = db('userinfo');
            Db::execute("update userinfo set 方向=:d1,籍贯=:d2,手机=:d3,邮箱=:d4,省份=:d5,城市=:d6,
通讯地址=:d7,行业=:d8,现工作单位=:d9,职务=:d10 where 学号=:id;",
                ['d1'=>$request->post('方向'),'d2'=>$request->post('籍贯'),'d3'=>$request->post('手机'),
                    'd4'=>$request->post('邮箱'),'d5'=>$request->post('省份'),'d6'=>$request->post('城市'),
                    'd7'=>$request->post('通讯地址'),'d8'=>$request->post('行业'),'d9'=>$request->post('现工作单位'),
                    'd10'=>$request->post('职务'),'id'=>$request->session('name')]);
            $this->success('修改成功', url('/?s=index/index/info'));
        }
        else{
            $this->error('请先登录');
        }
    }

    //活动页面
    public function huodong(){
        return view('huodong');
    }
    //学院动态
    public function dongtai(){
        return view('dongtai');
    }

    //个人信息页面
    public function info(Request $request){
        if(Session::has('name','stu')){
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
        else{
            $this->error('请先登录');
        }
    }

}
