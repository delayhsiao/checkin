<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		$time = time();
		$record = D('checkin')->where('dateline = '.strtotime(date('Y-m-d',$time)))->find();
		$status['morning'] = $record['morning']==0?'未打卡':"<span class='text-primary'><i class='glyphicon glyphicon-ok'></i> ".date('H:i',$record['morning'])."</span>";
		$status['noon'] = $record['noon']==0?'未打卡':"<span class='text-primary'><i class='glyphicon glyphicon-ok'></i> ".date('H:i',$record['noon'])."</span>";
		$status['night'] = $record['night']==0?'未打卡':"<span class='text-primary'><i class='glyphicon glyphicon-ok'></i> ".date('H:i',$record['night'])."</span>";
		if(($record['morning']==0)||($record['noon']==0)||($record['night']==0)){
			$done = array('status'=>0,'date'=>date('Y年m月d日',$time));
		}else{
			$done = array('status'=>1,'date'=>date('Y年m月d日',$time));
		}
		$hour = date('H',time());
		switch($hour){
			case ((07<=$hour)&&($hour<08)):
				if($record['morning']==0){
					$return = 1;
				}
				break;
			case ((11<=$hour)&&($hour<13)):
				if($record['noon']==0){
					$return = 1;
				}
				break;
			case ((17<=$hour)&&($hour<23)):
				if($record['night']==0){
					$return = 1;
				}
				break;
		}
		if((07<=$hour)&&($hour<11)){
			$sport = 1;
		}elseif((11<=$hour)&&($hour<17)){
			$sport = 2;
		}else{
			$sport = 3;
		}
		$this->assign('sport',$sport);
		$this->assign('intime',$return);
		$this->assign('done',$done);
		$this->assign('status',$status);
		$this->display();
    }
	
	public function checkin(){
		$time = time();
		$hour = date('H',$time);
		$return = 0;
		switch($hour){
			case ((07<=$hour)&&($hour<08)):
				$return = $this->check(1);
				break;
			case ((11<=$hour)&&($hour<13)):
				$return = $this->check(2);
				break;
			case ((17<=$hour)&&($hour<23)):
				$return = $this->check(3);
				break;
		}
		exit(json_encode($return));
	}
	
	public function check($num){
		$time = time();
		$record = D('checkin')->where('dateline = '.strtotime(date('Y-m-d',$time)))->find();
		if($num==1){
			$data['morning'] = $time;
		}
		if($num==2){
			$data['noon'] = $time;
		}
		if($num==3){
			$data['night'] = $time;
		}
		if(!empty($record)){
			$result = D('checkin')->where('dateline = '.strtotime(date('Y-m-d',$time)))->save($data);
		}else{
			$data['dateline'] = strtotime(date('Y-m-d',$time));
			$result = D('checkin')->add($data);
		}
		if($result){
			$return = array('status'=>1,'time'=>date('H:i',$time),'dkc'=>$num);
		}else{
			$return = array('status'=>0,'info'=>'打卡失败程序错误');
		}
		return $return;
	}
			
}