<?php
class database{

    
    private $Database = 'test';
    private $host = 'localhost';
    private $userLogin = 'root';
    private $userPass = '';


    public function __construct(){
        $this->connection();
    }


    private function connection(){
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->Database;
        $pdo = new PDO($dsn,$this->userLogin,$this->userPass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    
        return $pdo;
    }


    public function view($sql = null,$TheVal = null,$Query = false){
        if(!is_null($sql)):
            if(!$this->QueryChoice($sql,$Query)):
                    return false;
            else:
     
                $ExecuteStatement = $this->QueryChoice($sql,$Query);

                if(!is_null($TheVal)):
                
    
                    if(is_array($TheVal)):
        
                        if(is_array($TheVal)):
                            foreach($TheVal as $vals => $keys):
                                $ExecuteStatement->bindValue(($vals+1),$keys);
                            endforeach;
                        else:
                            $ExecuteStatement->bindParam(1,$TheVal);
                            $ExecuteStatement->execute();
                        endif;

                        $ExecuteStatement->execute();

                    else:
                        $ExecuteStatement->bindParam(1,$TheVal);
                        $ExecuteStatement->execute();
                    endif;
        
                
                endif;

                $output = array();
                while($row =  $ExecuteStatement->fetch()){
                    $output[] = $row;
                }
                $ExecuteStatement->closeCursor();
                return $output;
            endif;
        endif;
    }



    public function query_action($sql,$action_values = array()){
        
        if(!empty($sql) && !empty($action_values)):
            if($this->CheckQuery($sql)):
                return $this->ExecuteQuery($sql,$action_values);
            endif;
        endif;

        return die('you have a mistake on your query check your errors ' ."<b>".$sql."</b>");
    }


    private function CheckQuery($sql){
        if($this->QueryChoice($sql)):
            return true;
        endif;
        return false;
    }

    private function QueryChoice($sql,$val = true){
        return $val == false ? $this->connection()->query($sql) : $this->connection()->prepare($sql) ;
    }


    private function ExecuteQuery($sql,$values){
        $ExecuteStatement = $this->QueryChoice($sql);
        foreach($values as $vals => $keys){
            $ExecuteStatement->bindValue(($vals+1),$keys);
        }
        $Res = $ExecuteStatement->execute();
        
        return $Res;
    }
    







}