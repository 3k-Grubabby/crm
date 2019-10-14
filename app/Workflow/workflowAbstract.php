<?php


namespace App\Workflow;


abstract class workflowAbstract
{
    public $subject ;
    public $state = 0; //当前状态
    public $leader = false;//设置自己领导
    public $name = '';

    public function setLeader($leader)
    {
        $this->leader=$leader;
    }
    public function step($msg)
    {
        //当前工作流的状态和自己的状态相同时，自己才会处理工作流
        if($this->subject->state==$this->state) //代表当前状态是自己处理
        {
                //判断自己的领导是否有
                if($this->leader)
                {
                    $this->subject->state=$this->leader->state;//移交控制权
                    //保存状态
                }else
                {
                    echo '审批结束';
                }
                echo $msg.'审批者是'.$this->name;
        }else{
            //判断自己是否有领导
            if($this->leader) //有 领导执行工作流
            {
                $this->leader->step($msg);

            }
        }
    }
}
