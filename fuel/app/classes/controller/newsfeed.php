<?php

class Controller_Newsfeed extends Controller_Basis
{
	public $template = "_layout/inspinia_ng";

	public function action_index()
	{

        // $this->data['accounts'] = Model_Account::find('all',
        //     [
        //         'where' =>  [
        //             ['company_id' => 1] // $this->employee_user->company_id
        //         ],
        //         'order_by'=> ["name" => "asc"]
        //     ]);

        // $this->data['contributions'] = Model_Contribution::find('all',
        //     [
        //         'where' =>  [
        //             ['company_id' => 1] // $this->employee_user->company_id
        //         ],
        //         'order_by'=> ["paid_at" => "desc", "created_at" => "desc"],
        //         'limit' => 25,
        //     ]);

		$data["subnav"] = array('index'=> 'active' );
        


        $this->template->title = 'Dashboard &raquo; Index';
		$this->template->content = "Hello" ;//View::forge('dashboard/index', $data);
	}

	public function action_report()
	{
        if( Auth::member(50)   ){
            Session::set_flash('error', 'Droits d\'accès insuffisant ! !! Veuillez contacter l\'administrateur du système. ');

            Response::redirect("dashboard/");
        }

		$data["subnav"] = array('report'=> 'active' );

        $dt = new \Carbon\Carbon('now');
        $_date = new \Carbon\Carbon('now');
        $year = $dt->format('Y');
        $month = $dt->format('m');
        $lastOfMonth = $dt->format('Y-m-t 23:59:59');
        $dt_firstday = new \Carbon\Carbon("$year-01-01");
        $firtdayOfYear = $dt_firstday->format("Y-m-d");

        $sql = "SELECT
              budget_id, clients.first_name, clients.last_name, Month(paid_at) as month, 
              sum(if(type IN ('credit'), amount, 0)) AS total_credit,
              sum(if(type IN ('debit'), amount, 0)) AS total_debit,
              sum(if(type = 'commission', amount, 0)) AS total_commission,
              sum(if(type = 'fees'  , amount, 0)) AS total_fees
            FROM contributions
            left JOIN clients on clients.id = contributions.budget_id
            WHERE paid_at >= '2018-01-01'  AND paid_at <= :lastday AND  contributions.deleted_at is null
            GROUP BY month, budget_id ORDER BY month ASC, first_name ASC, last_name ASC";

        //$query = DB::query($sql)->parameters(["lastdayofMonth" => $lastOfMonth, "firstdayOfYear" => $dt_firstday ]);

        //$query = DB::query(DB::expr($sql));
        $query = DB::query($sql)->bind("lastday", $lastOfMonth);

        $result = $query->execute();

        $data["total_contributions"] = $result;

		$this->template->title = 'Dashboard &raquo; Report';
		$this->template->content = View::forge('dashboard/report', $data);
	}

    public function action_commissions($month_num = 1)
    {
        //$month_num = (isset(Input::get('mocomm')) )  ? Input::get('mocomm') : date('m', time()) ;

        $data["subnav"] = array('report'=> 'active' );
        $this->template->title = 'Commission &raquo; Report';
        $this->template->content = View::forge('dashboard/report', $data);
    }

}
