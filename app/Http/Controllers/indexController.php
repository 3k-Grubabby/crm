<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class indexController extends Controller
{
    //
    public function index()
    {
      return view('index.index');
    }

    /**
    * 目录数据
    */
    public function menu()
    {
     $menus = Menu::all();
     $menu = $this->getCid($menus);
     echo json_encode($menu);
     // foreach($menus as $menu)
     // {
     //   echo $menu->text;
     // }
    // $data = [
    //           ['id'=>'1_1','iconCls'=>'fa fa-desktop','text'=>'代码生成器','url'=>'pages/1.html'],
    //           ['id'=>'1_2','iconCls'=>'fa fa-search','text'=>'单页管理','url'=>'pages/1.html'],
    //           ['id'=>'1_3','iconCls'=>'fa fa-send-o','text'=>'插件演示','url'=>'pages/1.html']
    //         ];
    //  echo json_encode($data);

    }

    /**
     *$cate laravel查询出来的一个结果集 对象形式
     *$name 这里是给分组起名
     *$pid  0 代表的是顶级菜单
     */
    public function getCid($cate, $name = 'children', $pid = 0)
    {

          $data = array();
          foreach ($cate as $v)
          {
              /**
              * 院级
              * 总览
              */
              if ($v->pid == $pid)
              {
                  $v->$name = $this->getCid($cate, $name, $v->id);
                  $data[]    = $v;
              }
          }

          if(!empty($data)) return $data;
    }
}
