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
        $endDateCount = $statusStatistics['endDateCount'];
        $endDatePercentage = $statusStatistics['endDatePercentage'];
        $this->view('home', [
            'endDateCount' => $endDateCount,
            'endDatePercentage' => $endDatePercentage,
        ]);
    }


    




}