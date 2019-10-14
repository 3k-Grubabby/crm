<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Illuminate\Support\Facades\Redis;

class bossController extends Controller
{
    //
    public function index()
    {

//        $a = Redis::hmset('user:1:year:2019:class:finance',['新型能源技术咨询'=>'51513','测试12'=>'123121233']);


        $finance = Redis::hgetall('user:1:year:2019:class:finance');

        $color = ["#2F9323","#D9B63A","#2E2AA4","#9F2E61","#4D670C","#BF675F","#1F814A","#357F88","#673509","#310937","#1B9637","#F7393C"];
        $chart = new SampleChart;
        $chart->labels(array_keys($finance));
        $randKey = array_rand($color,count($finance));
        foreach ($randKey as $value)
        {
           $a[]  = $color[$value];
        }

        $chart->dataset('My dataset 2', 'pie', array_values($finance))->options([
            'backgroundColor' =>$a
        ]);



        $bar = new SampleChart;
        $bar->labels(['新闻', '历史','c','d','e','f','g','h','i']);
        $bar->dataset('My dataset 2', 'bar', [100,500,400,300,700,12,125,345,13123])->options([
            'color' => 'red',
        ]);


        return view('boss.index', ["chart"=>compact('chart','bar')]);

    }
}
