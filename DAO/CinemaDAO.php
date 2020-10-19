<?php
    namespace DAO;

    use Models\cine as cine;

    class cineDAO{

    private $cineList = array();
    private $fileName;
    
    public function add($cine){
        $this->retrieveData();
        array_push($this->cineList, $cine);
        $this->saveData();
    }

    public function getAll(){
        $this->retrieveData();
        return $this->cineList;
    }



    public function Edit(Cinema $cine){
        $this->RetrieveData();
        $id = 0;
        foreach ($this->GetAll() as $value){
            if ($cine->getId() == $value->getId()){
                $this->cineList[$id] = $cine;
                $this->SaveData();
                return 0;
            }
            $id++;
        }
    }


    public function delete($id){
        $this->RetrieveData();
        
        foreach ($this->cineList as $value){
            if ($id == $value->getId()){
                unset($this->cineList[$id]);
                $this->SaveData();
                $this->FixId();
            }
            
        }
    }

    public function FixId(){

        $this->RetrieveData();
        $newcineList = array();
        $id = 0;
        foreach ($this->GetAll() as $value){
            
            $value->setId($id);  
            $id++;
        }
        $this->SaveData();
    }





    public function GetAll(){
        $this->RetrieveData();
        return $this->cineList;
    }

    public function CompareName($name){
        $cineList= $this->GetAll();
        foreach ($cineList as $cine){
            if ($cine->getName() == $name){
                return true;
            }
        }
        return false;

    }

    public function returncineById($id){
        $cineList= $this->GetAll();
        foreach ($cineList as $cine){
            if ($cine->getId() == $id){
                return $cine;
            }
        }
        return false;

    }



    private function SaveData(){
        $arrayToEncode = array();

        foreach($this->cineList as $cine){
            $valuesArray["id"] = $cine->getId();
            $valuesArray["name"] = $cine->getName();
            $valuesArray["address"] = $cine->getAddress();
            $valuesArray["ticket_price"] = $cine->getTicketPrice();
            $valuesArray["total_capacity"] = $cine->getTotalCapacity();
            array_push($arrayToEncode,$valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents('Data/cines.json', $jsonContent);
    }

    private function RetrieveData(){
        
        $this->cineList = array();

        if(file_exists('Data/cines.json')){
            $jsonContent = file_get_contents('Data/cines.json');
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent,true) : array();
            
            foreach($arrayToDecode as $valuesArray){

                $cine = new cine();

                $cine->setId($valuesArray["id"]);
                $cine->setName($valuesArray["name"]);
                $cine->setAddress($valuesArray["address"]);
                $cine->setTicketPrice($valuesArray["ticket_price"]);
                $cine->setTotalCapacity($valuesArray["total_capacity"]);
                array_push($this->cineList,$cine);
            }

        }
    }
}
?>