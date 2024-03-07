<?php


class ChartData{
    
    //Properties
    private $arrData = array();
    private $arrLabel = array();

    //Default Constructor
    function __construct(){}

    //Private functions
    private function chart_mtd_cases() {
        require 'Scripts/Include/DBSetup.php';
        $sql =  "CALL `chart_mtd_cases`();";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            array_push($this->arrLabel, $row['offense']);
            array_push($this->arrData, $row['total_count']);
        }   
    }
    private function chart_ytd_cases(){
        require 'Scripts/Include/DBSetup.php';
        $sql =  "CALL `chart_ytd_cases`();";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            array_push($this->arrLabel, $row['offense']);
            array_push($this->arrData, $row['total_count']);
        }
    }
    private function chart_mtd_devices(){
        require 'Scripts/Include/DBSetup.php';
        $sql =  "CALL `chart_mtd_devices`();";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            array_push($this->arrLabel, $row['type']);
            array_push($this->arrData, $row['total_count']);
        }
    }
    private function chart_ytd_devices(){
        require 'Scripts/Include/DBSetup.php';
        $sql =  "CALL `chart_ytd_devices`();";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            array_push($this->arrLabel, $row['type']);
            array_push($this->arrData, $row['total_count']);
        }
    }
    private function chart_mtd_cases_by_agency(){
        require 'Scripts/Include/DBSetup.php';
        $sql =  "CALL `chart_mtd_cases_by_agency`();";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Error";
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            array_push($this->arrLabel, $row['agency']);
            array_push($this->arrData, $row['total_cases']);
        }
    }
        private function chart_ytd_cases_by_agency(){
            require 'Scripts/Include/DBSetup.php';
            $sql =  "CALL `chart_ytd_cases_by_agency`();";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "SQL Error";
            }
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($rows as $row) {
                array_push($this->arrLabel, $row['agency']);
                array_push($this->arrData, $row['total_cases']);
            }
        }
    

    //Public functions
    public function getChartMtdCases()
    {
        $this->chart_mtd_cases();
        return array($this->arrLabel, $this->arrData);
    }
    public function getChartYtdCases()
    {
        $this->chart_ytd_cases();
        return array($this->arrLabel, $this->arrData);
    }
    public function getChartMtdDevices()
    {
        $this->chart_mtd_devices();
        return array($this->arrLabel, $this->arrData);
    }
    public function getChartYtdDevices()
    {
        $this->chart_ytd_devices();
        return array($this->arrLabel, $this->arrData);
    }
    public function getChartMtdCasesByAgency()
    {
        $this->chart_mtd_cases_by_agency();
        return array($this->arrLabel, $this->arrData);
    }
    public function getChartYtdCasesByAgency()
    {
        $this->chart_ytd_cases_by_agency();
        return array($this->arrLabel, $this->arrData);
    }
    public function clearData()
    {
        $this->arrData = array();
        $this->arrLabel = array();
    }

}

