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
        $data = ["name"=>"mostafa mahfouz"];
        $this->view('home',$data);
    }


    // public function userStatisticsByStatus()
    // {
       
    //     $statusStatistics = $this->conn->getStatusStatistics();
       

        
    //    return $this->view('home', $statusStatistics );
    // }


    public function userStatisticsByStatus()
    {
       
        $statusStatistics = $this->conn->getStatusStatistics();
        $passCount = $statusStatistics['pass_count'];
        $notPassCount = $statusStatistics['not_pass_count'];
        $passPercentage = $statusStatistics['pass_percentage'];
        $notPassPercentage = $statusStatistics['not_pass_percentage'];

        
       return $this->view('home', [
            'passCount' => $passCount,
            'notPassCount' => $notPassCount,
            'passPercentage' => $passPercentage,
            'notPassPercentage' => $notPassPercentage,
        ]);
    }


}