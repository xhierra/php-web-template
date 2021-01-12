<?php 

class testclass extends connect{

    public function select($id){
        $sql = "SELECT * FROM sample WHERE id = '{$id}'" ;
        return $this->db->view($sql,$id,false);
    }

    public function view(){
        $sql = "SELECT * FROM sample";
        return $this->db->view($sql);
    }

    public function insert($name,$age){

        $sql = "INSERT INTO sample (name,age)
        VALUES ('{$name}','{$age}')";

        return $this->db->query_action($sql,array($name,$age));
    }

    public function update($name,$age,$id){

        $sql = "UPDATE sample
        SET name = '{$name}', age = '{$age}'
        WHERE id = '{$id}'";

        return $this->db->query_action($sql,array($name,$age,$id));
    }

}