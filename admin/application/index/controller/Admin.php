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
        if(Session::has('name')){
            $db = db('userinfo');
            $list =$db->select();
            $this->assign('registered',count($list));
            $list =$db->where('手机','')->whereOr('手机',null)->select();
            $this->assign('uncompleted',count($list));
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
                Session::set('name',$request->post('id'));
                $this->success('登录成功',url('/?s=index/admin/index'));
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
        Session::delete('name');
        return view('login');
    }
    #所有校友信息表
    public function searchForTable1(Request $request){
        if(Session::has('name')){
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
    #未完善信息用户表
    public function searchForTable2(Request $request){
        if(Session::has('name')){
            $db = db('userinfo');
            $list =$db->where('手机','')->whereOr('手机',null)->select();
            $this->assign('button_visible',1);
            $this->assign('list',$list);
            return view('tables2');
        }
        else {
            $this->error('请先登录');
            return view('login');
        }
    }
    #查看个人详细信息
    public function info(Request $request,$id){
        if(Session::has('name')){
            $db = db('userinfo');
            if($id){
                $list =$db->where('学号',$id)->select();
                $this->assign('list',$list[0]);
            }
            else{
                $this->assign('list',[]);
            }
            return view('info');
        }
        else {
            $this->error('请先登录');
            return view('login');
        }
    }
    #导出个人信息
    function export()
    {
        $db = db('userinfo');
        $path = dirname(__FILE__); //找到当前脚本所在路径
        vendor("PHPExcel.PHPExcel.PHPExcel");
        vendor("PHPExcel.PHPExcel.Writer.IWriter");
        vendor("PHPExcel.PHPExcel.Writer.Abstract");
        vendor("PHPExcel.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.PHPExcel.IOFactory");
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);


        // 实例化完了之后就先把数据库里面的数据查出来
        $sql = $db->select();

        // 设置表头信息
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '姓名')
            ->setCellValue('B1', '学号')
            ->setCellValue('C1', '性别')
            ->setCellValue('D1', '出生日期')
            ->setCellValue('E1', '方向')
            ->setCellValue('F1', '导师')
            ->setCellValue('G1', '年级（入学）')
            ->setCellValue('H1', '毕业年份')
            ->setCellValue('I1', '现工作单位')
            ->setCellValue('J1', '行业')
            ->setCellValue('K1', '职务')
            ->setCellValue('L1', '手机')
            ->setCellValue('M1', '邮箱')
            ->setCellValue('N1', '通讯地址')
            ->setCellValue('O1', '省份')
            ->setCellValue('P1', '城市')
            ->setCellValue('Q1', '籍贯')
            ->setCellValue('R1', '邮编')
            ->setCellValue('S1', '备注');

        /*--------------开始从数据库提取信息插入Excel表中------------------*/

        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($sql);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $sql[$i-2]['姓名']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $sql[$i-2]['学号']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $sql[$i-2]['性别']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $sql[$i-2]['出生日期']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $sql[$i-2]['方向']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $sql[$i-2]['导师']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $sql[$i-2]['年级（入学）']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $sql[$i-2]['毕业年份']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $sql[$i-2]['现工作单位']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $sql[$i-2]['行业']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $sql[$i-2]['职务']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $sql[$i-2]['手机']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, $sql[$i-2]['邮箱']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, $sql[$i-2]['通讯地址']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, $sql[$i-2]['省份']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $i, $sql[$i-2]['城市']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $i, $sql[$i-2]['籍贯']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $i, $sql[$i-2]['邮编']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $i, $sql[$i-2]['备注']);
        }


        /*--------------下面是设置其他信息------------------*/

        $objPHPExcel->getActiveSheet()->setTitle('userinfo');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来

        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");

        header('Content-Disposition: attachment;filename="校友信息.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }

}