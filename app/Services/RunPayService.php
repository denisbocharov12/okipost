<?php


namespace App\Services;


use App\Models\Transactions;
use App\Models\TransactionsOkipost;
use App\Models\User;
use Spatie\ArrayToXml\ArrayToXml;

class RunPayService
{
    protected $runPayService;
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function Check($data){
        $rootXML = [
            'rootElementName' => 'response',
        ];
        $account = $data['account'];
        $txn_id = $data['txn_id'];
        $sum = $data['sum'];
        $user = $user = User::where('code', $account)
            ->first();
        if ($user !== null){
            $response = [
                    'osmp_txn_id' => [
                        '_value' => $account,
                    ],
                    'result' => [
                        '_value' => '0',
                    ]
            ];
            $result = ArrayToXml::convert($response, $rootXML,true,'UTF-8');
            return $result;
        } else{
            $response = [
                'osmp_txn_id' => [
                    '_value' => $account,
                ],
                'result' => [
                    '_value' => '7',
                ],
                'comment'=>[
                    '_value' => 'Такого пользователя не существует'
                ]
            ];
            $result = ArrayToXml::convert($response, $rootXML,true,'UTF-8');
            return $result;
        }
    }
    public function Pay($data){
        $rootXML = [
            'rootElementName' => 'response',
        ];
        $account = $data['account'];
        $txn_id = $data['txn_id'];
        $txn_date = $data['txn_date'];
        $sum = $data['sum'];
        $user = User::where('code', $account)
            ->first();
        $balance = $user->money;
        $newbalance = $balance + $sum;
        $transaction_data = [
            'txn_id'=>$txn_id,
            'txn_date' =>$txn_date,
            'account' => $account,
            'sum' => $sum
        ];
        $transaction = Transactions::where('txn_id', $txn_id)->first();
        if($user !== null && $transaction == null){
            User::where('code', $account)->update([
               'money' => $newbalance
            ]);
            Transactions::create($transaction_data);
            $oki_result = $this->userService->AddBalance($sum, $account);
            $transaction_okipost_data = [
                'done'=>$oki_result['done'],
                'user'=>$oki_result['user'],
                'value'=>$oki_result['value'],
                'balance_before' =>$oki_result['balanceBefore'],
                'balance_after' => $oki_result['balance']
            ];
            TransactionsOkipost::create($transaction_okipost_data);
            $transaction_id_first = Transactions::where('txn_id',$txn_id)->first();
            $response = [
                'osmp_txn_id' => [
                    '_value' => $account,
                ],
                'prv_txn' => [
                    '_value' => (string)$transaction_id_first->id,
                ],
                'sum' => [
                    '_value'=>(string)$newbalance
                ],
                'result' => [
                    '_value' => '0',
                ]
            ];
            $result = ArrayToXml::convert($response, $rootXML,true,'UTF-8');
            return $result;
        }elseif($user !== null && $transaction !== null){
            $transaction_id = Transactions::where('txn_id',$txn_id)->first();
            $response = [
                'osmp_txn_id' => [
                    '_value' => $account,
                ],
                'prv_txn' => [
                    '_value' => (string)$transaction_id->id,
                ],
                'sum' => [
                    '_value'=>(string)$balance
                ],
                'result' => [
                    '_value' => '0',
                ]
            ];
            $result = ArrayToXml::convert($response, $rootXML,true,'UTF-8');
            return $result;
        } else{
            $response = [
                'osmp_txn_id' => [
                    '_value' => $account,
                ],
                'result' => [
                    '_value' => '7',
                ],
                'comment'=>[
                    '_value' => 'Такого пользователя не существует'
                ]
            ];
            $result = ArrayToXml::convert($response, $rootXML,true,'UTF-8');
            return $result;
        }
    }
}
