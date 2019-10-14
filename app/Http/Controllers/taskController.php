<?php

namespace App\Http\Controllers;

use App\Workflow\Leader\bLeader;
use App\Workflow\Leader\yLeader;
use App\Workflow\Leader\zLeader;
use Illuminate\Http\Request;

class taskController extends Controller
{
    //
    public function superior()
    {
        // 1）确认领导是谁 2）维护领导之间的关系

        $zLeader = new zLeader();
        $bLeader = new bLeader();
        $yLeader = new yLeader();

        //开始维护关系

        $zLeader->setLeader($bLeader);
        $bLeader->setLeader($yLeader);
        $zLeader->step('审批通过');


      return view('task.superior');
    }
}
