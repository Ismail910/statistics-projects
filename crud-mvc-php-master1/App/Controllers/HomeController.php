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

        $this->view('home', [
            'passCount' => $passCount,
            'notPassCount' => $notPassCount,
            'endDateCount' => $notPassCount,
            'passPercentage' => $passPercentage,
            'notPassPercentage' => $notPassPercentage,
            'endDatePercentage' => $endDatePercentage,
        ]);
    }


    




}