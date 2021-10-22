<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\RunPayService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\ArrayToXml\ArrayToXml;
use Xml;
class RunPayController extends Controller
{
    protected $runPayService;
    protected $userService;
    public function __construct(RunPayService $runPayService,UserService $userService){
        $this->runPayService = $runPayService;
        $this->userService = $userService;
    }
    public function runPay(Request $request){
        if ($request->command == 'check'){
            $txn_id = $request->txn_id;
            $sum = $request->sum;
            $account = $request->account;
            $data = [
                'txn_id' => $txn_id,
                'sum' => $sum,
                'account' => $account,
            ];
            $response = $this->runPayService->Check($data);
            return $response;
        }elseif ($request->command == 'pay'){
            $txn_id = $request->txn_id;
            $txn_date = $request->txn_date;
            $sum = $request->sum;
            $account = $request->account;
            $data = [
                'txn_id' => $txn_id,
                'sum' => $sum,
                'account' => $account,
                'txn_date' => $txn_date
            ];
            $response = $this->runPayService->Pay($data);
            return $response;
        } else{
            $rootXML = [
                'rootElementName' => 'response',
            ];
            $response = [
                'result' => [
                    '_value' => '8',
                ],
                'comment'=>[
                    '_value' => 'В запросе не присутствует check / pay'
                ]
            ];
            $result = ArrayToXml::convert($response, $rootXML,true,'UTF-8');
            return $result;
        }
    }
    public function addBalance(Request $request){
        if ($request->command == 'pay'){
            $txn_id = $request->txn_id;
            $txn_date = $request->txn_date;
            $sum = $request->sum;
            $account = $request->account;
            $data = [
                'txn_id' => $txn_id,
                'sum' => $sum,
                'account' => $account,
                'txn_date' => $txn_date
            ];
            $response = $this->runPayService->Pay($data);
            return $response;
        } else{
            return json_encode(['status' => false, 'message'=>'Что-то пошло не так...']);
        }
    }
}
