<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;  /////(2)
use Zend\View\Model\JsonModel;
use Application\Entity\Score;

class ApiController extends AbstractActionController
{
// 	public function getScoresAction()  //getScore = get-scores
// 	{
// 		//echo "xin chao";
// 		$labels = array(
// 				"January", "February", "March", "April", "May", "June", "July"
// 		);
// 		$data1 = array(65, 59, 80, 81, 56, 55, 40 );
// 		$data2 = array(28, 48, 40, 19, 86, 27, 90 );
// 		$dataset1 = array();
// 		$dataset1['data'] = $data1;
// 		$dataset2 = array();
// 		$dataset2['data'] = $data2;
// 		return new JsonModel(
// 				array(
// 						'labels' => $labels,
// 						'datasets' => [$dataset1,$dataset2]
// 				));
// 	}
	
	public function getScoresAction()  //get-scores
	{
		$gateway	= $this->getScoreTable();
		$Scores	= $gateway->fetchAll();
		$labels = array();
		$dataset1 =array();
		$dataset2 =array();
		$dataset3 =array();
		$dataset4 =array();
		foreach ($Scores as $Score)
		{
			$labels[]= $Score ->name;
			$dataset1[] = $Score ->q1;
			$dataset2[] = $Score ->q2;
			$dataset3[] = $Score ->q3;
			$dataset4[] = $Score ->q4;
		};
		return new JsonModel(
				array(
						'labels' => $labels,
						'datasets' => [
								array('data'=>$dataset1),
								array('data'=>$dataset2),
								array('data'=>$dataset3),
								array('data'=>$dataset4)
									
						]
				));
	}
	public function getScoreTable() ////3th
	{
		$modelService= $this->getServiceLocator()
		->get('Application\Service\Model');
		$ScoreTable=$modelService->get('Application\Model\ScoreTable');
		return $ScoreTable;
	}
}