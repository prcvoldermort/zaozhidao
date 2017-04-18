<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\EnvSensitivePoint;
use Mockery\CountValidator\Exception;

class ProjectController extends Controller
{
    public function getOneDetail(Request $request) {
        try {
            $projectId = $request->get("id");
            $projectDetail = Project::where('project_id',$projectId)->get();

            return response()->json([
               'status' => true,
                'data' => $projectDetail[0]
            ]);
        } catch (Exception $e) {
            return response($e->getMessage(),500);
        }
    }

    public function getAll(Request $request) {
        try {
            $allProjects = Project::all();

            return response()->json([
                'status' => true,
                'data' => $allProjects
            ]);
        }catch (Exception $e) {
            return response($e->getMessage(),500);
        }
    }

    public function getMapBackendData(Request $request) {
        try {
            $resultProjectsArray = [];
            $allProjects = Project::get(['project_id','project_name','project_lat','project_long']);
            foreach ($allProjects as $key => $value) {
                $tempArray['project_id'] = $value['project_id'];
                $tempArray['open'] = false;
                $tempArray['title'] = "<a href=/index#projectDetail/".$value['project_id'].">".$value['project_name']."</a>";
                $tempArray['long'] =$value['project_long'];
                $tempArray['lat'] = $value['project_lat'];
                $tempArray['position'] = ['lng'=>$value['project_long'],'lat'=>$value['project_lat']];
                array_push($resultProjectsArray,$tempArray);
            }

            return response()->json([
                'status' => true,
                'data' => $resultProjectsArray
            ]);
        }catch (Exception $e) {
            return response($e->getMessage(),500);
        }
    }

    //添加新项目
    public function createNew(Request $request) {
        try {
            $params=$request->get("params");
            $newProject = new Project();
            $newProject->project_name = $params["projectName"];
            $newProject->project_title = $params["projectTitle"];
            $newProject->project_foreword = $params["projectForeword"];
            $newProject->project_overview = $params["projectOverview"];
            $newProject->project_airInfluence = $params["projectAirInfluence"];
            $newProject->project_waterInfluence = $params["projectWaterInfluence"];
            $newProject->project_solidWaste = $params["projectSolidWaste"];
            $newProject->project_environmentRisk = $params["projectEnvironmentRisk"];
            $newProject->project_others = $params["projectOthers"];
            $newProject->project_thoroughView= $params["projectThoroughView"];
            $newProject->project_lat = $params["projectLat"];
            $newProject->project_long = $params["projectLong"];

            $newProject->save();
            // 得到新建项目的Id
            $result = $newProject->id;

            // 受影响点表新建数
            foreach ($params["projectInfluencedPointArray"] as $influencedPoint) {
                $newInfluencedPoint = new EnvSensitivePoint();
                $newInfluencedPoint->project_id = $result;
                $newInfluencedPoint->envSensitivePoint_lat = $influencedPoint["influencedPointLat"];
                $newInfluencedPoint->envSensitivePoint_long = $influencedPoint["influencedPointLng"];
                $newInfluencedPoint->envSensitivePoint_desc = $influencedPoint["influencedPointDesc"];
                $newInfluencedPoint->envSensitivePoint_population = $influencedPoint["influencedPointPopulation"];
                $newInfluencedPoint->save();
            }

            if ($result) {
                //数据库保存成功
                return response()->json([
                    'status'=>true,
                    'data'=>'新建项目成功',
                    'newProjectId'=>$result
                ]);
            }else {
                //数据库保存失败
                return response()->json([
                    'status'=>false,
                    'data'=>'新建项目失败'
                ]);
            }
        }catch (Exception $e) {
            return response($e->getMessage(),500);
        }
    }
}
