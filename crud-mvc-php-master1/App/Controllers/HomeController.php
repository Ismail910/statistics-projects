<?php 



class HomeController extends Controller
{

    private $conn;
    public function __construct()
    {
        $this->conn = new Users();
    }

    public function index()
    {
       
        $statusStatistics = $this->conn->getStatusStatistics();
        $passCount = $statusStatistics['pass_count'];
        $notPassCount = $statusStatistics['not_pass_count'];
        $endDateCount = $statusStatistics['end_Date_Count'];
        $passPercentage = $statusStatistics['pass_percentage'];
        $notPassPercentage = $statusStatistics['not_pass_percentage'];
        $endDatePercentage = $statusStatistics['end_Date_Percentage'];
        $passusers = $statusStatistics['pass_users'];
        $notpassusers = $statusStatistics['not_pass_users'];
        $alluserswithenddatepast = $statusStatistics['all_users_with_end_date_past'];

        $this->view('home', [
            'passCount' => $passCount,
            'notPassCount' => $notPassCount,
            'endDateCount' => $endDateCount,
            'passPercentage' => $passPercentage,
            'notPassPercentage' => $notPassPercentage,
            'endDatePercentage' => $endDatePercentage,
            'passusers' => $passusers,
            'notpassusers' => $notpassusers,
            'alluserswithenddatepast' => $alluserswithenddatepast,
        ]);
    }


    




}