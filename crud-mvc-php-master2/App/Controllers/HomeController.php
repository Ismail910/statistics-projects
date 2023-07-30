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
        $startDateCount = $statusStatistics['startDateCount'];
        $endDateCount = $statusStatistics['endDateCount'];
        $endDatePercentage = $statusStatistics['endDatePercentage'];
        $allUsersStartDateResult = $statusStatistics['allUsersStartDateResult'];
        $allUsersEndDateResult = $statusStatistics['allUsersEndDateResult'];

        $this->view('home', [
            'startDateCount' => $startDateCount,
            'endDateCount' => $endDateCount,
            'endDatePercentage' => $endDatePercentage,
            'allUsersStartDateResult' => $allUsersStartDateResult,
            'allUsersEndDateResult' => $allUsersEndDateResult,
        ]);
    }


    




}